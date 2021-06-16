<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
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
     * @param  SectionRequest  $request
     */
    public function store(SectionRequest $request)
    {
        return Section::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  Section  $section
     */
    public function show(Section $section)
    {
        return $section;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SectionRequest  $request
     * @param  Section  $section
     */
    public function update(SectionRequest $request, Section $section)
    {
        $section->update($request->validated());
        return $section;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Section  $section
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return $section;
    }
}
