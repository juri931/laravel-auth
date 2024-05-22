<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Functions\Helper;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['HTML', 'CSS', 'JavaScript', 'PHP', 'C++'];
        foreach($data as $item){
            $new_item = new Category();
            $new_item->name = $item;
            $new_item->slug = Helper::generateSlug($item, Category::class);
        }
    }
}