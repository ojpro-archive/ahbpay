@include('components.head')

<div class="section mb-5 p-2" x-data="{langSelected:false, en:true, ar:false}">

    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
        <div class="w-2/3 card card-body mx-auto px-4 py-2 rounded shadow-sm mt-14"
            x-bind:class="langSelected ? '!hidden' :'block'">
            <h3 class=" text-center my-2 block" x-text="en ? 'Choose your language' : 'إختر اللغة' ">Choose your language
            </h3>
            <div class="flex flex-row items-center justify-around my-2 relative">
                <label for="en" class="border-2 border-transparent text-center cursor-pointer  p-2 rounded-sm"
                    x-bind:class="en ? 'border-purple-600' : ''">
                    <img src="{{ asset('img/en.png') }}" alt="English" class="!w-16 rounded-sm">
                    <span class="text-gray-200 mt-1 block">English</span>
                    <input type="checkbox" name="lang" x-bind="en ? 'checked' : '' " value="en" id="en"
                        class="absolute inset-0 z-10 opacity-0" @click="en = !en; ar = false">
                </label>

                <label for="ar" class="border-2 border-transparent text-center cursor-pointer  p-2 rounded-sm"
                    x-bind:class="ar ? 'border-purple-600' : ''">
                    <img src="{{ asset('img/ar.png') }}" alt="Arabic" class="!w-16 rounded-sm">
                    <span class="text-gray-200 mt-1 block">العربية</span>
                    <input type="checkbox" name="lang" x-bind="ar ? 'checked' : '' " value="ar" id="ar"
                        class="absolute inset-0 z-10 opacity-0" @click="ar = !ar; en= false">
                </label>
            </div>
            <div class="max-w-min mx-auto mt-2 -mb-6">
                <button type="button" class="btn btn-primary px-4 py-2 rounded-md text-white"
                    x-on:click="langSelected = true;saveLanguage(ar ? 'ar' : 'en')"
                    x-text="en ? 'Next' : 'التالي' ">Next</button>
            </div>
        </div>
        <div class="card p-2 relative mt-16" x-bind:class="langSelected ? 'block' :'!hidden'">
            @csrf
            <div class="avatar-section -mt-16 relative overflow-hidden mx-auto block max-w-max">
                <div class="">
                    <input type="file" name="avatar" id="" class="absolute inset-0 !cursor-pointer opacity-0 z-10">
                    <img src="{{ asset('img/sample/avatar/avatar1.jpg') }}" alt="avatar" class="imaged w100 rounded">

                    <span class="button">
                        <ion-icon name="pencil-outline"></ion-icon>
                    </span>
                </div>
            </div>
            @error('avatar')
                <div class="text-center mt-2">
                    <span class="text-sm !text-red-400">{{ $message }}</span>
                </div>
            @enderror
            {{-- Progress Bar --}}
            <div class="progressbar -translate-y-1/2 h-1 w-10/12">
                <div class="progress" id="progress"></div>
                <div class="progress-step progress-step-active"></div>
                <div class="progress-step"></div>
                <div class="progress-step"></div>
            </div>


            <div class="card-body">
                <div class="form-group basic">
                    <div class="form-step form-step-active">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label @error('name') !text-red-400 @enderror " for="name"
                                    x-text="getLang() == 'ar' ? '  الإسم الكامل *' : 'Full Name *'">Full
                                    Name *</label>
                                <input type="text"
                                    class="form-control @error('name') !border-b !border-red-400 @enderror" id="name"
                                    autocomplete="off" placeholder="Your Full Name" name="name">
                                @error('name')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-wrapper mt-4">
                                <label class="label @error('email') !text-red-400 @enderror" for="email" x-text="getLang() == 'ar' ? 'البريد الإلكتروني *':'Your
                                E-Mail * '">Your
                                    E-Mail * </label>
                                <input type="email"
                                    class="form-control @error('email') !border-b !border-red-400 @enderror" id="email"
                                    autocomplete="off" placeholder="domail@example.com" name="email">
                                @error('email')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-wrapper mt-4">
                                <label class="label @error('country') !text-red-400 @enderror"
                                    for="country">Country</label>
                                <input type="text" list="countries" id="country"
                                    class="form-control @error('country') !border-b !border-red-400 @enderror"
                                    name="country" placeholder="Your Country">
                                @error('country')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                                <datalist id="countries">
                                    <option value="Afganistan">
                                    <option value="Albania">
                                    <option value="Algeria">
                                    <option value="American Samoa">
                                    <option value="Andorra">
                                    <option value="Angola">
                                    <option value="Anguilla">
                                    <option value="Antigua & Barbuda">
                                    <option value="Argentina">
                                    <option value="Armenia">
                                    <option value="Aruba">
                                    <option value="Australia">
                                    <option value="Austria">
                                    <option value="Azerbaijan">
                                    <option value="Bahamas">
                                    <option value="Bahrain">
                                    <option value="Bangladesh">
                                    <option value="Barbados">
                                    <option value="Belarus">
                                    <option value="Belgium">
                                    <option value="Belize">
                                    <option value="Benin">
                                    <option value="Bermuda">
                                    <option value="Bhutan">
                                    <option value="Bolivia">
                                    <option value="Bonaire">
                                    <option value="Bosnia & Herzegovina">
                                    <option value="Botswana">
                                    <option value="Brazil">
                                    <option value="British Indian Ocean Ter">
                                    <option value="Brunei">
                                    <option value="Bulgaria">
                                    <option value="Burkina Faso">
                                    <option value="Burundi">
                                    <option value="Cambodia">
                                    <option value="Cameroon">
                                    <option value="Canada">
                                    <option value="Canary Islands">
                                    <option value="Cape Verde">
                                    <option value="Cayman Islands">
                                    <option value="Central African Republic">
                                    <option value="Chad">
                                    <option value="Channel Islands">
                                    <option value="Chile">
                                    <option value="China">
                                    <option value="Christmas Island">
                                    <option value="Cocos Island">
                                    <option value="Colombia">
                                    <option value="Comoros">
                                    <option value="Congo">
                                    <option value="Cook Islands">
                                    <option value="Costa Rica">
                                    <option value="Cote DIvoire">
                                    <option value="Croatia">
                                    <option value="Cuba">
                                    <option value="Curaco">
                                    <option value="Cyprus">
                                    <option value="Czech Republic">
                                    <option value="Denmark">
                                    <option value="Djibouti">
                                    <option value="Dominica">
                                    <option value="Dominican Republic">
                                    <option value="East Timor">
                                    <option value="Ecuador">
                                    <option value="Egypt">
                                    <option value="El Salvador">
                                    <option value="Equatorial Guinea">
                                    <option value="Eritrea">
                                    <option value="Estonia">
                                    <option value="Ethiopia">
                                    <option value="Falkland Islands">
                                    <option value="Faroe Islands">
                                    <option value="Fiji">
                                    <option value="Finland">
                                    <option value="France">
                                    <option value="French Guiana">
                                    <option value="French Polynesia">
                                    <option value="French Southern Ter">
                                    <option value="Gabon">
                                    <option value="Gambia">
                                    <option value="Georgia">
                                    <option value="Germany">
                                    <option value="Ghana">
                                    <option value="Gibraltar">
                                    <option value="Great Britain">
                                    <option value="Greece">
                                    <option value="Greenland">
                                    <option value="Grenada">
                                    <option value="Guadeloupe">
                                    <option value="Guam">
                                    <option value="Guatemala">
                                    <option value="Guinea">
                                    <option value="Guyana">
                                    <option value="Haiti">
                                    <option value="Hawaii">
                                    <option value="Honduras">
                                    <option value="Hong Kong">
                                    <option value="Hungary">
                                    <option value="Iceland">
                                    <option value="Indonesia">
                                    <option value="India">
                                    <option value="Iran">
                                    <option value="Iraq">
                                    <option value="Ireland">
                                    <option value="Isle of Man">
                                    <option value="Israel">
                                    <option value="Italy">
                                    <option value="Jamaica">
                                    <option value="Japan">
                                    <option value="Jordan">
                                    <option value="Kazakhstan">
                                    <option value="Kenya">
                                    <option value="Kiribati">
                                    <option value="Korea North">
                                    <option value="Korea Sout">
                                    <option value="Kuwait">
                                    <option value="Kyrgyzstan">
                                    <option value="Laos">
                                    <option value="Latvia">
                                    <option value="Lebanon">
                                    <option value="Lesotho">
                                    <option value="Liberia">
                                    <option value="Libya">
                                    <option value="Liechtenstein">
                                    <option value="Lithuania">
                                    <option value="Luxembourg">
                                    <option value="Macau">
                                    <option value="Macedonia">
                                    <option value="Madagascar">
                                    <option value="Malaysia">
                                    <option value="Malawi">
                                    <option value="Maldives">
                                    <option value="Mali">
                                    <option value="Malta">
                                    <option value="Marshall Islands">
                                    <option value="Martinique">
                                    <option value="Mauritania">
                                    <option value="Mauritius">
                                    <option value="Mayotte">
                                    <option value="Mexico">
                                    <option value="Midway Islands">
                                    <option value="Moldova">
                                    <option value="Monaco">
                                    <option value="Mongolia">
                                    <option value="Montserrat">
                                    <option value="Morocco">
                                    <option value="Mozambique">
                                    <option value="Myanmar">
                                    <option value="Nambia">
                                    <option value="Nauru">
                                    <option value="Nepal">
                                    <option value="Netherland Antilles">
                                    <option value="Netherlands">
                                    <option value="Nevis">
                                    <option value="New Caledonia">
                                    <option value="New Zealand">
                                    <option value="Nicaragua">
                                    <option value="Niger">
                                    <option value="Nigeria">
                                    <option value="Niue">
                                    <option value="Norfolk Island">
                                    <option value="Norway">
                                    <option value="Oman">
                                    <option value="Pakistan">
                                    <option value="Palau Island">
                                    <option value="Palestine">
                                    <option value="Panama">
                                    <option value="Papua New Guinea">
                                    <option value="Paraguay">
                                    <option value="Peru">
                                    <option value="Phillipines">
                                    <option value="Pitcairn Island">
                                    <option value="Poland">
                                    <option value="Portugal">
                                    <option value="Puerto Rico">
                                    <option value="Qatar">
                                    <option value="Republic of Montenegro">
                                    <option value="Republic of Serbia">
                                    <option value="Reunion">
                                    <option value="Romania">
                                    <option value="Russia">
                                    <option value="Rwanda">
                                    <option value="St Barthelemy">
                                    <option value="St Eustatius">
                                    <option value="St Helena">
                                    <option value="St Kitts-Nevis">
                                    <option value="St Lucia">
                                    <option value="St Maarten">
                                    <option value="St Pierre & Miquelon">
                                    <option value="St Vincent & Grenadines">
                                    <option value="Saipan">
                                    <option value="Samoa">
                                    <option value="Samoa American">
                                    <option value="San Marino">
                                    <option value="Sao Tome & Principe">
                                    <option value="Saudi Arabia">
                                    <option value="Senegal">
                                    <option value="Seychelles">
                                    <option value="Sierra Leone">
                                    <option value="Singapore">
                                    <option value="Slovakia">
                                    <option value="Slovenia">
                                    <option value="Solomon Islands">
                                    <option value="Somalia">
                                    <option value="South Africa">
                                    <option value="Spain">
                                    <option value="Sri Lanka">
                                    <option value="Sudan">
                                    <option value="Suriname">
                                    <option value="Swaziland">
                                    <option value="Sweden">
                                    <option value="Switzerland">
                                    <option value="Syria">
                                    <option value="Tahiti">
                                    <option value="Taiwan">
                                    <option value="Tajikistan">
                                    <option value="Tanzania">
                                    <option value="Thailand">
                                    <option value="Togo">
                                    <option value="Tokelau">
                                    <option value="Tonga">
                                    <option value="Trinidad & Tobago">
                                    <option value="Tunisia">
                                    <option value="Turkey">
                                    <option value="Turkmenistan">
                                    <option value="Turks & Caicos Is">
                                    <option value="Tuvalu">
                                    <option value="Uganda">
                                    <option value="United Kingdom">
                                    <option value="Ukraine">
                                    <option value="United Arab Erimates">
                                    <option value="United States of America">
                                    <option value="Uraguay">
                                    <option value="Uzbekistan">
                                    <option value="Vanuatu">
                                    <option value="Vatican City State">
                                    <option value="Venezuela">
                                    <option value="Vietnam">
                                    <option value="Virgin Islands (Brit)">
                                    <option value="Virgin Islands (USA)">
                                    <option value="Wake Island">
                                    <option value="Wallis & Futana Is">
                                    <option value="Yemen">
                                    <option value="Zaire">
                                    <option value="Zambia">
                                    <option value="Zimbabwe">
                                </datalist>
                            </div>

                            <div class="input-wrapper mt-4" x-data="{ showPassword: false }">
                                <label class="label @error('password') !text-red-400 @enderror" for="password1">Password
                                    *</label>
                                <input x-bind:type="showPassword ? 'text': 'password'"
                                    class="form-control @error('password') !border-b !border-red-400 @enderror"
                                    id="password1" autocomplete="off" placeholder="*********" name="password">
                                <i @click.prevent="showPassword = !showPassword" class="clear-input">
                                    <ion-icon x-bind:name="showPassword ? 'eye-off-outline': 'eye-outline'">
                                    </ion-icon>
                                </i>
                                @error('password')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-wrapper mt-4">
                                <label class="label @error('password_confirmation') !text-red-400 @enderror"
                                    for="password2">Confirm
                                    Password *</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') !border-b !border-red-400 @enderror"
                                    id="password2" autocomplete="off" placeholder="Type password again"
                                    name="password_confirmation">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                                @error('password_confirmation')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="input-wrapper mt-4">
                                <label class="label @error('phone') !text-red-400 @enderror" for="tel">Phone
                                    Number *</label>
                                <input type="tel"
                                    class="form-control @error('phone') !border-b !border-red-400 @enderror" id="tel"
                                    autocomplete="off" placeholder="+123456789" name="phone">
                            </div>
                            @error('phone')
                                <span class="text-sm !text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="max-w-min mx-auto mt-2 -mb-14">
                            <a href="#" class="btn-next btn btn-primary px-4 py-2 rounded-md text-white">Next</a>
                        </div>
                    </div>
                    <div class="form-step">
                        <div class="form-group basic">
                            <div class="input-wrapper mx-auto flex justify-between items-center">
                                <label class="form-check-label" for="small-project">
                                    <input type="radio" class="form-check-input mx-2" name="project_type"
                                        id="small-project" value="small_projects" checked>
                                    Small Projects
                                </label>
                                <label class="form-check-label" for="business">
                                    <input type="radio" class="form-check-input mx-2" name="project_type" id="business"
                                        value="company">
                                    Company
                                </label>
                            </div>

                            <div class="input-wrapper mt-4">
                                <label class="label @error('category') !text-red-400 @enderror" for="password2">Project
                                    Category * </label>
                                <input type="category"
                                    class="form-control @error('category') !border-b !border-red-400 @enderror"
                                    list="category" placeholder="Select a category" name="category">
                                @error('category')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                                <datalist id="category">
                                    <option value="Tech">
                                    <option value="Sells">
                                </datalist>
                            </div>
                            <div class="input-wrapper mt-4">
                                <input type="text"
                                    class="form-control @error('seller') !border-b !border-red-400 @enderror"
                                    id="seller" name="seller" autocomplete="off" placeholder="Seller Name">
                                @error('seller')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-wrapper mt-4">
                                <input type="text"
                                    class="form-control @error('seller_ar') !border-b !border-red-400 @enderror"
                                    id="seller_ar" name="seller_ar" autocomplete="off"
                                    placeholder="Seller Name en arabic">
                                @error('seller_ar')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-center -mb-14">
                            <div class="max-w-min mt-2">
                                <a href="#"
                                    class="btn-prev btn btn-primary px-4 py-2 !rounded-r-none text-white">Previous</a>
                            </div>
                            <div class="max-w-min mt-2">
                                <a href="#"
                                    class="btn-next btn btn-primary !px-8 py-2 !rounded-l-none text-white">Next</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <div class="form-group basic">
                            <small>Average transactions number in month</small>
                            <div class="input-wrapper">
                                <label class="label @error('max_transactions') !text-red-400 @enderror">Number of
                                    transaction every
                                    month</label>
                                <input type="number" name="max_transactions"
                                    class="form-control @error('max_transactions') !border-b !border-red-400 @enderror"
                                    autocomplete="off" placeholder="e.g 100">
                                @error('max_transactions')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <small>Average transactions amount in month</small>

                            <div class="input-wrapper my-4">
                                <label class="label @error('max_transaction_amount') !text-red-400 @enderror">Amount of
                                    transaction every
                                    month</label>
                                <input type="number" name="max_transaction_amount"
                                    class="form-control @error('max_transaction_amount') !border-b !border-red-400 @enderror"
                                    autocomplete="off" placeholder="e.g 500">
                                @error('max_transaction_amount')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-wrapper">
                                <label class="label @error('holder_name') !text-red-400 @enderror">Card Holdername
                                </label>
                                <input type="text"
                                    class="form-control @error('holder_name') !border-b !border-red-400 @enderror"
                                    autocomplete="off" placeholder="Card Holdername" name="holder_name">
                                @error('holder_name')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-wrapper my-4">
                                <label class="label @error('account_number') !text-red-400 @enderror">Card
                                    Number</label>
                                <input type="text"
                                    class="form-control @error('account_number') !border-b !border-red-400 @enderror"
                                    autocomplete="off" placeholder="Credit Card Number" name="account_number">
                                @error('account_number')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-wrapper">
                                <label class="label @error('iban') !text-red-400 @enderror">IBAN Number</label>
                                <input type="text"
                                    class="form-control @error('iban') !border-b !border-red-400 @enderror"
                                    autocomplete="off" placeholder="Your IBAN Number" name="iban">
                                @error('iban')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-wrapper my-4">
                                <label class="label @error('bank_name') !text-red-400 @enderror">Bank Name</label>
                                <input type="text"
                                    class="form-control @error('bank_name') !border-b !border-red-400 @enderror"
                                    autocomplete="off" placeholder="Your Bank name" name="bank_name">
                                @error('bank_name')
                                    <span class="text-sm !text-red-400">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>


                        <div class="flex justify-center -mb-14">
                            <div class="max-w-min mt-2">
                                <a href="#"
                                    class="btn-prev btn btn-primary px-4 py-2 !rounded-r-none text-white">Previous</a>
                            </div>
                            <div class="max-w-min mt-2">
                                <button type="submit"
                                    class="btn btn-primary !px-8 py-2 !rounded-l-none text-white">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </form>
