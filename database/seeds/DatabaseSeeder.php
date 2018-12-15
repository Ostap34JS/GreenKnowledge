<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(App\User::class)->create();

        factory(App\Course::class)->create();

        factory(App\Lesson::class, 5)->create();


        DB::table('course_user')->insert([
            'course_id' => 1,
            'user_id' => 1
        ]);

        DB::table('lesson_user')->insert([
            [
                'lesson_id' => 1,
                'user_id' => 1
            ],
            [
                'lesson_id' => 2,
                'user_id' => 1
            ],
            [
                'lesson_id' => 3,
                'user_id' => 1
            ]
        ]);
    }
}
