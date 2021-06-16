<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PageRequest  $request
     */
    public function store(PageRequest $request)
    {
        return Page::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  Page  $page
     */
    public function show(Page $page)
    {
        return $page;
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
        return $page;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page  $page
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return $page;
    }
}
