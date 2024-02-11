<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Menu;
use App\Models\NotreTravail;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TypeCommunication;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FrontendController extends Controller
{
    public function index()
    {
        $photo_animation = Slider::latest()->where('status', 1)->get();
        $logo = Logo::all()->first();
        $menus = Menu::select(
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'icon',
            'status',
            'updated_at'
        )->where('status', 1)->latest()->get();
        $services = Service::select(
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'description_' . LaravelLocalization::getCurrentLocale() . ' as description',
            'status',
            'updated_at'
        )->where('status', 1)->get();
        $contacts  = TypeCommunication::select(
            'id',
            'type_comunication_' . LaravelLocalization::getCurrentLocale() . ' as type_communication',
            'link',
            'status',
            'updated_at'
        )->where('status', 1)->latest()->get();
        $travailles  = NotreTravail::select(
            'id',
            'description_' . LaravelLocalization::getCurrentLocale() . ' as description',
            'link',
            'status',
            'updated_at'
        )->where('status', 1)->latest()->get();
        return view('index', compact(
            'photo_animation',
            'logo',
            'menus',
            'services',
            'contacts',
            'travailles'
        ));
    }
}
