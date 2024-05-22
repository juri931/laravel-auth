<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Functions\Helper;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Front End', 'Back End', 'Design', 'UX', 'Laravel', 'VueJS', 'Angular', 'React'];
        foreach ($data as $item) {
            $new_item = new Tag();
            $new_item->name = $item;
            $new_item->slug = Helper::generateSlug($item, Tag::class);
            $new_item->save();
        }
    }
}
