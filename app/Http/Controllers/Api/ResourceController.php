<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;
use App\Http\Resources\ResourceResource;
use App\Models\Resource;
use App\Models\Section;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Section $section)
    {
        $data = Resource::where('section_id', $section->id)->get();
        $resource = ResourceResource::collection($data);
        return $this->success('List of Resource for ' . $section->title . '.', $resource);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ResourceRequest  $request
     */
    public function store(ResourceRequest $request)
    {
        $resource = new ResourceResource(Resource::create($request->validated()));
        return $this->success('Resource Created Successfully.', $resource);
    }

    /**
     * Display the specified resource.
     *
     * @param  Resource  $resource
     */
    public function show(Resource $resource)
    {
        $resource = new ResourceResource($resource);
        return $this->success('Resource Detail.', $resource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ResourceRequest  $request
     * @param  Resource  $resource
     */
    public function update(ResourceRequest $request, Resource $resource)
    {
        $resource->update($request->validated());
        $resource = new ResourceResource($resource);
        return $this->success('Resource Updated Successfully.', $resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Resource  $resource
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();
        $resource = new ResourceResource($resource);
        return $this->success('Resource Deleted Successfully.', $resource);
    }
}
