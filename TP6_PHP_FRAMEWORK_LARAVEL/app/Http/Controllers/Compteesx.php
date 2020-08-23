<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Compteesx extends Controller
{
    public function index(){
        // $data = DB::select('select * from users where active = ?', [1]);
        $data = 'LE TESTEUR';
        return view('test', array('data' => $data));
    }
}
