@extends('layouts.auth')

@section('content')
<div class="main-box col-12">


    <div id="class-123" class="class" onclick='goToClass("123")'>
        <div class="class-name"> </div>
        <div class="class-info">
            <div class="class-id"> #123 </div>
            <div class="class-supervisor"> Prof. Cosmin Varlan <br> Prof. Buraga Sabin </div>
        </div>
    </div>


    <div id="class-321" class="class" onclick='goToClass("321")'>
        <div class="class-name"> SGBD </div>
        <div class="class-info">
            <div class="class-id"> #321 </div>
            <div class="class-supervisor"> Prof. Cosmin Varlan</div>
        </div>
    </div>

</div>
@endsection