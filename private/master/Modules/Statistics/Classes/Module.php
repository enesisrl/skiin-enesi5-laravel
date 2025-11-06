<?php

namespace Master\Modules\Statistics\Classes;

use Illuminate\Support\Facades\Cache;
use Master\Foundation\Modules\Crud\Classes\Module as BaseModule;
use Master\Modules\Acceptances\Models\Acceptance;
use Illuminate\Support\Facades\DB;

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

    }

    public function getUsageStatistics($params = []){
        $ret = null;
        return $ret;
    }

}
