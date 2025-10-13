<?php

namespace Master\Modules\IsoRentReceipts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed getIsoRentReceiptsForSelect()
 * @method static mixed canAdmin($permission)
 * @method static mixed canBase($permission)
 * @method static mixed canOperator($permission)
 * @method static mixed getForm($model)
 * @method static mixed getSearchForm()
 * @method static mixed getListStructure()
 * @method static mixed adminView($view, $data)
 * @method static mixed __construct(array $module)
 * @method static mixed config($name, $default)
 * @method static mixed getName()
 * @method static mixed getAlias($suffix)
 * @method static mixed getBasepath($path)
 * @method static mixed getClassname($class, $at)
 * @method static mixed getAdminBaseurl()
 * @method static mixed getModel()
 * @method static mixed can($permission)
 * @method static mixed boot()
 * @method static mixed wrapCallable(callable $callable)
 * @method static mixed useCallable(callable $callable, $params)
 * @method static mixed adminRoute($route, $params)
 * @method static mixed adminLang($lang, $params)
 */
class IsoRentReceipts extends Facade {

    protected static function getFacadeAccessor() {
        return 'IsoRentReceiptsModule';
    }

}
