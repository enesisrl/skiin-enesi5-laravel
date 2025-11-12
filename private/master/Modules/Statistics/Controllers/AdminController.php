<?php

namespace Master\Modules\Statistics\Controllers;

use Illuminate\Http\Request;
use Master\Foundation\Modules\Crud\Controllers\AdminController as BaseController;
use Master\Modules\Statistics\Facades\Statistics;
use Master\Modules\Statistics\Classes\Exports\UsageExport;
use Master\Modules\Statistics\Classes\Exports\InsuranceExport;
use Master\Modules\Statistics\Classes\Exports\CategoriesExport;
use Master\Modules\Statistics\Classes\Exports\DepositsExport;

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

    public function deposits(Request $request)
    {
        $searchForm = $this->module->getSearchFormCustom('deposits');

        $data = Statistics::getDepositsStatistics($request->all());
        return $this->module->adminView("index")->with([
            'page_title' => $this->module->adminLang("deposits"),
            'title' => $this->module->adminLang("deposits_title"),
            'search_section_title' => $this->module->adminLang("deposits_search_title"),
            'data' => $data,
            'tableView' => 'deposits',
            'searchForm' => $searchForm
        ]);
    }

    public function usageExport(Request $request)
    {
        $data = Statistics::getUsageStatistics($request->all());

        if (!$data) {
            return redirect()->back()->with('error', __('admin::message.no_data_to_export'));
        }

        $export = new UsageExport($data);
        $writer = $export->export();

        $fileName = 'usage_statistics_' . date('Y-m-d_His') . '.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function insuranceExport(Request $request)
    {
        $data = Statistics::getInsuranceStatistics($request->all());

        if (!$data) {
            return redirect()->back()->with('error', __('admin::message.no_data_to_export'));
        }

        $export = new InsuranceExport($data);
        $writer = $export->export();

        $fileName = 'insurance_statistics_' . date('Y-m-d_His') . '.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function categoriesExport(Request $request)
    {
        $data = Statistics::getCategoriesStatistics($request->all());

        if (!$data) {
            return redirect()->back()->with('error', __('admin::message.no_data_to_export'));
        }

        $export = new CategoriesExport($data);
        $writer = $export->export();

        $fileName = 'categories_statistics_' . date('Y-m-d_His') . '.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function depositsExport(Request $request)
    {
        $data = Statistics::getDepositsStatistics($request->all());

        if (!$data) {
            return redirect()->back()->with('error', __('admin::message.no_data_to_export'));
        }

        $export = new DepositsExport($data);
        $writer = $export->export();

        $fileName = 'deposits_statistics_' . date('Y-m-d_His') . '.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);

        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
