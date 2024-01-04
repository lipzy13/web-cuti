<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="node_modules/material-icons/iconfont/material-icons.css" rel="stylesheet">
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  @livewireStyles
</head>
<body>
  <div class="flex">
      @include('dashboard.pegawai.layouts.sidebar')
      @yield('container')
  </div>
  
  @livewireScripts
  <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>
</body>

</html>