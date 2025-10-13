<?php

namespace Master\Modules\IsoRentReceipts\Classes;

use Illuminate\Support\Facades\DB;
use Master\Foundation\Modules\Crud\Classes\Module as BaseModule;
use Master\Modules\IsoRentReceipts\Models\IsoRentReceipt;
use Master\Modules\Users\Facades\Users;
use Illuminate\Support\Facades\Auth;

class Module extends BaseModule {
    public function getIsoRentReceiptsForSelect(){

        return IsoRentReceipt::select('iso_rent_receipts.id as value','iso_rent_receipts.description')
            ->orderBy('iso_rent_receipts.description','asc')->get();

    }
}
