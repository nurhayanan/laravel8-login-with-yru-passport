<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin/dashboard" class="nav-link"><i class="fas fa-home"></i></a>
    </li>
    </ul>
 
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      
      @guest
                                @php
                                    $http_build_query = http_build_query([
                                        'client_id' => env('OAUTH_CLIENT_ID'),
                                        'redirect_uri' => env('OAUTH_CLIENT_REDIRECT_URI'),
                                        'response_type' => 'code',
                                        'scope' => '*',
                                    ]);
                                    $URI = 'https://passport.yru.ac.th/oauth/authorize?' . $http_build_query;
                                @endphp
                                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 padding">
                                    <a href="{{ $URI }}" class="button">
                                        <span>เข้าสู่ระบบ</span>
                                    </a>
                                </div>
                            @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('auth.logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
  </ul>
  </nav>
  <!-- /.navbar -->