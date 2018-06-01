<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try
        {
            //Product::create(Input::all());
            Product::create($request->all());
            DB::commit();
            return redirect()->route('product_index');
            //return Redirect::to(route('product_index'));
        }
        catch (\Exception $e){
            DB::rollBack();
            flash('Something went wrong')->error()->important();
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',compact('product'));

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
        DB::beginTransaction();
        try
        {
            $product = Product::findOrFail($id);
            //$product->update(Input::all());
            $product->request->all();
            DB::commit();
            return redirect()->route('product_show',$product->id);
            //return Redirect::to(route('product_show',$product->id));
        }
        catch ( \Exception $e){
            DB::rollBack();
            flash('Something went wrong')->error()->important();
            return redirect()->back()->withInput($request->all());
            //return Redirect::back()->withInput(Input::all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try
        {
            $product = Product::findOrFail($id);
            $product->delete();
            DB::commit();
            return Redirect::to(route('product_index'));
        }
        catch (\Exception $e){
            DB::rollBack();
            flash('Something went wrong')->error()->important();
            return redirect()->route('product_show',$product->id);
            //return Redirect::route('product_show',$product->id);
        }

    }
}
