<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new \App\Category;
        $model->name = 'Laravel';
        $model->save();
        
        $model = new \App\Category;
        $model->name = 'Symfony';
        $model->save();
        
        $model = new \App\Category;
        $model->name = 'AngularJS';
        $model->save();
    }
}
