<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NotreTravail extends Model
{
    use HasFactory;
    protected $guarded = [];

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
