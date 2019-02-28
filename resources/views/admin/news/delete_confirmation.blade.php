@extends('layouts.app')

@section('title','ログイン後インデックスページ | TABIサーチ')
@section('content')
<p>本当に退会してもよろしいですか？</p>
<a href="delete?id={{ $id }}">はい、退会します。</a>
@endsection
