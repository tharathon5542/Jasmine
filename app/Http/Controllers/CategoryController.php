<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        session()->put('activeMenu', 'manageCategory');

        $categories = DB::table('categories')->select('categoryID', 'categoryName', 'created_at', 'updated_at')->paginate(15);

        return view('category.categories', compact('categories'));
    }

    public function cardShow()
    {
        //

        session()->put('activeMenu', 'category');

        $categories = Category::latest()->paginate(100);

        return view('category.cardCategory', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'input_categoryName',
            'input_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $input = $request->all();

        $input['input_image'] = "defaultCategory.png";

        if ($image = $request->file('input_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['input_image'] = "$profileImage";
        }

        Category::create([
            'categoryName' => $input['input_categoryName'],
            'image' => $input['input_image']
        ]);

        return redirect()->route('category.index')->with('success', 'New category was add.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('category.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'input_categoryName',
            'input_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $input = $request->all();

        $category = Category::find($category['categoryID']);

        $category->categoryName = $input['input_categoryName'];

        if ($image = $request->file('input_image')) {
            $destinationPath = 'image/';
            if ($category->image != "defaultCategory.png") {
                File::delete($destinationPath . $category->image);
            }
            $categoryImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $categoryImage);
            $input['input_image'] = "$categoryImage";
            $category->image = $input['input_image'];
        }

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category was updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();

        if ($category->image != "defaultCategory.png") {
            $destinationPath = 'image/';
            File::delete($destinationPath . $category->image);
        }

        return redirect()->route('category.index')->with('success', 'Category was deleted!');
    }
}
