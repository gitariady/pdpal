<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command('pengingat:perbaikan')->monthlyOn(22, '06:00');

/**
 * 1. Jalankan setiap menit (untuk testing)
 */
// Schedule::command('pengingat:perbaikan')->everyMinute();

/**
 * 2. Jalankan setiap 5 menit
 */
// Schedule::command('pengingat:perbaikan')->everyFiveMinutes();

/**
 * 3. Jalankan setiap hari jam 08:00
 */
// Schedule::command('pengingat:perbaikan')->dailyAt('08:00');

/**
 * 4. Jalankan setiap Senin jam 09:00
 */
// Schedule::command('pengingat:perbaikan')->weeklyOn(1, '09:00');

/**
 * 5. Jalankan setiap tanggal 21 jam 20:05 (default Anda)
 */
//Schedule::command('pengingat:perbaikan')->monthlyOn(21, '20:05');

/**
 * 6. Jalankan dua kali sehari, jam 09:00 dan 17:00
 */
// Schedule::command('pengingat:perbaikan')->twiceDaily(9, 17);

/**
 * 7. Jalankan setiap hari kerja (Senin - Jumat) jam 08:00
 */
// Schedule::command('pengingat:perbaikan')->weekdays()->at('08:00');

/**
 * 8. Jalankan setiap jam
 */
// Schedule::command('pengingat:perbaikan')->hourly();



Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
