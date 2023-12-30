<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="node_modules/material-icons/iconfont/material-icons.css" rel="stylesheet">
  @vite('resources/css/app.css')
</head>
<body>
  <div class="flex">
      @include('dashboard.pegawai.layouts.sidebar')
      @yield('container')
  </div>

  <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var ctx = document.getElementById('doughnutChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Terpakai', 'Tersisa'],
            datasets: [{
                data: [3, 12-3],
                backgroundColor: [
                    '#57BEB5',
                    '#3070F5',
                ],
                borderColor: [
                    '#57BEB5',
                    '#3070F5',
                ],
                borderWidth: 1,
            }]
        },
    });
</script>
</body>

</html>