<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserResquest;
use App\Models\Card;
use App\Models\Company;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Traits\GenerateSerial;
use App\Traits\UploadImage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterUserResquest $request)
    {
        $request->validated();

        $avatar_path = UploadImage::save($request->file('avatar'));

        $user = User::create([
            'uuid' => GenerateSerial::generateSerailNumber(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'avatar' => $avatar_path ?? asset('img/sample/avatar/avatar1.jpg'),
            'country' => $request->country ?? '',
            'max_transactions' => $request->max_transactions ?? 100,
            'max_transaction_amount' => $request->max_transaction_amount ?? 500,
            'lang' => $request->lang ?? 'en',
        ]);

        $card = Card::create([
            'owner' => $user->id,
            'holder_name' => $request->holder_name ?? $user->name,
            'account_number' => str_replace(' ', '', $request->account_number) ?? '',
            'iban' => str_replace(' ', '', $request->iban ?? ''),
            'cvv' => '',
            'balance' => random_int(1, 10000),
            'expiration' => '',
            'bank_name' => $request->bank_name ?? '',
        ]);

        $company = Company::create([
            'owner' => $user->id,
            'project_type' => $request->project_type ?? '',
            'category' => $request->category,
            'seller' => $request->seller,
            'seller_ar' => $request->seller_ar,
        ]);

        event(new Registered($user));

        Auth::login($user);
        // Here we goo
        if (in_array($request->lang, ['en', 'ar'])) {
            // Get the user specific language
            $lang = Auth::user()->lang;

            // Set the language
            App::setLocale($lang);
        }

        Storage::put('images/qrcode/'.$user->uuid.'.png',QrCode::format('png')->generate('Embed me into an e-mail!'));

        echo "<script>setLang('".$user->lang."')</script>";

        return redirect('/');
    }
}
