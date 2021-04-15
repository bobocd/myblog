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
        $user=\App\User::Create([
            'name'=>'root',
            'email'=>'twocars@teah.net',
            'password'=>bcrypt('123123')
        ]);
        //为用户创建角色
        \Spatie\Permission\Models\Role::create([
                'title'=>'站长',
                'name'=>'webmaster',
                'guard_name'=>'web'
            ]
        );
        $user->assignRole('webmaster');
    }
}
