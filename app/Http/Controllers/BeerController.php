<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beers = Beer::all();
        return view('beers.index', compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Beer $beer)
    {
        // return view('beers.create');
        return view('beers.create', compact('beer'));
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
            'name' => 'required|between:3,45',
            'origin_country' => 'required|between:3,45',
            'appearance' => 'nullable|between:3,50',
            'aroma' => 'nullable|between:3,50',
            'flavor' => 'nullable|between:3,50',
            'alcohol' => 'required|numeric|between:1,80',
            'ibu' => 'nullable|numeric|between:1,100.0',
            'srm' => 'nullable|numeric|between:1,60',
            'image' => 'required|between:0,2048'
        ]);

        $data = $request->all();

        $beer = new Beer();
        $beer->fill($data);

        // LONGER VERSION

        // $beer = new Beer();
        // $beer->name = $data['name'];
        // $beer->origin_country = $data['origin_country'];
        // $beer->appearance = $data['appearance'];
        // $beer->aroma = $data['aroma'];
        // $beer->flavor = $data['flavor'];
        // $beer->alcohol = $data['alcohol'];
        // $beer->ibu = $data['ibu'];
        // $beer->srm = $data['srm'];
        // $beer->image = $data['url'];

        $beer->save();

        $beerStored = Beer::orderBy('id', 'desc')->first();

        return redirect()->route('beers.index', $beerStored);
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $beer = Beer::find($id);

    //     return view('beers.show', compact('beer'));
    // }

    // SHORTER VERSION

    /**
     * Display the specified resource.
     *
     * @param  int  $beer
     * @return \Illuminate\Http\Response
     */
    public function show(Beer $beer)
    {

        return view('beers.show', compact('beer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function edit(Beer $beer)
    {
        // dd($beer);
        return view('beers.edit', compact('beer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $beer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beer $beer)
    {
        $data = $request->all();
        // validation
        $beer->update($data); // similar to $beer->fill in store

        return redirect()->route('beers.show', compact('beer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beer $beer)
    {
        $beer->delete();

        return redirect()->route('beers.index');
    }
}
