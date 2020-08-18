<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('product')->paginate(50);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'external_id'=>'required',
        ]);
        //Добавляем данные в БД
        $product = new Product([
            'name' => $request->post('name'),
            'description' => $request->post('description'),
            'price' => $request->post('price'),
            'quantity' => $request->post('quantity'),
            'category_id' => $request->post('category_id'),
            'external_id' => $request->post('external_id'),
            'creation_at' => date('Y-m-d H:i:s'),
        ]);
        $product->save();
        return redirect('/product')->with('success', 'Товар добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('product')->where('id', $id)->first();
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('product')->where('id', $id)->first();
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'external_id'=>'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->creation_at = date('Y-m-d H:i:s');
        $product->price = $request->get('price');
        $product->quantity = $request->get('quantity');
        $product->category_id = $request->get('category_id');
        $product->external_id = $request->get('external_id');
        $product->save();

        return redirect('/product')->with('success', 'Товар отредактирован!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product')->delete($id);
        return redirect('/product')->with('success', 'Товар удален!');
    }
}
