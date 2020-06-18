<!doctype html>
<html lang="en">
   
<!-- Mirrored from iqonic.design/themes/xray/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jun 2020 08:58:13 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>{{ $title }}</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="/images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="/css/responsive.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container sign-in-page-bg mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#"><img src="/images/logo-white.png" class="img-fluid" alt="logo"></a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="/images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="/images/login/2.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="/images/login/3.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <div class="sign-in-from">
                            
                            <h1 class="mb-0">Sign in</h1>
                            <p>Enter your email address and password to access admin panel.</p>
                            <div id="notice"></div>
                            <div id="redirect"></div>
                            <form id="Login" class="mt-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input name="username" type="text" class="form-control mb-0" id="exampleInputEmail1" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <a href="#" class="float-right">Forgot password?</a>
                                    <input name="password" type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Login</button>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="#">Sign up</a></span>
                                    <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                        <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                        <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="/js/jquery.min.js"></script>
      <script src="/js/popper.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="/js/waypoints.min.js"></script>
      <script src="/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="/js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="/js/smooth-scrollbar.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="/js/custom.js"></script>
   </body>

   <script>

       $('document').ready(function(){


        console.log('Ready!!!!');

        $('#Login').submit(function(e){
            e.preventDefault();
            var data =  $('#Login').serialize();
            console.log(data);

            $.ajax({
                url : '/Api/Login',
                method : 'POST',
                data : data,
                success : function(data){
                    console.log(data);
                    if(data.status == 200){
                        $('#notice').html( `<div class="alert alert-success">`+ data.msg +`</div>` );
                        $('#redirect').html( `<meta http-equiv="refresh" content="2; url=/dashboard">` );
                    }else{
                        $('#notice').html( `<div class="alert alert-danger">`+ data.msg +`</div>` );
                    }
                },
                error : function()
                {

                }
            })
        })
       });

    </script>

<!-- Mirrored from iqonic.design/themes/xray/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jun 2020 08:58:14 GMT -->
</html>