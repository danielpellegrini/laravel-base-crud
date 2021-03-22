@extends('layout')

@section('title', 'Show')
@section('content')

<div class="card" style="width: 25rem;">
  <img src="{{$beer->image}}" class="card-img-top" alt="beer!">
  <div class="card-body">
    <h5 class="card-title">Name: <span>{{$beer->name}}</span></h5>
    <p class="card-text">Origin country: <span>{{$beer->origin_country}}</span></p>
    <p class="card-text">Appearance: <span>{{$beer->appearance}}</span></p>
    <p class="card-text">Aroma: <span>{{$beer->aroma}}</span></p>
    <p class="card-text">Flavor: <span>{{$beer->flavor}}</span></p>
    <p class="card-text">Alcohol: <span>{{$beer->alcohol}}%</span></p>
    <p class="card-text">International Bitterness Units: <span>{{$beer->ibu}}</span></p>
    <p class="card-text">Standard Reference Method(color): <span>{{$beer->srm}}</span></p>
    <a href="{{ route('beers.index', compact('beer')) }}" class="btn btn-secondary"><i class="fas fa-home">Home</i></a>
    <a href="{{ route('beers.edit', compact('beer')) }}" class="btn btn-primary"><i class="fas fa-edit">Edit</i></a>
    <a href="{{ route('beers.destroy', compact('beer')) }}" class="btn btn-danger"><i class="fas fa-trash-alt">Delete</i></a>
  </div>
</div>

@endsection
