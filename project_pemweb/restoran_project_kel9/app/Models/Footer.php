<?php

namespace App\Models;

use DateTimeInterface;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Footer extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'footers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'logo_restoran',
        'detail',
        'alamat',
        'phone',
        'faximile',
        'email',
        'opening_day',
        'opening_hours',
        'closing_hours',
        'copyright',
        'desain_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')->fit('crop', 50, 50);
    //     $this->addMediaConversion('preview')->fit('crop', 120, 120);
    // }

    // public function getLogoAttribute()
    // {
    //     $file = $this->getMedia('logo')->last();
    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //         $file->preview   = $file->getUrl('preview');
    //     }

    //     return $file;
    // }
}
