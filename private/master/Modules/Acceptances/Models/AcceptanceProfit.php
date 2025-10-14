<?php

namespace Master\Modules\Acceptances\Models;

use Illuminate\Support\Arr;
use Master\Foundation\Modules\Base\Models\Model;


class AcceptanceProfit extends Model  {


    protected $table = 'acceptance_profits';

    protected $fillable = [
        'acceptance_id',
        'category',
        'category_description',
        'article_code',
        'article_description',
        'profit',
        'days',
    ];

    protected $hidden = [];
    protected $casts = [];

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

}
