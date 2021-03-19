<?php

namespace App\Http\Controllers;

use App\Beer;
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
    public function create()
    {
        return view('beers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $beer = new Beer();
        $beer->fill($data);


        // LONGER VERSION

        // $beer = new Beer();
        // $beer->name = $data['name'];
        // $beer->origin_country = $data['origin-country'];
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
