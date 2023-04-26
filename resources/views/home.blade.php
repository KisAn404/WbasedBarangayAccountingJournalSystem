
  <html>
    <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data1 = google.visualization.arrayToDataTable([
            ['Category', 'Amount'],
            ['Income', 1000],
            ['Expenses', 500],
            ['Deposit', 1500],
            ['Total Transactions', 2000],
          ]);

          var options1 = {
            title: 'Dashboard',
            is3D: true,
          };

          var chart1 = new google.visualization.PieChart(document.getElementById('piechart_3d'));
          chart1.draw(data1, options1);

          var data2 = google.visualization.arrayToDataTable([
            ['Year', 'Income', 'Expenses'],
            ['2021',  1000,      400],
            ['2022',  1170,      460],
            ['2023',  660,       1120],
            ['2024',  1030,      540],
            ['2025',  1030,      540],
            ['2026',  1030,      540],
            ['2027',  1030,      540],
            ['2028',  1030,      540],
            ['2029',  1030,      540],
            ['2030',  1030,      540]
          ]);

          var options2 = {
            title: '',
            curveType: 'function',
            legend: { position: 'bottom' }
          };

          var chart2 = new google.visualization.LineChart(document.getElementById('curve_chart'));
          chart2.draw(data2, options2);
        }
      </script>

      <style>
        .content {
          background-color: black;
        }
      </style>

    </head>

    <body>
      <div id="piechart_3d" style="width: 500px; height: 500px;"></div>
      <div id="curve_chart" style="width: 500x; height: 500px"></div>
    </body>
  </html>
@endsection
