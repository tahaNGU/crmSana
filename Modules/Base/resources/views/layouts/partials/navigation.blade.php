<div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                <i data-feather="align-justify"></i></a></li>
        <li>
            <a href="#" class="nav-link nav-link-lg fullscreen-btn"><i data-feather="maximize"></i></a>
        </li>

    </ul>
</div>

<ul class="navbar-nav navbar-right">

{{--    <li class="dropdown dropdown-list-toggle">--}}
{{--        <a href="#" data-toggle="dropdown"--}}
{{--           class="nav-link nav-link-lg message-toggle"><i data-feather="bell"></i>--}}
{{--            @if(notificationAlert()->count())--}}
{{--                <span class="badge headerBadge1">{{notificationAlert()->count()}}</span>--}}
{{--            @endif--}}
{{--        </a>--}}
{{--        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">--}}
{{--            <div class="dropdown-header">--}}
{{--                پیام ها--}}
{{--            </div>--}}
{{--            @if(notificationAlert()->count())--}}
{{--                <div class="dropdown-list-content dropdown-list-message">--}}
{{--                    @foreach(notificationAlert() as $item)--}}
{{--                        <a href="{{route("v1.admin.notifications.show",['notification'=>$item['id']])}}"--}}
{{--                           class="dropdown-item">--}}
{{--                    <span class="dropdown-item-icon bg-primary text-white m-1">--}}
{{--                        <i class="fas fa-file-alt"></i>--}}
{{--                    </span>--}}
{{--                            <span class="dropdown-item-desc">--}}
{{--                        <span class="message-user">{{$item->title}}</span>--}}
{{--                        <span class="time">{{$item->agoDateConvert()}}</span>--}}
{{--                    </span>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <div class="dropdown-footer text-center">--}}
{{--                    <a href="{{route("v1.admin.notification.list")}}">مشاهده همه پیام ها<i--}}
{{--                            class="fas fa-chevron-left"></i></a>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <div class="alert alert-danger">پیام خوانده نشده یافت نشد</div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </li>--}}

{{--    <li class="dropdown dropdown-list-toggle">--}}
{{--        <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="mail"></i>--}}
{{--            @if(ticketAlert()->count())--}}
{{--                <span class="badge headerBadge2">{{ticketAlert()->count()}} </span>--}}
{{--            @endif--}}
{{--        </a>--}}
{{--        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">--}}
{{--            <div class="dropdown-header">--}}
{{--                تیکت--}}
{{--            </div>--}}
{{--            @if(ticketAlert()->count())--}}
{{--                <div class="dropdown-list-content dropdown-list-icons">--}}
{{--                    @foreach(ticketAlert() as $item)--}}
{{--                        <a href="{{route("v1.admin.tickets.show",['ticket'=>$item['id']])}}"--}}
{{--                           class="dropdown-item dropdown-item-unread">--}}
{{--                            @if(authUser()->isSuperAdminOrAdmin())--}}
{{--                                <img class="ml-2 rounded-circle" width="40px" height="40px"--}}
{{--                                     src="{{asset("admin/assets/img/support.png")}}">--}}
{{--                            @else--}}
{{--                                <img class="ml-2 rounded-circle" width="40px" height="40px"--}}
{{--                                     src="{{asset("admin/assets/img/support1.png")}}">--}}
{{--                            @endif--}}
{{--                            <span class="dropdown-item-desc">{{$item->title}}--}}
{{--                        <span class="time">{{$item->agoDateConvert()}}</span>--}}
{{--                    </span>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <div class="dropdown-footer text-center">--}}
{{--                    <a href="{{route("v1.admin.tickets.index")}}">مشاهده همه تیکت ها<i class="fas fa-chevron-left"></i></a>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <div class="alert alert-danger">تیکت درجریان یافت نشد</div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </li>--}}
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="تصویر" src="{{asset("assets/img/user.png")}}" class="user-img-radious-style">
            <span class="d-sm-none d-lg-inline-block"></span></a>
        <div class="dropdown-menu dropdown-menu-right pullDown">
            <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger"> <i
                    class="fas fa-sign-out-alt"></i>
                خروج
            </a>
        </div>
    </li>
</ul>
