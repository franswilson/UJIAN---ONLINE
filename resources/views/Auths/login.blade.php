<html lang="en"><head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
<title>Login | Laboratorium Informatika</title>
<link rel="stylesheet" href="https://labinformatika.itats.ac.id/dist/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://labinformatika.itats.ac.id/dist/modules/ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="https://labinformatika.itats.ac.id/dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
<link rel="stylesheet" href="https://labinformatika.itats.ac.id/dist/css/style.css">
<style>
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #fff;
        z-index: 9999999;
      }

      .loader {
        top: 50%;
        width: 50px;
        height: 50px;
        border-radius: 100%;
        position: relative;
        margin: 0 auto;
      }

      #loader-1:before, #loader-1:after {
        content: "";
        position: absolute;
        top: -10px;
        left: -10px;
        width: 100%;
        height: 100%;
        border-radius: 100%;
        border: 7px solid transparent;
        border-top-color: #0081c2;
      }

      #loader-1:before {
        z-index: 100;
        animation: spin 1s infinite;
      }

      #loader-1:after {
        border: 7px solid #f2f2f2;
      }

      @keyframes  spin {
        0% {
          -webkit-transform: rotate(0deg);
          -ms-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }
        100% {
          -webkit-transform: rotate(360deg);
          -ms-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
    }
</style></head>
<body>
<div id="preloader" style="display: none;">
<div class="loader" id="loader-1"></div>
</div> <div id="app">
<section class="section">
<div class="container mt-5">
<div class="row">
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
<div class="login-brand">
Login Praktikan
</div>
<div class="card card-primary" style="border-top: 2px solid #0081c2;">
<div class="card-body">
<form method="POST" action="/postlogin" class="needs-validation" novalidate="">
{{csrf_field()}}
<div class="form-group">
<label for="npm">NPM</label>
<input id="npm" type="text" class="form-control" name="npm">
</div>
<div class="form-group">
<label for="password" class="d-block">Kata Sandi</label>
<input id="password" type="password" class="form-control form-password" name="password" required="">
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary btn-block" style="background-color:#0081c2; border-color:#0081c2;" tabindex="4">
Masuk
</button>
</div>
</form>
</div>
</div>
<div class="simple-footer">
Copyright © 2020 laboratorium teknik informatika
</div>
</div>
</div>
</div>
</section>
</div>
<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script src="https://labinformatika.itats.ac.id/dist/modules/jquery.min.js" type="text/javascript"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
      
      $(":input").inputmask();

    });
  </script>
<script type="text/javascript">
    $(document).ready(function(){
        // $(".loader").fadeOut("slow");
        $('#preloader').fadeOut();
    });
  </script>

<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-136757794-2" type="text/javascript"></script>
<script type="text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136757794-2');
</script>

</body></html>