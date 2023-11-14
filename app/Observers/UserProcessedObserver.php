<?php

namespace App\Observers;
use App\Events\UserProcessedEvent;

class UserProcessedObserver
{
    public function created($model){
        event(new UserProcessedEvent());
    }
}
