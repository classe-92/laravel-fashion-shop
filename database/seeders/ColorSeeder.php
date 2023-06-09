<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = config('dataseeder.colors');
        //dd($textures);
        foreach ($colors as $color) {
            $new_color = new Color();
            $new_color->name = $color['colour_name'];
            $new_color->hex_value = $color['hex_value'];
            $new_color->save();
        }
    }
}