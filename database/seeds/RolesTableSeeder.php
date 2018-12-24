<?php

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
        $read_posts = App\Permission::find(1);
        $write_posts = App\Permission::find(2);
        $read_comments = App\Permission::find(3);
        $write_comments = App\Permission::find(4);



        $role = App\Role::create([
        	'name' => 'Admin',
        	'description' => 'Administration role'
        ]);

        $role->permissions()->attach([$read_posts->id, $write_posts->id, $read_comments->id, $write_comments->id]);

        $role = App\Role::create([
        	'name' => 'Author',
        	'description' => 'Author role'
        ]);

        $role->permissions()->attach([$read_posts->id, $write_posts->id, $read_comments->id, $write_comments->id]);

        $role = App\Role::create([
        	'name' => 'User',
        	'description' => 'User role'
        ]);

        $role->permissions()->attach([$read_posts->id, $read_comments->id]);
    }
}
