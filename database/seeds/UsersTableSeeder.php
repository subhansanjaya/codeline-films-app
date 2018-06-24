<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 3)->create()->each(function ($u) {
            $u->save();
            factory(App\Comment::class, 1)->create(['user_id'=>$u->id]);
        });
    }
}
