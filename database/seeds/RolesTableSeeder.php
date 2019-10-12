<?php

use  App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super Admin
        $super = new Role();
        $super->name = 'Super';
        $super->save();

        //Admin
        $admin = new Role();
        $admin->name = 'Admin';
        $admin->save();

        //Author
        $author = new Role();
        $author->name = 'Author';
        $author->save();

        //Subscriber
        $subscriber = new Role();
        $subscriber->name = 'Subscriber';
        $subscriber->save();
    }
}
