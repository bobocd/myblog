<?php

namespace Modules\Admin\Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RolerSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
//        Role::create(['name'=>'webmaster','title'=>'超级管理员','guard_name'=>'web']);
//        //为用户创建角色
//        $user=User::find(1);
//        $user->assignRole('webmaster');
//        // $this->call("OthersTableSeeder");
    }
}
