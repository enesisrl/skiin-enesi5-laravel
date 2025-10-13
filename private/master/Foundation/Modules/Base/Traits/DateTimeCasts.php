<?php

namespace Master\Foundation\Modules\Base\Traits;

use Illuminate\Support\Carbon;

trait DateTimeCasts
{
    public function setAttribute($key, $value)
    {
        if ($this->hasCast($key, 'datetime')) {
            $value = $value ? Carbon::parse($value) : null;
            if (strtotime($value) === 0) $value = null;
        }
        parent::setAttribute($key, $value);

        return $this;
    }
}