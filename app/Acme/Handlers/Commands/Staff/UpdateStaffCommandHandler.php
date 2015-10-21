<?php

namespace Acme\Handlers\Commands;

use Acme\Commands\CreateTestCommand;
use Acme\Models\Staff;
use Illuminate\Queue\InteractsWithQueue;
__IMPORTS__

class UpdateStaffCommandHandler
{
    __CONSTRUCT__

    /**
     * Handle the command.
     *
     * @param  UpdateStaffCommand  $command
     * @return void
     */
    public function handle(CreateStaffCommand $command)
    {
         $__MODELINSTANCE_L___object = Staff::save($command->myField);

        __PERSISTING__

        __EVENTABLE__

        return $__MODELINSTANCE_L__;
    }
}
