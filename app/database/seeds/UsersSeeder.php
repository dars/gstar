<?php
class UsersSeeder extends Seeder
{
    public function run()
    {
        $user = array();
        $date = new DateTime;
        $user[] = array(
            'username'    => 'admin@djstudio.biz',
            'password' => Hash::make('password'),
            'status' => true,
            'created_at' => $date->modify('-1 day +1 hour'),
            'updated_at' => $date->modify('-1 day +1 hour'),
        );
        $user[] = array(
            'username'    => 'user1@djstudio.biz',
            'password' => Hash::make('password1'),
            'status' => true,
            'created_at' => $date->modify('-1 day +1 hour'),
            'updated_at' => $date->modify('-1 day +1 hour'),
        );
        $user[] = array(
            'username'    => 'user2@djstudio.biz',
            'password' => Hash::make('password2'),
            'status' => true,
            'created_at' => $date->modify('-1 day +1 hour'),
            'updated_at' => $date->modify('-1 day +1 hour'),
        );


        // Delete all the posts comments
        DB::table('users')->truncate();

        // Insert the posts comments
        User::insert($user);
    }
}
