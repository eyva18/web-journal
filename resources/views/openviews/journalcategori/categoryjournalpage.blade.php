<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Journal</title>
    <link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/openview/style.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="flex justify-center w-full xl:py-5 container">
        <div class="box-content p-10 border bg-white shadow-xl w-full">
            <nav class="cmp_breadcrumbs flex container mx-auto" role="navigation" aria-label="You are here:">
                <span class="nav-toggle" id="js-nav-toggle">
                    <i class="fas fa-bars"></i>
                </span>
                <div class="logo">
                    <span class="icon circle-1"></span>
                    <span class="icon circle-2"></span>
                    <span class="icon circle-3"></span>
                </div>
                <ul id="js-menu">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn" style="background-color: #198754; color:white;">Choose Journal Category</button>
                            <div class="dropdown-content" style="margin-left: 20px;">
                                <a href="/view/explore/journal">All Journal's</a>
                                <a href="/view/journal/category/ekonomi">Ekonomi ({{$ekonomicate}})</a>
                                <a href="/view/journal/category/sport">Sport ({{$sportcate}})</a>
                                <a href="/view/journal/category/computer">Computer ({{$computercate}})</a>
                                <a href="/view/journal/category/politik">Politik ({{$politikcate}})</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="prose prose-neutral max-w-none mt-4">
                <h1 style="margin-left: 50px;">
                    Journal With Category: <b>{{$title}}</b>
                </h1>
                <br>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @foreach($data as $item)
                    <div class="transition hoverjournal">
                        <a href="/journal/{{ $item->path ?? 'No Data'}}">
                            <img src="/image/cover/{{ ($item->thum) == null ? 'coverdefault.png' : '$item->thum' }}" class="h-[16rem] sm:h-[24rem] mx-auto">
                            <p class="text-center">{{$item->title}}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="backhome" style="margin-top: 10px;">
                <a href="/home" style="text-decoration: none; color: black; font-size: 23px;"><i class="fa fa-chevron-left"></i> Go Home</a>
            </div>
        </div>
    </div>
</body>

</html>