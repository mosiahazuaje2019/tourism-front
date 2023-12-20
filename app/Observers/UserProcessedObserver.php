<?php

namespace App\Observers;
use App\Events\UserProcessedEvent;
use App\Models\YourModel;

class UserProcessedObserver
{
    public function created(){
        //event(new UserProcessedEvent());
    }
}
