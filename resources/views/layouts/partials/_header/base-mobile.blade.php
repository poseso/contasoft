<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile kt-header-mobile--fixed">
	<div class="kt-header-mobile__logo">
		<a href="{{ route('admin.dashboard') }}">
			<img width="150" alt="Logo" src="{{ asset('media/logos/contasoft-white.svg') }}" />
		</a>
	</div>

	<div class="kt-header-mobile__toolbar">
		<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span>
        </button>

		<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler">
            <span></span>
        </button>

		<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler">
            <i class="flaticon-more"></i>
        </button>
	</div>
</div>
<!-- end:: Header Mobile -->
