<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from themes.startbootstrap.com/sb-admin-pro/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2020 20:23:02 GMT -->
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Dashboard - BOI Nerve</title>
        <link href="{{ asset('css/styles.css') }}"rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
        
    </head>
      
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
            <a class="navbar-brand d-none d-sm-block" href="#">BOI Nerve</a><button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
            <ul class="navbar-nav align-items-center ml-auto">               
                <li class="nav-item dropdown no-caret mr-3 dropdown-user">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"/></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">Valerie Luna</div>
                                <div class="dropdown-user-details-email">vluna@aol.com</div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#!"
                            ><div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Account</a
                        ><a class="dropdown-item" href="#!"
                            ><div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout</a
                        >
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <div class="sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="#" ><div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dashboards
                                </a>
                            <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                        </div>
                    </div>
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content"></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main >
                    <div class="container-fluid mt-5">
                        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                            <div class="mr-4 mb-3 mb-sm-0">
                                <h1 class="mb-0">Dashboard</h1>
                                <div class="small"><span class="font-weight-500 text-success"><?= date("l", time()); ?></span> &#xB7; <?= date("F d,Y", time()); ?> &#xB7; <?= date("H:i T", time()); ?></div>
                            </div>
                            <form method="POST">
                           {{csrf_field()}}
                           
                            <div class="form-group">
                              <label for="sel1">Select Product</label>
                              <select class="form-control" id="sel1"  name="users" onload="showUser(1)">
                                {{-- <option value="" ></option> --}}
                                <option disabled>──────────</option>
                                <option value="1" selected>GEEP</option>
                                <option value="2">Tradermoni</option>
                                <option value="3">Marketmoni</option>
                                <option value="4">Farmermoni</option>
                              </select>
                            </div>
                            </form>
                        </div>
                        <center><img src="{{ asset('assets/img/275.gif') }}" id="loader" style="display:none;"></center>
                        <div id="main">
                        <div class="border-0 mb-4 mt-5 px-md-5 jumbotron" style="background-image:url(assets/img/ban12E.jpg);background-repeat: no-repeat;background-size: cover;background-position: center center;">
                            <div class="position-relative">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col position-relative">
                                        <h2 class="text-white">Welcome back, Here's your dashboard!</h2>
                                        <p class="text-white">You can view Reports, Charts to help gain better insights on </p>
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
                                                <div class="h5" id="tac"></div>
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
                                                <div class="h5" id="tad"></div>
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
                                                <div class="h5" id="taid"></div>
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
                                                <div class="h5" id="tnpl"></div>
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
                    </div>
                    </div>
                </main>
                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &#xA9; EBIS LTD 2020</div>
                            <div class="col-md-6 text-md-right small">
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script>
            sessionStorage.setItem("key", "{{ csrf_token() }}");
            let token = sessionStorage.getItem("key");
            $('#sel1').change(function() {
                console.log('good');
                $.ajax({
                // url: "http://127.0.0.1:8001/switch",
                url: "/switch",
                method: "post",
                data: {'data': this.value, "_token": token},
                beforeSend: function(){
                    $('#main').fadeOut('slow');
                    // Show image container
                    $("#loader").show();
                },
                success:function(data){
                    $('#main').html(data).fadeIn('slow');
                },
                complete:function(){
                    // Hide image container
                    $("#loader").hide();
                    // switch_dashboard();
                    }
                });
            });
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        
    </body>

</html>
