<?php

namespace App\Enums;

enum GameSpecies: string
{
    // Spárkatá zvěř (Ungulates)
    case JELEN = 'jelen';
    case DANĚK = 'daněk';
    case MUFLON = 'muflon';
    case SIKA = 'sika';
    case SRNEC = 'srnec';
    case KAMZÍK = 'kamzík';
    case DIVOČÁK = 'divočák';
    case ZAJÍC = 'zajíc';
    
    // Pernatá zvěř (Feathered game)
    case BAŽANT = 'bažant';
    case KACHNA = 'kachna';
    case HŘDOLIČKA = 'hrdolička';
    case HOLUB = 'holub';
    case KROUŽEK = 'kroužek';
    case SLUKA = 'sluka';
    case JEŘÁBEK = 'jeřábek';
    case KOROPTEV = 'koroptev';
    
    // Šelmy a ostatní (Predators and others)
    case LIŠKA = 'liška';
    case JEZEVEC = 'jezevec';
    case KUNY = 'kuny';
    case TCHOŘ = 'tchoř';
    case KRKAVEC = 'krkavec';
    case SOJKA = 'sojka';
    case STRAKA = 'straka';
    case VRÁNA = 'vrána';

    public function season(): array
    {
        return match($this) {
            // Spárkatá zvěř
            self::JELEN => ['start' => '08-01', 'end' => '01-15'],  // Jelen
            self::DANĚK => ['start' => '08-16', 'end' => '12-31'],  // Daněk
            self::MUFLON => ['start' => '08-01', 'end' => '01-31'], // Muflon
            self::SIKA => ['start' => '08-01', 'end' => '01-15'],   // Sika
            self::SRNEC => ['start' => '05-16', 'end' => '09-30'],  // Srnec
            self::KAMZÍK => ['start' => '10-01', 'end' => '11-30'], // Kamzík
            self::DIVOČÁK => ['start' => '01-01', 'end' => '12-31'], // Prase divoké
            self::ZAJÍC => ['start' => '11-01', 'end' => '12-31'],  // Zajíc
            
            // Pernatá zvěř
            self::BAŽANT => ['start' => '10-01', 'end' => '12-31'], // Bažant
            self::KACHNA => ['start' => '09-01', 'end' => '11-30'], // Kachna
            self::HŘDOLIČKA => ['start' => '09-01', 'end' => '09-30'], // Hrdlička zahradní
            self::HOLUB => ['start' => '08-01', 'end' => '02-15'],  // Holub hřivnáč
            self::KROUŽEK => ['start' => '10-01', 'end' => '01-31'], // Kroužek
            self::SLUKA => ['start' => '10-16', 'end' => '12-31'],  // Sluka lesní
            self::JEŘÁBEK => ['start' => '10-01', 'end' => '11-30'], // Jeřábek lesní
            self::KOROPTEV => ['start' => '09-01', 'end' => '11-30'], // Koroptev polní
            
            // Šelmy a ostatní
            self::LIŠKA => ['start' => '11-01', 'end' => '02-28'],  // Liška
            self::JEZEVEC => ['start' => '08-01', 'end' => '11-30'], // Jezevec
            self::KUNY => ['start' => '11-01', 'end' => '02-28'],   // Kuny
            self::TCHOŘ => ['start' => '09-01', 'end' => '02-28'],  // Tchoř
            self::KRKAVEC => ['start' => '08-01', 'end' => '02-28'], // Krkavec
            self::SOJKA => ['start' => '08-01', 'end' => '02-28'],  // Sojka
            self::STRAKA => ['start' => '08-01', 'end' => '02-28'], // Straka
            self::VRÁNA => ['start' => '08-01', 'end' => '02-28'],  // Vrána
        };
    }

    public function displayName(): string
    {
        return match($this) {
            // Spárkatá zvěř
            self::JELEN => 'Jelen evropský',
            self::DANĚK => 'Daněk evropský',
            self::MUFLON => 'Muflon',
            self::SIKA => 'Jelen sika',
            self::SRNEC => 'Srnec obecný',
            self::KAMZÍK => 'Kamzík horský',
            self::DIVOČÁK => 'Prase divoké',
            self::ZAJÍC => 'Zajíc polní',
            
            // Pernatá zvěř
            self::BAŽANT => 'Bažant obecný',
            self::KACHNA => 'Kachna divoká',
            self::HŘDOLIČKA => 'Hrdlička zahradní',
            self::HOLUB => 'Holub hřivnáč',
            self::KROUŽEK => 'Hohol severní',
            self::SLUKA => 'Sluka lesní',
            self::JEŘÁBEK => 'Jeřábek lesní',
            self::KOROPTEV => 'Koroptev polní',
            
            // Šelmy a ostatní
            self::LIŠKA => 'Liška obecná',
            self::JEZEVEC => 'Jezevec lesní',
            self::KUNY => 'Kuna (lesní a skalní)',
            self::TCHOŘ => 'Tchoř tmavý',
            self::KRKAVEC => 'Krkavec velký',
            self::SOJKA => 'Sojka obecná',
            self::STRAKA => 'Straka obecná',
            self::VRÁNA => 'Vrána obecná',
        };
    }

    public function category(): string
    {
        return match($this) {
            self::JELEN, self::DANĚK, self::MUFLON, 
            self::SIKA, self::SRNEC, self::KAMZÍK, 
            self::DIVOČÁK, self::ZAJÍC => 'Spárkatá zvěř',
            
            self::BAŽANT, self::KACHNA, self::HŘDOLIČKA, 
            self::HOLUB, self::KROUŽEK, self::SLUKA, 
            self::JEŘÁBEK, self::KOROPTEV => 'Pernatá zvěř',
            
            self::LIŠKA, self::JEZEVEC, self::KUNY, 
            self::TCHOŘ, self::KRKAVEC, self::SOJKA, 
            self::STRAKA, self::VRÁNA => 'Šelmy a ostatní'
        };
    }
}