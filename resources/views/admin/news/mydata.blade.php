@extends('layouts.app')

@section('title','ログイン後インデックスページ | TABIサーチ')
@section('content')
<p><a href="/admin/news/change_mail/?id={{ Auth::user()->id }}">メールアドレスの変更</a></p>
<p><a href="#">パスワードの変更</a></p>
<p><a href="{{ action('AdminController@deleteConform') }}">退会</a><p>
@endsection
