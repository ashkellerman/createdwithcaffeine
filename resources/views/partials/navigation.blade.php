<nav class="nav has-shadow" id="top">
  <div class="nav-left">
    <a class="nav-item is-brand" href="{{ url('/home') }}">
          <span class="icon">
              <i class="ion-coffee"></i>
          </span>
        Created With Caffeine
    </a>

  </div>

  <div class="nav-center">
  </div>

  <span id="nav-toggle" class="nav-toggle">
    <span></span>
    <span></span>
    <span></span>
  </span>

  <div id="nav-menu" class="nav-menu pull-right">
    @if (Auth::guest())
      <span class="nav-item">
        <a class="button is-primary" href="{{ url('login') }}">
            <span class="icon">
                <i class="ion-log-in"></i>
            </span>
            <span>Login</span>
        </a>
      </span>
      <span class="nav-item">
        <a href="{{ url('register') }}" class="button is-primary">
            <span class="icon">
                <i class="ion-person-add"></i>
            </span>
            <span>Sign Up</span>
        </a>
      </span>
      @else
        <span class="nav-item">
          <a class="button is-primary" href="{{ url('home') }}">
              <span class="icon">
                  <i class="ion-earth"></i>
              </span>
              <span>Home</span>
          </a>
        </span>
        <span class="nav-item">
          <a class="button is-primary" href="{{ url('profile') }}">
              <span class="icon">
                  <i class="ion-person"></i>
              </span>
              <span>Profile</span>
          </a>
        </span>
        @if(Auth::user()->isAdmin == '1')
           <span class="nav-item">
             <a href="{{ url('/admin') }}" class="button is-primary">
                 <span class="icon">
                     <i class="ion-wand"></i>
                 </span>
                 Administrator
             </a>
           </span>
         @endif
        <span class="nav-item">
          <a class="button is-primary" href="{{ url('settings') }}">
              <span class="icon">
                  <i class="ion-ios-gear-outline"></i>
              </span>
              <span>Settings</span>
          </a>
        </span>
         <span class="nav-item">
           <a class="button is-primary" href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" >
               <span class="icon">
                   <i class="ion-log-out"></i>
               </span>
               Logout
           </a>
         </span>
      @endif
  </div>

  <div class="nav-right nav-menu">
    @if (Auth::guest())
      <span class="nav-item">
      <a class="button is-primary" href="{{ url('login') }}">
          <span class="icon">
              <i class="ion-log-in"></i>
          </span>
          <span>Login</span>
      </a>
      </span>
      <span class="nav-item">
        <a href="{{ url('register') }}" class="button is-primary">
            <span class="icon">
                <i class="ion-person-add"></i>
            </span>
            <span>Sign Up</span>
        </a>
      </span>
      @else
      <span class="nav-item pull-right">
      @if (Request::is('admin/*') || Request::is('admin'))
        <div style="padding-right: 5px;">
          <a href="{{ url('home') }}" class="button is-primary">
              <span class="icon">
                  <i class="ion-ios-arrow-back"></i>
              </span>
              <span>Back to frontend</span>
          </a>
        </div>
      @endif

      <div class="dropdown pull-right">
          <a href="javascript:void(0)" class="button is-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon">
                    <i class="ion-navicon"></i>
              </span>
              <span>{{ Auth::user()->name }}</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dLabel">
            <a class="dropdown-item" href="{{ url('home') }}">
              <span class="icon">
                  <i class="ion-earth"></i>
              </span>
              <span>
                Home
              </span>
            </a>
            <a class="dropdown-item" href="{{ url('profile') }}">
              <span class="icon">
                  <i class="ion-person"></i>
              </span>
              <span>
                Profile
              </span>
            </a>

            @if(Auth::user()->isAdmin == '1')
              <a class="dropdown-item" href="{{ url('/admin') }}">
                <span class="icon">
                    <i class="ion-wand"></i>
                </span>
                <span>
                  Administrator
                </span>
              </a>
            @endif

            <a class="dropdown-item" href="{{ url('settings') }}">
              <span class="icon">
                  <i class="ion-ios-gear-outline"></i>
              </span>
              <span>
                Settings
              </span>
            </a>
            <a class="dropdown-item" href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" class="button is-outlined">
                <span class="icon">
                    <i class="ion-log-out"></i>
                </span>
                <span>
                  Logout
                </span>
            </a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          </div>
        </div>
      </span>
    @endif
  </div>
</nav>
