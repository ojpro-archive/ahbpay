@include('components.head')
<!-- App Header -->
<div class="appHeader">
    <div class="left">
        <a href="/" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        Transactions
    </div>
    <div class="right">
        <a href="app-notifications.html" class="headerButton">
            <ion-icon class="icon" name="notifications-outline"></ion-icon>
            <span class="badge badge-danger">4</span>
        </a>
    </div>
</div>
<!-- * App Header -->


<!-- App Capsule -->
<div id="appCapsule">

    <!-- Transactions -->
    <div class="section mt-2">
        <div class="transactions">

            @foreach ($transactions as $transaction)
                <!-- item -->
                <a href="app-notification-detail.html" class="item">
                    <div class="detail">
                        <img src="{{ $transaction->by_user->avatar }}" alt="{{ $transaction->by_user->name }}"
                            class="image-block imaged w48">
                        <div>
                            <strong>{{ $transaction->by_user->name }}</strong>
                            <p>{{ $transaction->type == 'send' ? 'sending' : 'withdrawing' }}</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price {{ $transaction->to_user == Auth::id() ? 'text-success' : 'text-danger' }}">
                            {{ $transaction->to_user == Auth::id() ? '+' : '-' }} $
                            {{ $transaction->amount }}
                        </div>
                    </div>
                </a>
                <!-- * item -->
            @endforeach
        </div>
    </div>


</div>
<!-- * App Capsule -->

@include('components.foot')
