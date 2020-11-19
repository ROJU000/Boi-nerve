<div class="border-0 mb-4 mt-5 px-md-5 jumbotron" style="background-image:url(assets/img/ban12E.jpg);background-repeat: no-repeat;background-size: cover;background-position: center center;">
    <div class="position-relative">
        <div class="row align-items-center justify-content-between">
            <div class="col position-relative">
                <h2 class="text-white">Welcome back, Here's your GEEP dashboard!</h2>
                <p class="text-white">You can view Reports, Charts to help gain better insights on Geep. </p>
                <a class="btn btn-teal" href="#sector1">Get started<i class="ml-1" data-feather="arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-blue h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="small font-weight-bold text-blue mb-1">Total Amount Collected</div>
                        <div class="h5" id="tac">{{ $cards[0] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-purple h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="small font-weight-bold text-purple mb-1">Total Amount Due</div>
                        <div class="h5" id="tad">{{ $cards[1] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-green h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="small font-weight-bold text-green mb-1">Total Amount in Default </div>
                    <div class="h5" id="taid"> {{ $cards[2] }}</div>
                    </div>
                    {{-- <div class="ml-2"><i class="fas fa-mouse-pointer fa-2x text-gray-200"></i></div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-yellow h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="small font-weight-bold text-yellow mb-1">Total Non performing Loans</div>
                        <div class="h5" id="tnpl">{{ $cards[3] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-xl-4 mb-4">
        <div class="card mb-4">
            <div class="card-header">Total Collections per Repayment Channel</div>
            <div class="card-body">
                <div class="chart-area"><canvas id="pieChart" width="100%" height="30"></canvas></div>
            </div>
            <div class="card-footer small text"><small>Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</small></div>
        </div>
        <div class="card bg-success o-visible mb-4">
            <div class="card-body">
                <h4 class="text-white">Report Summary</h4>
                <p class="text-white-50">This gives an overall summary of the metrics in the GEEP programme. Click on the respective legends to see more interaction with the Charts</p>
                <img class="float-left" src1="assets/img/drawkit/color/drawkit-developer-woman-flush.svg" style="width: 8rem; margin-left: -2.5rem; margin-bottom: -5.5rem;" />
            </div>
            <div class="card-footer bg-transparent pt-0 border-0 text-right">
                </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Reports</div>
            <div class="list-group list-group-flush small">
                <a class="list-group-item list-group-item-action border-top" href="http://196.200.119.205:8080/pentaho/api/repos/%3Apublic%3Aboi_nerve%3Aboi_nerve_mm.prpt/viewer" target="_blank"><i class="fas fa-dollar-sign fa-tag text-green mr-2" ></i>Marketmoni Collections Reports</a>
                <a class="list-group-item list-group-item-action" href="http://196.200.119.205:8080/pentaho/api/repos/%3Apublic%3Aboi_nerve%3Aboi_nerve_tm.prpt/viewer" target="_blank"><i class="fas fa-tag fa-fw text-green mr-2"></i>Tradermoni Collections Report</a>
               
            </div>
            <div class="card-footer">
                <a class="text-xs d-flex align-items-center justify-content-between" href="#!">View More Reports<i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
        
    </div>
    <div class="col-lg-7 col-xl-8 mb-4">
        <div class="card mb-4">
            <div class="card-header">Total Collections per Product</div>
            <div class="card-body">
                <div class="chart-area"><canvas id="tcp" width="100%" height="30"></canvas></div>
            </div>
            <div class="card-footer small text"><small>Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</small></div>
        </div>
        <div class="card">
            <div class="card-header">Top 5  Perfoming States</div>
            <div class="card-body" >
                <div class="chart-area"><canvas id="myBarChart"></canvas></div>
            </div>
            <div class= "card-footer small text"><small>Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</small></div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>


<script>

var ctx = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctx, {
    type: "pie",
    data: {
        labels:["PayDirect", "Onecard"],
        datasets: [{
            data: [{{ $piecharts['paydirect'] }},{{ $piecharts['onecard'] }}],
            backgroundColor: [
                "rgba(0, 97, 242, 1)",
                "rgba(0, 172, 105, 1)",
                "rgba(88, 0, 232, 1)"
            ],
            hoverBackgroundColor: [
                "rgba(0, 97, 242, 0.9)",
                "rgba(0, 172, 105, 0.9)",
                "rgba(88, 0, 232, 0.9)"
            ],
            hoverBorderColor: "rgba(234, 236, 244, 1)"
        }]
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80
    }
    });
        /// bar chart for total collection per product ///

    function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + "").replace(",", "").replace(" ", "");
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
        dec = typeof dec_point === "undefined" ? "." : dec_point,
        s = "",
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return "" + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || "").length < prec) {
        s[1] = s[1] || "";
        s[1] += new Array(prec - s[1].length + 1).join("0");
    }
    return s.join(dec);
}

// Bar Chart === Total Collections per Product
var ctx1 = document.getElementById("tcp");
var myBarChart = new Chart(ctx1, {
    type: "bar",
    data: {
        labels: ["{{ $barcharts['annn'] }}","{{ $barcharts['bnnn'] }}","{{ $barcharts['cnnn'] }}"],
        datasets: [{
            label: "Total Collections ",
            backgroundColor: [ "rgba(17, 82, 56, 1)", "rgba(255, 136, 0, 1)", "rgba(7, 224, 141, 1)"],
            hoverBackgroundColor:  [ "rgba(17, 82, 56, 0.8)", "rgba(255, 136, 0, 0.8)", "rgba(7, 224, 141, 0.8)"],
            borderColor: "rgba(234, 236, 244, 1)",
            data:  [{{ $barcharts['ann'] }},{{ $barcharts['bnn'] }},{{ $barcharts['cnn'] }}],
        }]
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                // time: {
                //     unit: "month"
                // },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 6
                },
                // maxBarThickness: 25
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    // max: 15000,
                    maxTicksLimit: 7,
                    padding: 5,

                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                        return "₦" + number_format(value);
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }]
        },
        legend: {
            display: false
        },
        tooltips: {
            titleMarginBottom: 10,
            titleFontColor: "#6e707e",
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel =
                        chart.datasets[tooltipItem.datasetIndex].label || "";
                    return datasetLabel + ": ₦" + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});

/// bar chart displaying top 5 states ///

var ctx2 = document.getElementById("myBarChart");
var t5ps = new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: ["{{ $barchart1['ad'] }}","{{ $barchart1['bd'] }}","{{ $barchart1['cd'] }}","{{ $barchart1['dd'] }}","{{ $barchart1['ed'] }}"],
      datasets: [
        {
          label: "Marketmoni",
          backgroundColor: "rgba(17, 82, 56, 1)",
          data: [{{ $barchart1['ab'] }},{{ $barchart1['bb'] }},{{ $barchart1['cb'] }},{{ $barchart1['db'] }},{{ $barchart1['eb'] }}],
        },
        {
          label: "Farmermoni",
          backgroundColor: "rgba(255, 136, 0, 1)",
          data:[{{ $barchart1['a'] }},{{ $barchart1['b'] }},{{ $barchart1['c'] }},{{ $barchart1['d'] }},{{ $barchart1['e'] }}],
        },
        {
          label: "Tradermoni",
          backgroundColor: "rgba(7, 224, 141, 1)",
          data: [{{ $barchart1['ac'] }},{{ $barchart1['bc'] }},{{ $barchart1['cc'] }},{{ $barchart1['dc'] }},{{ $barchart1['ec'] }}],
        }
      ]
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
      legend: { display: true },
      scales: {
                xAxes: [{
                    stacked: true,
                    gridLines: {
                    display: false,
                    drawBorder: false
                }
                }],
                yAxes: [{
                    stacked: true,
                    ticks: {
                        maxTicksLimit: 7,
                        padding: 5,
                        callback: function(value, index, values) {
                        return "₦" + number_format(value);
                    }
                    }
                }]
                    },
      tooltips: {
            xPadding: 15,
            yPadding: 15,
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel =
                        chart.datasets[tooltipItem.datasetIndex].label || "";
                    return datasetLabel + ": ₦" + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});


</script>

