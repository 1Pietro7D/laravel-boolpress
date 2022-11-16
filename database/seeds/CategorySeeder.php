<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;
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
        $categories = ['tecnologia','cinema','musica','viaggiare'];
        foreach($categories as $model){
            $category = new Category();
            $category->name = $model;
            $category->slug = Str::slug($category->name);
            $category->save();
        }

    }
}
