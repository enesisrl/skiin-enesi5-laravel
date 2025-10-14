<?php

namespace Master\Modules\Acceptances\Models;

use Illuminate\Support\Arr;
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

}
