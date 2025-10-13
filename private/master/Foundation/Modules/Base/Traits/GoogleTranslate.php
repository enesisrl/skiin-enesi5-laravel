<?php

namespace Master\Foundation\Modules\Base\Traits;


use Google\ApiCore\ValidationException;
use Google\Cloud\Core\Exception\GoogleException;
use Google\Cloud\Translate\V2\TranslateClient;
use Illuminate\Support\Arr;
use Master\Modules\Websites\Facades\Websites;


trait GoogleTranslate
{

    /**
     * @throws GoogleException
     * @throws ValidationException
     */
    public function translateMissing()
    {
        if (method_exists($this,"translations") && property_exists($this,'field_to_translate') && Websites::current('google_api_key') && Websites::current('google_cc_projectId')){

            $language_type = null;
            if (property_exists($this,'lang_type')){
                $language_type = $this->lang_type;
            }
            if (!$language_type){
                $language_type = 'front';
            }

            $relation = $this->translations();
            $model = $relation->getModel();
            $table = $model->getTable();
            $foreignKey = $this->getRelationForeignKey($relation,$model);

            $translations = (get_class($model))::select($table.'.*')
                ->leftJoin('languages',function($join) use ($table){
                    $join->on($table.'.lang','languages.iso_code2')->whereNull('languages.deleted_at');
                })
                ->where($table.".".$foreignKey,$this->id)
                ->where('languages.type',$language_type)
                ->orderBy('languages.sequence')->get();

            $startTranslation = [];
            $missingTranslations = [];
            foreach($translations as $translation){
                foreach($this->field_to_translate as $field){
                    if ($translation->{$field}) {
                        if (!Arr::has($startTranslation, $field)) {
                            Arr::set($startTranslation,$field,['lang'=>$translation->lang,'value'=>$translation->{$field}]);
                        }
                    }else{
                        $missingTranslations[$field][$translation->lang] = ['value'=>'','id'=>$translation->id];
                    }
                }

            }

            $translate = new TranslateClient([
                'key' => Websites::current('google_api_key'),
                'projectId' => Websites::current('google_cc_projectId')
            ]);
            foreach($missingTranslations as $field_name=>$missingTranslation){
                foreach($missingTranslation as $lang=>$value){
                    $result = $translate->translate(Arr::get($startTranslation,$field_name.".value"), ['source' => Arr::get($startTranslation,$field_name.".lang"),'target'=>$lang]);
                    //Arr::set($missingTranslations, $field_name.".".$lang.".value", Arr::get($result,'text'));
                    (get_class($model)::where('id',Arr::get($missingTranslations, $field_name.".".$lang.".id")))->update([$field_name=>Arr::get($result,'text')]);
                    //dump((get_class($model)::where('id',Arr::get($missingTranslations, $field_name.".".$lang.".id")))->toRawSql(), [$field_name=>Arr::get($result,'text')]);
                }

            }
        }
    }


}
