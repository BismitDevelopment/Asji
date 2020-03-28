<?php

namespace App\Http\Controllers;

use App\Event;
use App\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::orderBy('created_at', 'desc')->paginate(3);
        return view('event.index', ['event' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'event_date' => 'required|date',
            'event_name' => 'required',
            'event_location' => 'required',
            'event_description' => 'required',
            'file[]' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        
        
        // Ngolah sisa datanya
        $upload_event = new Event;
        $upload_event->event_date = date('Y-m-d', strtotime($request->event_date));
        $upload_event->event_name = $request->event_name;
        $upload_event->event_location = $request->event_location;
        $upload_event->event_description = $request->event_description;
        $upload_event->save();

        if($files = $request->file){
            FileSaver::save_image_helper($upload_event, $files);
        }

        return redirect(route('events.index'))->with('success', 'Success add data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Event::where('id', $id)->first();
        return view('event.show', ['event' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Event::where('id', $id)->first();
        return view('event.edit', ['event' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'event_date' => 'required|date',
            'event_name' => 'required',
            'event_location' => 'required',
            'event_description' => 'required',
            'file[]' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        
        $event = Event::find($id);

        if($files = $request->file){
            FileSaver::save_image_helper($event, $files);
        }

        Event::where('id', $id)
                ->update([
                    'event_name' => $request->event_name,
                    'event_date' => date('Y-m-d', strtotime($request->event_date)),
                    'event_location' => $request->event_location,
                    'event_description' => $request->event_description, 
                ]);

        return redirect(route('events.show', ['event'=>$id]))->with('success', 'Success, edited data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Event::find($request->id);
        if ($images = $data->images) {
            # code...
            foreach ($images as $image ) {
                # code...
                Storage::disk('public')->delete('images/'.$image->path);
            }
        }
        $data->images()->delete();

        $data->delete();
        
        return redirect(route('events.index'));
    }

}
