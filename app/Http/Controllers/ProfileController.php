<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\FileSaver;
use App\Image;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $profiles = Profile::all();

        // return dd($profs);
        return view('profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //NOT IMPLEMENT
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //NOT IMPLEMENT
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
        // $prof = User::find($profile)->profile;


        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
        // dd(User::find($profile)->first()->profile);
        // dd($user->profile);
        // dd(compact(['profile', 'image']));
        if(Gate::allows('update-profile', $profile)){
            $image = $profile->image;
            return view('profile.edit', compact('profile','image'));
        } else {
            return redirect(route('profiles.show', ['profile' => $profile->id]));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {

        if(Gate::allows('update-profile', $profile)){

            $this->validate($request,[
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'file[]' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'profession' => 'required|string',
                'affiliation' => 'required|string',
                'education' => 'required|string',
                'membership' => 'required|string',
                'experience' => 'required|string',
                'address' => 'required|string',

            ]);
    
            // echo(class_basename($profile));
            // dd(count($profile->images));
            if ($files = $request->file) {
                FileSaver::save_image_helper($profile, $files);
            }
    
            $profile->first_name = $request->first_name;
            $profile->last_name = $request->last_name;
            $profile->profession = $request->profession; 
            $profile->affiliation = $request->affiliation;
            $profile->education = $request->education;
            $profile->membership = $request->membership;
            $profile->experience = $request->experience;
            $profile->address = $request->address;
    
            $profile->save();
        }

        return redirect(route('profiles.show', ['profile' => $profile->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //NOT IMPLEMENT
    }
}
