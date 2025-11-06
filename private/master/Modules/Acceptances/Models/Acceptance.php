<?php

namespace Master\Modules\Acceptances\Models;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Master\Foundation\Modules\Base\Models\Model;


class Acceptance extends Model  {


    protected $table = 'acceptances';

    protected $fillable = [
        'website_id',
        'barcode',
        'agency',
        'article_1',
        'article_2',
        'article_3',
        'article_1_description',
        'article_2_description',
        'article_3_description',
        'typology_1',
        'typology_2',
        'typology_3',
        'category_1',
        'category_2',
        'category_3',
        'category_1_description',
        'category_2_description',
        'category_3_description',
        'brand_1',
        'brand_2',
        'brand_3',
        'measure_1',
        'measure_2',
        'measure_3',
        'year_1',
        'year_2',
        'year_3',
        'date_in',
        'date_out',
        'site_1',
        'site_2',
        'site_3',
        'customer',
        'name',
        'identity',
        'seasonal',
        'reservation',
        'discount',
        'note',
        'height',
        'weight',
        'shoe_measure',
        'uo_age',
        'free_ride',
        'total_days',
        'morning',
        'end_time',
        'skier_type',
        'skier_code',
        'z_value',
        'insurance',
        'insurance_price',
        'price_details',
        'refundable',
    ];

    protected $hidden = [];
    protected $casts = [
        'date_in' => 'date',
        'date_out' => 'date',
        'seasonal' => 'boolean',
        'uo_age' => 'boolean',
        'free_ride' => 'boolean',
        'morning' => 'boolean',
        'insurance' => 'boolean',
        'refundable' => 'boolean',
        'price_details' => 'array',
        'customer' => 'array'
    ];

    protected $related = [];


    /* Prepare
    ------------------------------------------------------------ */
    public function getData($params=[]){
        return self::prepare($params);
    }

    public static function getById($id) {
        return self::prepare()->where((new self())->getTable().'.id', $id)->first();
    }

    public static function prepare($params = []){
        $model = new self();
        $query = $model->select($model->getTable().'.*');
        return $query;
    }


    public function getDaysAttribute(){
        return $this->date_out->diffInDays($this->date_in);
    }


    public static function categoriesWithLatestDescriptions()
    {
        $table = (new self())->getTable();

        $q1 = DB::table(DB::raw("(SELECT DISTINCT category_1 AS category_value FROM {$table} WHERE category_1 IS NOT NULL AND TRIM(category_1) <> '') t"))
            ->selectRaw("'category_1' AS category_name, t.category_value, (SELECT a2.category_1_description FROM {$table} a2 WHERE a2.category_1 = t.category_value ORDER BY a2.created_at DESC LIMIT 1) AS description");

        $q2 = DB::table(DB::raw("(SELECT DISTINCT category_2 AS category_value FROM {$table} WHERE category_2 IS NOT NULL AND TRIM(category_2) <> '') t"))
            ->selectRaw("'category_2' AS category_name, t.category_value, (SELECT a2.category_2_description FROM {$table} a2 WHERE a2.category_2 = t.category_value ORDER BY a2.created_at DESC LIMIT 1) AS description");

        $q3 = DB::table(DB::raw("(SELECT DISTINCT category_3 AS category_value FROM {$table} WHERE category_3 IS NOT NULL AND TRIM(category_3) <> '') t"))
            ->selectRaw("'category_3' AS category_name, t.category_value, (SELECT a2.category_3_description FROM {$table} a2 WHERE a2.category_3 = t.category_value ORDER BY a2.created_at DESC LIMIT 1) AS description");

        $union = $q1->unionAll($q2)->unionAll($q3);

        $rows = $union->get();

        $sorted = collect($rows)->sort(function($a, $b) {
            // primary: description (case-insensitive, trimmed)
            $da = mb_strtolower(trim((string)$a->description));
            $db = mb_strtolower(trim((string)$b->description));
            $d = strcmp($da, $db);
            if ($d !== 0) {
                return $d;
            }
            // secondary: category_name
            $c = strcmp($a->category_name, $b->category_name);
            if ($c !== 0) {
                return $c;
            }
            // tertiary: category_value
            return strcmp((string)$a->category_value, (string)$b->category_value);
        })->values();

        return $sorted;
    }

