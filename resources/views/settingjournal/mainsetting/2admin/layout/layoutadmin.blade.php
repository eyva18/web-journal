<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="crudpage.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/setting/style.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/setting/issuesetting/style.css') }}" />
    <script src="crudpage.js"></script>
    <link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
	<link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
    <title>Admin Page</title>
</head>
<body>
    <div class="container-fluid px-0" id="bg-div">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="card card0">
                    <div class="d-flex" id="wrapper">
                        <!-- Sidebar -->
                        <div class="bg-light border-right" id="sidebar-wrapper">
                            <div class="sidebar-heading pt-5 pb-4"><strong>Journal</strong></div>
                            <div class="list-group list-group-flush"> <a data-toggle="tab" href="/{{$account->id}}/dashboard/empetyjournal" id="tab1" class="tabs list-group-item bg-light {{ ($title) == "journal1" ? 'active1' : '' }}">
                                    <div class="list-div my-2">
                                        <div class="fa fa-book"></div> &nbsp;&nbsp; {{$journal1is}}
                                    </div>
                                </a> <a data-toggle="tab" href="/{{$account->id}}/dashboard/setting/category2" id="tab2" class="tabs list-group-item bg-light {{ ($title) == "journal2" ? 'active1' : '' }}">
                                    <div class="list-div my-2">
                                        <div class="fa fa-book"></div> &nbsp;&nbsp; {{$journal2is}}
                                    </div>
                                </a>
                            </div>
                        </div> <!-- Page Content -->
                        <div id="page-content-wrapper">
                            <div class="row pt-3" id="border-btm">
                                <div class="col-4"> <button class="btn btn-success mt-4 ml-3 mb-3" id="menu-toggle">
                                        <div class="bar4"></div>
                                        <div class="bar4"></div>
                                        <div class="bar4"></div>
                                    </button> </div>
                                <div class="col-8">
                                    <div class="row justify-content-right">
                                        <div class="col-12">
                                        <p class="mb-0 mr-4 mt-4 text-right" style="text-transform: capitalize;">{{ $account->username ?? 'none'}} ({{$account->status ?? 'none'}})</p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-right">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="text-center" style="text-transform: capitalize; width: auto;" id="test"><b>Setting Journal Category ({{$journalcategory}})</b></div>
                            </div>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
    //Menu Toggle Script
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // For highlighting activated tabs
    $("#tab1").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light"); 
        $("#tab1").addClass("active1");
        $("#tab1").removeClass("bg-light");
    });
    $("#tab2").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab2").addClass("active1");
        $("#tab2").removeClass("bg-light");
    });
    $("#tab3").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab3").addClass("active1");
        $("#tab3").removeClass("bg-light");
    });
    $("#tab4").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab4").addClass("active1");
        $("#tab4").removeClass("bg-light");
    });
    $("#tab5").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab5").addClass("active1");
        $("#tab5").removeClass("bg-light");
    });
    $("#tab6").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab6").addClass("active1");
        $("#tab6").removeClass("bg-light");
    });
})
    </script>
</body>
</html>