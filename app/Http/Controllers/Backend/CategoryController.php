<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\Backend\CategoryService;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.categories.index');
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
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        try {
            sleep(1);

            Category::create($validated);

            return response()->json([
                'message' => 'Category created successfully!',
                'data' => $validated
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to create category!',
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            sleep(1);

            $category->delete();

            return response()->json([
                'message' => 'Category deleted successfully!'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to delete category!'
            ], 500);
        }
    }

    /**
     * Process datatables ajax request.
     */
    public function serverside()
    {
        // $query = Category::query();
        $query = Category::query()->select('id', 'uuid', 'name', 'slug')->orderBy('id', 'desc');;

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function (Category $category) {
                return view('backend.categories._action', compact('category'))->render();
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
