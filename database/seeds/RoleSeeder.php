<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name'      => 'admin',
          'email'     => 'admin@gmail.com',
          'password'  => bcrypt('secret'),
          'thumbnail' => 'dummy.png',
        ]);

        Role::create([
          'name'        => 'admin',
          'permissions' => json_encode(
              [
                'create-user'    => true,
                'delete-user'    => true,
                'update-user'    => true,
                'view-user'      => true,
                'view-orders'    => true,
                'view-products'  => true,
                'view-category'  => true,
                'create-product' => true,

                'create-post' => true,

                'view-role'   => true,
                'create-role' => true,
                'update-role' => true,
                'delete-role' => true,
                'assign-role' => true,
              ]
          ),
        ]);
    }
}
