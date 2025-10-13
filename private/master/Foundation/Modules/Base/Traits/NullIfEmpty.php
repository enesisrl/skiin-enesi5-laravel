<?php

namespace Master\Foundation\Modules\Base\Traits;

/**
 * Defines a list of model attributes that need to be handled as null fields
 * When specific conditions are met (such as the value is empty) the
 * value is automatically cast to null before the value is inserted into the database
 *
 * Implement the nullable() method and define an array of attribute names that need to be cast to null if they're empty
 *
 * @package App\Models
 */
trait NullIfEmpty
{
    /**
     * Define the attributes that need to be checked for null values
     *
     * @return array
     */
    abstract public function nullable();

    public static function bootNullIfEmpty()
    {
        static::saving(function($item) {
            foreach ($item->nullable() as $attribute) {
                $item->attributes[$attribute] = $item->setNullIfEmptyOrDateZero($item->attributes[$attribute]);
            }
        });
    }

    /**
     * Sniff the value and cast to null if conditions are met
     *
     * @param mixed $value
     * @return mixed
     */
    public function setNullIfEmptyOrDateZero($value)
    {
        $tmpValue = trim($value);
        $value = $tmpValue == '' ? null : $value;

        if ($value == "1970-01-01 01:00:00") $value = null;
        return $value;
    }
}