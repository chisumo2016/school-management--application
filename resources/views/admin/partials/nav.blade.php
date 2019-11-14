<!--User Avatar Start-->
<img class="avatar" src="@if(Auth::user()->avatar) {{ asset('/') . '/'  . $user->avatar }} @else {{ asset('/') }}/admin/assets/images/avatar.png  @endif" alt="Avatar">


<!--User Avatar Start-->

<!--Main Menu Start-->
<nav class="navbar navbar-expand-lg menu-bg">
    <!--    <a class="navbar-brand" href="#">LOGO</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mobile-menu-icon fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Student
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class=""><a class="dropdown-item" href="form.html">Registration</a></li>
                    <li class=""><a class="dropdown-item" href="table.html">Batch Wise List</a></li>
                    <li class=""><a class="dropdown-item" href="#">Class Wise List</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('photo-gallery') }}">Gallery</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Setting
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">School</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('add-school') }}" class="dropdown-item">Add School</a></li>
                            <li><a href="{{ route('school-list') }}" class="dropdown-item">School List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Class</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('add-class') }}" class="dropdown-item">Add Class</a></li>
                            <li><a href="{{ route('class-list') }}" class="dropdown-item">Class List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Batch</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('add-batch') }}" class="dropdown-item">Add Batch</a></li>
                            <li><a href="{{ route('batch-list') }}" class="dropdown-item">Batch List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Slider</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('add-slider') }}" class="dropdown-item">Add Slider</a></li>
                            <li><a href="{{ route('manage-slider') }}" class="dropdown-item">Manage Slide</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">General</a>
                        <ul class="dropdown-menu">
                            @if(!isset($header))
                                <li><a href="{{ route('add-header-footer') }}" class="dropdown-item">Add Header & Footer</a></li>
                            @endif
                            @if(isset($header))
                                <li><a href="{{ route('manager-header-footer',['id' => $header->id]) }}" class="dropdown-item">Manage Header & Footer</a></li>
                             @endif
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">User</a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->role =='Admin')
                                <li><a href="{{ route('user-register') }}" class="dropdown-item">Add user</a></li>
                                <li><a href="{{ route('user-list') }}" class="dropdown-item">User List</a></li>
                            @endif
                            {{--  user profile    --}}
                             <li><a href="{{ route('user-profile', ['userId'=>Auth::user()->id]) }}" class="dropdown-item">profile</a></li>

                        </ul>
                    </li>

                </ul>
            </li>
        </ul>

{{--        <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="#">Logout</a>--}}
        <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="{{ route('logout') }}"
           onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


    </div>
</nav>
