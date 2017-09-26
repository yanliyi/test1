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
        <img src="https://timgsa.baidu.
        com/timg?image&quality=80&size=b9999_10000
        &sec=1504003665557&di=7d03eb31a2bfd44940b210c7ea
        5724d7&imgtype=0&src=http%3A%2F%2Fimg4.duitang.com%2Fupl
        oads%2Fitem%2F201502%2F13%2F20150213133350_miyij.jpeg" alt="pic" id="img" width="1024px"/>

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
            'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1504003665557&di=7d03eb31a2bfd44940b210c7ea5724d7&imgtype=0&src=http%3A%2F%2Fimg4.duitang.com%2Fuploads%2Fitem%2F201502%2F13%2F20150213133350_miyij.jpeg',
            'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1504003665554&di=17fce7a8a4fd110eb5488928bf4e2e00&imgtype=0&src=http%3A%2F%2Fimg3.100bt.com%2Fupload%2Fttq%2F20121021%2F1350785768838.jpg',
            'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1504003665552&di=c5989ad94faf1ff5c8ddf9f1bc6e56e7&imgtype=0&src=http%3A%2F%2Ff.hiphotos.baidu.com%2Fzhidao%2Fpic%2Fitem%2Fe7cd7b899e510fb3822713cad133c895d1430cb4.jpg',
            'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1504003665546&di=0c2e72f35d3b0ad55fa87836c4898719&imgtype=0&src=http%3A%2F%2Fimg4.duitang.com%2Fuploads%2Fitem%2F201609%2F11%2F20160911203223_yi3GT.jpeg'
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