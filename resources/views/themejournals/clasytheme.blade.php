<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/themeclassy/blog-single-style.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/themeclassy/style.css') }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/themeclassy/dropdown.css') }}" />
  <title>{{ $journal->title ?? 'No Data' }}</title>
</head>

<body>
  <div class="main-container contact-color">
    <div class="inside-container ">
      <div class="row row-spc">
        <div class="col-md-12 col-lg-12 col-disp">
        </div>
      </div>
    </div>
    <!--menu-->
    <div class="main-container nav-bg-color">
      <div class="inside-container nav-contain">
        <nav class="navbar navbar-expand-lg navbar-light ">
          <img src="{{ asset('lg.png') }}" class="img-fluid" alt="">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav nav-list ml-auto">
              <span class="menu last-spc color-line"> | </span>
              <a class="menu" href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}">HOME</a>
              <a class="menu" href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data' }}/issue/archive">ARCHIVE</a>
              <a class="menu" href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/editors">EDITORIAL TEAM</a>
              <a class="menu" href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/download">DOWNLOAD</a>
              <span class="menu last-spc color-line"> | </span>
              <div style="width: 200px; height: 40px; float: right;" class="menu dropdown1">
                <li><span style="text-transform: capitalize;">{{ $account->username ?? ' ' }} ({{ $account->status ?? 'None' }})&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></span></li>
                <ul class="dropdown-content1">
                  <li><a style="text-decoration: none; color: black;" href="/{{ $account->id }}/dashboard/{{ $accountjournal }}">Dashboard</a></li>
                  <hr>
                  <li><a style="text-decoration: none; color: black;" href="/{{ $account->id }}/profile">Profile</a></li>
                  <hr>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="main-container connect">
      <div class="inside-container">
        <div class="row">
          <div class="col-12 subhead">
            <nav class="breadcrumb page-linker">
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="main-container blog-container">
      <div class="inside-container">
        <div class="row">
          <div class=" col-lg-8 ">
            <div class="row">
              <div class="col-md-12 ">
                <div class="blog-post">
                  <center>
                    <div><img src="/image/cover/{{ $journal->thum ?? 'No Data'}}" width="280px" height="360px" style="margin-top: 50px;"></div>
                  </center>
                  <div class="blog-description">
                    <div class="text-center">
                      <h1>{{ $journal->title ?? 'No Data'}}</h1>
                      <div class="post-info">
                        <p><span class="info-over"><b> ISSN: {{$journal->issn}}</b></p>
                      </div>
                    </div>
                    <p>{{ $journal->desc ?? 'No Data'}}</p>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12  ">
                <div class="comment-container">
                  <span><a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/editors" style="color: black">Editorial Team</a></span>
                  <hr>
                  @foreach ($editor as $item)
                  <div class="row">
                    <div class="col-sm-2">
                      <img src="/image/editors/{{ $item->image ?? 'No Data'}}" alt="" class="comment-img img-fluid">
                    </div>
                    <div class="col-sm-10">
                      <div class="comment-text">
                        <span> Name <span style="color:#aeaeae;">|</span> <span style="color: #f65aa7;">{{ $item->name }} </span></span>
                        <p>
                          {{ $item->from }}
                        </p>
                        <p class="reply"> <i class="fas fa-user-tag"></i> {{ $item->affiliation }} </p>
                      </div>
                    </div>
                    <hr class="comment-line">
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12  ">
                <div class="comment-container">
                  <span>Current Issue</span>
                  <hr>
                  <div class="current_issue_title" style="margin-bottom: 20px;">
                    <strong><a style="color: black" href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/issue/{{ $currentissue->id ?? 'No Data'}}">{{ $currentissue->judul ?? 'No Data'}}</a></strong>
                  </div>
                  <div class="heading">
                    <a class="cover" href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/issue/{{ $currentissue->id ?? 'No Data'}}">
                      <img src="/image/issue/{{$currentissue->image ?? 'No Data'}}">
                    </a>
                    <div class="description text-justify">
                      <p><strong>{{ $currentissue->volume ?? 'No Data' }}</strong></p>
                    </div>
                    <div class="published">
                      <span class="label">
                        Published:
                      </span>
                      <span class="value">
                        {{ $currentissue->published ?? 'No Data' }}
                      </span>
                    </div>
                  </div>
                  <div class="section">
                    <h3>
                      Articles
                    </h3>
                    @foreach($articlecurent as $item)
                    <ul class="cmp_article_list articles">
                      <li>
                        <div class="obj_article_summary">
                          <div class="cover">
                            <a href="/{{ $account->id }}/journal/{{$journal->path?? 'No Data'}}/article/{{ $item->id ?? 'No Data'}}" class="file">
                              <img src="/image/issue/article/{{ $item->image ?? 'No Data'}}" alt="">
                            </a>
                          </div>
                          <h4 class="title">
                            <a href="/{{ $account->id }}/journal/{{$journal->path?? 'No Data'}}/article/{{ $item->id ?? 'No Data'}}">
                              {{ $item->judul_article}}
                            </a>
                          </h4>
                          <div class="meta sm:mb-2">
                            <div class="authors">
                              Author: {{ $item->author ?? 'No Data'}}
                            </div>
                          </div>
                      </li>
                      @endforeach
                      <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data' }}/issue/archive" class="btn btn-learn" style="margin-left: 570px;">See All <span class="arrow">❯</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=" col-lg-4 side-bar-colon">
            <div class="row ">
              <div class="col-12  side-bar-bg">
                <div class="our-header text-center">
                  <span>Announcement</span>
                  <div class="text-center">
                    <hr> <i class="far fa-square rotate-45"></i> <i class="far fa-square rotate-45"></i>
                    <hr>
                  </div>
                </div>
                @foreach ($announc as $item)
                <div class="categories-link">
                  <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/announcement/{{ $item->id ?? 'No Data'}}"> <i class="fas fa-angle-right"></i> {{$item->title ?? 'No Data'}} ({{$item->published ?? 'No Data'}})</a>
                </div>
                <hr>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--footer-->
    <footer class="page-footer footer-bg">
      <div class="inside-container">
        <div class="row footer-padd">
          <div class=" col-sm-6 col-lg-3 foot-col-padd">
            <div class="foot-logo"><img src="image/foot-logo.jpg" alt="" class="img-fluid"></div>
            <div class="dream-text">
              <p>Got a dream and we just know now we're gonna make our dream come true. No phone no lights no motor car not a single luxury. </p>
            </div>
            <div>
              <i class="fab fa-facebook-f foot-icon "></i>
              <i class="fab fa-twitter foot-icon "></i>
              <i class="fab fa-linkedin-in foot-icon "></i>
              <i class="fab fa-tumblr  foot-icon"></i>
              <i class="fab fa-vimeo-v  foot-icon"></i>
              <i class="fab fa-pinterest-p foot-icon "></i>
            </div>
          </div>
          <div class=" col-sm-6 col-lg-3 pop-col">
            <span>Just Moment</span>
            <hr>
            <div class="row">
              <div class="col-6 pop-link">
                <a href="#">-</a>
                <a href="#">-</a>
                <a href="#">-</a>
                <a href="#">-</a>
                <a href="#">-</a>

              </div>
              <div class=" col-6  pop-link">
                <a href="#">contact us </a>
                <a href="#"> 404</a>
                <a href="#"> 404</a>
                <a href="#"> 404</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6  col-lg-3 pop-col">
            <span>recent news </span>
            <hr>
            <div class="row ltl-blog row-ltl-blog">
              <div class="col-3"> <img src="blog/recent-post-1.jpg" alt="" class="blog-img"></div>
              <div class="col-9 max-award">
                <p>-</p>
              </div>
            </div>
            <hr class="recent-hr">
          </div>
          <div class="col-sm-6 col-lg-3 pop-col ">
            <span>contact us</span>
            <hr>
            <div class="row contact-row-margin">
              <i class="fas fa-map-marker-alt contact-icon"></i>
              <p>-</p>
            </div>
            <div class="row contact-row-margin">
              <i class="fas fa-phone fa-rotate-90 contact-icon"></i>
              <p>-</p>
            </div>
            <div class="row contact-row-margin">
              <i class="far fa-envelope contact-icon "> </i>
              <p> - </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 copyright-text">
            <p> &#169; 2022 <a href="http://digitaconnect.com/">NiceTry Company</a>. All Rights Reserved </p>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
</body>

</html>