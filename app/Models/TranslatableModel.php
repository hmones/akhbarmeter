<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TranslatableModel extends Model
{
    use HasTranslations;

    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->attributes) || $this->hasGetMutator($key)) {
            if (in_array($key, $this->translatable ?? [])) {
                return $this->getTranslation($key, empty(app()->getLocale()) ? 'ar' : app()->getLocale()) ?? $this->getAttributeValue($key);
            }

            return $this->getAttributeValue($key);
        }

        return $this->getRelationValue($key);
    }
}
