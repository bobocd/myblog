<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateToken extends Command
{
    // 供我们调用命令
    protected $signature = 'larabbs:generate-token';
    // 命令的描述
    protected $description = '快速为用户生成 token';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    //// 最终执行的方法
    public function handle()
    {
        $userId = $this->ask('输入用户 id');

        $user = User::find($userId);

        if (!$user) {
            return $this->error('用户不存在');
        }

        // 一年以后过期
        $ttl = 365*24*60;
        $this->info(\Auth::guard('api')->setTTL($ttl)->fromUser($user));
    }
}
