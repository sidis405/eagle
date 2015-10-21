<?php

namespace Acme\Handlers\Commands\Activities;

use Acme\Commands\CreateActivityCommand;
use Acme\Models\Activities;
use Illuminate\Queue\InteractsWithQueue;
__IMPORTS__

class CreateActivityCommandHandler
{
    __CONSTRUCT__

    /**
     * Handle the command.
     *
     * @param  CreateActivityCommand  $command
     * @return void
     */
    public function handle(CreateActivityCommand $command)
    {
        $__MODELINSTANCE_L___object = Activities::make($command->myField);

        __PERSISTING__

        __EVENTABLE__

        return $__MODELINSTANCE_L__;

    }
}
