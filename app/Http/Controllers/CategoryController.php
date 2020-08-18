<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('category')->paginate(50);
        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'parent_id'=>'required',
            'external_id'=>'required',
        ]);
        //Добавляем данные в БД
        $category = new Category([
            'name' => $request->post('name'),
            'parent_id' => $request->post('parent_id'),
            'external_id' => $request->post('external_id'),
        ]);
        $category->save();
        return redirect('/category')->with('success', 'Категория добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('category')->where('id', $id)->first();
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('category')->where('id', $id)->first();
        return view('category.edit', compact('category'));
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
        $request->validate([
            'name'=>'required',
            'parent_id'=>'required',
            'external_id'=>'required',

        ]);
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->parent_id = $request->get('parent_id');
        $category->external_id = $request->get('external_id');
        $category->save();

        return redirect('/category')->with('success', 'Категория отредактирован!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('category')->delete($id);
        return redirect('/category')->with('success', 'Товар удален!');
    }
}
