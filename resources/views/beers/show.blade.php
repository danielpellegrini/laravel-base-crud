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
    <a href="#" class="btn btn-primary">Edit</a>
  </div>
</div>

@endsection
