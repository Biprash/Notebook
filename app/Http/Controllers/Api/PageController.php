<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Note;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Note $note)
    {
        $pages = Page::where('note_id', $note->id)->get();
        return $this->success('List of Pages for ' . $note->title . '.', $pages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PageRequest  $request
     */
    public function store(PageRequest $request)
    {
        $page = Page::create($request->validated());
        return $this->success('Page Created Successfully.', $page);
    }

    /**
     * Display the specified resource.
     *
     * @param  Page  $page
     */
    public function show(Page $page)
    {
        return $this->success('Page Detail.', $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PageRequest  $request
     * @param  Page  $page
     */
    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->validated());
        return $this->success('Page Updated Successfully.', $page);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page  $page
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return $this->success('Page Deleted Successfully.', $page);
    }
}
