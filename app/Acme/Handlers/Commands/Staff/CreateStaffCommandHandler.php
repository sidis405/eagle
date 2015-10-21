<?php

namespace Acme\Handlers\Commands\Staff;

use Acme\Commands\CreateStaffCommand;
use Acme\Models\Staff;
use Illuminate\Queue\InteractsWithQueue;
__IMPORTS__

class CreateStaffCommandHandler
{
    __CONSTRUCT__

    /**
     * Handle the command.
     *
     * @param  CreateStaffCommand  $command
     * @return void
     */
    public function handle(CreateStaffCommand $command)
    {
        $__MODELINSTANCE_L___object = Staff::make($command->myField);

        __PERSISTING__

        __EVENTABLE__

        return $__MODELINSTANCE_L__;

    }
}
