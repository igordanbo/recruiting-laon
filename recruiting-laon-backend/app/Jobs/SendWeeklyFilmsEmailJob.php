<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Film;
use App\Models\Serie;
use App\Mail\WeeklyFilmsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class SendWeeklyFilmsEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $movies = Film::latest()
            ->take(7)
            ->get();

        $series = Serie::latest()
            ->take(7)
            ->get();

        $users = User::where('role', 'user')->get();

        foreach ($users as $user) {
            Mail::to($user->email)
                ->queue(new WeeklyFilmsMail($movies, $series, $user));
        }
    }
}
