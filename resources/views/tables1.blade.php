<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  {{-- <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script> --}}
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
  <!-- DevExtreme theme -->
  {{-- <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.light.css"> --}}
  <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.common.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.light.css" />

  <!-- DevExtreme library -->
  <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/21.1.5/js/dx.all.js"></script>

  <style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
    #pie,#pie1,#pie2 {
      height: auto;
    }
  </style>
</head>
<body>
  <?php


  $tables1 = DB::select("SELECT b.namapaket, COUNT(a.TotalLic) as jumlah FROM  dbo.MsPerusahaan a , dbo.MsAdmDaftarHarga b WHERE a.TotalLic = b.Id GROUP BY b.NamaPaket");
  
  foreach($tables1 as $table1)
  {
    
      $createdate1a[] = $table1->namapaket;
      $createdate1b[] = $table1->jumlah;
      $createdate1c[] = array('namapaket'=>$table1->namapaket, 'jumlah'=>$table1->jumlah);

  };

    $namapaket = json_encode($createdate1a);
    $jmlperusahaan = json_encode($createdate1b);
    $assocarray = json_encode($createdate1c);
    // echo $assocarray;


  $tables2 = DB::select("SELECT b.namapaket, COUNT(c.Id) as jumlahkaryawan FROM  dbo.MsPerusahaan a , dbo.MsAdmDaftarHarga b , dbo.MsPerusahaanKaryawan c WHERE a.TotalLic = b.Id and a.Id = c.PerusahaanId and c.aktif=1 GROUP BY b.NamaPaket");
  
  foreach($tables2 as $table2)
  {
    
      $createdate2a[] = $table2->namapaket;
      $createdate2b[] = $table2->jumlahkaryawan;
      $createdate2c[] = array('namapaket'=>$table2->namapaket, 'jumlahkaryawan'=>$table2->jumlahkaryawan);

  };

    $namapaket2 = json_encode($createdate2a);
    $jmlkaryawan = json_encode($createdate2b);
    $assocarray2 = json_encode($createdate2c);

  

  $tables3 = DB::select("SELECT isproject, count(isproject) as jumlahTugas FROM dbo.TransKumpulanTugasKaryawanHD where IsDeleted=0 group by IsProject");
  foreach($tables3 as $table3)
  {
    
      $createdate3a[] = $table3->isproject;
      $createdate3b[] = $table3->jumlahTugas;

      if($table3->isproject == "0")
      {
        $createdate3c[] = array('jenis'=>"Non-Project", 'jumlahtugas'=>$table3->jumlahTugas);
      } else {
        $createdate3c[] = array('jenis'=>"Project", 'jumlahtugas'=>$table3->jumlahTugas);

      }

  };

  for($i=0;$i<count($createdate3a);$i++)
  {
    if($createdate3a[$i] == "0")
    {
      $createdate3a[$i] = "Tugas Non-Proyek";
    } else {
      $createdate3a[$i] = "Tugas Proyek";
    }
  }

  $namapaket3 = json_encode($createdate3a);
  $jmltugas = json_encode($createdate3b);
  $assocarray3 = json_encode($createdate3c);


  ?>
  {{-- {{ $resultables }}
  {{ $tgl }}
  {{ $value }} --}}


  {{-- </table> --}}
  <div>
    <div class="demo-container" style="width: 33%;float:left;">
      {{-- <h3 style="text-align: center">JUMLAH PERUSAHAAN BERDASARKAN JENIS PAKET</h3>
      <div id="chartdiv"></div> --}}
      <div id="pie"></div>
    </div>
    <div class="demo-container" style="width: 33%;float:left;">
      {{-- <h3 style="text-align: center">JUMLAH KARYAWAN DALAM PERUSAHAAN BERDASARKAN JENIS PAKET</h3>
      <canvas id="inicanvas1"></canvas> --}}
      <div id="pie1"></div>
    </div>
  </div>
  <div class="demo-container" style="width: 33%;float:left;">
    {{-- <h3 style="text-align: center">JUMLAH TUGAS PROYEK DAN NON-PROYEK</h3>
    <canvas id="inicanvas2"></canvas> --}}
    <div id="pie2"></div>
  </div>
    <div class="demo-container" style="width:45%;float:left;padding: 0 20px;">
      <div id="chart-demo">
          <div id="chart"></div>  
        </div>
      </div>
    </div>
    <div class="demo-container" style="width:45%;float:left; padding: 0 20px;">
      <div id="chart-demo">
          <div id="chart1"></div>  
        </div>
      </div>
    </div>
  

  
  {{-- <div class="demo-container">
    <div id="pie"></div>
  </div> --}}

  {{-- <script>
    $(function(){
      var chart = $("#chart").dxChart({
          palette: "blue",
          dataSource: <?php echo $resultables; ?>,
          commonSeriesSettings: {
              type: "spline",
              argumentField: "tgl",
              label: {
                  visible: true,
                  format: {
                      type: "fixedPoint",
                      precision: 0
                  }
              }
          },
          commonAxisSettings: {
              grid: {
                  visible: true
              }
          },
          margin: {
              bottom: 20
          },
          series: [
              { valueField: "value", name: "jumlah" },
          ],
          tooltip:{
              enabled: false
          },
          legend: {
              visible: false,
              verticalAlignment: "top",
              horizontalAlignment: "right"
          },
          "export": {
              enabled: false
          },
          argumentAxis: {
              label:{
                  format: {
                      type: "decimal"
                  }
              },
              allowDecimals: false,
              axisDivisionFactor: 60
          },
          title: "Jumlah Perusahaan (Juli)"
      }).dxChart("instance");
    });
  </script>

<script>
  $(function(){
    var chart = $("#chart1").dxChart({
        palette: "blue",
        dataSource: <?php echo $resultables1; ?>,
        commonSeriesSettings: {
            type: "spline",
            argumentField: "tgl",
            label: {
                visible: true,
                format: {
                    type: "fixedPoint",
                    precision: 0
                }
            }
        },
        commonAxisSettings: {
            grid: {
                visible: true
            }
        },
        margin: {
            bottom: 20
        },
        series: [
            { valueField: "value", name: "jumlah" },
        ],
        tooltip:{
            enabled: false
        },
        legend: {
            visible: false,
            verticalAlignment: "top",
            horizontalAlignment: "right"
        },
        "export": {
            enabled: false
        },
        argumentAxis: {
            label:{
                format: {
                    type: "decimal"
                }
            },
            allowDecimals: false,
            axisDivisionFactor: 60
        },
        title: "Jumlah Perusahaan (Agustus)"
    }).dxChart("instance");
  });
</script> --}}

  <script>
    $(function(){
      $("#pie").dxPieChart({
          palette: "bright",
          startAngle: 60,
          dataSource: <?php echo $assocarray; ?>,
          title: "JUMLAH PERUSAHAAN BERDASARKAN JENIS PAKET",
          legend: {
              visible: false,
              horizontalAlignment: "center",
              verticalAlignment: "bottom"
          },
          "export": {
              enabled: false
          },
          series: [{
              argumentField: "namapaket",
              valueField: "jumlah",
              label: {
                  visible: true,
                  connector: {
                      visible: true,
                      width: 0.5
                  },
                  format: "fixedPoint",
                  customizeText: function (point) {
                      return point.argumentText + ": " + point.valueText;
                  }
              },
              // smallValuesGrouping: {
              //     mode: "smallValueThreshold",
              //     threshold: 4.5
              // }
          }]
      });
    });

    $(function(){
      $("#pie1").dxPieChart({
        startAngle: 125,
        palette: "bright",
          dataSource: <?php echo $assocarray2; ?>,
          title: "JUMLAH KARYAWAN BERDASARKAN JENIS PAKET",
          legend: {
              visible: false,
              horizontalAlignment: "center",
              verticalAlignment: "bottom"
          },
          "export": {
              enabled: false
          },
          series: [{
              argumentField: "namapaket",
              valueField: "jumlahkaryawan",
              label: {
                  visible: true,
                  connector: {
                      visible: true,
                      width: 0.5
                  },
                  format: "fixedPoint",
                  customizeText: function (point) {
                      return point.argumentText + ": " + point.valueText;
                  }
              },
              // smallValuesGrouping: {
              //     mode: "smallValueThreshold",
              //     threshold: 4.5
              // }
          }]
      });
    });

    $(function(){
      $("#pie2").dxPieChart({
        startAngle: 45,
        palette: "bright",
          dataSource: <?php echo $assocarray3; ?>,
          title: "JUMLAH TUGAS BERDASARKAN PAKET",
          legend: {
              visible: false,
              horizontalAlignment: "center",
              verticalAlignment: "bottom"
          },
          "export": {
              enabled: false
          },
          series: [{
              argumentField: "jenis",
              valueField: "jumlahtugas",
              label: {
                  visible: true,
                  connector: {
                      visible: true,
                      width: 0.5
                  },
                  format: "fixedPoint",
                  customizeText: function (point) {
                      return point.argumentText + ": " + point.valueText;
                  }
              },
              // smallValuesGrouping: {
              //     mode: "smallValueThreshold",
              //     threshold: 4.5
              // }
          }]
      });
    });
  </script>

  <script>
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.PieChart);

    // Add data
    chart.data = <?php echo $assocarray3; ?>;

    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "jumlah";
    pieSeries.dataFields.category = "namapaket";
    pieSeries.slices.template.stroke = am4core.color("#fff");
    pieSeries.slices.template.strokeOpacity = 1;

    // This creates initial animation
    pieSeries.hiddenState.properties.opacity = 1;
    pieSeries.hiddenState.properties.endAngle = -90;
    pieSeries.hiddenState.properties.startAngle = -90;

    chart.hiddenState.properties.radius = am4core.percent(0);
  </script>
  
  <script>
 
    var ctx = document.getElementById("inicanvas").getContext("2d");
    var ctx1 = document.getElementById("inicanvas1").getContext("2d");
    var ctx2 = document.getElementById("inicanvas2").getContext("2d");


    // tampilan chart
    var piechart = new Chart(ctx,{type: 'pie',
      data : {
        labels: <?php echo $namapaket;?>,
        datasets: [{
          // Jumlah Value yang ditampilkan
          data:<?php echo $jmlperusahaan;?>,

          backgroundColor:[
                'rgba(24, 220, 110, 0.5)',
                'rgba(111, 80, 10, 0.5)',
                'rgba(11, 120, 170, 0.5)',
                'rgba(55, 20, 50, 0.5)',
                'rgba(99, 230, 90, 0.5)'
                ]
        }],
      }
    });

    // tampilan chart
    var piechart1 = new Chart(ctx1,{type: 'pie',
      data : {
        labels: <?php echo $namapaket2;?>,
        datasets: [{
          // Jumlah Value yang ditampilkan
          data:<?php echo $jmlkaryawan;?>,

          backgroundColor:[
                'rgba(24, 220, 110, 0.5)',
                'rgba(111, 80, 10, 0.5)',
                'rgba(11, 120, 170, 0.5)',
                'rgba(55, 20, 50, 0.5)',
                'rgba(99, 230, 90, 0.5)'
                ]
        }],
      }
    });

    // tampilan chart
    var piechart2 = new Chart(ctx2,{type: 'pie',
      data : {
        labels: <?php echo $namapaket3;?>,
        datasets: [{
          // Jumlah Value yang ditampilkan
          data: <?php echo $jmltugas;?>,

          backgroundColor:[
                'rgba(24, 220, 110, 0.5)',
                'rgba(111, 80, 10, 0.5)'
                ]
        }],
      }
    });
  </script>
</body>

</html>
