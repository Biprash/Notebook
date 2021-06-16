<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NoteRequest  $request
     */
    public function store(NoteRequest $request)
    {
        return Note::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  Note  $note
     */
    public function show(Note $note)
    {
        return $note;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NoteRequest  $request
     * @param  Note  $note
     */
    public function update(NoteRequest $request, Note $note)
    {
        $note->update($request->validated());
        return $note;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Note  $note
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return $note;
    }
}
