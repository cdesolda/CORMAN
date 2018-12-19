<nav id="header" class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 fixed-header navbar navbar-dark navbar-expand-lg navbar-expand-xl">
    <!-- Navbar content -->
    <div class="brand-div col-lg-4 col-md-4 col-sm-8 col-8 col-xl-4">
        <a href="{{ route('users.index') }}">
            <img src="{{ asset('images/logo_corman.png') }}" height="50" width="100" alt="CORMAN Logo" />
        </a>
    </div>
<!--    <form class="form-inline order-lg-2 order-md-2 order-sm-3 order-3 my-lg-0 col-lg-5 col-md-6 col-sm-12 col-xl-4" action="{{ '/' . Request::segments()[0] . '?search=' }}" method="get">
        <input class="form-control mr-sm-2 col-xl-8 col-lg-8 col-md-6" type="search" placeholder="Search" aria-label="Search">
        <button id="searchBox" class="btn btn-outline my-2 my-sm-0" type="submit">Search</button>
    </form>-->
    <div class="button-div order-sm-2 order-2">
        <button id="buttonMenu" class="navbar-toggler order-sm-2 order-2" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="col-xl-4 col-lg-3 order-lg-3 order-md-3 order-sm-2 col-sm-12 collapse navbar-collapse order-2" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <p>
                {{ auth()->user()->first_name }}
            </p>
            @if(isset(auth()->user()->picture_path))
                <a id="menuIcon" href="{{ route('users.edit', ['id'=>Auth::user()->id]) }}">
                    <img src="{{ url(auth()->user()->picture_path) }}" width="50" height="50" alt="User Picture">
                    <span class="sr-only">(current)</span>
                </a>
                @else
                <a id="menuIcon" class="nav-item nav-link fa fa-user-circle fa-2x" href="{{ route('users.edit', ['id'=>Auth::user()->id]) }}">
                    <span class="sr-only">(current)</span>
                </a>
            @endif
            <a href="{{ url('chat') }}" id="menuIcon" role="button" aria-expanded="false">
                <span class="nav-item nav-link fa fa-envelope fa-2x" style="padding: 8px 0px 8px 8px"></span>
                <span class="badge" style="border: 1px solid cornflowerblue; border-radius: 10px;">
                    <span id="notification_chat"></span>
                </span>
            </a>
            <a href="#" id="menuIcon" data-toggle="modal" data-target="#modalNotification" role="button" aria-expanded="false">
                <span class="nav-item nav-link fa fa-bell fa-2x" style="padding: 8px 0px 8px 8px"></span>
                <span class="badge" style="border: 1px solid cornflowerblue; border-radius: 10px;">{{ count(auth()->user()->unreadNotifications) }}</span>
            </a>
            <!-- Hack for laravel due to HTTP post type request-->
            <a id="menuIcon" class="nav-item nav-link fa fa-sign-out fa-2x" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit()"></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</nav>
<div id="breadcrumb" class="breadcrumb order-sm-4 order-lg-4 order-4 col-lg-12">
    <li class="breadcrumb-item">
        <a href="{{ route('users.index') }}">Dashboard</a>
    </li>
    @for($i = 1; $i <= count(Request::segments()); $i++)
        @if(Request::segment($i) != 'users' && !is_numeric(Request::segment($i)))
            <li class="breadcrumb-item">
                <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true))) }}">
                    @if(ucfirst(Request::segment($i)) == 'Groups')
                        {{ 'Communities' }}
                    @else
                        {{ ucfirst(Request::segment($i)) }}
                    @endif
                </a>
            </li>
        @endif
    @endfor
</div>
<!-- MODAL NOTIFICATIONS -->
<div class="modal fade" id="modalNotification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Notifications</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                @foreach(auth()->user()->unreadNotifications as $notification)
                    @if($notification->type == 'App\Notifications\GroupNotification')
                        @include('Layout.notification.groupNotification')
                        <hr>
                        @elseif($notification->type == 'App\Notifications\ResearchGroupNotification')
                        @include('Layout.notification.researchGroupNotification')
                        <hr>
                        @elseif($notification->type == 'App\Notifications\JoinResearchGroupNotification')
                        @include('Layout.notification.joinResearchGroupNotification')
                        <hr>
                        @elseif($notification->type == 'App\Notifications\PostNotification')
                        @include('Layout.notification.postNotification')
                        <hr>
                        @elseif($notification->type == 'App\Notifications\CommentNotification')
                        @include('Layout.notification.commentNotification')
                        <hr>
                        @elseif($notification->type == 'App\Notifications\PublicationNotification')
                        @include('Layout.notification.publicationNotification')
                        <hr>
                        @else
                        <a href="#">No unread notifications</a>
                    @endif
                @endforeach
                @if(count(auth()->user()->unreadNotifications) == 0)
                    <a href="#">No unread notifications</a>
                @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function () {
        show_notifications_chat();
    };
</script>
<script type="text/javascript">
    function show_notifications_chat() {
        var url2 = '{{ URL::to('notifications_chat') }}';

        $.ajax({

            type: 'get',
            url: url2,
            success: function (data) {
                console.log(data);
                var data1 = data.length;
                $('#notification_chat').html(data1);
            }

        });

    }
</script>