<?php

namespace Master\Modules\Toponyms\Controllers;

use Enesisrl\LaravelMasterAddresses\Modules\Toponyms\Controllers\AdminController as BaseController;
use Illuminate\Http\Request;
use Master\Modules\Toponyms\Facades\Toponyms;
use Master\Modules\Toponyms\Models\Toponym;

class AdminController extends BaseController {

    public function autocompleteToponyms(Request $request): \Illuminate\Http\JsonResponse
    {

        $ret = [];
        $toponyms = Toponym::prepare()->orderBy('toponym_translations.description')->get();
        foreach ($toponyms as $toponym){
            $ret[] = $toponym->description;
        }
        return response()->json($ret);
    }

}
