<?php

namespace App\Observers;

use App\Mail\SendMessage;
use App\Models\Talaba;
use Illuminate\Support\Facades\Mail;

class TalabaObserver
{
    /**
     * Handle the Talaba "created" event.
     */
    public function created(Talaba $talaba): void
    {
        $data = [
            'name' => $talaba->name,
            'age' => $talaba->age
        ];
        Mail::to('yusupovvlogs@gmail.com')->send(new SendMessage($data));
    }

    /**
     * Handle the Talaba "updated" event.
     */
    public function updated(Talaba $talaba): void
    {
        $data = [
            'name' => $talaba->name,
            'age' => $talaba->age
        ];
        Mail::to('yusupovvlogs@gmail.com')->send(new SendMessage($data));
    }

    /**
     * Handle the Talaba "deleted" event.
     */
    public function deleted(Talaba $talaba): void
    {
        $data = [
            'name' => $talaba->name,
            'age' => $talaba->age
        ];
        Mail::to('yusupovvlogs@gmail.com')->send(new SendMessage($data));
    }

    /**
     * Handle the Talaba "restored" event.
     */
    public function restored(Talaba $talaba): void
    {
        //
    }

    /**
     * Handle the Talaba "force deleted" event.
     */
    public function forceDeleted(Talaba $talaba): void
    {
        //
    }
}
