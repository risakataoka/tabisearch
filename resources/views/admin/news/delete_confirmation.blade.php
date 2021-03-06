@extends('layouts.app')

@section('title','退会確認 | TABIサーチ')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">退会確認</div>
                <div class="card-body">
                  <p>本当に退会してもよろしいですか？</p>
                  <a href="delete?id={{ $id }}">はい、退会します。</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
