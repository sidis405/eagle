<?php

namespace Acme\Handlers\Commands;

use Acme\Commands\CreateTestCommand;
use Acme\Models\Activities;
use Illuminate\Queue\InteractsWithQueue;
__IMPORTS__

class UpdateActivityCommandHandler
{
    __CONSTRUCT__

    /**
     * Handle the command.
     *
     * @param  UpdateActivityCommand  $command
     * @return void
     */
    public function handle(CreateActivityCommand $command)
    {
         $__MODELINSTANCE_L___object = Activities::save($command->myField);

        __PERSISTING__

        __EVENTABLE__

        return $__MODELINSTANCE_L__;
    }
}