</div>
<script>
    const prevBtns = document.querySelectorAll(".btn-prev");
    const nextBtns = document.querySelectorAll(".btn-next");
    const progress = document.getElementById("progress");
    const formSteps = document.querySelectorAll(".form-step");
    const progressSteps = document.querySelectorAll(".progress-step");
    const telephone = document.querySelector(".telephone");

    let formStepsNum = 0;

    nextBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        });
    });

    prevBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            formStepsNum--;
            updateFormSteps();
            updateProgressbar();
        });
    });

    function updateFormSteps() {
        formSteps.forEach((formStep) => {
            formStep.classList.contains("form-step-active") &&
                formStep.classList.remove("form-step-active");
        });
        formSteps[formStepsNum].classList.add("form-step-active");

    }

    function updateProgressbar() {
        progressSteps.forEach((progressStep, idx) => {
            if (idx < formStepsNum + 1) {
                progressStep.classList.add("progress-step-active");
            } else {
                progressStep.classList.remove("progress-step-active");
            }
        });

        const progressActive = document.querySelectorAll(".progress-step-active");

        progress.style.width =
            ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
    }

    function saveLanguage(lang) {
        window.localStorage.setItem('lang', lang)
    }

    function getLang() {
        return window.localStorage.getItem('lang') ?? 'en'
    }
</script>
@include('components.foot')
