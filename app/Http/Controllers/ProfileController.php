<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileDetailsRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $profileDetails = DB::table('user_profile_details')->where('user_id', $request->user()->id)->get();

        return view('profile.edit', [
            'user' => $request->user(),
            'data' => $profileDetails,
            'flag' => $profileDetails->isEmpty() ? false : true
        ]);

    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateDetails(ProfileDetailsRequest $request)
    {
        UserProfile::where('user_id', $request->user()->id)->update($request->validated());

        return Redirect::route('profile.edit')->with('status', 'profile-details-updated');
    }

    public function storeUserDetails(ProfileDetailsRequest $request)
    {
        UserProfile::create([
            'user_id' => $request->user()->id,
            'country' => $request->country,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'street'  => $request->street,
            'phone_number' => $request->phone_number

            ]);

        return Redirect::route('profile.edit')->with('status', 'profile-details-inserted');

    }

}
