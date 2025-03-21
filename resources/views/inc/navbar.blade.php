<nav class="navbar navbar-expand-md navbar-white bg-white border-bottom sticky-top" id="navbar">
    <div class="container">
    <a href="{{URL('/')}}" class="navbar-brand">
        <img src="{{asset('Logo.svg')}}" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          @auth
          <li class="nav-item dropdown dropdown-left">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
            <img class="img-profile rounded-circle" src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : asset('images/user-profile.png') }}" width="40px" hight="40px">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              @role('admin')
              <a class="dropdown-item" href="{{route('account.dashboard')}}"> <i class="fas fa-cogs fa-sm "></i> Dashboard</a>
              @endrole
              @role('author')
              <a class="dropdown-item" href="{{route('account.authorSection')}}"> <i class="fa fa-cogs fa-sm "></i> Author Dashboard </a>
              @endrole
              <a class="dropdown-item" href="{{route('account.messages')}}"> <i class="fas fa-user fa-sm "></i> Message </a>
              <a class="dropdown-item" href="{{route('account.index')}}"> <i class="fas fa-user fa-sm "></i> Profile </a>
              <a class="dropdown-item" href="{{route('account.changePassword')}}"> <i class="fas fa-key fa-sm "></i> Change Password </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('account.logout')}}">
                  <i class="fas fa-sign-out-alt"></i>
                  Logout
                </a>
            </div>
          </li>
                <li class="nav-item dropdown dropdown-left">
                    <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-danger">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="notificationDropdown">
                        <h6 class="dropdown-header">Notifications</h6>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-info-circle fa-sm text-primary"></i> New job posted
                            <span class="small text-gray-500">2 minutes ago</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user-plus fa-sm text-success"></i> New candidate applied
                            <span class="small text-gray-500">1 hour ago</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-check-circle fa-sm text-warning"></i> Profile verified
                            <span class="small text-gray-500">Yesterday</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center small text-gray-500" href="#">View all notifications</a>
                    </div>
                </li>
          @endauth
          @guest
          <a href="/login" class="btn btn-primary">Sign up or Log in</a>
          @endguest
        </ul>
      </div>
    </div>

  </nav>
