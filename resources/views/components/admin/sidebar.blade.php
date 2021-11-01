<div class="sidebar">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
-->
    <div class="sidebar-wrapper container !mr-12">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-normal">
                {{ config('app.name') }}
            </a>
        </div>
        <ul class="nav">
            <li class="active ">
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.transactions') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>Transactions</p>
                </a>
            </li>
            <li>
                <a href="./user.html">
                    <i class="tim-icons icon-single-02"></i>
                    <p>User Profile</p>
                </a>
            </li>
        </ul>
    </div>
</div>
