<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\VoteService;
use App\Model\Product;
use App\Model\Category;

/**
 * @author Mateusz Kozikowski <matkozikowski@gmail.com>
 */
class ProductController extends Controller
{
    /**
     * @var VoteService
     */
    protected $voteService;

    /**
     * @param VoteService $voteService
     */
    public function __construct(VoteService $voteService)
    {
        $this->voteService = $voteService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $result = Product::whereHas('category', function ($query) {
            $query->where('status', '=', 1);
        })->where(['status' => 1]);

        $products = $result->get()->map( function($product){
           $product->vote = $this->voteService->getVote($product->id);

           return $product;
        });

        return view('product.index', compact('products'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $categories = Category::where(['status' => 1])->get();

        return view('product.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'category' => 'required|integer',
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'quantity' => $request->get('quantity'),
            'category_id' => $request->get('category'),
        ]);

        $product->save();

        return redirect('/product')->with('success', 'Product has been added');
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $product = Product::find($id);
        $categories = Category::where(['status' => 1])->get();

        return view('product.edit', compact('product', 'categories'));
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
            'quantity' => 'required|integer',
            'category' => 'required|integer',
        ]);

        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->quantity = $request->get('quantity');
        $product->category_id = $request->get('category');
        $product->save();

        return redirect('/product')->with('success', 'Product has been updated');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $result = Product::where(['id' => $id])->update(['status' => 0]);

        if ($result) {
            return redirect('/product')->with('success', 'Category has been deleted Successfully');
        }
    }
}
