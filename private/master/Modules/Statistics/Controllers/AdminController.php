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
        $searchForm = $this->module->getSearchFormCustom('usage');

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

    public function insurance(Request $request)
    {
        $searchForm = $this->module->getSearchFormCustom('insurance');

        $data = Statistics::getInsuranceStatistics($request->all());
        return $this->module->adminView("index")->with([
            'page_title' => $this->module->adminLang("insurance"),
            'title' => $this->module->adminLang("insurance_title"),
            'search_section_title' => $this->module->adminLang("insurance_search_title"),
            'data' => $data,
            'tableView' => 'insurance',
            'searchForm' => $searchForm
        ]);
    }

    public function categories(Request $request)
    {
        $searchForm = $this->module->getSearchFormCustom('categories');

        $data = Statistics::getCategoriesStatistics($request->all());
        return $this->module->adminView("index")->with([
            'page_title' => $this->module->adminLang("categories"),
            'title' => $this->module->adminLang("categories_title"),
            'search_section_title' => $this->module->adminLang("categories_search_title"),
            'data' => $data,
            'tableView' => 'categories',
            'searchForm' => $searchForm
        ]);
    }
}
