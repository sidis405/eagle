<?php

namespace Acme\Commands;

use Acme\Commands\Command;

class CreateStaffCommand extends Command
{

    public $myField;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($myField)
    {
        $this->myField = $myField;
    }
}
