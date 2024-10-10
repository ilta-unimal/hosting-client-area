
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{ $title }}</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<meta
		name="keywords"
		content="hosting, cloud, service, vps, storage, mqtt, iot, unimal, malikussaleh, informatika"
		/>
		<meta name="author" content="ILTA UNIMAL" />
		<meta name="description" content="Dapatkan Layanan Cloud Terjangkau dengan Kualitas Premium untuk Mendukung Kinerja Bisnis Anda. Solusi Andalan dengan Performa Maksimal!" />
	
		<!-- Open Graph Meta Tags -->
		<meta property="og:url" content="https://ilta-services.tech" />
		<meta property="og:title" content="ILTA Services - Client Area " />
		<meta property="og:type" content="article" />
		<meta
			property="og:description"
			content="Dapatkan Layanan Cloud Terjangkau dengan Kualitas Premium untuk Mendukung Kinerja Bisnis Anda. Solusi Andalan dengan Performa Maksimal!"
		/>
		<meta property="og:locale" content="id_ID" />
	
		<!-- Twitter Card Meta Tags -->
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:title" content="ILTA Services - Client Area " />
		<meta
			name="twitter:description"
			content="Dapatkan Layanan Cloud Terjangkau dengan Kualitas Premium untuk Mendukung Kinerja Bisnis Anda. Solusi Andalan dengan Performa Maksimal!"
		/>
	
		<!-- Additional SEO Meta Tags -->
		<meta name="distribution" content="global" />
		<meta name="revisit-after" content="7 days" />
		<meta name="rating" content="general" />
		<meta name="language" content="Indonesian" />
		<meta name="geo.region" content="ID" />
		<meta name="geo.placename" content="Lhokseumawe" />
	
		<!-- Canonical Tag -->
		<link rel="canonical" href="https://ilta-services.tech" />
		{{-- <link rel="shortcut icon" href="{{ asset('assets/media/logos/dishub.png') }}" /> --}}
		<style>
		.float{
			position:fixed;
			width:60px;
			height:60px;
			bottom:40px;
			right:40px;
			background-color:#25d366;
			color:#FFF;
			border-radius:50px;
			text-align:center;
			font-size:30px;
			box-shadow: 2px 2px 3px #999;
			z-index:100;
		}
		.my-float{
			margin-top:16px;
		}
		</style>

    @include('layouts._partials.head')

	</head>

	<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				
        @include('layouts._partials.topbar')

				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

          @include('layouts._partials.sidebar')
					
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<div class="d-flex flex-column flex-column-fluid">
							<div id="kt_app_content" class="app-content flex-column-fluid bg-light">
								<div id="kt_app_content_container" class="app-container container-fluid">

                  @yield('content')

								</div>
							</div>
						</div>

						@include('layouts._partials.footer')
            
					</div>
				</div>
			</div>
		</div>

		<a href="https://wa.me/6281378065848" class="float" target="_blank">
			<i class="ki-outline ki-whatsapp fs-2hx text-white d-flex justify-content-center align-items-center mt-lg-4 mt-6"></i>
	 	</a>

    @include('layouts._partials.alert')
    @include('layouts._partials.foot')
    
    <!--begin::Vendors Javascript(used for this page only)-->
    @yield('script')

	</body>
	<!--end::Body-->
</html>