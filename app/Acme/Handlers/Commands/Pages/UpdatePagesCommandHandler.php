<?php

namespace Acme\Handlers\Commands;

use Acme\Commands\CreateTestCommand;
use Acme\Models\Pages;
use Illuminate\Queue\InteractsWithQueue;
__IMPORTS__

class UpdatePageCommandHandler
{
    __CONSTRUCT__

    /**
     * Handle the command.
     *
     * @param  UpdatePageCommand  $command
     * @return void
     */
    public function handle(CreatePageCommand $command)
    {
         $__MODELINSTANCE_L___object = Pages::save($command->myField);

        __PERSISTING__

        __EVENTABLE__

        return $__MODELINSTANCE_L__;
    }
}
