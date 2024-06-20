@extends('layout')


@section("title","Mushroom Blog")

@section('css')
<link rel="stylesheet" href="{{ url('/css/base_layout.css') }}" >
@endsection

@section('favicon')
<link rel="icon" type="image/x-icon" href= "{{ url('/img/Logo.png')}}">  {{-- public non é necessario nell'url --}}
@endsection