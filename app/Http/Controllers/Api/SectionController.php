<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  SectionRequest  $request
     */
    public function store(SectionRequest $request)
    {
        $data = Section::create($request->validated());
        $section = new SectionResource($data);
        return $this->success('Section Created Successfully.', $section);
    }

    /**
     * Display the specified resource.
     *
     * @param  Section  $section
     */
    public function show(Section $section)
    {
        $section = new SectionResource($section);
        return $this->success('Section Detail.', $section);
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
        $section = new SectionResource($section);
        return $this->success('Section Updated Successfully.', $section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Section  $section
     */
    public function destroy(Section $section)
    {
        $section->delete();
        $section = new SectionResource($section);
        return $this->success('Section Deleted Successfully.', $section);
    }
}
