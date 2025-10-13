<?php

namespace Master\Modules\Websites\Models;

use Enesisrl\LaravelMasterCore\Modules\Websites\Models\Website as Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Arr;
use Master\Facades\Dom;
use Master\Facades\Tool;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Website extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function __construct()
    {
        parent::__construct();
        $this->mergeFillable([
            'shop_hours',
            'fidelity_text'
        ]);
    }

    /* Media
    ------------------------------------------------------------ */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('imageFidelity')
            ->performOnCollections('imageFidelity')
            ->keepOriginalImageFormat()
            ->fit(Fit::Crop, 360, 200)
            ->nonOptimized() //for shared hosts
            ->nonQueued(); //for shared hosts;
    }

    /* Attributi
    ------------------------------------------------------------ */

    public function getFidelityCardAttribute()
    {
        return $this->getFirstMediaUrl('imageFidelity', 'imageFidelity');
    }

    public function getContactsAttribute(){
        $sede_legale = $this->getAddress('sede_legale_address_id');
        return [
            "name" => $this->company_name,
            "vat_id" => $this->vat_id,
            "fiscal_code" => $this->fiscal_code,
            "cciaa" => $this->cciaa,
            "rea" => $this->rea,
            "share_capital" => $this->share_capital,
            "share_capital_format" => $this->share_capital ? Tool::formatNumber($this->share_capital, 2) . ' €' : '',
            "fully_paid" => $this->fully_paid,
            "toponym" => $sede_legale->toponym ?? null,
            "address" => $sede_legale->indirizzo ?? null,
            "zip" => $sede_legale->cap ?? null,
            "city" => $sede_legale->comune ?? null,
            "hamlet" => $sede_legale->frazione ?? null,
            "province_code" => $sede_legale->provincia->sigla ?? null,
            "province" => $sede_legale->provincia->description ?? null,
            "country" => $sede_legale->country->translation->description ?? null,
            "lat" => $sede_legale->lat ?? null,
            "lng" => $sede_legale->lng ?? null,
            "phone" => $this->phone,
            "phone_url" => $this->phone_url,
            "fax" => $this->fax,
            "mobile" => $this->mobile,
            "mobile_url" => $this->mobile_url,
            "whatsapp" => $this->whatsapp,
            "whatsapp_url" => ltrim(str_replace('+', '', str_replace(' ', '', $this->whatsapp)), '0'),
            "email" => $this->email,
            "email_encoded" => $this->email_encoded,
            "pec" => $this->pec,
            "facebook" => $this->social_facebook,
            "instagram" => $this->social_instagram,
            "formattedAddress" => $this->formattedAddress(true)
        ];
    }

    public function formattedAddress(bool $inline = false, string $ln = "<br />"){
        $sede_legale = $this->getAddress('sede_legale_address_id');
        $array = [
            "indirizzo" => $sede_legale->indirizzo ? $sede_legale->toponym." ".$sede_legale->indirizzo : null,
            "cap" => $sede_legale->cap ?? null,
            "comune" => $sede_legale->comune ?? null,
            "frazione" => $sede_legale->frazione ?? null,
            "provincia_sigla" => $sede_legale->provincia->sigla ?? null,
            "stato" => $sede_legale->country->translation->description ?? null
        ];
        return Dom::format_address($array, $inline,$ln);
    }

    public function getArray()
    {
        $array = parent::getArray();
        $sede_legale = $this->getAddress('sede_legale_address_id');
        Arr::set($array, 'sede_legale.toponimo', $sede_legale->toponym ?? null);

        return $array;
    }

}
