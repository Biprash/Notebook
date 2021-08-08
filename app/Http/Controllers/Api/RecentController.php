<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Resources\NoteResource;

class RecentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->exists('notes.recently_viewed')){
            $notes = $request->session()->get('notes.recently_viewed');
            $notes = array_unique($notes);
            $data = NoteResource::collection(Note::whereIn('id', $notes)->get());
            return $this->success('Recently Viewed Notes.', $data);
        }
        return $this->success('No Recent Notes found.', null, 204);
    }
}