    public static function brandsWithLatestDescriptions()
    {
        $table = (new self())->getTable();

        $q1 = DB::table(DB::raw("(SELECT DISTINCT brand_1 AS brand_value FROM {$table} WHERE brand_1 IS NOT NULL AND TRIM(brand_1) <> '') t"))
            ->selectRaw("'brand_1' AS brand_name, t.brand_value, (SELECT a2.brand_1 FROM {$table} a2 WHERE a2.brand_1 = t.brand_value ORDER BY a2.created_at DESC LIMIT 1) AS description");

        $q2 = DB::table(DB::raw("(SELECT DISTINCT brand_2 AS brand_value FROM {$table} WHERE brand_2 IS NOT NULL AND TRIM(brand_2) <> '') t"))
            ->selectRaw("'brand_2' AS brand_name, t.brand_value, (SELECT a2.brand_2 FROM {$table} a2 WHERE a2.brand_2 = t.brand_value ORDER BY a2.created_at DESC LIMIT 1) AS description");

        $q3 = DB::table(DB::raw("(SELECT DISTINCT brand_3 AS brand_value FROM {$table} WHERE brand_3 IS NOT NULL AND TRIM(brand_3) <> '') t"))
            ->selectRaw("'brand_3' AS brand_name, t.brand_value, (SELECT a2.brand_3 FROM {$table} a2 WHERE a2.brand_3 = t.brand_value ORDER BY a2.created_at DESC LIMIT 1) AS description");

        $union = $q1->unionAll($q2)->unionAll($q3);

        $rows = $union->get();

        $sorted = collect($rows)->sort(function($a, $b) {
            // primary: description (case-insensitive, trimmed)
            $da = mb_strtolower(trim((string)$a->description));
            $db = mb_strtolower(trim((string)$b->description));
            $d = strcmp($da, $db);
            if ($d !== 0) {
                return $d;
            }
            // secondary: brand_name
            $c = strcmp($a->brand_name, $b->brand_name);
            if ($c !== 0) {
                return $c;
            }
            // tertiary: brand_value
            return strcmp((string)$a->brand_value, (string)$b->brand_value);
        })->values();

        return $sorted;
    }

    public static function measuresWithLatestDescriptions()
    {
        $table = (new self())->getTable();

        $q1 = DB::table(DB::raw("(SELECT DISTINCT measure_1 AS measure_value FROM {$table} WHERE measure_1 IS NOT NULL AND TRIM(measure_1) <> '') t"))
            ->selectRaw("'measure_1' AS measure_name, t.measure_value, (SELECT a2.measure_1 FROM {$table} a2 WHERE a2.measure_1 = t.measure_value ORDER BY a2.created_at DESC LIMIT 1) AS description");

        $q2 = DB::table(DB::raw("(SELECT DISTINCT measure_2 AS measure_value FROM {$table} WHERE measure_2 IS NOT NULL AND TRIM(measure_2) <> '') t"))
            ->selectRaw("'measure_2' AS measure_name, t.measure_value, (SELECT a2.measure_2 FROM {$table} a2 WHERE a2.measure_2 = t.measure_value ORDER BY a2.created_at DESC LIMIT 1) AS description");

        $q3 = DB::table(DB::raw("(SELECT DISTINCT measure_3 AS measure_value FROM {$table} WHERE measure_3 IS NOT NULL AND TRIM(measure_3) <> '') t"))
            ->selectRaw("'measure_3' AS measure_name, t.measure_value, (SELECT a2.measure_3 FROM {$table} a2 WHERE a2.measure_3 = t.measure_value ORDER BY a2.created_at DESC LIMIT 1) AS description");

        $union = $q1->unionAll($q2)->unionAll($q3);

        $rows = $union->get();

        $sorted = collect($rows)->sort(function($a, $b) {
            // primary: description (case-insensitive, trimmed)
            $da = mb_strtolower(trim((string)$a->description));
            $db = mb_strtolower(trim((string)$b->description));
            $d = strcmp($da, $db);
            if ($d !== 0) {
                return $d;
            }
            // secondary: measure_name
            $c = strcmp($a->measure_name, $b->measure_name);
            if ($c !== 0) {
                return $c;
            }
            // tertiary: measure_value
            return strcmp((string)$a->measure_value, (string)$b->measure_value);
        })->values();

        return $sorted;
    }

}
