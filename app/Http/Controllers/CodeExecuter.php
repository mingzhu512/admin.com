<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeExecuter extends Controller
{
    public function php(Request $request){
        $code = $request->code;
        $dir = public_path() . '/codeExecutes/php/';
        $files = glob($dir.'*'); // get all file names
        foreach($files as $f){
            unlink($f);
        }
        $file = $dir.md5($code . rand(10000000,10000000) . time()) . '.php';
        file_put_contents($file , $code);
        include_once $file;
        if(is_file($file)){
            unlink($file);
        }

        // $responses = [];
        // foreach($code as $c){
        //     eval($c);
        //     echo "__NEW_LINE__";
        // }
        // dd($code , $responses);
        // return response()->json($responses , 200);
        // $stringCode = implode($code);
        // return eval($stringCode); 
        // dd($request->all());
    }
}
