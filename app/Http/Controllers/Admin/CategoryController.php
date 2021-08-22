<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $categoryData = Category::All();
        return view('backend.category.admin_all_category', compact('categoryData'));
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
        ]);
        $data = Str::title($request->category_name);
        Category::insert(
            [
                'category_name' => $data
            ]
        );
        return redirect()->back();
    }

    public function deleteCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }

    public function listSubCategory()
    {
        $subCategoryData = SubCategory::All();
        $categoryData = Category::All();
        return view('backend.sub_category.admin_all_sub_category', compact('subCategoryData', 'categoryData'));
    }

    public function addSubCategory(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'sub_category_name' => 'required',
        ]);
        $data = Str::title($request->sub_category_name);
        SubCategory::insert(
            [
                'sub_category_name' => $data,
                'category_id' => $request->category,
            ]
        );
        return redirect()->back();
    }
}
