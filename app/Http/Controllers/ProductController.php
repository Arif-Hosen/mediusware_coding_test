<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if((count($request->all()) > 0)){
            $product = new Product();
            if(isset($request->title)){
                $datas['products'] =  $product->where('title',$request->title)->with('product_variant_prices')->paginate(5);
                // return $datas['products'];
            }
            if(isset($request->price_from) && isset($request->price_to)){
                $price_from = $request->price_from;
                $price_to = $request->price_to;
    
                $datas['products'] = $product->whereHas('product_variant_prices', function ($query) use($price_to,$price_from) {
                    $query->whereBetween('price',[$price_from, $price_to]);
                })->with('product_variant_prices');
                // return $datas['products'];
                // return $request;
            }
             if(isset($request->date)){
                $datas['products'] =  $product->whereDate('created_at',$request->date)->with('product_variant_prices')->paginate(5);
            //    return $datas['products'];
            }
             if(isset($request->variant)){
                // return $request;
            }
            // return $product;
            return view('products.index',$datas);
        }
       
            $datas['products']  = Product::with('product_variant_prices')->paginate(5);
        
        // return $datas['products'];
        return view('products.index',$datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $variants = Variant::all();
        return view('products.edit', compact('variants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
