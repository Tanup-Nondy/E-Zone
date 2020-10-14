<?php

namespace App\Http\Controllers;

use App\CategoriesModel;
use App\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=ProductModel::all();
        return view('front.home',compact('products'));
    }
    public function shop()
    {
        $products=ProductModel::all();
        return view('front.shop',compact('products'));
    }
    public function showCats($id)
    {
        $cat_products=ProductModel::where('category_id',$id)->get();
        $id_=$id;
        //$cat_name=CategoriesModel::select('name')->where('id',$id)->get();
        return view('front.cat_products',compact('cat_products','id_'));
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function product_detail($id)
    {
        $products=ProductModel::findOrFail($id);

        //dd($products->id);
        return view('front.product_detail',compact('products'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
