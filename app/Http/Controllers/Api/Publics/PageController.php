<?php

namespace App\Http\Controllers\Api\Publics;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Note;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Note $note)
    {
        $data = Page::where('note_id', $note->id)->get();
        $pages = PageResource::collection($data);
        return $this->success('List of Pages for ' . $note->title . '.', $pages);
    }
}
