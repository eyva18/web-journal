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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/setting/dropmodal.css') }}" />
    <script src="crudpage.js"></script>
    <link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
    <title>{{ $journal->title }}</title>
    <style>
        .publication {
            display: none;
        }

        .publish {
            color: #00C853 !important;
        }

        .unpublish {
            color: #dc3545 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid px-0" id="bg-div">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="card card0">
                    <div class="d-flex" id="wrapper">
                        <!-- Sidebar -->
                        <div class="bg-light border-right" id="sidebar-wrapper">
                            <div class="sidebar-heading pt-5 pb-4"><strong>SETTINGS</strong></div>
                            <div class="list-group list-group-flush"> <a data-toggle="tab" href="/{{ $account->id }}/dashboard/{{ $journal->id }}" id="tab1" class="tabs list-group-item bg-light {{ ($title) == "journalset" ? 'active1' : '' }}">
                                    <div class="list-div my-2">
                                        <div class="fa fa-book"></div> &nbsp;&nbsp; Journal
                                    </div>
                                </a> <a data-toggle="tab" href="/{{ $account->id }}/dashboard/{{ $journal->id }}/aboutjournal" id="tab2" class="tabs list-group-item bg-light {{ ($title) == "aboutset" ? 'active1' : '' }}">
                                    <div class="list-div my-2">
                                        <div class="fa fa-info-circle"></div> &nbsp;&nbsp; About Journal
                                    </div>
                                </a> <a data-toggle="tab" href="/{{ $account->id }}/dashboard/{{ $journal->id }}/issue" id="tab3" class="tabs list-group-item bg-light {{ ($title) == "issueset" ? 'active1' : '' }}">
                                    <div class="list-div my-2">
                                        <div class="fa fa-archive"></div> &nbsp;&nbsp;&nbsp; Issue
                                    </div>
                                </a> <a data-toggle="tab" href="/{{ $account->id }}/dashboard/{{ $journal->id }}/Article" id="tab4" class="tabs list-group-item bg-light {{ ($title) == "articleset" ? 'active1' : '' }}">
                                    <div class="list-div my-2">
                                        <div class="fa fa-file"></div> &nbsp;&nbsp;&nbsp; Article
                                    </div>
                                </a>
                                <a data-toggle="tab" href="/{{ $account->id }}/dashboard/{{ $journal->id }}/Announcement" id="tab5" class="tabs list-group-item bg-light {{ ($title) == "announcset" ? 'active1' : '' }}">
                                    <div class="list-div my-2">
                                        <div class="fa fa-bullhorn"></div> &nbsp;&nbsp;&nbsp; Announcement
                                    </div>
                                </a>
                                <a data-toggle="tab" href="/{{ $account->id }}/dashboard/{{ $journal->id }}/editorialteam" id="tab6" class="tabs list-group-item bg-light {{ ($title) == "editorset" ? 'active1' : '' }}">
                                    <div class="list-div my-2">
                                        <div class="fa fa-users"></div> &nbsp;&nbsp;&nbsp; Editorial Team
                                    </div>
                                </a>
                                <a data-toggle="tab" onclick="return confirm('Are you sure you want to Delete Your Journal?');" href="/{{ $account->id }}/dashboard/delete/journal/{{ $journal->id }}" id="tab6" class="delete-journal tabs list-group-item bg-light {{ ($title) == "editorset" ? 'active1' : '' }}">
                                    <div class="list-div my-2" style="color: red;">
                                        <div class="fa fa-trash"></div> &nbsp;&nbsp;&nbsp; Delete Journal
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
                                            <p class="mb-0 mr-4 mt-4 text-right" style="text-transform: capitalize;"><a href="/{{$account->id}}/journal/{{$journal->id}}/publish" class="btn btn-success {{ ($journal->status) == "publish" ? 'publication' : '' }}" style="text-decoration: none; color:white;">PUBLISH JOURNAL</a></p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-right">
                                        <div class="col-12">
                                            <p class="mb-0 mr-0 mt-0 text-right" style="text-transform: capitalize;"><a href="/{{$account->id}}/journal/{{$journal->id}}/unpublish" class="btn btn-danger {{ ($journal->status) == "unpublish" ? 'publication' : '' }}" style="text-decoration: none; color:white;">UNPUBLISH JOURNAL</a></p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-right">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="text-center" style="width: auto !important; text-transform: capitalize;" id="test"><strong>{{$journal->title}} | Category: {{$journal->category}} | Status: <span class="{{ ($journal->status) == "unpublish" ? 'unpublish' : '' }} {{ ($journal->status) == "publish" ? 'publish' : '' }}">{{$journal->status}}</span></strong></div>
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
        $(document).ready(function() {
            //Menu Toggle Script
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            // For highlighting activated tabs
            $("#tab1").click(function() {
                $(".tabs").removeClass("active1");
                $(".tabs").addClass("bg-light");
                $("#tab1").addClass("active1");
                $("#tab1").removeClass("bg-light");
            });
            $("#tab2").click(function() {
                $(".tabs").removeClass("active1");
                $(".tabs").addClass("bg-light");
                $("#tab2").addClass("active1");
                $("#tab2").removeClass("bg-light");
            });
            $("#tab3").click(function() {
                $(".tabs").removeClass("active1");
                $(".tabs").addClass("bg-light");
                $("#tab3").addClass("active1");
                $("#tab3").removeClass("bg-light");
            });
            $("#tab4").click(function() {
                $(".tabs").removeClass("active1");
                $(".tabs").addClass("bg-light");
                $("#tab4").addClass("active1");
                $("#tab4").removeClass("bg-light");
            });
            $("#tab5").click(function() {
                $(".tabs").removeClass("active1");
                $(".tabs").addClass("bg-light");
                $("#tab5").addClass("active1");
                $("#tab5").removeClass("bg-light");
            });
            $("#tab6").click(function() {
                $(".tabs").removeClass("active1");
                $(".tabs").addClass("bg-light");
                $("#tab6").addClass("active1");
                $("#tab6").removeClass("bg-light");
            });
        })
    </script>
</body>

</html>