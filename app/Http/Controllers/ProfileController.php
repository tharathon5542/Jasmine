<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $errors = [];

        $request->validate([
            'input_firstName',
            'input_lastName',
            'genderSelect',
            'input_age',
            'input_email',
            'input_password',
            'input_conPassword',
            'input_phone',
            'input_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $input = $request->all();

        $checkMail = DB::select("SELECT * FROM profiles WHERE email = '" . $input['input_email'] . "'");

        if ($checkMail) {
            array_push($errors, 'This email is being used.');
        }

        if ($input['input_password'] != $input['input_conPassword']) {
            array_push($errors, 'Password and Confirm Password have to be same.');
        }

        if ($errors) {
            return redirect()->route('signUp')
                ->with('errors', $errors);
        }

        $input['input_image'] = "default.png";

        if ($image = $request->file('input_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['input_image'] = "$profileImage";
        }

        $hashPassword = Hash::make($input['input_conPassword']);

        Profile::create([
            'firstName' => $input['input_firstName'],
            'lastName' => $input['input_lastName'],
            'gender' => $input['genderSelect'],
            'age' => $input['input_age'],
            'email' => $input['input_email'],
            'password' => $hashPassword,
            'phoneNumber' => $input['input_phone'],
            'is_admin' => 0,
            'image' =>  $input['input_image']
        ]);

        return redirect()->route('signIn');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
        $allHistoriesData = DB::table('histories')
            ->join('videos', 'histories.videoID', '=', 'videos.videoID')
            ->distinct()
            ->select('histories.videoID', 'videoName', 'videoDescription', 'videos.image', 'histories.created_at')
            ->where('profileID', '=', $profile->profileID)
            ->paginate(20);

        session()->put('activeMenu', 'history');

        if (session()->has('token')) {
            return view('profile.profile', compact('profile', 'allHistoriesData'));
        } else {
            return redirect()->route('index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
        session()->pull('activeMenu');

        return view('profile.editProfile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
        $request->validate([
            'input_firstName',
            'input_lastName',
            'genderSelect',
            'input_age',
            'input_phone',
            'input_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $input = $request->all();

        $profile = Profile::find($profile['profileID']);

        $profile->firstName = $input['input_firstName'];
        $profile->lastName = $input['input_lastName'];
        $profile->gender = $input['genderSelect'];
        $profile->age = $input['input_age'];
        $profile->phoneNumber = $input['input_phone'];
        if ($image = $request->file('input_image')) {
            $destinationPath = 'image/';
            if ($profile->image != "default.png") {
                File::delete($destinationPath . $profile->image);
            }
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['input_image'] = "$profileImage";
            $profile->image = $input['input_image'];
            $request->session()->put('image',  $input['input_image']);
        }

        session()->put('firstName',  $profile->firstName);
        session()->put('lastName',  $profile->lastName);

        $profile->save();

        return redirect()->route('profile.edit', $profile['profileID'])->with('success', 'Your profile was Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
