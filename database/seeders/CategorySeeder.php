<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Dashboard\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name'  => 'Batteries',
            'image' => 'images/categories-icons/battery.svg'
        ]);

        Category::create([
            'name'  => 'Inverters',
            'image' => 'images/categories-icons/air-conditioner.svg'
        ]);

        Category::create([
            'name'  => 'Solar Panels',
            'image' => 'images/categories-icons/solar-panel.svg'
        ]);

        Category::create([
            'name'  => 'Hard Disks',
            'image' => 'images/categories-icons/cd-player.svg'
        ]);

        Category::create([
            'name'  => 'UPS',
            'image' => 'images/categories-icons/power-supply.svg'
        ]);
    }
}
