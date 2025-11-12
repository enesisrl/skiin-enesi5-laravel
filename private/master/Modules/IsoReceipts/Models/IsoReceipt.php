<?php

namespace Master\Modules\IsoReceipts\Models;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Master\Foundation\Modules\Base\Models\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\InvalidBase64Data;

class IsoReceipt extends Model  implements HasMedia {

    use InteractsWithMedia;

    protected $table = 'iso_receipts';

    protected $fillable = [
        'first_name',
        'last_name',
        'ski',
        'height',
        'weight',
        'shoe_measure',
        'uo_age',
        'skier_type',
        'z_value',
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
        $isoReceipt = new self();
        $query = $isoReceipt->select($isoReceipt->getTable().'.*',
                 DB::raw('CONCAT('.$isoReceipt->getTable().'.last_name,\' \','.$isoReceipt->getTable().'.first_name) as customer_name')
            )
        ->groupBy('iso_receipts.id');
        return $query;
    }


    /**
     * @throws FileCannotBeAdded
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws InvalidBase64Data
     */
    public function fillRecord($record){

        $this->website_id = Arr::get($record, 'website_id');
        $this->first_name = Arr::get($record, 'nome');
        $this->last_name = Arr::get($record, 'cognome');
        $this->ski = Arr::get($record, 'sci');
        $this->height = Arr::get($record, 'height');
        $this->weight = Arr::get($record, 'weight');
        $this->shoe_measure = Arr::get($record, 'shoe_measure');
        $this->uo_age = Arr::get($record, 'uo_age');
        $this->skier_type = Arr::get($record, 'tipo_sciatore');
        $this->z_value = Arr::get($record, 'valore_z');
        $this->created_at = Arr::get($record, 'data_inserimento');

        if (Arr::get($record, 'pdf_file')){
            $this->addMediaFromBase64(Arr::get($record, 'pdf_file'))
                ->usingFileName($this->id.'.pdf')
                ->toMediaCollection('pdf_file');
        }
        if (Arr::get($record, 'zpl_file')) {
            $this->addMediaFromBase64(Arr::get($record, 'zpl_file'))
                ->usingFileName($this->id . '.zpl')
                ->toMediaCollection('zpl_file');
        }

        $this->save();
    }


}
