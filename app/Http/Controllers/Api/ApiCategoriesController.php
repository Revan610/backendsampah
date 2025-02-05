<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class ApiCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Data Categories
        $categories=category::all();
        return response()->json([
            'status' => 'success',
            'data' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //create limit 3 categories
        $category = new category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        if (category::count()>=3){
            return response()->json([
                'status' => 'failed',
                'massage' => 'Limit is 3 categories'
            ]);
        }
        else{
            return response()->json([
                'status' => 'success',
                'massage' => 'Category created',
                'data' => $category
            ]);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy(string $id)
    {
        //
    }
}
