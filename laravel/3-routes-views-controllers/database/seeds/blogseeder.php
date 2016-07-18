<?php

use Illuminate\Database\Seeder;

class blogseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugify = new \Cocur\Slugify\Slugify;
        $faker = \Faker\Factory::create();
        
        \App\Category::truncate();
        \App\Post::truncate();
        \DB::table('posts_categories')->delete();
        
        for ($i = 0; $i < 10; $i++) {
            $model = new \App\Category;
            $model->name = 'Category '.$i;
            $model->code = 'category-'.$i;
            $model->save();
        }
        
        for ($i = 0; $i < 100; $i++) {
            $model = new \App\Post;
            $model->title = $faker->sentence();
            $model->title = $slugify->slugify($model->title);
            $model->content = $faker->paragraph(50);
            $model->save();
            
            $count = rand(1, 10);
            for ($j = 0; $j < $count; $j++) {
                \DB::table('posts_categories')->insert([
                    'post_id' => $model->id,
                    'category_id' => $j + 1,
                ]);
            }
        }
    }
}
