<?php

namespace App\Http\Controllers;

use App\Models\main;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $goods = main::latest()->paginate(5);

        return view('main.goods', compact('goods'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('main.Create');
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'describe' => 'required',
        ]);

        main::create($request->all());

        return redirect()->route('main.index')
            ->with('success', 'goods created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(main $main)
    {
        //
        return view('main.Edit', compact('main'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, main $main)
    {
        //
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'describe' => 'required',
        ]);
        $main->update($request->all());

        return redirect()->route('main.index')
            ->with('success', 'goods updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(main $main)
    {
        //

        $main->delete();

        return redirect()->route('main.index')
            ->with('success', 'goods deleted successfully');
    }
}
