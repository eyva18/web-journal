<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
  <title>{{ $journal->title ?? 'No Data'}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/scholartheme/issuestyle.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/scholartheme/editors.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/scholartheme/hoverunderline.css') }}" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://codepen.io/z-/pen/a8e37caf2a04602ea5815e5acedab458.scss?theme">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <script src="https://codepen.io/z-/pen/a8e37caf2a04602ea5815e5acedab458.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/scholartheme/dropdown.css') }}" />
</head>

<body >
    <div class=" p-10 bg-cover bg-top bg-header">
    <div class="flex justify-around ">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMQzU6jpCbu2-VII5A8Rqy1Na_UolYAF5KCg&usqp=CAU" class="h-32 " alt="" />
            <div class=" space-x-3 mt-10">
                <div class="dropdown1">
                <span style="text-transform: capitalize;" class="text-white bg-blue-600 shadow-lg rounded-full text-sm px-8 py-2 mb-2"> <a href="/home">Login</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i></span>
                </div>
            </div>
            </div>
        <div class="text-center">
            <h1 class="mt-5 ml-3 text-5xl font-bold">{{ $journal->title ?? 'No Data'}}</h1>
        </div>
        <form class="flex justify-center mt-5">
            <div class="relative">
            </div>
            </div>
        </form>
        </div>
        <div class="text-center bg-blue-600">
            <div class="h-60 w-full bg-cover pt-10">
                <div class="flex justify-center ">
                <ul class="flex flex-row space-x-16 text-md">
                        <li>
                            <a href="/journal/{{ $journal->path ?? 'No Data'}}" class="text-white hover-underline-animation  underline-offset-8" aria-current="page"><p>Home</p>
                            </a>
                        </li>
                        <li>
                            <a href="/about/{{ $journal->path ?? 'No Data' }}/page" class="text-white hover-underline-animation underline-offset-8">About</a>
                        </li>
                        <li>
                            <a href="/journal/{{ $journal->path ?? 'No Data'}}/announcement" class="text-white hover-underline-animation underline-offset-8">News</a>
                        </li>
                        <li>
                            <a href="/journal/{{ $journal->path ?? 'No Data' }}/issue/archive" class="text-white hover-underline-animation underline-offset-8">Archive</a>
                        </li>
                        <li>
                            <a href="/journal/{{ $journal->path ?? 'No Data'}}/editors" class="text-white hover-underline-animation underline-offset-8">Editorial Team</a>
                        </li>
                        <li>
                            <a href="/journal/{{ $journal->path ?? 'No Data'}}/download" class="text-white hover-underline-animation underline-offset-8">Download</a>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-center w-full bg-cover  mt-10 ml-5">
            <div class="container box-content p-10 border bg-white shadow-xl w-full ">
                <nav class="cmp_breadcrumbs flex container mx-auto" role="navigation" aria-label="You are here:">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        <a href="/journal/{{ $journal->path ?? 'No Data' }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:black-white">Home</a>
                    </li>
                    <li class="current">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span aria-current="page" class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400 dark:hover:text-black"><a href="/about/{{ $journal->path ?? 'No Data'}}/page">About ({{ $journal->title ?? 'No Data'}})  </a></span>
                        </div>
                    </li>
                </ol>
                </nav>
                <hr class="mt-3">
                <div class="prose prose-neutral max-w-none mt-4">
                    <h1 class="page_title text-left font-black text-2xl" style="white-space: pre-wrap;">Download Journal</h1>
                    <div class="navigation-page-content" id="navigation-page-content">
                        <p class="text-justify mt-4 tracking-wide text-sm">
                                > <a style="text-decoration: underline;"  href="/journal/{{ $journal->path ?? 'No Data'}}/download/{{$journal->filejr}}">Download Journal</a>
                        </p>
                    </div>
                </div>
                <div class="prose prose-neutral max-w-none mt-4">
                    <h1 class="page_title text-left font-black text-2xl" style="white-space: pre-wrap;">Download Article</h1>
                    <div class="navigation-page-content" id="navigation-page-content">
                        @foreach($article as $item)
                        <p class="text-justify mt-4 tracking-wide text-sm">
                                > <a href="/journal/{{ $journal->path ?? 'No Data'}}/download/article/{{$item->filearticle}}" style="text-decoration: underline;">Download Article: {{$item->judul_article}}</a>
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
</div>
        <footer class="inset-x-0 bottom-0 mt-20 bg-black dark:bg-gray-900">
            <div class="text-center">
            <div class="grid grid-cols-2 gap-8 py-8 px-20 md:grid-cols-4">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white  dark:text-gray-400">Address</h2>
                    <ul class="text-white dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class=" hover:underline">About</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Careers</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Brand Center</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Blog</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white  dark:text-gray-400">Contact Info</h2>
                    <ul class="text-white dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Discord Server</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Twitter</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Facebook</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-white  dark:text-gray-400">Information</h2>
                    <ul class="text-white dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Licensing</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="w-36">
                    <img src="{{ asset('lg.png') }}" alt="">
                </div>
                </div>
            </div>
            <div class="py-6 px-4 bg-black dark:bg-gray-700 md:flex md:items-center md:justify-center">
                <span class="text-sm text-white dark:text-gray-300 sm:text-center">© 2022 <a href="#">NiceTry™</a>. All Rights Reserved.
                </span>
            </div>
        </footer>

<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
<script>
        $(".option").click(function(){
   $(".option").removeClass("active");
   $(this).addClass("active");
   
});
</script>
</body>
</html>