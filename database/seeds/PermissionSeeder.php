<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'create-user'],
            ['name' => 'delete-user'],
            ['name' => 'update-user'],
            ['name' => 'view-user'],

            ['name' => 'view-orders'],

            ['name' => 'create-post'],

            ['name' => 'view-role'],
            ['name' => 'create-role'],
            ['name' => 'update-role'],
            ['name' => 'delete-role'],
            ['name' => 'assign-role'],

            ['name' => 'view-permission'],
            ['name' => 'create-permission'],
            ['name' => 'update-permission'],
            ['name' => 'delete-permission'],

            ['name' => 'view-category'],
            ['name' => 'create-category'],
            ['name' => 'update-category'],
            ['name' => 'delete-category'],

            ['name' => 'view-brand'],
            ['name' => 'create-brand'],
            ['name' => 'update-brand'],
            ['name' => 'delete-brand'],

            ['name' => 'view-product'],
            ['name' => 'create-product'],
            ['name' => 'update-product'],
            ['name' => 'delete-product'],

            ['name' => 'view-customer'],
            ['name' => 'create-customer'],
            ['name' => 'update-customer'],
            ['name' => 'delete-customer'],
            ['name' => 'view-customer-orders'],

            ['name' => 'view-order'],
            ['name' => 'create-order'],
            ['name' => 'update-order'],
            ['name' => 'delete-order'],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
