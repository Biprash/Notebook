<?php

namespace App\Http\Controllers\Api\Publics;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResourceResource;
use App\Models\Resource;
use App\Models\Section;

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
     * Display the specified resource.
     *
     * @param  Resource  $resource
     */
    public function show(Resource $resource)
    {
        $resource = new ResourceResource($resource);
        return $this->success('Resource Detail.', $resource);
    }
}
