<?php

namespace Master\Foundation\Modules\Commands;

use Enesisrl\LaravelMasterCore\Foundation\Modules\Commands\Command as BaseCommand;

class Command extends BaseCommand {

    public $website_id = "e0fbeeb2-a913-4785-91bb-97d0037df035";
    public $country_it = "ec374182-d317-4007-a3d8-914750044bab";

    public function __construct()
    {
        parent::__construct();
        $this->website_domain = config('master.command_domain');
    }

}
