
	<body>

    <div id="wrapper">

        <aside id="sideBar">
            <ul class="main-nav">
                <!-- Your Logo Or Site Name -->
                <li class="nav-brand">
                    <a href="#"><img src="{{asset('img/logo.png') }}" alt=""></a>
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
                    <a href="#">- Mail Inbox</a>
                </li>
                <li>
                    <a href="#">- Form Controls</a>
                </li>
                <li>
                    <a href="#">- UI Elements</a>
                </li>
                <li>
                    <a href="#">- Calendar / Dates</a>
                </li>
                <li>
                    <a href="#">- Drag / Drop</a>
                </li>
                <li>
                    <a href="#">- App Views</a>
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
        </div>
        {{-- <button style="position: fixed;" id="menuToggler" class="btn btn-primary">Press me to toggle</button> --}}
