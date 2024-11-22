@extends('layouts.parent')
@section('content')

@include('components.news.header')
{{-- last news --}}
@include('components.news.news',[
'card'=>'col-lg-4',
'color'=>'white',
'title'=>'last news',
'news'=>$resent
])




{{--local news --}}
@include('components.news.news',[
'card'=>'col-lg-4',
'color'=>'gray',
'title'=>'local news',
'news'=> $local,
])
{{-- sport news --}}
@include('components.news.news',[
'card'=>'col-lg-3',
'color'=>'white',
'title'=>'sport news',
'news'=> $sport ,
])

{{--local news --}}
@include('components.news.news',[
'card'=>'col-lg-4',
'color'=>'gray',
'title'=>'international news',
'news'=>$international,
])
{{--
(done) make a one blade file names news
send an array have elements (picture, title, decription, path to view all the post)
send a type of news example [reset news , local news, etc...]
send a path to page that have all posts in this section
(done) send a section color [gray-sec] or leave it empty
--}}



@include('components.news.trend')
@endsection
