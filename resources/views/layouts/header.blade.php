<nav class="navbar-custom-menu navbar navbar-expand-lg m-0">
        <div class="sidebar-toggle-icon" id="sidebarCollapse">
            sidebar toggle<span></span>
        </div>
        <div class="d-flex flex-grow-1">
            <ul class="navbar-nav flex-row align-items-center ml-auto">
                <li class="nav-item dropdown quick-actions">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="typcn typcn-th-large-outline"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" >
                        <div class="nav-grid-row row">
                            <a href="#" class="icon-menu-item col-4">
                                <i class="typcn typcn-cog-outline d-block"></i>
                                <span>Settings</span>
                            </a>
                            <a href="#" class="icon-menu-item col-4">
                                <i class="typcn typcn-group-outline d-block"></i>
                                <span>Users</span>
                            </a>
                            <a href="#" class="icon-menu-item col-4">
                                <i class="typcn typcn-puzzle-outline d-block"></i>
                                <span>Components</span>
                            </a>
                            <a href="#" class="icon-menu-item col-4">
                                <i class="typcn typcn-chart-bar-outline d-block"></i>
                                <span>Profits</span>
                            </a>
                            <a href="#" class="icon-menu-item col-4">
                                <i class="typcn typcn-time d-block"></i>
                                <span>New Event</span>
                            </a>
                            <a href="#" class="icon-menu-item col-4">
                                <i class="typcn typcn-edit d-block"></i>
                                <span>Tasks</span>
                            </a>
                        </div>
                    </div>
                </li>

                @php
                    $notifications = \App\Models\Notification::whereStatus(1)->orderBy('created_at', 'desc')->get();
                    $noti_count = $notifications->count();                    
                @endphp

                <li class="nav-item dropdown dropdown-notifications notification">
                    <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                      <i data-count="{{$noti_count}}" class="typcn typcn-bell notification-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="notification-title">Notifications </h6>
                        <p class="notification-text">You have (<span class="notif-count">{{$noti_count}}</span>) unread notification</p>                      
                        <div class="notification-list">
                            <ul class="dropdown-menu dropdown-notification">
                                
                                @foreach ($notifications as $notification)
                                <a href="{{route('notification.read', $notification->id)}}">
                                    @php
                                        $posted_time = new DateTime($notification->created_at);
                                        $now = new DateTime();
                                        $interval = $posted_time->diff($now);
                                        if($interval->d >= 1){
                                            $time = $interval->d. " days";
                                        }else if($interval->h >= 1){
                                            $time = $interval->h. " hours";
                                        }else if($interval->i >= 2){
                                            $time = $interval->i. " mins";
                                        }else{
                                            $time = "a minute";
                                        }                                       
                                    @endphp 
                                    <li class="notification active">
                                        <div class="media">
                                        <div class="media-left">
                                            <div class="notification_user">
                                            <img src="../dash_asset/dist/img/avatar5.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <strong class="notification-title">{{$notification->content}}</strong>                                           
                                            <div class="notification-meta mt-2">
                                                <small class="timestamp">Project posted about {{$time}} ago. </small>
                                            </div>
                                        </div>
                                        </div>
                                    </li>
                                </a>
                                @endforeach


                            </ul>
                            <div class="dropdown-footer"><a href="#">View All Notifications</a></div>
                        </div>                       
                    </div>
                </li>

                <li class="nav-item dropdown user-menu">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                       
                        <i class="typcn typcn-user-add-outline"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" >
                        <div class="dropdown-header d-sm-none">
                            <a href="#" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="user-header">
                          
                            <h6>{{ Auth::user()->name }}</h6>
                           
                        </div>
                        {{-- <a href="#" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                        <a href="#" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                        <a href="#" class="dropdown-item"><i class="typcn typcn-arrow-shuffle"></i> Activity Logs</a>
                        <a href="#" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a> --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="typcn typcn-key-outline"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        
                    </div>
                </li>
            </ul>
            <div class="nav-clock">
                <div class="time">
                    <span class="time-hours"></span>
                    <span class="time-min"></span>
                    <span class="time-sec"></span>
                </div>
            </div>
        </div>
    </nav>
    <script type="text/javascript">

    </script>


    