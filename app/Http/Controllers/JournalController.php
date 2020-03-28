<?php

namespace App\Http\Controllers;

use App\Journal;
use App\FileSaver;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('journal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('journal.create');
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
            'publish_date' => 'required|date|date_format:Y-m-d',
            'writer' => 'required|string|max:255',
            'description' => 'required|string',
            'file[]' => 'mimes:pdf,docx,doc|max:102400',
        ]);

        

        $journal = Journal::create([
            'title' => $request->title,
            'publish_date' => $request->publish_date,
            'writer' => $request->writer,
            'description' => $request->description
        ]);

        if($files = $request->file){
            FileSaver::save_document_helper($journal, $files);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        //
        $documents = $journal->documents;

        return view('journal.show', compact('journal', 'documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit(Journal $journal)
    {
        //
        $documents = $journal->documents;

        return view('journal.edit', compact('journal', 'documents'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journal $journal)
    {
        //
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'publish_date' => 'required|date|date_format:Y-m-d',
            'writer' => 'required|string|max:255',
            'description' => 'required|string',
            'file[]' => 'mimes:pdf,docx,doc|max:102400',
        ]);

        if($files = $request->file){
            FileSaver::save_document_helper($journal, $files);
        }

        $journal->title = $request->title;
        $journal->publish_date = $request->publish_date;
        $journal->writer = $request->writer;
        $journal->description = $request->description;

        $journal->save();


        return redirect(route('journals.show', ['journal' => $journal->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        //
        if($documents = $journal->documents){
            foreach ($documents as $doc) {
                # code...
                Storage::disk('public')->delete('documents/'.$doc->path);
            }
        }

        $journal->documents()->delete();

        $journal->destroy();

        return redirect(route('journals.index'));
    }
}
