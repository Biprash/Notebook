<?php

namespace App\Http\Controllers\Api\Publics;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $note = Note::
            orWhere('title', 'like', '%' . $request->q . '%')
            ->orWhere('description', 'like', '%' . $request->q . '%')->paginate(10);
        return $this->success('Search Results.', $note);
    }
}
