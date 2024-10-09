
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{ $title }}</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/dishub.png') }}" />
    @include('layouts._partials.head')
    @yield('style')

	</head>

	<body id="kt_app_body">
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">

        @yield('content')

				 <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-color: rgb(12, 15, 56);">
					<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">          
							<div class="mb-0 mb-lg-12">
									<img alt="Logo" src="{{ asset('front/images/logo.png') }}" class="h-60px h-lg-50px"/>
							</div>                
							<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="{{ asset('front/images/img.png') }}" alt=""/>                 
							<h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7"> 
									ILTA Service
							</h1> 
							<div class="d-none d-lg-block text-white fs-base text-center">
								Dapatkan Layanan Cloud Terjangkau dengan Kualitas Premium <br> untuk Mendukung Kinerja Bisnis Anda. Solusi Andalan dengan Performa Maksimal!
							</div>
					</div>
				</div>
			</div>
		</div>

    @include('layouts._partials.foot')
    <!--begin::Vendors Javascript(used for this page only)-->
    @yield('script')

	</body>
	<!--end::Body-->
</html>