<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
    <title>Profile Page</title>
    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/profilepage.css') }}" />
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>

<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Profile</h1>
        </div>
        <!-- Navbar -->
        <ul>
            <li>
                <a href="/{{$account->id}}/journal">
                    <i class="fa fa-sign-out-alt fa-2x"></i>
                </a>
            </li>
        </ul>
        <!-- End -->
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <a href="/{{$account->id}}/journal"><img src="{{ asset('lg.png') }}" alt="" width="100" height="100"></a>

            <div class="name" style="text-transform: uppercase;">
                {{ $account->username }}
            </div>
            <div class="job" style="text-transform: capitalize;">
             {{ $journal }}
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href="/{{ $account->id }}/profile" class="active">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="/home" class="active" onclick="return confirm('Are you sure you want to Logout?');">Logout</a>
                <hr align="center">
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <td>Usename</td>
                            <td>:</td>
                            <td style="text-transform: capitalize;">{{ $account->username }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td style="text-transform: capitalize;">{{ $account->status }}</td>
                        </tr>
                        <tr>
                            <td>Journal</td>
                            <td>:</td>
                            <td style="text-transform: capitalize;">
                                {{ $journal}} (<a href="/{{ $account->id }}/dashboard/{{ $accountjournal }}">Settings</a>)
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="social-media">
                    © 2022 NiceTry. All Rights Reserved.
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
</body>

</html>