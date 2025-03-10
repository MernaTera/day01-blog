<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function someAction(){
        $localname='Ahmed';
        $localname2='Ali';
        dd('Hello from controller');
        return view('test',['name'=>$localname,'name2'=>$localname2]);
    }
}
