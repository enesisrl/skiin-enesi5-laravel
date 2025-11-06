<?php

namespace Master\Modules\Statistics\Classes;

use Illuminate\Support\Facades\Cache;
use Master\Foundation\Modules\Crud\Classes\Module as BaseModule;
use Master\Modules\Acceptances\Models\Acceptance;
use Illuminate\Support\Facades\DB;
use Master\Modules\Acceptances\Models\AcceptanceProfit;

class Module extends BaseModule {

    protected function makeSortKey($s){
        $s = (string)$s;
        // sostituisci spazi Unicode multipli con uno solo
        $s = preg_replace('/\p{Z}+/u', ' ', $s);
        $s = trim($s);
        // prova a translitterare gli accenti se available
        if (function_exists('transliterator_transliterate')){
            // Latin transliteration
            $t = @transliterator_transliterate('Any-Latin; Latin-ASCII; [^\p{L}\p{N}] Remove', $s);
            if ($t !== null && $t !== false) {
                $s = $t;
            }
        } else {
            // fallback iconv
            $t = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $s);
            if ($t !== false && $t !== null) {
                $s = $t;
            }
        }
        // lowercase multibyte
        $s = mb_strtolower($s, 'UTF-8');
        return $s;
    }

    public function getCategoriesForSelect(){
        return Cache::store(config('master.website.cache_driver'))->rememberForever('categories', function(){
            $ret = [];
            $data = Acceptance::categoriesWithLatestDescriptions();

            foreach($data as $record){
                $desc = $record->description;
                $ret[] = ['value' => $record->category_value, 'description' => $desc, 'sort_key' => $this->makeSortKey($desc)];
            }

            // prepara il collator se disponibile
            $collator = null;
            if (class_exists('Collator')) {
                try {
                    $locale = setlocale(LC_ALL, 0) ?: 'it_IT';
                    $collator = new \Collator($locale);
                } catch (\Exception $e) {
                    $collator = null;
                }
            }

            usort($ret, function($a, $b) use ($collator){
                if ($collator) {
                    $cmp = $collator->compare($a['sort_key'], $b['sort_key']);
                } else {
                    $cmp = strcmp($a['sort_key'], $b['sort_key']);
                }
                if ($cmp !== 0) return $cmp;
                return strcmp((string)$a['value'], (string)$b['value']);
            });

            // rimuovi sort_key prima di restituire
            foreach($ret as &$r) unset($r['sort_key']);

            return $ret;
        });
    }

    public function getMeasuresForSelect(){
        return Cache::store(config('master.website.cache_driver'))->rememberForever('measures', function(){
            $ret = [];
            $data = Acceptance::measuresWithLatestDescriptions();
            foreach($data as $record){
                $desc = $record->description;
                $ret[] = ['value' => $record->measure_value, 'description' => $desc, 'sort_key' => $this->makeSortKey($desc)];
            }

            $collator = null;
            if (class_exists('Collator')) {
                try {
                    $locale = setlocale(LC_ALL, 0) ?: 'it_IT';
                    $collator = new \Collator($locale);
                } catch (\Exception $e) {
                    $collator = null;
                }
            }

            usort($ret, function($a, $b) use ($collator){
                if ($collator) {
                    $cmp = $collator->compare($a['sort_key'], $b['sort_key']);
                } else {
                    $cmp = strcmp($a['sort_key'], $b['sort_key']);
                }
                if ($cmp !== 0) return $cmp;
                return strcmp((string)$a['value'], (string)$b['value']);
            });

            foreach($ret as &$r) unset($r['sort_key']);

            return $ret;
        });
    }

    public function getBrandsForSelect(){
        return Cache::store(config('master.website.cache_driver'))->rememberForever('brands', function(){
            $ret = [];
            $data = Acceptance::brandsWithLatestDescriptions();
            foreach($data as $record){
                $desc = $record->description;
                $ret[] = ['value' => $record->brand_value, 'description' => $desc, 'sort_key' => $this->makeSortKey($desc)];
            }

            $collator = null;
            if (class_exists('Collator')) {
                try {
                    $locale = setlocale(LC_ALL, 0) ?: 'it_IT';
                    $collator = new \Collator($locale);
                } catch (\Exception $e) {
                    $collator = null;
                }
            }

            usort($ret, function($a, $b) use ($collator){
                if ($collator) {
                    $cmp = $collator->compare($a['sort_key'], $b['sort_key']);
                } else {
                    $cmp = strcmp($a['sort_key'], $b['sort_key']);
                }
                if ($cmp !== 0) return $cmp;
                return strcmp((string)$a['value'], (string)$b['value']);
            });

            foreach($ret as &$r) unset($r['sort_key']);

            return $ret;
        });
    }

    public function getYearsForSelect(){
        return Cache::store(config('master.website.cache_driver'))->rememberForever('years', function(){
            $model = new Acceptance();
            $table = $model->getTable();

            // se il model usa SoftDeletes, applicheremo whereNull sul deleted column
            $usesSoftDeletes = in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses($model));
            $deletedColumn = $usesSoftDeletes ? $model->getDeletedAtColumn() : null;

            // usa query builder invece di subquery raw per evitare concatenazioni e gestire soft deletes
            $q1 = DB::table($table)->select(DB::raw('DISTINCT year_1 AS year_value'))
                ->whereNotNull('year_1')
                ->whereRaw("TRIM(year_1) <> ''");
            if ($usesSoftDeletes) $q1->whereNull($deletedColumn);

            $q2 = DB::table($table)->select(DB::raw('DISTINCT year_2 AS year_value'))
                ->whereNotNull('year_2')
                ->whereRaw("TRIM(year_2) <> ''");
            if ($usesSoftDeletes) $q2->whereNull($deletedColumn);

            $q3 = DB::table($table)->select(DB::raw('DISTINCT year_3 AS year_value'))
                ->whereNotNull('year_3')
                ->whereRaw("TRIM(year_3) <> ''");
            if ($usesSoftDeletes) $q3->whereNull($deletedColumn);

            $union = $q1->unionAll($q2)->unionAll($q3);

            $rows = $union->get()->pluck('year_value')->filter(function($y){
                return $y !== null && trim((string)$y) !== '';
            })->unique()->values()->all();

            // ordina discendente se numerici, altrimenti per stringa desc
            usort($rows, function($a, $b){
                if (is_numeric($a) && is_numeric($b)) {
                    return ((int)$b) <=> ((int)$a);
                }
                return strcmp((string)$b, (string)$a);
            });

            $ret = [];
            foreach($rows as $year){
                $ret[] = ['value' => $year, 'description' => (string)$year];
            }
            return $ret;
        });
    }

    public function getSearchFormOrderFields(){
        return [
            ['value' => 'article_code', 'description' => __('admin::label.code')],
            ['value' => 'description', 'description' => __('admin::label.description')],
            ['value' => 'category', 'description' => __('admin::label.category')],
            ['value' => 'brand', 'description' => __('admin::label.brand')],
            ['value' => 'measure', 'description' => __('admin::label.measure')],
            ['value' => 'days', 'description' => __('admin::label.days')],
            ['value' => 'profit', 'description' => __('admin::label.profit')],
        ];
    }

    public function getUsageStatistics($params = []){

        /*
search_date_from
search_date_to
search_category_id
search_measure_id
search_brand_id
search_code
search_description
search_year
orderField
orderType
         *  */

        // Se in $params non è presente (o è vuoto) nessuno dei parametri di ricerca rilevanti, ritorna null
        $keys = [
            'search_date_from', 'search_date_to', 'search_category_id', 'search_measure_id',
            'search_brand_id', 'search_code', 'search_description', 'search_year'
        ];
        $hasAny = false;
        foreach ($keys as $k) {
            if (array_key_exists($k, $params)) {
                $val = $params[$k];
                if (is_array($val)) {
                    if (!empty($val)) { $hasAny = true; break; }
                } else {
                    if ($val !== null && $val !== '') { $hasAny = true; break; }
                }
            }
        }
        if (!$hasAny) {
            return null;
        }

        // prepara nomi delle tabelle tramite i model
        $apModel = new AcceptanceProfit();
        $aModel = new Acceptance();
        $apTable = $apModel->getTable();
        $aTable = $aModel->getTable();

        // selezione con CASE per description, category, brand, measure
        $descriptionCase = "CASE ".
            "WHEN {$apTable}.article_code = {$aTable}.article_1 THEN {$aTable}.article_1_description ".
            "WHEN {$apTable}.article_code = {$aTable}.article_2 THEN {$aTable}.article_2_description ".
            "WHEN {$apTable}.article_code = {$aTable}.article_3 THEN {$aTable}.article_3_description ".
            "ELSE NULL END";

        $categoryCase = "CASE ".
            "WHEN {$apTable}.article_code = {$aTable}.article_1 THEN {$aTable}.category_1_description ".
            "WHEN {$apTable}.article_code = {$aTable}.article_2 THEN {$aTable}.category_2_description ".
            "WHEN {$apTable}.article_code = {$aTable}.article_3 THEN {$aTable}.category_3_description ".
            "ELSE NULL END";

        $brandCase = "CASE ".
            "WHEN {$apTable}.article_code = {$aTable}.article_1 THEN {$aTable}.brand_1 ".
            "WHEN {$apTable}.article_code = {$aTable}.article_2 THEN {$aTable}.brand_2 ".
            "WHEN {$apTable}.article_code = {$aTable}.article_3 THEN {$aTable}.brand_3 ".
            "ELSE NULL END";

        $measureCase = "CASE ".
            "WHEN {$apTable}.article_code = {$aTable}.article_1 THEN {$aTable}.measure_1 ".
            "WHEN {$apTable}.article_code = {$aTable}.article_2 THEN {$aTable}.measure_2 ".
            "WHEN {$apTable}.article_code = {$aTable}.article_3 THEN {$aTable}.measure_3 ".
            "ELSE NULL END";

        $q = AcceptanceProfit::join($aTable, function($join) use ($apTable, $aTable) {
                $join->on("{$apTable}.acceptance_id", '=', "{$aTable}.id")->whereNull("{$aTable}.deleted_at");
            })
            ->selectRaw(implode(', ', [
                "{$apTable}.article_code AS article_code",
                "{$apTable}.days AS days",
                "MAX({$descriptionCase}) AS description",
                "MAX({$categoryCase}) AS category",
                "MAX({$brandCase}) AS brand",
                "MAX({$measureCase}) AS measure",
                "SUM({$apTable}.profit) AS profit",
                "MIN({$aTable}.date_in) AS acceptance_date_in",
                "MAX({$aTable}.date_out) AS acceptance_date_out",
            ]));

        // raggruppa per article_code e days e somma i profitti
        $q->groupBy("{$apTable}.article_code", "{$apTable}.days");

        // Filtri
        if (!empty($params['search_date_from']) || !empty($params['search_date_to'])) {
            $from = !empty($params['search_date_from']) ? $params['search_date_from'] : null;
            $to = !empty($params['search_date_to']) ? $params['search_date_to'] : null;
            if ($from && $to) {
                $q->whereBetween("{$aTable}.date_in", [$from, $to]);
            } elseif ($from) {
                $q->where("{$aTable}.date_in", ">=", $from);
            } elseif ($to) {
                $q->where("{$aTable}.date_in", "<=", $to);
            }
        }

        if (isset($params['search_category_id']) && $params['search_category_id'] !== null && $params['search_category_id'] !== '') {
            $vals = (array)$params['search_category_id'];
            $q->where(function($qr) use ($vals, $aTable, $apTable) {
                foreach ($vals as $v) {
                    $qr->orWhere(function($q2) use ($v, $aTable, $apTable) {
                        $q2->whereRaw("{$apTable}.article_code = {$aTable}.article_1")->where("{$aTable}.category_1", $v)
                           ->orWhere(function($q3) use ($v, $aTable, $apTable) {
                               $q3->whereRaw("{$apTable}.article_code = {$aTable}.article_2")->where("{$aTable}.category_2", $v);
                           })
                           ->orWhere(function($q3) use ($v, $aTable, $apTable) {
                               $q3->whereRaw("{$apTable}.article_code = {$aTable}.article_3")->where("{$aTable}.category_3", $v);
                           });
                    });
                }
            });
        }

        if (isset($params['search_measure_id']) && $params['search_measure_id'] !== null && $params['search_measure_id'] !== '') {
            $vals = (array)$params['search_measure_id'];
            $q->where(function($qr) use ($vals, $aTable, $apTable) {
                foreach ($vals as $v) {
                    $qr->orWhere(function($q2) use ($v, $aTable, $apTable) {
                        $q2->whereRaw("{$apTable}.article_code = {$aTable}.article_1")->where("{$aTable}.measure_1", $v)
                           ->orWhere(function($q3) use ($v, $aTable, $apTable) {
                               $q3->whereRaw("{$apTable}.article_code = {$aTable}.article_2")->where("{$aTable}.measure_2", $v);
                           })
                           ->orWhere(function($q3) use ($v, $aTable, $apTable) {
                               $q3->whereRaw("{$apTable}.article_code = {$aTable}.article_3")->where("{$aTable}.measure_3", $v);
                           });
                    });
                }
            });
        }

        if (isset($params['search_brand_id']) && $params['search_brand_id'] !== null && $params['search_brand_id'] !== '') {
            $vals = (array)$params['search_brand_id'];
            $q->where(function($qr) use ($vals, $aTable, $apTable) {
                foreach ($vals as $v) {
                    $qr->orWhere(function($q2) use ($v, $aTable, $apTable) {
                        $q2->whereRaw("{$apTable}.article_code = {$aTable}.article_1")->where("{$aTable}.brand_1", $v)
                           ->orWhere(function($q3) use ($v, $aTable, $apTable) {
                               $q3->whereRaw("{$apTable}.article_code = {$aTable}.article_2")->where("{$aTable}.brand_2", $v);
                           })
                           ->orWhere(function($q3) use ($v, $aTable, $apTable) {
                               $q3->whereRaw("{$apTable}.article_code = {$aTable}.article_3")->where("{$aTable}.brand_3", $v);
                           });
                    });
                }
            });
        }

        if (!empty($params['search_code'])) {
            $code = $params['search_code'];
            // supporta wildcard
            if (strpos($code, '%') !== false) {
                $q->where("{$apTable}.article_code", 'like', $code);
            } else {
                $q->where("{$apTable}.article_code", 'like', "%{$code}%");
            }
        }

        if (!empty($params['search_description'])) {
            $desc = $params['search_description'];
            $q->where(function($qr) use ($desc, $aTable, $apTable) {
                $qr->where(function($q2) use ($desc, $aTable, $apTable) {
                    $q2->whereRaw("{$apTable}.article_code = {$aTable}.article_1")->where("{$aTable}.article_1_description", 'like', "%{$desc}%");
                })->orWhere(function($q2) use ($desc, $aTable, $apTable) {
                    $q2->whereRaw("{$apTable}.article_code = {$aTable}.article_2")->where("{$aTable}.article_2_description", 'like', "%{$desc}%");
                })->orWhere(function($q2) use ($desc, $aTable, $apTable) {
                    $q2->whereRaw("{$apTable}.article_code = {$aTable}.article_3")->where("{$aTable}.article_3_description", 'like', "%{$desc}%");
                });
            });
        }

        if (!empty($params['search_year'])) {
            $vals = (array)$params['search_year'];
            $q->where(function($qr) use ($vals, $aTable, $apTable) {
                foreach ($vals as $v) {
                    $qr->orWhere(function($q2) use ($v, $aTable, $apTable) {
                        $q2->whereRaw("{$apTable}.article_code = {$aTable}.article_1")->where("{$aTable}.year_1", $v)
                           ->orWhere(function($q3) use ($v, $aTable, $apTable) {
                               $q3->whereRaw("{$apTable}.article_code = {$aTable}.article_2")->where("{$aTable}.year_2", $v);
                           })
                           ->orWhere(function($q3) use ($v, $aTable, $apTable) {
                               $q3->whereRaw("{$apTable}.article_code = {$aTable}.article_3")->where("{$aTable}.year_3", $v);
                           });
                    });
                }
            });
        }

        // order
        if (!empty($params['orderField'])) {
            $orderField = $params['orderField'];
            $orderType = (!empty($params['orderType']) && in_array(strtolower($params['orderType']), ['asc','desc'])) ? $params['orderType'] : 'asc';
            // permetti solo alcuni campi
            $allowed = ['article_code','description','category','brand','measure','days','profit','acceptance_date_in'];
            if (in_array($orderField, $allowed)) {
                // mappa i campi alias a espressioni
                $map = [
                    'article_code' => "{$apTable}.article_code",
                    'description' => 'description',
                    'category' => 'category',
                    'brand' => 'brand',
                    'measure' => 'measure',
                    'days' => 'days',
                    'profit' => 'profit',
                    'acceptance_date_in' => 'acceptance_date_in'
                ];

                $orderExpr = $map[$orderField] ?? $orderField;

                // Se l'orderField è days o profit, applichiamo solo quell'ordinamento
                if ($orderField === 'days' || $orderField === 'profit') {
                    $q->orderBy($orderExpr, $orderType);
                } else {
                    // primo ordine: campo richiesto, poi sempre days desc e profit desc
                    $q->orderBy($orderExpr, $orderType)
                      ->orderBy('days', 'desc')
                      ->orderBy('profit', 'desc');
                }
            } else {
                // campo non consentito: fallback al default
                $q->orderBy('days', 'desc')->orderBy('profit', 'desc');
            }
        } else {
            // default ordering
            $q->orderBy('days', 'desc')->orderBy('profit', 'desc');
        }

        return $q->get();
    }

}
