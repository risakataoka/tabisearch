@extends('layouts.app')
@section('content')
<p>お名前：{{ $content['from_name'] }}</br>
メールアドレス：{{ $content['from'] }}</br>
性別：{{ $content['gender'] }}</br>
お問い合わせ種類：{{ $content['type'] }}</br>
お問い合わせ内容</br>
{{ $content['body'] }}</p>
@endsection
