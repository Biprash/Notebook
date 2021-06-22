<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Bookmark;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmark = NoteResource::collection(auth()->user()->bookmarks);
        return $this->success('All Bookmarks.', $bookmark);
    }

    public function bookmark(Request $request, Note $note)
    {
        $bookmark = auth()->user()->bookmarks()->where('note_id', $note->id);
        if($bookmark->exists())
        {
            auth()->user()->bookmarks()->detach($note->id);
            return $this->success('Removed Bookmark \''. $note->title . '\' Successfully');
        } else {
            auth()->user()->bookmarks()->attach($note->id);
            return $this->success('Added Bookmark \''. $note->title . '\' Successfully');
        }
    }
}
