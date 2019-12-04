@extends('theme.back.layout.admin')

@section('title','Unco.Yendo')

@section('head')


@endsection

@section('content')
    <publicar :usuario="{{ json_encode(auth()->user()) }}">

    </publicar>


@endsection