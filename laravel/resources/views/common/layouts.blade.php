<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title-@yield('title')</title>
</head>
<link rel="stylesheet" href="{{asset('static/css/all.css')}}"/>
<!--新的css的样式-->
@section('style')

@show

<body>

<div class="loading">
    <p class="progress">0%</p>
</div>

<!--头部-->
@section('header')
    <div class="box" id="header">
        <img src="{{asset('static/image1/title_top1.png')}}" width="100%"/>
    </div>
@show
<div style="background-color:#FFFBD3; width: 1024px; text-align: center; margin: 0 auto;">
<!--图片区域-->
@yield('Pic')

<hr/>
<!--留言框区域-->
@section('messagebox')
    <div class="box" id="messagebox">
        <form method="post" action="{{url("pic/save")}}">
            {{csrf_field()}}
            <textarea class="text" name="User[message]" class="text-primary" placeholder="你可以在此输入留言。" style="width: 50%; height: 100px;"> </textarea>
            <br/>
            <label>名称:</label>
            <input type="text" class="text-primary" name="User[name]"/>
            <input type="submit" value="提交"/>
        </form>
    </div>
@show
<hr>
<!--显示留言的区域-->
@yield('message')

<!--分页信息-->
@section('pull-right')

@show
</div>
<!--尾部-->
@section('footer')
    <div class="box" id="footer">
        <img src="{{asset('static/image1/title_top1.png')}}" width="100%"/>
    </div>
@show

@section('script')
@show
</body>
</html>