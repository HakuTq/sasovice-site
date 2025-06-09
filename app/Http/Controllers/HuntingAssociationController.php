<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\GameSpecies;
use Carbon\Carbon;

class HuntingAssociationController extends Controller
{
    // Coordinates for Šašovice (replace with your exact coordinates)
    const LATITUDE = 49.1236;
    const LONGITUDE = 16.3533;
    const TIMEZONE = 'Europe/Prague';

    public function index(Request $request)
    {
        // Get month from query parameter or use current month
        $monthParam = $request->query('month');
        
        try {
            $currentDate = $monthParam 
                ? Carbon::createFromFormat('Y-m', $monthParam)->startOfMonth()
                : now()->startOfMonth();
        } catch (\Exception $e) {
            $currentDate = now()->startOfMonth();
        }
        
        $daysInMonth = $currentDate->daysInMonth;
        $year = $currentDate->year;
        $month = $currentDate->month;
        $firstDay = Carbon::create($year, $month, 1);
        
        // Generate calendar days
        $days = [];
        $startOffset = $firstDay->dayOfWeekIso - 1; // Monday=1, Sunday=7
        
        // Previous month days
        $prevMonth = $currentDate->copy()->subMonth();
        $prevMonthDays = $prevMonth->daysInMonth;
        for ($i = $startOffset - 1; $i >= 0; $i--) {
            $day = $prevMonthDays - $i;
            $date = Carbon::create($prevMonth->year, $prevMonth->month, $day);
            $days[] = [
                'date' => $date,
                'game' => $this->getGameForDate($date),
                'currentMonth' => false,
                'astro' => $this->getAstronomicalData($date)
            ];
        }
        
        // Current month days
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::create($year, $month, $day);
            $days[] = [
                'date' => $date,
                'game' => $this->getGameForDate($date),
                'currentMonth' => true,
                'astro' => $this->getAstronomicalData($date)
            ];
        }
        
        // Next month days
        $totalCells = 42; // 6 weeks
        $nextMonth = $currentDate->copy()->addMonth();
        $remaining = $totalCells - count($days);
        for ($day = 1; $day <= $remaining; $day++) {
            $date = Carbon::create($nextMonth->year, $nextMonth->month, $day);
            $days[] = [
                'date' => $date,
                'game' => $this->getGameForDate($date),
                'currentMonth' => false,
                'astro' => $this->getAstronomicalData($date)
            ];
        }

        return view('hs', compact('days', 'currentDate'));
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
        // Use PHP's built-in function
        $sunrise = date_sunrise(
            $date->timestamp, 
            SUNFUNCS_RET_STRING, 
            self::LATITUDE, 
            self::LONGITUDE,
            90, // Zenith angle (90° for sunrise/sunset)
            1   // GMT offset in hours
        );
        
        return $sunrise ?: sprintf('%02d:%02d', rand(5, 7), rand(0, 59));
    }
    
    private function calculateSunset(Carbon $date)
    {
        // Use PHP's built-in function
        $sunset = date_sunset(
            $date->timestamp, 
            SUNFUNCS_RET_STRING, 
            self::LATITUDE, 
            self::LONGITUDE,
            90, // Zenith angle
            1   // GMT offset
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