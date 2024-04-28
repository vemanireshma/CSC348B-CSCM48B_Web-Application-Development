<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('user.category.index', compact('category'));
    }

    public function create()
    {
        return view('user.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new Category();
        $category->name = $data['name'];
        $category->slug =
            Str::slug($data['slug']);
        $category->description = $data['description'];
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('uploads/category'), $filename);
        //     $category->image = $filename;
        // }

        $category->image = 'default_image.jpg';
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('/user/category')->with('message', 'Category Added Successfully');
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('user.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();

        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->slug =
            Str::slug($data['slug']);
        $category->description = $data['description'];
        // if ($request->hasFile('image')) {

        //     $destination = 'uploads/category' . $category->image;
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }
        //     $file = $request->file('image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('uploads/category'), $filename);
        //     $category->image = $filename;
        // }

        $category->image = 'default_image.jpg';
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->update();

        return redirect('/user/category')->with('message', 'Category Updated Successfully');
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->category_delete_id);

        if ($category) {
            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $category->posts()->delete();
            $category->delete();
            return redirect('/user/category')->with('message', 'Category Deleted with its Posts Successfully');
        } else {
            return redirect('/user/category')->with('message', 'No Category ID Found');
        }
    }
}
