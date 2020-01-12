<?php

use App\User;
use App\Admin;
use App\Article;
use Illuminate\Database\Seeder;

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
        factory(Admin::class)->create([
            'email' => 'admin@admin.com',
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'mobile' => '18888888888'
        ]);

        factory(User::class, 12)->create();
        factory(Article::class, 22)->create();
    }
}
