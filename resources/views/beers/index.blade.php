@extends('layout')

@section('title', 'Index')
@section('content')




<h1 class="text-center">BBE Best Brewery Ever</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id#</th>
      <th scope="col">Name</th>
      <th scope="col">Origin Country</th>
      <th scope="col">Appearance</th>
      <th scope="col">Aroma</th>
      <th scope="col">Flavor</th>
      <th scope="col">Alcohol</th>
      <th scope="col">IBU</th>
      <th scope="col">SRM</th>
      <th scope="col"></th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($beers as $beer)
    <tr>
      <th scope="row">{{ $beer->id }}</th>
      <td><a href="{{ route('beers.show', compact('beer')) }}">{{ $beer->name }}</a></td>
      <td>{{ $beer->origin_country }}</td>
      <td>{{ $beer->appearance }}</td>
      <td>{{ $beer->aroma }}</td>
      <td>{{ $beer->flavor }}</td>
      <td>{{ $beer->alcohol }}%</td>
      <td>{{ $beer->ibu }}</td>
      <td>{{ $beer->srm }}</td>
      <td></td>
      <td class="image"><img src="{{ $beer->image }}" alt="beer!"></td>
      <td>
        <a href="{{ route('beers.create', compact('beer')) }}"><i class="fas fa-plus"></i></a>
        <a href="{{ route('beers.show', compact('beer')) }}"><i class="fas fa-eye"></i></a>
        <a href="{{ route('beers.edit', compact('beer')) }}"><i class="fas fa-edit"></i></a>
        <a href="{{ route('beers.destroy', compact('beer')) }}"><i class="fas fa-trash-alt"></i></a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>

@endsection
