
 <div class="nav-container"  >
    <div class="mobile-topbar-header"  >
        <div class="">
            <img src="app-/images/logo-icon.png" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Stage</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto toggledbuttom" > <i class="bx bx-menu"  ></i>
        </a>
    </div>

    <nav class="topbar-nav">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{route('dashboard')}}" class="has-arrow">
                    <div class="parent-icon icon-color-7"><i class='bx bx-briefcase-alt'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Dashboard')}}</div>
                </a>
            </li>

            {{-- @if(auth()->user()->hasRole('admin')) --}}
            <li>
                <a href="{{route('Employees.index')}}" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Employees')}}</div>
                </a>
            </li>
            {{-- @endif --}}
            
             {{-- @if(auth()->user()->hasRole('admin')) --}}
            <li>
                <a href="{{route('Coaches.index')}}" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Coaches')}}</div>
                </a>
            </li>

            <li>
                <a href="{{route('Courses.index' , auth()->user()->id)}}" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Courses')}}</div>
                </a>
            </li>

            <li>
                <a href="{{route('Category.index' ,['type' =>'store'])}}" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Category')}}</div>
                </a>
            </li>
            
            <li>
                <a href="{{route('Products.index')}}" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Products')}}</div>
                </a>
            </li>

            <li>
                <a href="{{route('Order.index')}}" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Orders')}}</div>
                </a>
            </li>

            {{-- @endif --}}
            {{-- <li>
                <a href="{{route('Courses.index')}}" class="has-arrow">
                    <div class="parent-icon icon-color-11"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Courses')}}</div>
                </a>
            </li> --}}

            @if(auth()->user()->isAbleTo('users-read'))
            <li>
                <a href="{{route('Sections.index')}}" class="has-arrow">
                    <div class="parent-icon icon-color-5"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Sections')}}</div>
                </a>
            </li>
            @endif

            @if(auth()->user()->isAbleTo('users-read'))
            <li>
                <a href="{{route('Shops.index')}}" class="has-arrow">
                    <div class="parent-icon icon-color-5"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Shops')}}</div>
                </a>
            </li>
            @endif

            @if(auth()->user()->isAbleTo('users-read'))
            <li>
                <a href="{{route('Bills.index')}}" class="has-arrow">
                    <div class="parent-icon icon-color-5"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Bills')}}</div>
                </a>
            </li>
            @endif
            
            @if(auth()->user()->isAbleTo('users-read'))
            <li>
                <a href="{{route('Users.index')}}" class="has-arrow">
                    <div class="parent-icon icon-color-2"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Users')}}</div>
                </a>
            </li>
            @endif

           

            <li>
                <a class="has-arrow" href="#">
                    <div class="parent-icon icon-color-3"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">{{__('dashboard.Others')}}</div>
                </a> 
                <ul>
                    @if(auth()->user()->isAbleTo('complaints-read'))
                    <li> <a href="{{route('Complaints.index')}}"><i class="bx bx-right-arrow-alt"></i>{{__('dashboard.Complaints')}}</a>
                    </li>
                    @endif
                     
                    @if(auth()->user()->isAbleTo('points-read'))
                    <li> <a href="{{route('points.index')}}"><i class="bx bx-right-arrow-alt"></i>{{__('dashboard.points')}}</a>
                    </li>
                    @endif
                     
                    @if(auth()->user()->isAbleTo('license-read'))
                    <li> <a href="{{route('Licenses.index')}}"><i class="bx bx-right-arrow-alt"></i>{{__('dashboard.Licenses')}}</a>
                    </li>
                    @endif
                        
                    @if(auth()->user()->isAbleTo('banners-read'))
                    <li> <a href="{{route('Banners.index')}}"><i class="bx bx-right-arrow-alt"></i>{{__('dashboard.Banners')}}</a>
                    </li>
                    @endif
                    
                    @if(auth()->user()->isAbleTo('notifications-read'))
                    <li> <a href="{{route('Notification.index')}}"><i class="bx bx-right-arrow-alt"></i>{{__('dashboard.Notification')}}</a>
                    </li>
                    @endif
                    
                    @if(auth()->user()->isAbleTo('news-read'))
                    <li> <a href="{{route('News.index')}}"><i class="bx bx-right-arrow-alt"></i>{{__('dashboard.News')}}</a>
                    </li>
                    @endif
                    
                    @if(auth()->user()->isAbleTo('socials-read'))
                    <li> <a href="{{route('Social.index')}}"><i class="bx bx-right-arrow-alt"></i>{{__('dashboard.social')}}</a>
                    </li>
                    @endif
                </ul> 
            </li> 

        </ul>
    </nav>
 </div>

 @push('script')
 <script>

       $(".toggledbuttom").click(function(){
           $("#toggled").toggleClass("toggled");
       });
   
</script>
@endpush





