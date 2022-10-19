<!DOCTYPE html>
<html lang="en"><head>
   <link class="logoicon" rel="shortcut icon" href="{{ asset('lg.png') }}">
   <link rel="icon" type="image/png" href="{{ asset('lg.png') }}">
    <title>Confirm Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- Favicon-->
    <link rel="stylesheet" href="{{ asset('css/stylelog.css') }}">
</head>
<body>
    <div class="bg-img">
       <div class="content">
          <header>Confirm Form</header>
          <form action="{{ url('/login') }}" Method="POST">
          @csrf
             <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" name="username">
             </div>
             <div class="field space">
                <span class="fa fa-lock"></span>
                <input type="password" class="pass-key" name="password" required placeholder="Password">
                <span class="show">SHOW</span>
             </div>
             <br>
             <div class="field">
                <input type="submit" value="LOGIN">
             </div>
          </form>
          <div class="signup">
            Are You Really have this Website?
          </div>
       </div>
    </div>
    <script>
       const pass_field = document.querySelector('.pass-key');
       const showBtn = document.querySelector('.show');
       showBtn.addEventListener('click', function(){
        if(pass_field.type === "password"){
          pass_field.type = "text";
          showBtn.textContent = "HIDE";
          showBtn.style.color = "#3498db";
        }else{
          pass_field.type = "password";
          showBtn.textContent = "SHOW";
          showBtn.style.color = "#222";
        }
       });
    </script>
</body></html>