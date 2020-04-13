<?php

namespace App\Http\Controllers;

use App\PublicLecture;
use App\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicLectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lectures = PublicLecture::paginate(10);
        return view('public_lecture.index', compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('public_lecture.create');
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
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'lecture_date' => 'required|date',
            'description' => 'required|string',
            'location' => 'required|string|max:100',
            'file[]' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $lecture = PublicLecture::create([
            'title' => $request->title,
            'lecture_date' => $request->lecture_date,
            'description' => $request->description,
            'location' => $request->location,
            ]);
            
        if ($files = $request->file) {
            # code...
            FileSaver::save_image_helper($lecture,  $files);
        }

        return redirect(route('lectures.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PublicLecture $lecture 
     * @return \Illuminate\Http\Response
     */
    public function show(PublicLecture $lecture)
    {
        //
        return view('public_lecture.show', compact('lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PublicLecture $lecture 
     * @return \Illuminate\Http\Response
     */
    public function edit(PublicLecture $lecture)
    {
        //
        $images = $lecture->images;

        return view('public_lecture.edit', compact('lecture', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PublicLecture $lecture 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PublicLecture $lecture)
    {
        //
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'lecture_date' => 'required|date',
            'description' => 'required|string',
            'location' => 'required|string|max:100',
            'file[]' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($files = $request->file) {
            # code...
            FileSaver::save_image_helper($lecture,  $files);
        }

        $lecture->title = $request->title;
        $lecture->lecture_date = $request->lecture_date;
        $lecture->description = $request->description;
        $lecture->location = $request->location;

        $lecture->save();


        return redirect(route('lectures.show',['lecture' => $lecture->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PublicLecture $lecture 
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicLecture $lecture)
    {
        //
        if ($images = $lecture->images) {
            # code...
            foreach ($images as $image ) {
                # code...
                Storage::disk('public')->delete('images/'.$image->path);
            }
        }

        $lecture->images()->delete();

        $lecture->delete();

        return redirect(route('lectures.index'));
    }
}
