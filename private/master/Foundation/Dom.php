<?php

namespace Master\Foundation;


use Master\Modules\Websites\Facades\Websites;

class Dom extends \Enesisrl\LaravelMasterCore\Foundation\Dom{


    /**
     * Renderizza il banner dei cookie.
     *
     * @return string|null Script HTML per il cookie banner o null se non configurato.
     */
    public function renderCookieBanner(): ?string
    {
        if (Websites::current('epp_policy_id')) {
            $params = [
                'uid' => Websites::current('epp_policy_id'),
                'ln' => Websites::currentLanguage('iso_code3')
            ];

            if (Websites::current('ene_api_key')) {
                $params['key'] = Websites::current('ene_api_key');
            }

            return '<script type="text/javascript" src="https://privacy.ene.si/api/js?' . http_build_query($params) . '"></script>';
        }

        return null;
    }
}