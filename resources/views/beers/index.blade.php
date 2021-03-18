<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <title>Beers list</title>
</head>
<body>

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
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($beers as $beer)
      <tr>
        <th scope="row">{{ $beer->id }}</th>
        <td>{{ $beer->name }}</td>
        <td>{{ $beer->origin_country }}</td>
        <td>{{ $beer->appearance }}</td>
        <td>{{ $beer->aroma }}</td>
        <td>{{ $beer->flavor }}</td>
        <td>{{ $beer->alcohol }}</td>
        <td>{{ $beer->ibu }}</td>
        <td>{{ $beer->srm }}</td>
        <td><img src="{{ $beer->image }}" alt="beer!" width="100"></td>

      </tr>
      @endforeach
  </tbody>
</table>

</body>
</html>
