<?php
namespace App\Http\Controllers;
use App\Pic;
class PicController extends Controller {

    public function search(){
        $arr_file = array();
        tree($arr_file, asset('/static/images'));
        return dd($arr_file);
    }
}