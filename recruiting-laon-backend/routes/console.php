<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\SendWeeklyFilmsEmailJob;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

//emais semanais novos filmes e series
Schedule::call(function () {
    SendWeeklyFilmsEmailJob::dispatch()->onQueue('emails');
})
    ->fridays()
    ->at('09:00');
