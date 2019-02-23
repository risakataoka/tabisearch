<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="header">
    <p class="logo">TABIサーチ</p>
    <nav>
      <ul>
        <li>@yield('button1')</li>
        <li>@yield('button2')</li>
        <li>@yield('icon')</li>
      </ul>
    </nav>
  </div>
  <div class="content">@yield('content')</div>
  <div class="footer">
    <div class="copyright">copyright 2019 kataoka.</div>
    <div class="contact"><a href="/contact">お問い合わせ</a></div>
  </div>
</body>
</html>
