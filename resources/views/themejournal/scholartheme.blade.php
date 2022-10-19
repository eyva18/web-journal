<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
  <title>{{ $journal->title ?? 'No Data' }}</title>
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
            <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMQzU6jpCbu2-VII5A8Rqy1Na_UolYAF5KCg&usqp=CAU" class="h-32 " alt="" />
            </a>
            <div class=" space-x-3 mt-10">
                <div class="dropdown1">
                <span style="text-transform: capitalize;" class="text-white bg-blue-600 shadow-lg rounded-full text-sm px-8 py-2 mb-2">{{ $account->username ?? ' ' }} ({{ $account->status ?? 'None' }})&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></span>
                    <div class="dropdown-content1">
                        <p><a href="/{{ $account->id }}/dashboard/{{ $accountjournal }}">Dashboard</a></p> <br>
                        <p><a href="/{{ $account->id }}/profile">Profile</a></p>
                    </div>
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
                            <a href="{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}" class="text-white hover-underline-animation  underline-offset-8" aria-current="page"><p>Home</p>
                            </a>
                        </li>
                        <li>
                            <a href="/{{ $account->id }}/about/{{ $journal->path ?? 'No Data' }}/page" class="text-white hover-underline-animation underline-offset-8">About</a>
                        </li>
                        <li>
                            <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/announcement" class="text-white hover-underline-animation underline-offset-8">News</a>
                        </li>
                        <li>
                            <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data' }}/issue/archive" class="text-white hover-underline-animation underline-offset-8">Archive</a>
                        </li>
                        <li>
                            <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/editors" class="text-white hover-underline-animation underline-offset-8">Editorial Team</a>
                        </li>
                        <li>
                            <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/download" class="text-white hover-underline-animation underline-offset-8">Download</a>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-center w-full bg-cover  mt-10">
                    <div class="box-content w-5/1 p-20 border bg-white shadow-xl">
                        <div class="content flex flex-col lg:flex-row gap-4 ">
                        <div class="flex flex-col ">
                            @if ( $journal->title  == null)
                            <div class="loader ml-40"></div>
                            <p class="font-bold ml-10 mt-5">Tidak Ada Data...</p>
                             @endif
                            <h3 class="text-2xl font-bold text-left">About {{ $about->title_about ?? 'No Data' }}</h3>
                        <div class="flex mt-5">
                        <div class="max-w-sm mr-7 ">
                            <p class="text-justify">
                               {{ substr($journal->desc ?? 'No Data',0,500)}}
                            </p>
                            <br>
                            <p class="text-justify">
                                <b>ISSN: {{$journal->issn}}</b>
                            </p>
                         <div class="flex justify-end mt-5 relative">
                        <a href="/{{ $account->id }}/about/{{ $journal->path ?? 'No Data'}}/page">
                        <button type="button" class="text-white bg-gray-900 rounded-full text-lg pl-5 pr-12 py-1">More</button></a>
                        <svg class="flex absolute mt-2 mr-4 w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
                        <div class="cover object-contain w-60 mr-8">
                         <a href="/{{ $account->id }}/about/{{ $journal->path }}/page">
                         <img src="/image/cover/{{ $journal->thum ?? 'No Data'}}">
                          </a>
                        </div>
                 </div>
                </div>
                </div>
                </div>

                </div>
            </div>
        </div>
        <div class="mt-80">
        <div class="bg-no-repeat bg-top bg-contain py-20" style="background-image: url(/image/map.jpeg);">
        <div class="flex justify-center pb-24">
                    <div class="box-content w-6/12 mr-32 ">
                        <div class="content flex flex-col lg:flex-row gap-4 ">
                            <div class="flex mtt-3 ml-40">
                            <div class="mt-3">
                                <h1 class="text-7xl text-blue-600" style="margin-top: 150px;">News</h1>
                            <div class="ml-14 mt-8">
                                <hr class="w-28 border-black ">
                                </div>
                                <div class="mt-5 ml-20  flex">
                                <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data' }}/announcement">
                                <h3 class="text-lg">See All</h3>
                                </a>
                                <svg class="ml-3 w-7 h-7 text-gray-600 "fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        </div>
                        <div class="max-w mt-5">
                        <div class="text-left ml-16 " style="margin-top: 150px;">
                        <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/announcement/{{ $announc->id ?? 'No Data'}}">
                        <p class="font-bold text-2xl">{{$announc->title ?? 'No Data'}}</p>
                        </a>
                        <p class="mt-2" style="text-align: justify; width: 350px">
                        {{substr($announc->content ?? 'No Data',0,400) }}...
                        </p>
                        </div>
                        </div>
                </div>
                 </div>
                </div>
                </div>
        </div>
        </div>
        <div class="issue_title" style="margin-bottom: -30px;">
        <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data' }}/issue/archive">
        <h1 class="text-5xl text-black-600 font-bold text-center hover:underline">Archive</h1>
        </a>
        </div>
        <div class="mt-0">
        <div class="bg-no-repeat bg-top bg-contain py-20">
        <div class="flex justify-center pb-24 ">
        <div class="options">
        @foreach($issue as $item)
        <div class="option {{ $item->current ?? 'No Data'}} mb-3" style="--optionBackground:url(/image/issue/{{$item->image ?? 'No Data'}});">
        <div class="shadow"></div>
        <div class="label">
                <div class="icon">
                    <i class='fa fa-mail-forward'></i>
                </div>
                <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/issue/{{ $item->id ?? 'No Data'}}">
                <div class="info mb-8">
                    <div class="main" style="margin-top: -20px;">{{ $item->volume ?? 'No Data'}}</div>
                    <div class="sub">{{ $item->judul ?? 'No Data'}}</div>
                    <div class="date">{{ $item->published ?? 'No Data'}}</div>
                </div>
            </a>
            </div>
            </div>
        @endforeach
        </div>
        </div>
        </div>
        <div class="issue_title" style="margin-bottom: 50px;">
        <a href="/{{ $account->id }}/journal/{{ $journal->path ?? 'No Data'}}/editors">
        <h1 class="text-5xl text-black-600 font-bold text-center hover:underline">Editorial Team</h1></a>
        </div>
        <div class="box">
            @foreach($editor as $editors)
            <a href="/{{ $account->id }}/journal/{{ $item->path_jr ?? 'No Data'}}/editors">
            <div class="card">
                <div class="imgBx">
                    <img src="/image/editors/{{ $editors->image ?? 'No Data'}}" alt="images">
                </div>
                
                <div class="details">
                    <h2>{{ $editors->name ?? 'No Data'}}<br><span>{{ $editors->affiliation ?? 'No Data'}}</span></h2>
                </div>
            </div>
            </a>
            @endforeach
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