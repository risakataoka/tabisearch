@extends('layouts.app')

@section('title','ログイン後インデックスページ | TABIサーチ')
@section('content')
<p><a href="#">会員情報の修正</a></p>
<p><a href="{{ action('AdminController@deleteConform') }}">退会</a><p>
@endsection
