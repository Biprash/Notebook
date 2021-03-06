<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Carbon\Carbon;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Note::class, 'note');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = Note::where('user_id', auth('sanctum')->user()->getKey())->get();
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
        $attributes = $request->validated();
        if ($request->hasFile('cover'))
        {
            $path = $request->cover->store('cover');
            $attributes['cover'] = $path;
        }
        $note = auth()->user()->notes()->create($attributes);
        $page = $note->pages()->create([
            'title' => 'Starter Page',
            'note_id' => $note->id
            ]);
        $page->sections()->create(['title' => 'Notes']);
        $page->sections()->create(['title' => 'Resources']);
        $note = new NoteResource($note);
        return $this->success('Note Created Successfully.', $note);
    }

    /**
     * Display the specified resource.
     *
     * @param  Note  $note
     */
    public function show(Note $note)
    {
        session()->push('notes.recently_viewed', $note->getKey());
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
        $attributes = $request->validated();
        if ($request->hasFile('cover'))
        {
            $path = $request->cover->store('cover');
            $attributes['cover'] = $path;
        }
        $note->update($attributes);
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

    /**
     * Publish the specified resource.
     *
     * @param  Note  $note
     */
    public function publish(Note $note)
    {
        $this->authorize('publish', $note);
        if ($note->published_at)
        {
            $note->published_at = null;
            $note->save();
            return $this->success('Note saved as Draft Successfully');
        } else
        {
            $note->published_at = Carbon::now();
            $note->save();
            return $this->success('Note published Successfully');
        }
    }
}
