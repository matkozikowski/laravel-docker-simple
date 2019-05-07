<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Model\Category;

/**
 * @author Mateusz Kozikowski <matkozikowski@gmail.com>
 */
class CategoryController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $categories = Category::where(['status' => 1])->get();

        return view('category.index', compact('categories'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('category.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category([
            'name' => $request->get('name'),
        ]);

        $category->save();

        return redirect('/category')->with('success', 'Category has been added');
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $category = Category::find($id);

        return view('category.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name'=>'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->save();

        return redirect('/category')->with('success', 'Category has been updated');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $result = Category::where(['id' => $id])->update(['status' => 0]);

        if ($result) {
            return redirect('/category')->with('success', 'Category has been deleted Successfully');
        }
    }
}
