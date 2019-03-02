@extends('layouts.app')

@section('title','ログイン後インデックスページ | TABIサーチ')
@section('content')
<div class="col-md-8">
    <ul class="list-group" >
      <li class="list-group-item">
        <a href="/admin/news/change_mail/?id={{ Auth::user()->id }}">メールアドレスの変更</a>
      </li>
      <!-- <li class="list-group-item"> -->
<!--パスワード変更のリンク先がインデックスページになってしまっている-->
        <!-- <a href="/password/reset">パスワードの変更</a> -->
      <!-- </li> -->
      <li class="list-group-item">
        <a href="{{ action('AdminController@deleteConform') }}">退会</a>
      </li>
    </ul>
</div>
@endsection
