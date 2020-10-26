<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Customer extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'customers';

    const GENDER_SELECT = [
        'Male'   => 'Male',
        'Female' => 'Female',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'date_of_birthday',
    ];

    protected $fillable = [
        'email',
        'mobile',
        'gender',
        'address',
        'last_name',
        'first_name',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'date_of_birthday',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function customerDocuments()
    {
        return $this->hasMany(Document::class, 'customer_id', 'id');
    }

    public function getDateOfBirthdayAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthdayAttribute($value)
    {
        $this->attributes['date_of_birthday'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
