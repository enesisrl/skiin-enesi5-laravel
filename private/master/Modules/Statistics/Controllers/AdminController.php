<?php

namespace Master\Modules\Statistics\Controllers;

use Illuminate\Http\Request;
use Master\Foundation\Modules\Crud\Controllers\AdminController as BaseController;
use Master\Modules\Statistics\Facades\Statistics;

class AdminController extends BaseController {


    public function index($params = []){
        return response()->redirectTo($this->module->adminRoute('usage'));
    }
    public function create($id = "", $initParams = []){
        return response()->redirectTo($this->module->adminRoute('usage'));
    }

    public function usage(Request $request)
    {
        $searchForm = $this->module->getSearchForm();

        $data = Statistics::getUsageStatistics($request->all());
        return $this->module->adminView("index")->with([
            'page_title' => $this->module->adminLang("usage"),
            'title' => $this->module->adminLang("usage_title"),
            'search_section_title' => $this->module->adminLang("usage_search_title"),
            'data' => $data,
            'tableView' => 'usage',
            'searchForm' => $searchForm
        ]);
    }
}
