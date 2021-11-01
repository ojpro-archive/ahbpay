@include('components.head')

<div class="appHeader">
    <div class="left">
        <a href="#" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        My Cards
    </div>
    <div class="right">
        <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#addCardActionSheet">
            <ion-icon name="add-outline"></ion-icon>
        </a>
    </div>
</div>
<!-- * App Header -->
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show fixed bottom-2 left-2 right-2 z-100" role="alert">
        <b>Error!.</b> Please check the Add card form.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<!-- Add Card Action Sheet -->
<div class="modal fade action-sheet" id="addCardActionSheet" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a Card</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form action="{{ route('cards.store') }}" method="POST">
                        @csrf
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="cardnumber1">Card Number</label>
                                <input type="number" id="cardnumber1" class="form-control"
                                    placeholder="Enter Card Number" name="account_number">

                                @error('account_number')
                                    <span class="!text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Expiry Date</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <select class="form-control custom-select" id="exp-month"
                                                    name="exp_month">
                                                    <option value="01" class="bg-black">01</option>
                                                    <option value="02" class="bg-black">02</option>
                                                    <option value="03" class="bg-black">03</option>
                                                    <option value="04" class="bg-black">04</option>
                                                    <option value="05" class="bg-black">05</option>
                                                    <option value="06" class="bg-black">06</option>
                                                    <option value="07" class="bg-black">07</option>
                                                    <option value="08" class="bg-black">08</option>
                                                    <option value="09" class="bg-black">09</option>
                                                    <option value="10" class="bg-black">10</option>
                                                    <option value="11" class="bg-black">11</option>
                                                    <option value="12" class="bg-black">12</option>
                                                </select>
                                                @error('exp_month')
                                                    <span class="!text-red-400 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <select class="form-control custom-select" id="exp-year" name="exp_year"
                                                    class="bg-black">
                                                    <option value="2020" class="bg-black">2020</option>
                                                    <option value="2021" class="bg-black">2021</option>
                                                    <option value="2022" class="bg-black">2022</option>
                                                    <option value="2023" class="bg-black">2023</option>
                                                    <option value="2024" class="bg-black">2024</option>
                                                    <option value="2025" class="bg-black">2025</option>
                                                    <option value="2026" class="bg-black">2026</option>
                                                    <option value="2027" class="bg-black">2027</option>
                                                    <option value="2028" class="bg-black">2028</option>
                                                    <option value="2029" class="bg-black">2029</option>
                                                    <option value="2030" class="bg-black">2030</option>
                                                </select>
                                                @error('exp_year')
                                                    <span class="!text-red-400 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="cardcvv">
                                            CVV
                                            <a href="#" class="ms-05" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="3-4 digit number back of your card">
                                                What is this?
                                            </a>
                                        </label>
                                        <input type="number" id="cardcvv" class="form-control"
                                            placeholder="Enter 3 digit" name="cvv">
                                        @error('cvv')
                                            <span class="!text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group basic mt-2">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"
                                data-bs-dismiss="modal">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Add Card Action Sheet -->

<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-2">

        @foreach ($cards as $card)

            <!-- card block -->
            <div class="card-block {{ $bg_classes[array_rand($bg_classes)] }} mb-2">
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
                        <h1 class="title">$ {{ $card->balance ?? random_int(1, 10000) }}</h1>
                    </div>
                    <div class="in">
                        <div class="card-number">
                            <span class="label">Card Number</span>
                            ••••
                            {{ substr(str_replace(' ', '', $card->account_number), strlen($card->account_number) - 4, strlen($card->account_number)) ?? random_int(1000, 9999) }}
                        </div>
                        <div class="bottom">
                            <div class="card-expiry">
                                <span class="label">Expiry</span>
                                {{ $card->expiration ?? random_int(1, 12) . ' / ' . random_int(2010, 2040) }}
                            </div>
                            <div class="card-ccv">
                                <span class="label">CCV</span>
                                {{ $card->cvv ?? random_int(100, 999) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- * card block -->

    </div>

    @include('components.foot')
