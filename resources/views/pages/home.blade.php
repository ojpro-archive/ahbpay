@extends('layouts.master')
@section('context')
    <!-- Wallet Card -->

    <div class="section wallet-card-section pt-1">
        <div class="wallet-card">
            <!-- Balance -->
            <div class="balance">
                <div class="left">
                    <span class="title">{{ __('global.total_balance') }}</span>
                    <h1 class="total">$ {{ Auth::user()->balance }}</h1>
                </div>
                <div class="right">
                    <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#depositActionSheet">
                        <ion-icon name="add-outline"></ion-icon>
                    </a>
                </div>
            </div>
            <!-- * Balance -->
            <!-- Wallet Footer -->
            <div class="wallet-footer">
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawActionSheet">
                        <div class="icon-wrapper bg-danger">
                            <ion-icon name="arrow-down-outline"></ion-icon>
                        </div>
                        <strong>Withdraw</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#sendActionSheet">
                        <div class="icon-wrapper">
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </div>
                        <strong>Send</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="{{ route('cards.index') }}">
                        <div class="icon-wrapper bg-success">
                            <ion-icon name="card-outline"></ion-icon>
                        </div>
                        <strong>Cards</strong>
                    </a>
                </div>
                <div class="item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exchangeActionSheet">
                        <div class="icon-wrapper bg-warning">
                            <ion-icon name="swap-vertical"></ion-icon>
                        </div>
                        <strong>Exchange</strong>
                    </a>
                </div>

            </div>
            <!-- * Wallet Footer -->
        </div>
    </div>
    <!-- Wallet Card -->

    <!-- Deposit Action Sheet -->
    <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Balance</h5>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form action="{{ route('transactions.store') }}" method="POST">
                            @csrf
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account1">From</label>
                                    <select class="form-control custom-select" id="account1">
                                        <option value="0">Savings (*** 5019)</option>
                                        <option value="1">Investment (*** 6212)</option>
                                        <option value="2">Mortgage (*** 5021)</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="disposit">
                            <div class="form-group basic">
                                <label class="label">Enter Amount</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addona1">$</span>
                                    <input type="text" class="form-control" placeholder="Enter an amount" value="100" name="disposit_amount">
                                </div>
                            </div>


                            <div class="form-group basic">
                                <button type="submit" class="btn btn-primary btn-block btn-lg" data-bs-dismiss="modal"
                                    id="disposit">Deposit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Deposit Action Sheet -->

    <!-- Withdraw Action Sheet -->
    <div class="modal fade action-sheet" id="withdrawActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Withdraw Money</h5>
                    <p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </p>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form action="{{ route('transactions.store') }}" method="POST">
                            @csrf
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account2d">From</label>
                                    <select class="form-control custom-select" id="account2d">
                                        <option value="0">Savings (*** 5019)</option>
                                        <option value="1">Investment (*** 6212)</option>
                                        <option value="2">Mortgage (*** 5021)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="text11d">To</label>
                                    <input type="text" class="form-control" id="text11d" placeholder="Enter IBAN"
                                        name="withdraw_to_iban">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <input type="hidden" name="type" value="withdraw">

                            <div class="form-group basic">
                                <label class="label">Enter Amount</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addonb1">$</span>
                                    <input type="number" class="form-control" placeholder="Enter an amount" value="100"
                                        name="withdraw_amount">
                                </div>
                            </div>

                            <div class="form-group basic">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"
                                    data-bs-dismiss="modal">Withdraw</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Withdraw Action Sheet -->

    <!-- Send Action Sheet -->
    <div class="modal fade action-sheet" id="sendActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Money</h5>
                    <p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </p>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form action="{{ route('transactions.store') }}" method="POST">
                            @csrf
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="account2">From</label>
                                    <select class="form-control custom-select" id="account2">
                                        <option value="0">Savings (*** 5019)</option>
                                        <option value="1">Investment (*** 6212)</option>
                                        <option value="2">Mortgage (*** 5021)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="text11">To</label>
                                    <input type="number" class="form-control" id="text11" placeholder="Enter bank ID"
                                        name="send_to_account">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="send">
                            <div class="form-group basic">
                                <label class="label">Enter Amount</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                    <input type="text" class="form-control" placeholder="Enter an amount" value="100"
                                        name="send_amount">
                                </div>
                            </div>

                            <div class="form-group basic">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"
                                    data-bs-dismiss="modal">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Send Action Sheet -->

    <!-- Exchange Action Sheet -->
    <div class="modal fade action-sheet" id="exchangeActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Exchange Money</h5>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label" for="currency1">From</label>
                                            <select class="form-control custom-select" id="currency1">
                                                <option value="1">USD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label" for="currency2">To</label>
                                            <select class="form-control custom-select" id="currency2">
                                                <option value="1">AED</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group basic">
                                <label class="label">Enter Amount</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon2">$</span>
                                    <input type="text" class="form-control" placeholder="Enter an amount">
                                </div>
                            </div>

                            <div class="form-group basic">
                                <label class="label">You will get</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" placeholder="Enter an amount" disabled>
                                </div>
                            </div>



                            <div class="form-group basic">
                                <button type="button" class="btn btn-primary btn-block btn-lg"
                                    data-bs-dismiss="modal">Exchange</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Exchange Action Sheet -->

    <!-- Stats -->
    <div class="section">
        <div class="row mt-2">
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">Income</div>
                    <div class="value text-success">$ {{ $income }}</div>
                </div>
            </div>
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">Expenses</div>
                    <div class="value text-danger">$ {{ $expenses }}</div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">Total Bills</div>
                    <div class="value">$ 53.25</div>
                </div>
            </div>
            <div class="col-6">
                <div class="stat-box">
                    <div class="title">Savings</div>
                    <div class="value">$ 120.99</div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Stats -->

    <!-- Transactions -->
    <div class="section mt-4">
        <div class="section-heading">
            <h2 class="title">Transactions</h2>
            <a href="{{ route('transactions.index') }}" class="link">View All</a>
        </div>
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
    <!-- * Transactions -->

    <!-- my cards -->
    <div class="section full mt-4">
        <div class="section-heading padding">
            <h2 class="title">My Cards</h2>
            <a href="{{ route('cards.index') }}" class="link">View All</a>
        </div>

        <!-- carousel single -->
        <div class="carousel-single splide">
            <div class="splide__track">
                <ul class="splide__list">

                    <li class="splide__slide">
                        <!-- card block -->
                        <div class="card-block bg-dark">
                            <div class="card-main">
                                <div class="card-button dropdown">
                                    <button type="button" class="btn btn-link btn-icon" data-bs-toggle="dropdown">
                                        <ion-icon name="ellipsis-horizontal"></ion-icon>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">
                                            <ion-icon name="pencil-outline"></ion-icon>Edit
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <ion-icon name="close-outline"></ion-icon>Remove
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                                        </a>
                                    </div>
                                </div>
                                <div class="balance">
                                    <span class="label">BALANCE</span>
                                    <h1 class="title">$ 1,256,90</h1>
                                </div>
                                <div class="in">
                                    <div class="card-number">
                                        <span class="label">Card Number</span>
                                        •••• 9905
                                    </div>
                                    <div class="bottom">
                                        <div class="card-expiry">
                                            <span class="label">Expiry</span>
                                            12 / 25
                                        </div>
                                        <div class="card-ccv">
                                            <span class="label">CCV</span>
                                            553
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- * card block -->
                    </li>

                    <li class="splide__slide">
                        <!-- card block -->
                        <div class="card-block bg-secondary">
                            <div class="card-main">
                                <div class="card-button dropdown">
                                    <button type="button" class="btn btn-link btn-icon" data-bs-toggle="dropdown">
                                        <ion-icon name="ellipsis-horizontal"></ion-icon>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">
                                            <ion-icon name="pencil-outline"></ion-icon>Edit
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <ion-icon name="close-outline"></ion-icon>Remove
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <ion-icon name="arrow-up-circle-outline"></ion-icon>Upgrade
                                        </a>
                                    </div>
                                </div>
                                <div class="balance">
                                    <span class="label">BALANCE</span>
                                    <h1 class="title">$ 1,256,90</h1>
                                </div>
                                <div class="in">
                                    <div class="card-number">
                                        <span class="label">Card Number</span>
                                        •••• 9905
                                    </div>
                                    <div class="bottom">
                                        <div class="card-expiry">
                                            <span class="label">Expiry</span>
                                            12 / 25
                                        </div>
                                        <div class="card-ccv">
                                            <span class="label">CCV</span>
                                            553
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- * card block -->
                    </li>

                </ul>
            </div>
        </div>
        <!-- * carousel single -->

    </div>
    <!-- * my cards -->

    <!-- Send Money -->
    <div class="section full mt-4">
        <div class="section-heading padding">
            <h2 class="title">Send Money</h2>
            <a href="#" class="link">Add New</a>
        </div>
        <!-- carousel small -->
        <div class="carousel-small splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <a href="#">
                            <div class="user-card">
                                <img src="{{ asset('img/sample/avatar/avatar2.jpg') }}" alt="img"
                                    class="imaged w-100">
                                <strong>Elwin</strong>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- * carousel small -->
    </div>
    <!-- * Send Money -->

    <!-- Monthly Bills -->
    <div class="section full mt-4">
        <div class="section-heading padding">
            <h2 class="title">Monthly Bills</h2>
            <a href="app-bills.html" class="link">View All</a>
        </div>
        <!-- carousel multiple -->
        <div class="carousel-multiple splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="bill-box">
                            <div class="img-wrapper">
                                <img src="{{ asset('img/sample/brand/1.jpg') }}" alt="img"
                                    class="image-block imaged w48">
                            </div>
                            <div class="price">$ 9</div>
                            <p>Music Monthly Subscription</p>
                            <a href="#" class="btn btn-primary btn-block btn-sm">PAY NOW</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- * carousel multiple -->
    </div>
    <!-- * Monthly Bills -->


    <!-- Saving Goals -->
    <div class="section mt-4">
        <div class="section-heading">
            <h2 class="title">Saving Goals</h2>
            <a href="app-savings.html" class="link">View All</a>
        </div>
        <div class="goals">
            <!-- item -->
            <div class="item">
                <div class="in">
                    <div>
                        <h4>Sport Car</h4>
                        <p>Lifestyle</p>
                    </div>
                    <div class="price">$ 42,500</div>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0"
                        aria-valuemax="100">15%</div>
                </div>
            </div>
            <!-- * item -->
        </div>
    </div>

@endsection
