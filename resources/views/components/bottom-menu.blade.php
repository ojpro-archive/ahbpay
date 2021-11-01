<div class="appBottomMenu">
    <a href="{{ route('home') }}" class="item {{ request()->routeIs('home') ? 'active' : ''}}">
        <div class="col">
            <ion-icon name="pie-chart-outline"></ion-icon>
            <strong>Overview</strong>
        </div>
    </a>
    <a href="{{ route('transactions.index') }}" class="item">
        <div class="col">
            <ion-icon name="cash-outline"></ion-icon>
            <strong>Transactions</strong>
        </div>
    </a>
    <a href="{{ route('qrcode') }}" class="item">
        <div class="col">
            <ion-icon name="qr-code-outline"></ion-icon>
            <strong>QRCode</strong>
        </div>
    </a>
    <a href="{{ route('cards.index') }}" class="item">
        <div class="col">
            <ion-icon name="card-outline"></ion-icon>
            <strong>My Cards</strong>
        </div>
    </a>
    <a href="{{ route('settings') }}" class="item {{ request()->routeIs('settings') ? 'active' : ''}}">
        <div class="col">
            <ion-icon name="settings-outline"></ion-icon>
            <strong>Settings</strong>
        </div>
    </a>
</div>
