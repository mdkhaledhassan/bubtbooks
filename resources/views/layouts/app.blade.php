<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | BUBTBOOKS.COM</title>
    <meta name="google-site-verification" content="pXBXsSIxVvSHfj2B-Ba2y7k37x-09zmhnryK-fRvP5M" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">

    <link rel="stylesheet" href="{{ asset('/vendor/owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/owl.carousel/assets/owl.theme.default.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/style.default.css') }}" id="theme-stylesheet">

    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">

    <link rel="shortcut icon" href="/public/img/favicon.png">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
      $(document).ready(function(){
        $('.login-launch-modal').click(function(){
          $('#login-modal').modal({
            backdrop: 'static'
          });
        }); 
      });
    </script>

    <script>
      $(document).ready(function(){
        $('.register-launch-modal').click(function(){
          $('#register-modal').modal({
            backdrop: 'static'
          });
        }); 
      });
    </script>

    <script>
      $(document).ready(function(){
        $('.loginpro-launch-modal').click(function(){
          $('#loginpro-modal').modal({
            backdrop: 'static'
          });
        }); 
      });
    </script>

    <script>
      $(document).ready(function(){
        $('.read-launch-modal').click(function(){
          $('#read-modal').modal({
            backdrop: 'static'
          });
        }); 
      });
    </script>

  </head>
  <body>
      
      <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="104434754752068"
  theme_color="#20cef5">
      </div>

    <header class="header mb-5">

      
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          @foreach(\App\Settings::all()->where('id', '1') as $als)
          <a href="/" class="navbar-brand home"><img src="/img/{{$als->logo}}" class="d-none d-md-inline-block"><span class="sr-only">BUBTBOOKS</span><img src="/img/logo-small.png" alt="BUBTBOOKS" class="d-inline-block d-md-none"><span class="sr-only">BUBTBOOKS</span></a>
          @endforeach
          

            
            <div class="navbar-buttons d-flex justify-content-end">
              <div class="navbar-buttons">

                @guest

                <a data-toggle="collapse" href="#search" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-search"></i></a>

                @if (Route::has('register'))
                <a data-toggle="collapse" href="#navigate" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-user"></i></a>
                @endif
                        @else
                <a data-toggle="collapse" href="#search" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-search"></i></a>
                <a href="/cart" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>


                @if (Auth::user()->is_admin == 0)
                <a href="/userinbox" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-comment"></i>
                  @if(\App\Chat::where('receiverid', Auth::user()->id)->where('is_seen','0')->count() > 0)
                          <span style="color:red">{{ \App\Chat::where('receiverid', Auth::user()->id)->where('is_seen','0')->count() }}</span>
                          @else
                          @endif   
                </a>
                @else
                <a href="/admininbox" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-comment"></i>
                  @if(\App\Chat::where('receiverid', Auth::user()->id)->where('is_seen','0')->count() > 0)
                          <span style="color:red">{{ \App\Chat::where('receiverid', Auth::user()->id)->where('is_seen','0')->count() }}</span>
                          @else 
                          @endif     
                </a>
                @endif



                <a data-toggle="collapse" href="#navigation" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-user"></i></a>

                


                @endguest

          </div>
              <div class="collapse navbar-collapse">

              @guest

      <div id="content">
        <div class="container">
          <div id="blog-listing">
              <div class="pager d-flex justify-content-between">
                <div id="search-not-mobile" class="previous"><a data-toggle="collapse" href="#search" class="btn btn-outline-primary"><i class="fa fa-search"></i></a></div>
                &nbsp;&nbsp;
                <div class="previous"><a href="#" class="btn btn-outline-primary login-launch-modal" data-toggle="modal" data-target="#login-modal">Login</a></div>
                &nbsp;&nbsp;
                @if (Route::has('register'))
                <div class="previous"><a href="#" class="btn btn-outline-primary register-launch-modal" data-toggle="modal" data-target="#register-modal">Register</a></div>
              </div>
          </div>
        </div>
      </div>
              @endif
                        @else

      <div id="content">
        <div class="container">
          <div id="blog-listing">
              <div class="pager d-flex justify-content-between">
                <div id="search-not-mobile" class="previous"><a data-toggle="collapse" href="#search" class="btn btn-outline-primary"><i class="fa fa-search"></i></a></div>
                &nbsp;&nbsp;
                <div class="previous"><a href="/cart" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i>
                  @if(Cart::getContent()->count() > 0)
                  {{ Cart::getContent()->count() }}
                  @else
                  @endif
                </a></div>
                &nbsp;&nbsp;
                @if (Auth::user()->is_admin == 0)
                <div class="previous"><a href="/userinbox" class="btn btn-outline-primary"><i class="fa fa-comment"></i>
                  @if(\App\Chat::where('receiverid', Auth::user()->id)->where('is_seen','0')->count() > 0)
                          <span style="color:red">{{ \App\Chat::where('receiverid', Auth::user()->id)->where('is_seen','0')->count() }}</span>
                          @else
                          @endif   
                </a></div>
                @else
                <div class="previous"><a href="/admininbox" class="btn btn-outline-primary"><i class="fa fa-comment"></i>
                  @if(\App\Chat::where('receiverid', Auth::user()->id)->where('is_seen','0')->count() > 0)
                          <span style="color:red">{{ \App\Chat::where('receiverid', Auth::user()->id)->where('is_seen','0')->count() }}</span>
                          @else 
                          @endif     
                </a></div>
                @endif
                &nbsp;&nbsp;
                <div class="previous dropdown"><a href="#" class="btn btn-outline-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-user"></i></a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if (Auth::user()->is_admin == 0)
                                    <a class="dropdown-item" href="/user">
                                        {{ __('My Account') }}
                                    </a>
                    @else
                                    <a class="dropdown-item" href="/user">
                                        {{ __('My Account') }}
                                    </a>
                                    <a class="dropdown-item" href="/admin">
                                        {{ __('Admin Panel') }}
                                    </a>
                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                </div>



              </div>
          </div>
        </div>
      </div>
            @endguest

        <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Member login</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                  <div class="form-group">
                    <label for="bubtid">BUBT ID</label>
                    <input id="bubtid" type="text" placeholder="bubtid" class="form-control" name="bubtid" class="form-control @error('bubtid') is-invalid @enderror" required autocomplete="bubtid" autofocus>
                    @error('bubtid')
                                   
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" placeholder="password" class="form-control" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                    @error('password')
                                    
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror
                  </div>
                  @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                  <p class="text-center">
                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                  </p>
                </form>
                <p class="text-center text-muted">Don’t have an account? <a href="#" class="register-launch-modal" data-toggle="modal" data-target="#register-modal"><strong>Register Now </strong></a>!</p>
              </div>
            </div>
          </div>
        </div>



        <div id="register-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Member Register</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bubtid">BUBT ID</label>
                    <input id="bubtid" type="text" class="form-control" name="bubtid" value="{{ old('bubtid') }}" required autocomplete="bubtid" autofocus>

                                @error('bubtid')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">

                                @error('email')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="department">Department</label>
                    <select id="department" type="text" class="form-control" name="department" required autocomplete="department">
                      <option value="">Select Department</option>
                      <option value="CSE">CSE</option>
                      <option value="CSIT">CSIT</option>
                      <option value="BBA">BBA</option>
                      <option value="EEE">EEE</option>
                      <option value="LLB">LLB</option>
                      <option value="Civil">Civil</option>
                      <option value="Textile">Textile</option>
                      <option value="English">English</option>
                      <option value="Economics">Economics</option>
                    </select>
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" type="text" class="form-control" name="gender" required autocomplete="gender">
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="intake">Intake</label>
                    <input id="intake" type="intake" class="form-control" name="intake" value="{{ old('intake') }}" class="form-control @error('intake') is-invalid @enderror" required autocomplete="intake">

                                @error('intake')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">

                                @error('password')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="section">Section</label>
                    <input id="section" type="section" class="form-control" name="section" value="{{ old('section') }}" class="form-control @error('section') is-invalid @enderror" required autocomplete="section">

                                @error('section')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password">
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber" autofocus>

                                @error('phonenumber')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                  </div>
                </form>
                <br>
                <p class="text-center text-muted">Already have an account? <a href="#" class="loginpro-launch-modal" data-toggle="modal" data-target="#loginpro-modal"><strong>Login Now </strong></a>!</p>
                </div>
            </div>
          </div>
          </div>


        <div id="loginpro-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Member login</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                  <div class="form-group">
                    <label for="bubtid">BUBT ID</label>
                    <input id="bubtid" type="text" placeholder="bubtid" class="form-control" name="bubtid" class="form-control @error('bubtid') is-invalid @enderror" required autocomplete="bubtid" autofocus>
                    @error('bubtid')
                                   
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" placeholder="password" class="form-control" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                    @error('password')
                                    
                                        <strong>{{ $message }}</strong>
                                   
                                @enderror
                  </div>
                  @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                  <p class="text-center">
                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                  </p>
                </form>
                <p class="text-center text-muted">Don’t have an account? <a href="#" data-toggle="modal" data-target="#register-modal"><strong>Register Now </strong></a>!</p>
              </div>
            </div>
          </div>
        </div>

            </div>
            </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
          <form action="{{ route('search') }}" method="GET" role="search" class="ml-auto">
            <div class="input-group">
              <input type="text" name="query" placeholder="Search by book name, department, course code, author name" class="form-control">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      @guest
      @else
      <div id="navigation" class="collapse navbar navbar-expand-lg">
        <div class="container">
                  <ul class="navbar-nav mr-auto">

                    @if (Auth::user()->is_admin == 0)
                    <li class="nav-item"><a href="/user" class="nav-link">My Account</a></li>
                    @else
                    <li class="nav-item"><a href="/user" class="nav-link">My Account</a></li>
                    <li class="nav-item"><a href="/admin" class="nav-link">Admin Panel</a></li>
                    @endif
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                    </li>

                  </ul>
                </div>
                </div>
        @endguest  
        
        <div id="navigate" class="collapse navbar navbar-expand-lg">
        <div class="container">
                  <ul class="navbar-nav mr-auto">

                    <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>

                  </ul>
        </div>
      </div>
    </header>
            @yield('content')
            <br>
    <div id="footer">
      <div class="container">
        <div class="row">
          @foreach(\App\Settings::all()->where('id', '1') as $als)
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3"><a href="/" class="navbar-brand home"><img src="/img/{{$als->logo}}" class="d-none d-md-inline-block"><span class="sr-only">BUBTBOOKS</span><img src="/img/logo-small.png" alt="BUBTBOOKS" class="d-inline-block d-md-none"><span class="sr-only">BUBTBOOKS</span></a></h4>
            <ul class="list-unstyled">
              <li><i class="fa fa-phone"></i> {{$als->phonenumber}}</li>
              <li><i class="fa fa-envelope"></i> {{$als->email}}</li>
              <li><i class="fa fa-map-marker"></i> {{$als->address}}</li>
            </ul>
            <hr>
            <p class="social"><a href="{{$als->facebook}}" class="facebook external"><i class="fa fa-facebook"></i></a><a href="{{$als->twitter}}" class="twitter external"><i class="fa fa-twitter"></i></a><a href="{{$als->instagram}}" class="instagram external"><i class="fa fa-instagram"></i></a><a href="{{$als->gplus}}" class="gplus external"><i class="fa fa-google-plus"></i></a><a href="mailto:{{$als->mail}}" class="email external"><i class="fa fa-envelope"></i></a><a href="{{$als->github}}" class="github external"><i class="fa fa-github"></i></a></p>
          </div>

          <div class="col-lg-2 col-md-6">
            <br>
            <h2 class="mb-3">About Us</h2>
            <ul class="list-unstyled">
              <li><a href="/notices">Notice</a></li>
              <li><a href="/aboutus">About Us</a></li>
              <li><a href="/contact">Cotact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6">
            <br>
            <h2 class="mb-3">Policies</h2>
            <ul class="list-unstyled">
              <li><a href="/guide">Guide</a></li>
              <li><a href="/terms">Terms of Use</a></li>
              <li><a href="/policy">Privacy Policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6">
            <br>
            <h2 class="mb-3">Users</h2>
            <ul class="list-unstyled">
              <li><a href="/login">Login</a></li>
              <li><a href="/register">Register</a></li>
              <li><a href="/userinbox">Live Chat</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6">
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="DDBoSHnj"></script>

            <div class="fb-page" data-href="https://www.facebook.com/bubtbooks/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bubtbooks/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bubtbooks/">BUBT BOOKS</a></blockquote></div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

        <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-2 mb-lg-0">
            <p class="text-center text-lg-left">© 2020 - 2021 BUBTBOOKS</p>
          </div>
          <div class="col-lg-6">
            <p class="text-center text-lg-right">Developed by <a href="https://facebook.com/khaledhassanreza1/">Khaled Hassan</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>

  </body>
</html>
