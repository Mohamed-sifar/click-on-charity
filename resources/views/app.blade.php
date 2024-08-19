<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
  @if (request()->is('admin') || request()->is('admin/*'))
  @include('partials.admin.adminhead')
  @elseif (request()->is('register') || request()->is('login*'))
  @include('partials.loginregister.loginregisterhead')
  @else

  @include('partials.websitehead')
  @endif
  @vite('resources/js/app.js')
  @inertiaHead
</head>

<body>
  @inertia
  @if (request()->is('admin') || request()->is('admin/*'))
  @include('partials.admin.adminscripts')
  @elseif (request()->is('register') || request()->is('login*'))
  @include('partials.loginregister.loginregisterscripts')
  @else

  @include('partials.websitescripts')
  @endif
</body>

</html>