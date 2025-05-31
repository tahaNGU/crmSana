<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a > <img alt="تصویر" src="{{asset("admin/assets/img/logo.jpg")}}" class="header-logo">
        </a>
    </div>
    <div class="sidebar-user">
        <div class="sidebar-user-details">
            @auth
                <div class="user-name">{{Auth::user()->name}}</div>
            @endauth
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="dropdown">
            <a  href=""href="{{route("base")}}" class="nav-link"><i class="fas fa-cog"></i><span>Dashboard</span></a>
        </li>
{{--        @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::SETTING_INDEX))--}}
{{--            <li class="dropdown">--}}
{{--                <a  href=""href="{{route("settings.index")}}" class="nav-link"><i class="fas fa-cog"></i><span>تنظیمات</span></a>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--   f(userCan(\Modules\Permission\Entities\Enums\PermissionName::ROLE_STORE) || userCan(\Modules\Permission\Entities\Enums\PermissionName::ROLE_INDEX))--}}
{{--            <li class="dropdown">--}}
{{--                <a  href="" class="nav-link has-dropdown pointer"><i class="fas fa-user-shield"></i><span>نقش مدیران</span></a>--}}
{{--                <ul class="dropdown-menu {{str_contains(Route::currentRouteName(),'roles') ? 'd-block' : '' }}">--}}
{{--                    @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::ROLE_STORE))--}}
{{--                        <li>--}}
{{--                            <a  href=""href="{{route("roles.create")}}" class="nav-link">جدید</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                    @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::ROLE_INDEX))--}}
{{--                        <li>--}}
{{--                            <a  href=""class="nav-link" href="{{route("roles.index")}}">لیست</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::USER_STORE) || userCan(\Modules\Permission\Entities\Enums\PermissionName::USER_INDEX) || userCan(\Modules\Permission\Entities\Enums\PermissionName::USER_TRASHED) )--}}
{{--            <li class="dropdown">--}}
{{--                <a  href="" class="nav-link has-dropdown pointer"><i class="fas fa-user-edit"></i><span>کاربران</span></a>--}}
{{--                <ul class="dropdown-menu {{str_contains(Route::currentRouteName(),'user') ? 'd-block' : '' }}">--}}
{{--                    @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::USER_STORE))--}}
{{--                        <li>--}}
{{--                            <a  href=""class="nav-link" href="{{route("user.create")}}">جدید</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                    @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::USER_INDEX))--}}
{{--                        <li>--}}
{{--                            <a  href=""class="nav-link" href="{{route("user.index")}}">لیست</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                    @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::USER_TRASHED))--}}
{{--                        <li>--}}
{{--                            <a  href=""class="nav-link" href="{{route("user.trashed")}}">سطل زباله</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endif--}}


{{--        @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::OTP_INDEX))--}}
{{--            <li class="dropdown">--}}
{{--                <a  href=""href="{{route("otp.index")}}" class="nav-link"><i class="fas fa-cog"></i><span>کد یک بار مصرف</span></a>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::EVALUATION_STORE) || userCan(\Modules\Permission\Entities\Enums\PermissionName::EVALUATION_INDEX))--}}
{{--            <li class="dropdown">--}}
{{--                <a  href="" class="nav-link has-dropdown pointer"><i class="fas fa-user-shield"></i><span>عیارسنجی و آزمایش گیری</span></a>--}}
{{--                <ul class="dropdown-menu {{str_contains(Route::currentRouteName(),'evaluation') ? 'd-block' : '' }}">--}}
{{--                    @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::EVALUATION_STORE))--}}
{{--                        <li>--}}
{{--                            <a  href=""href="{{route("evaluations.create")}}" class="nav-link">جدید</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                    @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::EVALUATION_INDEX))--}}
{{--                        <li>--}}
{{--                            <a  href=""class="nav-link" href="{{route("evaluations.index")}}">لیست</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                    @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::EVALUATION_TRASHED))--}}
{{--                        <li>--}}
{{--                            <a  href=""class="nav-link" href="{{route("evaluations.trashed")}}">سطل زباله</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::PRODUCT_CATEGORY_STORE) || userCan(\Modules\Permission\Entities\Enums\PermissionName::PRODUCT_CATEGORY_INDEX))--}}
            <li class="dropdown">
                <a class="nav-link has-dropdown pointer"><i class="fas fa-layer-group"></i><span>Tasks</span></a>
                <ul class="dropdown-menu {{str_contains(Route::currentRouteName(),'task') ? 'd-block' : '' }}">
{{--                    @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::PRODUCT_CATEGORY_STORE))--}}
                        <li >
                            <a  href="{{route("task.create")}}" class="nav-link">New Task</a>
                        </li>
{{--                    @endif--}}
{{--                    @if(userCan(\Modules\Permission\Entities\Enums\PermissionName::PRODUCT_CATEGORY_INDEX))--}}
                        <li>
                            <a  href="{{route("task.index")}}" class="nav-link">Task List</a>
                        </li>
{{--                    @endif--}}
                </ul>
            </li>
{{--        @endif--}}

    </ul>
</aside>
