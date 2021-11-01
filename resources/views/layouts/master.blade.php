<!-- Head -->
@include('components.head')
<!-- loader -->
@include('components.loader')
<!-- * loader -->

<!-- App Header -->
@include('components.header')
<!-- * App Header -->


<!-- App Capsule -->
<div id="appCapsule">
    @yield('context')
    <br>

    <!-- app footer -->
    @include('components.footer')
    <!-- * app footer -->

</div>
<!-- * App Capsule -->

<!-- App Bottom Menu -->
@include('components.bottom-menu')
<!-- * App Bottom Menu -->

<!-- Side bar -->
@include('components.side-bar')
<!-- * Side bar -->

<!-- Add to Home Action Sheet -->
@include('components.add-pwa')
<!-- * Add to Home Action Sheet -->

<!-- ========= JS Files =========  -->
@include('components.foot')
