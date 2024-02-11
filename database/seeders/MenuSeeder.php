<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->delete();
        $menus = [
            ['name_fr' => 'ACCUEIL', 'name_ar' => 'الرئيسية', 'icon' => 'home.png', 'status' => 1],
            ['name_fr' => 'CONTACTEZ NOUS', 'name_ar' => 'تواصل معنا', 'icon' => 'contact-us.png', 'status' => 1],
            ['name_fr' => 'A PROPO', 'name_ar' => 'عنا', 'icon' => 'about-us.png', 'status' => 1],
            ['name_fr' => 'TRAVAIL', 'name_ar' => 'نماذج من الأعمال', 'icon' => 'travail.png', 'status' => 1],
            ['name_fr' => 'SERVICE', 'name_ar' => 'الخدمات', 'icon' => 'service.png', 'status' => 1],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
