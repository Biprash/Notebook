<?php

namespace App\Http\Controllers\Api\Publics;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->q;
        $note = Note::where('published_at', '!=', null)
            ->where(function ($query) use ($q) {
                $query->orWhere('title', 'like', '%' . $q . '%')
                    ->orWhere('description', 'like', '%' . $q . '%');
            })
            ->paginate(10);
        return $this->success('Search Results.', $note);
    }
}
