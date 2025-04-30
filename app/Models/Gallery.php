<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use CrudTrait, HasTranslations;

    public $translatable = [
        'title',
        'description'
    ];

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function setThumbnailAttribute($value): void
    {
        $this->attributes['thumbnail'] = Storage::putFile('v3.0/gallery/thumbnail', $value, 'public');
    }

    public function setImagesAttribute(array $images): void
    {
        // If no files are uploaded, preserve existing images or set to null
        if (!$images) {
            $this->attributes['images'] = $this->images ?? null;
            return;
        }

        $imagePaths = [];
        foreach ($images as $image) {
            $image = data_get($image, 'image');
            if (is_file($image)) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $path = Storage::putFileAs('v3.0/gallery/images', $image, $filename, 'public');
                $imagePaths[] = $path;
            }
        }

        // Merge with existing images (if any) to avoid overwriting
        $existingImages = $this->images ?? [];
        $this->attributes['images'] = json_encode(array_merge($existingImages, $imagePaths));
    }
}
