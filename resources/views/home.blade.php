@extends('layouts.app')
@section('css')
<style>
    html, body {
        background: radial-gradient(#fff, #c5ff99);
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-centerr {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }
    .text{
        font-size: 40px;
        text-align: center;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    .btn-begin{
        position: absolute;
        margin-top: 300px;
    }
    .image{
        position: absolute;
        margin-top: -400px;
    }
    .btn{
    display: inline-block;
    background: #3bff55;
    color: #fff;
    font-size: 20px;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: background 0.5s;
}
.btn:hover{
    background: #425634;
    color: #fff;
}
</style>
@endsection
@section('content')

<div class="d-flex justify-content-center full-height flex-centerr">
    <div class="image">
        <img src="{{asset('image/logo.png')}}" width="200px">
    </div>
    <div class="title m-b-md">
            جمعية القدس لترقية
             الانشطة الشبانية
             <div class="text">
                ترحب بضيوفها الكرام
                <br>
                
            </div>
    </div>
    
    <div class="btn-begin">
        <a href="{{route('teams.index')}}" class="btn fw-bold">بدأ القرعة</a>
    </div>
    
</div>
@endsection