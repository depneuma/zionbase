<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();
        
        $cookie = substr(Cookie::get('referral'), 2);
        $referrer_id = $cookie ? Hashids::decode($cookie)[0] : 1;

        $user =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'ref_id' => $referrer_id,
            'password' => Hash::make($input['password']),
        ]);

        $user->username = 'KS'.Hashids::encode($user->id);
        $user->save();

        return $user;
    }
}
