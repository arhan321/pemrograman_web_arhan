<?php

namespace App\Models;

use DateTimeInterface;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'products';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TRANSMITION = [
        'at' => 'AT (Automatic) 4AT',
        'at_cvt' => 'AT (Automatic) CVT',
        'mt' => 'MT (Manual) ',
    ];  

    public const JENIS_MESIN = [
        'diesel' => 'DIESEL',
        'bensin' => 'BENSIN',
    ];

    public const CATEGORY_SELECT = [
        'suv' => 'SUV',
        'mpv' => 'MPV',
    ];

    protected $fillable = [
        'name',
        'category',
        'description',
        'tahun',
        'warna',
        'tipe', 
        'mesin',
        'cc',
        'pajak',
        'transmition',
        'price',
        'stock',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
}
