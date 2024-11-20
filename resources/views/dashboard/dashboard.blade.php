@extends('layouts.header')
@section('content')
<div class="content-wrapper">
   
      {{-- <div class="row">
            <div class="col-md-4 grid-margin">
                  <div class="card mb-2">
                        <div class="card-body">
                              <p class="card-title">Available</p>
                              <div class="d-flex justify-content-between">
                                  <div class="mb-4 mt-2">
                                      <h3 class="text-primary fs-30 font-weight-medium">
                                          {{ '0' }}
                                      </h3>
                                  </div>
                                  <div class="mt-3">
                                      <a href="#" class="text-info">View all</a>
                                  </div> 
                              </div>
                        </div>
                  </div>
            </div>
            <div class="col-md-4 grid-margin">
                  <div class="card mb-2">
                        <div class="card-body">
                              <p class="card-title">Inbound</p>
                              <div class="d-flex justify-content-between">
                                  <div class="mb-4 mt-2">
                                      <h3 class="text-primary fs-30 font-weight-medium">
                                          {{ '0' }}
                                      </h3>
                                  </div>
                                  <div class="mt-3">
                                      <a href="#" class="text-info">View all</a>
                                  </div> 
                              </div>
                        </div>
                  </div>
            </div>
            <div class="col-md-4 grid-margin">
                  <div class="card mb-2">
                        <div class="card-body">
                              <p class="card-title">Outbound</p>
                              <div class="d-flex justify-content-between">
                                  <div class="mb-4 mt-2">
                                      <h3 class="text-primary fs-30 font-weight-medium">
                                          {{ '0' }}
                                      </h3>
                                  </div>
                                  <div class="mt-3">
                                      <a href="#" class="text-info">View all</a>
                                  </div> 
                              </div>
                        </div>
                  </div>
            </div>
            <div class="col-md-4 grid-margin">
                  <div class="card mb-2">
                        <div class="card-body">
                              <p class="card-title">Reserved</p>
                              <div class="d-flex justify-content-between">
                                  <div class="mb-4 mt-2">
                                      <h3 class="text-primary fs-30 font-weight-medium">
                                          {{ '0' }}
                                      </h3>
                                  </div>
                                  <div class="mt-3">
                                      <a href="#" class="text-info">View all</a>
                                  </div> 
                              </div>
                        </div>
                  </div>
            </div>
            <div class="col-md-4 grid-margin">
                  <div class="card mb-2">
                        <div class="card-body">
                              <p class="card-title">Critical Level Stock</p>
                              <div class="d-flex justify-content-between">
                                  <div class="mb-4 mt-2">
                                      <h3 class="text-primary fs-30 font-weight-medium">
                                          {{ '0' }}
                                      </h3>
                                  </div>
                                  <div class="mt-3">
                                      <a href="#" class="text-info">View all</a>
                                  </div> 
                              </div>
                        </div>
                  </div>
            </div>
            <div class="col-md-4 grid-margin">
                  <div class="card mb-2">
                        <div class="card-body">
                              <p class="card-title">Low Level Stock</p>
                              <div class="d-flex justify-content-between">
                                  <div class="mb-4 mt-2">
                                      <h3 class="text-primary fs-30 font-weight-medium">
                                          {{ '0' }}
                                      </h3>
                                  </div>
                                  <div class="mt-3">
                                      <a href="#" class="text-info">View all</a>
                                  </div> 
                              </div>
                        </div>
                  </div>
            </div>
            <div class="col-md-4 grid-margin">
                  <div class="card mb-2">
                        <div class="card-body">
                              <p class="card-title">Purchase Request</p>
                              <div class="d-flex justify-content-between">
                                  <div class="mb-4 mt-2">
                                      <h3 class="text-primary fs-30 font-weight-medium">
                                          {{ '0' }}
                                      </h3>
                                  </div>
                                  <div class="mt-3">
                                      <a href="#" class="text-info">View all</a>
                                  </div> 
                              </div>
                        </div>
                  </div>
            </div>
      </div> --}}
      <div class="row">
        <div class="col-md-3 grid-margin">
              <div class="card mb-2">
                    <div class="card-body">
                          <p class="card-title">Inventory Status</p>
                            <canvas id="dashboard_chart"></canvas>
                            <div id="dashboard_chart_legend"></div>
                    </div>
              </div>
        </div>
        <div class="col-md-6 grid-margin">
            <div class="card mb-2">
                  <div class="card-body">
                        <p class="card-title">Low Stock Materials</p>
                         <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Code</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>GUAR GUM</td>
                                        <td>821.84</td>
                                        <td>Critical Level</td>
                                        <td><button>Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>01</td>
                                        <td>GUAR GUM</td>
                                        <td>821.84</td>
                                        <td>Critical Level</td>
                                        <td><button>Details</button></td>
                                    </tr>
                                    <tr>
                                        <td>01</td>
                                        <td>GUAR GUM</td>
                                        <td>821.84</td>
                                        <td>Critical Level</td>
                                        <td><button>Details</button></td>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                  </div>
            </div>
      </div>
    </div>
</div>

{{-- <script src="{{ asset('/body_css/vendors/chart.js/Chart.min.js') }}"></script> --}}

<script>
     if ($("#dashboard_chart").length) {
      var areaData = {
        labels: ["Jan", "Feb", "Mar"],
        datasets: [{
            data: [60, 70, 70],
            backgroundColor: [
              "#4B49AC","#FFC100", "#248AFD",
            ],
            borderColor: "rgba(0,0,0,0)"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        segmentShowStroke: false,
        cutoutPercentage: 78,
        elements: {
          arc: {
              borderWidth: 4
          }
        },      
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        legendCallback: function(chart) { 
          var text = [];
          text.push('<div class="report-chart">');
            text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[0] + '"></div><p class="mb-0">In Stock</p></div>');
            text.push('<p class="mb-0">495343</p>');
            text.push('</div>');
            text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[1] + '"></div><p class="mb-0">Pending</p></div>');
            text.push('<p class="mb-0">630983</p>');
            text.push('</div>');
            text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[2] + '"></div><p class="mb-0">Low Stock</p></div>');
            text.push('<p class="mb-0">290831</p>');
            text.push('</div>');
          text.push('</div>');
          return text.join("");
        },
      }
      var southAmericaChartPlugins = {
        beforeDraw: function(chart) {
          var width = chart.chart.width,
              height = chart.chart.height,
              ctx = chart.chart.ctx;
      
          ctx.restore();
          var fontSize = 3.125;
          ctx.font = "600 " + fontSize + "em sans-serif";
          ctx.textBaseline = "middle";
          ctx.fillStyle = "#000";
      
          var text = "76",
              textX = Math.round((width - ctx.measureText(text).width) / 2),
              textY = height / 2;
      
          ctx.fillText(text, textX, textY);
          ctx.save();
        }
      }
      var southAmericaChartCanvas = $("#dashboard_chart").get(0).getContext("2d");
      var southAmericaChart = new Chart(southAmericaChartCanvas, {
        type: 'doughnut',
        data: areaData,
        options: areaOptions,
        plugins: southAmericaChartPlugins
      });
      document.getElementById('dashboard_chart_legend').innerHTML = southAmericaChart.generateLegend();
    }
</script>
@endsection