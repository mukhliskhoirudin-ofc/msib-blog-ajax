<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $validated = $request->validated();

        try {
            sleep(1);

            Tag::create($validated);

            return response()->json([
                'message' => 'Tag created successfully!',
                'data' => $validated
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to create tag!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return response()->json([
            'message' => 'Tag loaded successfully!',
            'data' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $validated = $request->validated();

        try {
            sleep(1);

            $tag->update($validated);

            return response()->json([
                'message' => 'Tag updated successfully!',
                'data' => $tag
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to update tag!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        try {
            sleep(1);

            $tag->delete();

            return response()->json([
                'message' => 'Tag deleted successfully!'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to delete tag!'
            ], 500);
        }
    }

    public function serverside()
    {
        $query = Tag::query()->select('id', 'uuid', 'name', 'slug')->orderBy('id', 'desc');;

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function (Tag $tag) {
                return view('backend.tags._action', compact('tag'))->render();
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
