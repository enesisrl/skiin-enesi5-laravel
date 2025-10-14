<?php

namespace Master\Modules\Acceptances\Models;

use Illuminate\Support\Arr;
use Master\Foundation\Modules\Base\Models\Model;


class AcceptanceMaterial extends Model  {


    protected $table = 'acceptance_materials';

    protected $fillable = [
        'acceptance_id',
        'article_code',
        'article_description',
        'category',
        'category_description',
        'date_in',
        'date_out',
        'profit',
        'profit_details',
    ];

    protected $hidden = [];
    protected $casts = [
        'date_in' => 'datetime',
        'date_out' => 'datetime',
        'profit_details' => 'array',
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

    public function getDaysAttribute(): float|int
    {
        return abs($this->date_out->diffInDays($this->date_in))+1;
    }

}
