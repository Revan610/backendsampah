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
        if (category::count()>=3){
            return response()->json([
                'status' => 'failed',
                'massage' => 'Limit is 3 categories'
            ]);
        }
        else{
            $category = new category();
            $category->name = $request->name;
            $category->price_per_kg = $request->price_per_kg;
            $category->save();
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
        //show an id
       $category = Category::find($id);

       //error
        if (!$category) {
            return response()->json([
                'message' => 'Category not found'
            ], 404);
        }

        //success
        return response()->json([
            'message' => 'Category found',
            'data' => $category
        ], 200);
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
        $category = category::destroy($id);
        if(!$category){
            return response()->json(['message' => 'Category Was Failed To Deleted']);
        }
        return response()->json(['message' => 'Category Was Successfuly Deleted']);
    }
}
