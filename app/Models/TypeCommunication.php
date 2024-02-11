<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TypeCommunication extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function firstMedia(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable');
    }
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function status()
    {
        if ($this->status && LaravelLocalization::getCurrentLocale() == 'fr') {
            return 'Activé';
        } elseif (!$this->status && LaravelLocalization::getCurrentLocale() == 'fr') {
            return 'non activé';
        } elseif ($this->status && LaravelLocalization::getCurrentLocale() == 'ar') {
            return 'مفعل';
        } else {
            return 'غير مفعل';
        }
    }
}
