<?php

namespace App\Http\Controllers\Api\Publics;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index(Request $request)
    {
        $note = Note::whereNotNull('published_at');

        if ($request->session()->exists('notes.recently_viewed')){
            $notes = $request->session()->get('notes.recently_viewed');
            $notes = array_unique($notes);
            $recent_viewed = Note::whereIn('id', $notes)->get();
        }
        $recommend = $note->inRandomOrder()->limit(5)->get();
        $recently_added = $note->orderBy('published_at', 'desc')->limit(5)->get();

        $data = $this->getResponse($recommend, $recently_added, $recent_viewed = null);

        return $this->success('Explore the Notes.', $data);
    }

    public function getResponse($recommend, $recently_added, $recent_viewed = null)
    {
        return [
            [
                'title' => 'Recently Viewed',
                'data' => NoteResource::collection($recent_viewed)
            ],
            [
                'title' => 'Recommend',
                'data' => NoteResource::collection($recommend)
            ],
            [
                'title' => 'Recently Added',
                'data' => NoteResource::collection($recently_added)
            ]
        ];
    }
}
