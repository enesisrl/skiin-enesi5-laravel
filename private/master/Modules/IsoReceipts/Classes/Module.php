<?php

namespace Master\Modules\IsoReceipts\Classes;

use Illuminate\Support\Facades\DB;
use Master\Foundation\Modules\Crud\Classes\Module as BaseModule;
use Master\Modules\IsoReceipts\Models\IsoReceipt;
use Master\Modules\Users\Facades\Users;
use Illuminate\Support\Facades\Auth;

class Module extends BaseModule {
    public function getIsoReceiptsForSelect(){

        return IsoReceipt::select('iso_receipts.id as value','iso_receipts.description')
            ->orderBy('iso_receipts.description','asc')->get();

    }
}
