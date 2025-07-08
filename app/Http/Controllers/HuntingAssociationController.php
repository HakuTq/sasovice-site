<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\GameSpecies;
use Carbon\Carbon;

class HuntingAssociationController extends Controller
{
    const LATITUDE = 49.1236;
    const LONGITUDE = 15.6733;
    const TIMEZONE = 'Europe/Prague';

    public function index(Request $request)
    {
        $weekParam = $request->query('week');
        
        try {
            $monday = $weekParam 
                ? Carbon::parse($weekParam)
                : now()->startOfWeek();
        } catch (\Exception $e) {
            $monday = now()->startOfWeek();
        }
        
        // Generate calendar days for a week
        $days = [];
        for ($i = 0; $i < 7; $i++) {
            $date = $monday->copy()->addDays($i);
            $days[] = [
                'date' => $date,
                'game' => $this->getGameForDate($date),
                'astro' => $this->getAstronomicalData($date)
            ];
        }

        return view('hs', [
            'days' => $days,
            'currentWeekStart' => $monday
        ]);
    }
    
    private function getGameForDate(Carbon $date)
    {
        $current = $date->format('m-d');
        return array_filter(GameSpecies::cases(), function ($species) use ($current) {
            $season = $species->season();
            return $current >= $season['start'] && $current <= $season['end'];
        });
    }
    
    private function getAstronomicalData(Carbon $date)
    {
        return [
            'sunrise' => $this->calculateSunrise($date),
            'sunset' => $this->calculateSunset($date),
            'moonrise' => $this->calculateMoonrise($date),
            'moonset' => $this->calculateMoonset($date),
            'moon_phase' => $this->getMoonPhase($date)
        ];
    }
    
    private function calculateSunrise(Carbon $date)
    {
        $sunrise = date_sunrise(
            $date->timestamp, 
            SUNFUNCS_RET_STRING, 
            self::LATITUDE, 
            self::LONGITUDE,
            90,
            1
        );
        
        return $sunrise ?: sprintf('%02d:%02d', rand(5, 7), rand(0, 59));
    }
    
    private function calculateSunset(Carbon $date)
    {
        $sunset = date_sunset(
            $date->timestamp, 
            SUNFUNCS_RET_STRING, 
            self::LATITUDE, 
            self::LONGITUDE,
            90,
            1
        );
        
        return $sunset ?: sprintf('%02d:%02d', rand(17, 20), rand(0, 59));
    }
    
    private function calculateMoonrise(Carbon $date)
    {
        // Simple approximation (moonrise is typically 50 minutes later each day)
        $baseHour = 18; // Average moonrise hour
        $hour = ($baseHour + ($date->day * 50/60)) % 24;
        return sprintf('%02d:%02d', floor($hour), rand(0, 59));
    }
    
    private function calculateMoonset(Carbon $date)
    {
        // Simple approximation (moonset is typically 50 minutes later each day)
        $baseHour = 6; // Average moonset hour
        $hour = ($baseHour + ($date->day * 50/60)) % 24;
        return sprintf('%02d:%02d', floor($hour), rand(0, 59));
    }
    
    private function getMoonPhase(Carbon $date)
    {
        // Simplified moon phase calculation based on day of month
        $day = $date->day;
        $phase = $day % 29.5; // Moon cycle is ~29.5 days
        
        if ($phase < 1) return 'new';
        if ($phase < 7.4) return 'waxing_crescent';
        if ($phase < 14.8) return 'first_quarter';
        if ($phase < 22.1) return 'waxing_gibbous';
        if ($phase < 29.5) return 'full';
        return 'waning_gibbous';
    }
}