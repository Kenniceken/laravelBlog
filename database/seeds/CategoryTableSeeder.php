<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $politics = new Category();
        $politics->name = 'Politics';
        $politics->slug = 'politics';
        $politics->save();

        
        $healthcare = new Category();
        $healthcare->name = 'Healthcare';
        $healthcare->slug = 'healthcare';
        $healthcare->save();

        
        $developer = new Category();
        $developer->name = 'Web Development';
        $developer->slug = 'web-developer';
        $developer->save();

        
        $technology = new Category();
        $technology->name = 'Technology';
        $technology->slug = 'technology';
        $technology->save();

        $science = new Category();
        $science->name = 'Science';
        $science->slug = 'science';
        $science->save();
    }
}
