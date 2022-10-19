<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
	<link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/requestpage.css') }}" />
    <title>Request Page</title>
</head>

<body>
    <div class="background">
        <div class="container">
            <div class="screen">
                <div class="screen-header">
                    <div class="screen-header-left">
                        <div class="screen-header-button close"></div>
                        <div class="screen-header-button maximize"></div>
                        <div class="screen-header-button minimize"></div>
                    </div>
                    <div class="screen-header-right">
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                    </div>
                </div>
                <form action="/{{$account->id}}/send/requestjournal" method="post">
                    @csrf
                <div class="screen-body">
                    <div class="screen-body-item left">
                        <div class="app-title">
                            <span>REQUEST</span>
                            <span>FOR JOURNAL</span>
                        </div>
                        <div class="app-contact">Send Request Journal if You Want, Check Your Journal Request in Profile</div>
                    </div>
                    <div class="screen-body-item">
                        <div class="app-form">
                            <div class="app-form-group">
                                <input class="app-form-control" name="username" placeholder="USERNAME" value="{{$account->username}}">
                            </div>
                            <div class="app-form-group">
                                <input class="app-form-control" name="title" style="text-transform: capitalize" placeholder="NAME JOURNAL!">
                            </div>
                            <div class="app-form-group">
                              <select id="cars" class="app-form-control" name="theme"> 
                                <option value="" selected style="color: #3e3e3e";>CHOOSE THEME JOURNAL</option>
                                  <option value="novelty" style="color: #3e3e3e";>NOVELTY</option>
                                  <option value="classy"  style="color: #3e3e3e";>CLASSY</option>
                              </select>

                          </div>
                            <div class="app-form-group buttons">
                                <a href="/{{$account->id}}/journal" style="text-decoration: none;" class="app-form-button">CANCEL</a>
                                <button class="app-form-button">SEND</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="credits">
                @Copyright for
                <a class="credits-link" href="https://dribbble.com/shots/2666271-Contact" target="_blank">
                    <svg class="dribbble" viewBox="0 0 200 200">
                        <g stroke="#ffffff" fill="none">
                            <circle cx="100" cy="100" r="90" stroke-width="20"></circle>
                            <path
                                d="M62.737004,13.7923523 C105.08055,51.0454853 135.018754,126.906957 141.768278,182.963345"
                                stroke-width="20"></path>
                            <path
                                d="M10.3787186,87.7261455 C41.7092324,90.9577894 125.850356,86.5317271 163.474536,38.7920951"
                                stroke-width="20"></path>
                            <path
                                d="M41.3611549,163.928627 C62.9207607,117.659048 137.020642,86.7137169 189.041451,107.858103"
                                stroke-width="20"></path>
                        </g>
                    </svg>
                    NiceTryCompeny 2022.
                </a>
            </div>
        </div>
    </div>

</body>

</html>