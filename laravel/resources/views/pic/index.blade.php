@extends('common.layouts')



@section('style')
    <style>
        .box{text-align: center;}
        li{display: inline;}
        .pull-right{text-align: center;}
        html,body{
            height:100%;
        }
        a{text-decoration:none;}
        .box{text-align:center;}
        .btn{display:inline-block;
            height:30px;
            line-height:30px;
            border:1px solid #ccc;
            background-color:#fff;
            padding:0 10px;
            margin-right:50px;
            color:#333;
        }
        .btn:hover{background-color:#eee;}
        .loading{
            position:fixed;
            top:0; left:0;
            width:100%;height:100%;
            background-color:#eee;
            text-align:center;
            font-size:40px;
        }
        .progress{
            margin-top:300px;
        }
    </style>
@stop

@section('Pic')
    <div class="box">
        <img src="{{asset("/static/images/1.jpg")}}" alt="pic" id="img" width="1024px"/>

        <p>
            <a herf="javascript:;" class="btn" data-control="prev" >上一张</a>
            <a herf="javascript:;" class="btn" data-control="next">下一张</a>
        </p>
    </div>
@stop

@section('message')
    <div class="box" id="message" style="text-align:center; margin: 0 auto;">
            @foreach($messages as $message)
            <ul>
                <li style="text-align: left;">名称：{{$message->name}}</li>
                <li style="margin: 10% ">留言：{{$message->message}}</li>
                <li style="text-align: right; margin: 0 auto;">发表日期:{{date("y-m-d",$message->created_at)}}</li>
            </ul>
            <hr/>
            @endforeach
    </div>
@stop

@section('pull-right')
    <div class="pull-right">
       <?php echo $messages->render(); ?>
    </div>
@stop

@section("script")
    <script src="{{asset('/static/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('/static/js/preload.js')}}"></script>
    <script>
        var imgs=[
            '{{asset("/static/images/1.jpg")}}',
            '{{asset("/static/images/2.jpg")}}'
        ];

        var index=0,
                len=imgs.length,				//len=4
                $progress=$('.progress');


        $.preload(imgs,{
            each:function(count){
                $progress.html(Math.round((count+1)/len*100)+'%');
            },
            all:function(){
                $('.loading').hide();
                document.title='1/'+len;
            }
        });

        $('.btn').on('click',function(){
            if('prev'===$(this).data('control')){//上一张
                index=Math.max(0,--index);
            }
            else{//下一张
                index=Math.min(len-1,++index);
            }
            document.title=(index+1)+'/'+len;
            $('#img').attr('src',imgs[index]);
        });
    </script>
@stop