<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = App\Permission::create([
        	'name' => 'read-posts',
        	'description' => 'Read posts'
        ]);

        $permission->save();

        $permission = App\Permission::create([
        	'name' => 'write-posts',
        	'description' => 'Write posts'
        ]);

        $permission->save();

        $permission = App\Permission::create([
        	'name' => 'read-comments',
        	'description' => 'Read comments'
        ]);

        $permission->save();

        $permission = App\Permission::create([
        	'name' => 'write-comments',
        	'description' => 'Write comments'
        ]);

        $permission->save();
    }
}
