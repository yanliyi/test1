<?php
namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller{
    public function index(){

        $messages=Message::paginate(15);
        return view("pic.index",['messages'=>$messages,]);
    }
    public function save(Request $request){
        $data=$request->input('User');
        var_dump($data);
        $message=new Message();
        $message->name=$data['name'];
        $message->message=$data['message'];

        if($message->save()){
            return redirect('pic/index');
        }
        else{
            echo "<script>aler('未保存成功。')</script>";
            return redirect('pic/index');
        }
    }
}
