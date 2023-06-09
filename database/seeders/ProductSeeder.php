<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('dataseeder.products');
        //dd($products);
        foreach ($products as $product) {
            $new_product = new Product();
            $new_product->name = $product['name'];
            $new_product->slug = Str::slug($new_product->name, '-');
            $new_product->brand_id = $product['brand_id'];
            $new_product->price = $product['price'];
            $new_product->category_id = $product['category_id'];
            $new_product->texture_id = $product['texture_id'];
            $new_product->description = $product['description'];
            $new_product->cover_image = ProductSeeder::storeimage($product['api_featured_image']);
            //dd($new_product->cover_image);
            $new_product->save();
        }
    }

    public static function storeimage($img)
    {
        $url = 'https:' . $img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = substr($temp_name, 0, strpos($temp_name, '?')) . '.jpg';
        $path = 'images/' . $name;
        Storage::put('images/' . $name, $contents);
        return $path;
    }
}