<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\VoteService;
use App\Model\Product;
use App\Model\Category;

/**
 * @author Mateusz Kozikowski <matkozikowski@gmail.com>
 */
class ApiController extends Controller
{
    protected $except = [
        'status',
        'vote',
        'products',
        'categories',
    ];

    /**
     * @var VoteService
     */
    protected $voteService;

    /**
     * @param VoteService $voteService
     */
    public function __construct(VoteService $voteService)
    {
        $this->middleware('auth:api')->except($this->except);

        $this->voteService = $voteService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function vote(Request $request): JsonResponse
    {
        try {
            $id = $request->get('product_id');

            if ($this->voteService->saveVote($id)) {
                $votes = $this->voteService->getVote($id);

                return response()->json(['status' => true, 'id' => $id, 'value' => $votes], 202);
            }
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'error' => $ex->getMessage()], 404);
        }
    }

    /**
     * @return JsonResponse
     */
    public function products(): JsonResponse
    {
        try {
            $result = Product::whereHas('category', function ($query) {
                $query->where('status', '=', 1);
            })->where(['status' => 1]);

            $products = $result->get()->map( function($product){
                $product->vote = $this->voteService->getVote($product->id);

                return $product;
            });

            return response()->json(['status' => true, 'result' => $products], 202);
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'error' => $ex->getMessage()], 404);
        }
    }

    /**
     * @return JsonResponse
     */
    public function categories(): JsonResponse
    {
        try {
            $categories = Category::where(['status' => 1])->get();

            return response()->json(['status' => true, 'result' => $categories], 202);
        } catch (\Exception $ex) {
            return response()->json(['status' => false, 'error' => $ex->getMessage()], 404);
        }
    }

    /**
     * @return JsonResponse
     */
    public function status(): JsonResponse
    {
        return response()->json(['result' => 'pong'], 202);
    }
}
