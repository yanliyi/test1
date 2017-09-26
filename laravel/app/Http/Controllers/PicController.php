<?php
namespace App\Http\Controllers;
use App\Pic;
class PicController extends Controller {
    public function index(){
        $images=Pic::get();
        return view('pic.index',['images'=>$images]);
    }
}