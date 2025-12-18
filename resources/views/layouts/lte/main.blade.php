<!DOCTYPE html>
<html lang="en">
<head>
    <!--begin::Head-->
    @include('layouts.lte.head')
    <!--end::Head-->
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">

        <!--begin::Navbar-->
        @include('layouts.lte.navbar')
        <!--end::Navbar-->

        <!--begin::Sidebar-->
        @include('layouts.lte.sidebar')
        <!--end::Sidebar-->

        <!--begin::App Main-->
        <main class="app-main">
            @yield('content')
        </main>
        <!--end::App Main-->

        <!--begin::Footer-->
        @include('layouts.lte.footer')
        <!--end::Footer-->

    </div>

    <!--begin::Vendor JS-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" 
    integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" 
    crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha256-whL0tQWoW1n1f8p0+8R7b6pU31e8v5+7+r49pC7p+10=" 
    crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" 
    integrity="sha256-YMa+wAM6QKVyz999odX7lPRxkoYAan8suedu4k2Zur8=" 
    crossorigin="anonymous"></script>
    <!--end::Vendor JS-->

    <!--begin::AdminLTE JS-->
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <!--end::AdminLTE JS-->

    <!--begin::OverlayScrollbars Init-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };

        document.addEventListener('DOMContentLoaded', function () {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined'
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Init-->

    <!--begin::SortableJS-->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
        crossorigin="anonymous"></script>
    <!--end::SortableJS-->

</body>
</html>
