<?php

namespace App\Http\Controllers;

use App\Jobs\trade;
use Illuminate\Http\Request;

class tradeController extends Controller
{
    public function trade(){

        $data = [
            'tid'=>date('Y-m-d H:i:s')
        ];
        $job = new trade();
        $job->dispatch($job)->onQueue('trade');
    }
}
