<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = Note::where('user_id', auth('sanctum')->user()->id)->get();
        $notes = NoteResource::collection($data);
        return $this->success('List of Notes.', $notes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NoteRequest  $request
     */
    public function store(NoteRequest $request)
    {
        $note = new NoteResource(Note::create($request->validated()));
        return $this->success('Note Created Successfully.', $note);
    }

    /**
     * Display the specified resource.
     *
     * @param  Note  $note
     */
    public function show(Note $note)
    {
        $note = new NoteResource($note);
        return $this->success('Note Detail', $note);
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
        $note = new NoteResource($note);
        return $this->success('Note Updated Successfully.', $note);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Note  $note
     */
    public function destroy(Note $note)
    {
        $note->delete();
        $note = new NoteResource($note);
        return $this->success('Note Deleted Successfully.', $note);
    }
}
