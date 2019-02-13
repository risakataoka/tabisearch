<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
</head>

<body>
  <div class="header">
    <div class="logo-area">
      <div class="logo">TABIサーチ</div>
    </div>
    <div class="button">@yield('button')</div>
    <div class="icon">@yield('icon')</div>
  </div>
  <div class="content">@yield('content')</div>
  <div class="footer">
    <div class="copyright">copyright 2019 kataoka.</div>
    <div class="contact"><a href="#">お問い合わせ</a></div>
  </div>
</body>
</html>
