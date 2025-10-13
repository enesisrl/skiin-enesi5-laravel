<?php

namespace Master\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade per l'accesso al generatore di OTP
 *
 * Fornisce un'interfaccia statica per accedere alle funzionalità
 * del generatore di codici OTP.
 *
 * @method static object generate(mixed $model, string $type = 'numeric', int $length = 4, int $validity = 15)
 * @method static bool isValid(mixed $model, string $token)
 * @method static object validate(mixed $model, string $token)
 */
class OtpGenerator extends Facade {
    /**
     * Ottiene l'identificatore registrato per il componente
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'OtpGenerator';
    }

}
