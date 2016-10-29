<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            $model = new \App\Post;
            $model->title = "Post title ".$i;
            $model->content = "Post content...";
            $model->save();
        }
    }
}
