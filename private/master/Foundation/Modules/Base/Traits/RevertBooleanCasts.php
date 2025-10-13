<?php

namespace Master\Foundation\Modules\Base\Traits;


trait RevertBooleanCasts
{
    public function setAttribute($key, $value)
    {
        if ($this->hasCast($key, 'boolean')) {
            $value = (int)$value;
        }
        parent::setAttribute($key, $value);

        return $this;
    }
}
