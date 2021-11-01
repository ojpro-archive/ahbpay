<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
            <ion-icon name="menu-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle flex flex-nowrap items-center gap-1">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="logo">
        <span class="text-xl font-bold">{{ config('app.name', 'AHBPAY') }}</span>
    </div>
    <div class="right">
        <a href="app-notifications.html" class="headerButton">
            <ion-icon class="icon" name="notifications-outline"></ion-icon>
            <span class="badge badge-danger">4</span>
        </a>
        <a href="{{ route('settings') }}" class="headerButton">
            <img src="{{ Auth::user()->avatar }}" alt="image" class="imaged !w-8 !h-8 ">
            <span class="badge badge-danger">6</span>
        </a>
    </div>
</div>
