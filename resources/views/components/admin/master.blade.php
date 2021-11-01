<!DOCTYPE html>
<html lang="en">
@include('components.admin.head')

<body class="">
    <div class="wrapper">

        @include('components.admin.sidebar')
        @include('components.admin.search_model')
        @include('components.admin.nav')

        <div class="main-panel">
            <div class="content">
                @yield('context')

            </div>

        </div>
    </div>

    </div>
    {{-- @include('components.admin.theme_plugin') --}}
    @include('components.admin.footer')

</body>

</html>
