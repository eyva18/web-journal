<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
	<link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
	<title>Journal Website</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/normalize.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/demo.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/book.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/dropdown.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/makedby/style.css') }}" />
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="makedby" content="Taufiq Ari Rahman" />
	<meta name="makedby" content="Nayif Azhari" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<script src="{{ URL::asset('js/dropdown') }}"></script>
	<style>
		.displaynone{
			display: none;
		}
	</style>
	<!-- Maked By Taufiq & Nayif -->
</head>

<body style="background: #fafafa">
	<div class="container" style="background: #fafafa">
		<header>
			<h1>Journal Website <span>SMKN 4 Banjarmasin</span></h1>
			<nav class="navbar" style="width: 200px; height: 40px; float: right;">
				<ul class="nav">
					<li>
						{{ $account->username ?? ' ' }} ({{ $account->status ?? 'None' }})&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
						<ul class="dropdown">
							<li><a href="/{{ $account->id }}/dashboard/{{ $accountjournal }}">Dashboard</a></li>
							<li><a href="/{{ $account->id }}/profile">Profile</a></li>
						</ul>
					</li>
				</ul>
				<div class="form-group">
					<input type="hidden" name="accountid" value="{{ $account->id }}">
				</div>
			</nav>
	</div>
	</header>
	<input type="checkbox" id="check">
	<label for="check" style="z-index: 1">
		<i class="fa fa-angle-right" id="btn" style="z-index: 1"></i>
		<i class="fas fa-times" id="cancel" style="z-index: 1"></i>
	</label>
	<div class="sidebar" style="z-index: 1">
		<header>Profile Website</header>
		<center class="profile">
			<img src="{{ asset('image/pr.jpg') }}" alt="">
			<h1>Taufiq Ari Rahman</h1>
			<p>CEO & Co-Founder</p>
			<span>Project: Journal Website</span>
		</center>
		<br>
		<hr>
		<center class="profile">
			<img src="{{ asset('image/pra.jpg') }}" alt="">
			<h1>Nayif Azhari</h1>
			<p>Saham Minoritas</p>
			<span>Project: Journal Website</span>
		</center>
		<br>
		<hr>
	</div>
	<div class="component" style="z-index: 3">
		<ul class="align" style="box-shadow: 0 1px 15px 1px rgba(113,106,202,.08);">
			@foreach($journal as $item)
			<li>
				<div class="journal">
					<figure class='book'>
						<ul class='page'>
							<li><img src="/image/cover/{{ $item->thum ??  'coverdefault.png' }} " width="170px" height="240px"></li>
							<li>
							</li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
						<ul class='hardcover_back'>
							<li></li>
							<li></li>
						</ul>
						<ul class='book_spine'>
							<li></li>
							<li></li>
						</ul>
						<figcaption>
							<h1>{{$item->title}}</h1>
							<p style="text-align:justify;">{{substr($item->desc,0,250) ?? 'No Data'}}...</p>
							<p class="buttonview"><a href="/{{ $account->id }}/journal/{{$item->path ?? 'No Data'}} " class="view">View Journal <i class="fa fa-chevron-right"></i></a></p>
						</figcaption>
					</figure>
				</div>
				<div class="or-spacer">
					<div class="mask"></div>
				</div>
			</li>
			@endforeach
			</figure>
			</li>
		</ul>
		<p class="note">This Website Cannot Copy, because is more Dificult then You Think.<br><strong> Not Copy</strong> This Website <em></p>
	</div>
	</div><!-- /container -->
</body>

</html>