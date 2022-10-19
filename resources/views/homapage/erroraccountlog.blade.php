<!DOCTYPE html>
<html>

<head>
    <link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
    <title>Empety Journal</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <style type="text/css">
        .text-9xl {
            font-size: 14rem;
        }

        @media (max-width: 645px) {
            .text-9xl {
                font-size: 5.75rem;
            }

            .text-6xl {
                font-size: 1.75rem;
            }

            .text-2xl {
                font-size: 1rem;
                line-height: 1.2rem;
            }

            .py-8 {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }

            .px-6 {
                padding-left: 1.2rem;
                padding-right: 1.2rem;
            }

            .mr-6 {
                margin-right: 0.5rem;
            }

            .px-12 {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="bg-gradient-to-r from-Slate-200 to-blue-200">
        <div class="m-auto flex min-h-screen w-9/12 items-center justify-center py-16">
            <div class="overflow-hidden bg-white pb-8 shadow sm:rounded-lg">
                <div class="border-t border-gray-200 pt-8 text-center">
                    <center><img src="{{ asset('lg.png') }}"></center>
                    <h1 class="py-8 text-6xl font-medium">You Don't Have Journal</h1>
                    <p class="px-12 pb-8 text-2xl font-medium">
                        You Need Buy Journal Theme first if you want to your Journal on this Website.
                    </p>
                    <a href="/{{$account->id}}/journal" class="mr-6 rounded-md bg-gradient-to-r from-purple-400 to-blue-500 px-6 py-3 font-semibold text-white hover:from-pink-500 hover:to-orange-500">
                        HOME
                    </a>
                    <a href="/{{$account->id}}/requestjournal" class="mr-6 rounded-md bg-gradient-to-r from-blue-400 to-blue-500 px-6 py-3 font-semibold text-white hover:from-pink-500 hover:to-orange-500">
                        REQUEST JOURNAL
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>