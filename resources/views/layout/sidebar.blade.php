
	<body>

    <div id="wrapper">

        <aside id="sideBar">
            <ul class="main-nav">
                <!-- Your Logo Or Site Name -->
                <li class="nav-brand">
                    <a href="{{route('home')}}"><img src="{{asset('img/logo.png') }}" alt=""></a>
                </li>
                <!-- Search -->
                <li class="main-search">
                    <form action="#">
                        <input type="text" class="form-control search-input" placeholder="Search here...">
                        <i class="fa fa-search"></i>
                    </form>
                </li>
                <li>
                	
                    <a href="#"><i class="fa fa-map"></i> Bootstrap</a>
                </li>
                <li>
                    <a href="{{route('peserta.index')}}"><i class="fa fa-users"></i> Peserta</a>
                </li>
                <li>
                    <a href="{{route('rw.index')}}"> <i class="fa fa-code-fork"></i> RW</a>
                </li>
                <li>
                    <a href="{{route('rt.index')}}"><i class="fa fa-terminal"></i> RT</a>
                </li>
                
                <li>
                    <a href="{{route('lomba.index')}}"><i class="fa fa-fighter-jet"></i> Jenis Lomba</a>
                </li>
                <li>
                    <a href="{{route('pendaftaran.index')}}"><i class="fa fa-user-plus"></i> Pendaftaran</a>
                </li>
                <li>
                    <a href="#">- App Views</a>
                </li>
                <li>
                    <a href="{{route('logout')}}">- Logout</a>
                </li>
                
            </ul>
            <ul class="main-nav-group">
            	<li class="">
                    <a href="#">- Another Menu item</a>
                    
                </li>
                <ul>
                	<li>hahaha</li>
                </ul>
            </ul>


        </aside>
        {{-- menu toggle --}}
        <div class="toggle-atas">
        	<a id="menuToggler" href="#"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
            <a href="{{route('logout')}}" class="pull-right"> <i class="fa fa-sign-out"></i> Logout</a>
        </div>
        {{-- <button style="position: fixed;" id="menuToggler" class="btn btn-primary">Press me to toggle</button> --}}