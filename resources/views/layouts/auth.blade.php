
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
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		{{-- <link rel="shortcut icon" href="{{ asset('assets/media/logos/dishub.png') }}" /> --}}
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