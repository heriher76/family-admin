<?php
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->name = "Heri Hermawan";
        $user->email = "herhermawan007@gmail.com";
        $user->password = Hash::make("123456");
        $user->status = "Ibu";
        $user->location = "lorem:asdifasdhflkdhjsf";
        $user->api_token = str_random(100);
        $user->save();
    }
}