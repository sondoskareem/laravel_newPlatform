<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="icon" type="text/css" href="{{asset('app-assets/images/logo-icon.png')}}" type="image/png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{asset('app-assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('app-assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />


    <link href="{{asset('app-assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('app-assets/js/pace.min.js')}}"></script>

	<link rel="stylesheet" href="{{asset('app-assets/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('app-assets/css/icons.css')}}" />
	<link rel="stylesheet" href="{{asset('app-assets/css/app.css')}}" />


	<link href='{{asset('app-assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css')}}'>

    <link href="{{asset('app-assets/plugins/simplebar/css/simplebar.cs')}}s" rel="stylesheet" />
	<link href="{{asset('app-assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('app-assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{asset('app-assets/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
	<link href="{{asset('app-assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
	<style>
        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>
	
	<link rel="stylesheet" href="{{asset('app-assets/css/dark-header.css')}}" />
	<link rel="stylesheet" href="{{asset('app-assets/css/dark-theme.css')}}" />
	<style>
		#map {
			position: relative;
			height: 500px;
			overflow: hidden!important; //important
		}
		#map .gm-style {
			position: absolute;
			width: 100%;
			height: 104%!important;  //that will do the trick
			left: 0;
			top: 0;
		}
		 
		</style>
			<style>
				.scroll-bar {
					max-height: calc(100vh - 100px);
					overflow-y: auto !important;
				}
		
				::-webkit-scrollbar-track {
					box-shadow: inset 0 0 1px #cfcfcf;
					/*border-radius: 5px;*/
				}
		
				::-webkit-scrollbar {
					width: 3px;
					height: 3px;
				}
		
				::-webkit-scrollbar-thumb {
					background: #c1c1c1;
					/*border-radius: 5px;*/
				}
		
				::-webkit-scrollbar-thumb:hover {
					background: #673ab7;
				}
			</style>
		
	@yield('style')
	<style>
		.card-footer, .progress {
			display: none;
		}
	</style>
	<style>

		.rtl-addition{
			text-align: right;
			/* direction:rtl; */
		}
		.rtl-search{
			padding: 0px;
		}
		.padding{
			padding: 0px;
		}
	
		#map {
		height: 800px;
		width: 400%;
		}
	</style>

	
	@if(app()->getLocale() == "ar")
		<style>
		@media screen and (max-width: 1024px )and (min-width: 300px ){
			.nav-container{
				right: -260px;
    			left: 0px;
			}

			.wrapper.toggled .nav-container{
				right: 0px;
			}
		}
			
		</style>
	@endif

	
</head>

<body>

	{{-- <div id="map"></div> --}}


    <div id="app">
	<div class="wrapper" id="toggled" >
        <header class="top-header">
			<nav class="navbar navbar-expand" >
				<div class="sidebar-header">
					<div class="d-none d-lg-flex">
						<img src="assets/images/h4-2-logo.jpg" class="logo-icon-2" alt="" />
					</div>
					<div>
						<h4 class="d-none d-lg-flex logo-text"> {{ config('app.name', 'H4') }}</h4>
						{{-- <img src="app-assets/images/h4-2-logo.jpg" width="80" alt=""> --}}

					</div>
						<a  href="javascript:;" class="toggle-btn ml-lg-auto " id="toggledbuttom" > <i class="bx bx-menu"></i>
						</a>
						
					
				</div>
				<div class="right-topbar ml-auto">
					<ul class="navbar-nav">
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
						<li>
							<ul class="nav-item dropdown">    
								<li class="dropdown dropdown-language nav-item">
								  <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
									  aria-haspopup="true" aria-expanded="false">
									@php
										$lang = LaravelLocalization::getLocalesOrder()
									@endphp 
									{{$lang[LaravelLocalization::getCurrentLocale()]['native'] }}
									<span class="selected-language"></span>
								  </a>
								  <div class="dropdown-menu" aria-labelledby="dropdown-flag">
									@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
									  <a 
										class="dropdown-item"
										rel="alternate" 
										hreflang="{{ $localeCode }}" 
										href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
									  >
										
										  {{ $properties['native'] }}
										
									  </a>
									@endforeach 
								  </div>
								</li>
							  </ul>
							</li>
                    @endguest
					</ul>
				</div>
			</nav>
		</header>

  

    @if(Auth::user())
    @include('include.nav')
    @endif
    <main class="py-4">
        @yield('content')
    </main>
    @include('include.footer')
		<!--                      Dashbourd                        -->
		{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
		
		
		

<script src="{{asset('app-assets/js/jquery.min.js')}}"></script>
<script src="{{asset('app-assets/js/popper.min.js')}}"></script>
<script src="{{asset('app-assets/js/bootstrap.min.js')}}"></script>
<!-- Vector map JavaScript -->
<script src="{{asset('app-assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>

<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-in-mill.js')}}"></script>
<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js')}}"></script>
<script src="{{asset('app-assets/plugins/vectormap/jquery-jvectormap-au-mill.js')}}"></script>
{{-- <script src="{{asset('app-assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script> --}}
<script src="{{asset('app-assets/js/index2.js')}}"></script>
<!-- App JS -->
<script src="{{asset('app-assets/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{asset('app-assets/js/index2.js')}}"></script>
<script src="{{asset('app-assets/js/app.js')}}"></script>

<script src="{{asset('app-assets/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
<script src="{{asset('app-assets/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('app-assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
<script src="{{asset('app-assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
<script>
	$('#fancy-file-upload').FancyFileUpload({
		params: {
			action: 'fileuploader'
		},
		maxfilesize: 1000000
	});
</script>
<script>
	$(document).ready(function () {
		$('#image-uploadify').imageuploadify();
	});
</script>

	<script src="{{asset('app-assets/js/bs-custom-file-input.min.js')}}"></script>
	<script>
		 $(document).ready(function () {
			bsCustomFileInput.init()
		});
	</script>

	<script src="{{asset('app-assets/js/app.js')}}"></script>


	@stack('style')
	@stack('script')

	<script>
	   

		$("#toggledbuttom").click(function(){
			$("#toggled").toggleClass("toggled");
		});
		
	</script>
    <script>
		if($('html')[0].lang == 'ar'){
			
			$("div").addClass("rtl-addition");
			$("html").attr("dir", "rtl");
			$(".right-topbar").addClass("mr-auto");
			$(".right-topbar").removeClass("ml-auto");
			$("nav").addClass("rtl-addition");
		}else{
			$("div").removeClass("rtl-addition");
			$(".right-topbar").addClass("ml-auto");
			$(".right-topbar").removeClass("mr-auto");
		}


		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		
	</script>
    </div>
    </div>


</body>
</html>
