<?php

namespace Acme\Handlers\Commands\Pages;

use Acme\Commands\CreatePageCommand;
use Acme\Models\Pages;
use Illuminate\Queue\InteractsWithQueue;
__IMPORTS__

class CreatePageCommandHandler
{
    __CONSTRUCT__

    /**
     * Handle the command.
     *
     * @param  CreatePageCommand  $command
     * @return void
     */
    public function handle(CreatePageCommand $command)
    {
        $__MODELINSTANCE_L___object = Pages::make($command->myField);

        __PERSISTING__

        __EVENTABLE__

        return $__MODELINSTANCE_L__;

    }
}
