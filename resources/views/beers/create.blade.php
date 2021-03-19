@extends('layout')

@section('title', 'Create')
@section('content')

<form class="needs-validation" action="{{route('beers.store')}}" method="post" novalidate>
    @csrf
    @method('POST')

    <div class="mb-3">
    <label for="validationCustomUsername" class="form-label">Beer name</label>
    <input type="text" name="name" class="form-control" id="validationCustomUsername" placeholder="Name" required>
    <div class="invalid-feedback">
        Please insert a name
    </div>
    </div>

    <div class="mb-3">
    <label for="origin_country" class="form-label">Beer origin country</label>
    <input type="text" name="origin_country" class="form-control" id="origin_country" placeholder="Origin Country" required>
        <div class="invalid-feedback">
        Please insert a country
    </div>
    </div>

    <div class="mb-3">
    <label for="appearance" class="form-label">Beer Appearance</label>
    <input type="text" name="appearance" class="form-control" id="appearance" placeholder="Appearance" required>
        <div class="invalid-feedback">
        Please insert the appearance
    </div>
    </div>

    <div class="mb-3">
    <label for="aroma" class="form-label">Beer Aroma</label>
    <input type="text" name="aroma" class="form-control" id="aroma" placeholder="Aroma" required>
        <div class="invalid-feedback">
        Please insert the beer aroma
    </div>
    </div>

    <div class="mb-3">
    <label for="flavor" class="form-label">Beer Flavor</label>
    <input type="text" name="flavor" class="form-control" id="flavor" placeholder="Flavor" required>
        <div class="invalid-feedback">
        Please insert the beer flavor
    </div>
    </div>

    <div class="mb-3">
    <label for="alcohol" class="form-label">Beer Alcohol</label>
    <input type="text" name="alcohol" class="form-control" id="alcohol" placeholder="Alcohol" required>
        <div class="invalid-feedback">
        Please insert the alcohol percentage
    </div>
    </div>

    <div class="mb-3">
    <label for="ibu" class="form-label">International Bitterness Units</label>
    <input type="text" name="ibu" class="form-control" id="ibu" placeholder="IBU" required>
        <div class="invalid-feedback">
        Please insert the IBU value
    </div>
    </div>

    <div class="mb-3">
    <label for="srm" class="form-label">Standard Reference Method(color)</label>
    <input type="text" name="srm" class="form-control" id="srm" placeholder="SRM" required>
        <div class="invalid-feedback">
        Please insert the SRM value
    </div>
    </div>

    <div class="mb-3">
    <label for="image" class="form-label">URL</label>
    <input type="text" name="image" class="form-control" id="image" placeholder="URL" required>
        <div class="invalid-feedback">
        Please insert the image URL
    </div>
    </div>


      <div class="mb-3">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

<script>

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

</script>
  {{-- <label for="title">Nome</label>
  <input type="text" name="name" placeholder="Nome">
  <label for="content">Cognome</label>
  <input type="text" name="lastname" placeholder="Cognome"> --}}


@endsection
