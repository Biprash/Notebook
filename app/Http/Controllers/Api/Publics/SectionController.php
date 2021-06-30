<?php

namespace App\Http\Controllers\Api\Publics;

use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResource;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Page $page)
    {
        $data = Section::where('page_id', $page->id)->get();
        $sections = SectionResource::collection($data);
        return $this->success('List of Section for ' . $page->title . '.', $sections);
    }
}
