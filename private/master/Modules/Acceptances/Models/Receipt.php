<?php

namespace Master\Modules\Acceptances\Models;

use Illuminate\Support\Arr;
use Master\Foundation\Modules\Base\Models\Model;


class Receipt extends Model  {


    protected $table = 'receipts';

    protected $fillable = [
        'acceptance_id',
        'agency_id',
        'date',
        'description',
        'price',
        'created_by',
        'updated_by',
        'deleted_by',
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
