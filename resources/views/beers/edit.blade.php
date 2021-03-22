@extends('layout')

@section('title', 'Edit')
@section('content')

    <h1>Edit details</h1>

    <form class="needs-validation" action="{{ route('beers.update', compact('beer')) }}" method="post" novalidate>
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="validationCustomUsername" class="form-label">Beer name</label>
        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="validationCustomUsername" placeholder="Name" value="{{ $beer->name }}">
        {{-- VALIDATION: FIELD **REQUIRED** --}}
        <div class="invalid-feedback">
        {{ $errors->first('name') }}
        </div>
    </div>

    <div class="mb-3">
        <label for="origin_country" class="form-label">Beer origin country</label>
        <input type="text" name="origin_country" class="form-control {{ $errors->has('origin_country') ? 'is-invalid' : '' }}" id="origin_country" placeholder="Origin Country" value="{{ $beer->origin_country }}" >
        {{-- VALIDATION: FIELD **REQUIRED** --}}
        <div class="invalid-feedback">
        {{ $errors->first('origin_country') }}
        </div>
    </div>

    <div class="mb-3">
        <label for="appearance" class="form-label">Beer Appearance</label>
        <input type="text" name="appearance" class="form-control {{ $errors->has('appearance') ? 'is-invalid' : '' }}" id="appearance" placeholder="Appearance" value="{{ $beer->appearance }}" >
        {{-- VALIDATION: FIELD NOT REQUIRED --}}
        <div class="invalid-feedback">
        {{ $errors->first('appearance') }}
        </div>
    </div>

    <div class="mb-3">
        <label for="aroma" class="form-label">Beer Aroma</label>
        <input type="text" name="aroma" class="form-control {{ $errors->has('aroma') ? 'is-invalid' : '' }}" id="aroma" placeholder="Aroma" value="{{ $beer->aroma }}" >
        {{-- VALIDATION: FIELD NOT REQUIRED --}}
        <div class="invalid-feedback">
        {{ $errors->first('aroma') }}
        </div>
    </div>

    <div class="mb-3">
        <label for="flavor" class="form-label">Beer Flavor</label>
        <input type="text" name="flavor" class="form-control {{ $errors->has('flavor') ? 'is-invalid' : '' }}" id="flavor" placeholder="Flavor" value="{{ $beer->flavor }}" >
        {{-- VALIDATION: FIELD NOT REQUIRED --}}
        <div class="invalid-feedback">
        {{ $errors->first('flavor') }}
        </div>
    </div>

    <div class="mb-3">
        <label for="alcohol" class="form-label">Beer Alcohol</label>
        <input type="text" name="alcohol" class="form-control {{ $errors->has('alcohol') ? 'is-invalid' : '' }}" id="alcohol" placeholder="Alcohol" value="{{ $beer->alcohol }}" >
        {{-- VALIDATION: FIELD **REQUIRED** --}}
        <div class="invalid-feedback">
        {{ $errors->first('alcohol') }}
        </div>

    </div>

    <div class="mb-3">
        <label for="ibu" class="form-label">International Bitterness Units</label>
        <input type="text" name="ibu" class="form-control {{ $errors->has('ibu') ? 'is-invalid' : '' }}" id="ibu" placeholder="IBU" value="{{ $beer->ibu }}" >
        {{-- VALIDATION: FIELD NOT REQUIRED --}}
        <div class="invalid-feedback">
        {{ $errors->first('ibu') }}
        </div>
    </div>

    <div class="mb-3">
        <label for="srm" class="form-label">Standard Reference Method(color)</label>
        <input type="text" name="srm" class="form-control {{ $errors->has('srm') ? 'is-invalid' : '' }}" id="srm" placeholder="SRM" value="{{ $beer->srm }}" >
        {{-- VALIDATION: FIELD NOT REQUIRED --}}
        <div class="invalid-feedback">
        {{ $errors->first('srm') }}
        </div>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">URL</label>
        <input type="text" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image" placeholder="URL" value="{{ $beer->image }}" >
        {{-- VALIDATION: FIELD **REQUIRED** --}}
        <div class="invalid-feedback">
        {{ $errors->first('image') }}
        </div>
    </div>

    <div class="mb-3">
        <label for="old-image">Old Image</label>
        <div>
            <img src="{{$beer->image}}" class="card-img-top" alt="beer!" style="width: 10rem;">
        </div>
    </div>


    <div class="mb-3">
        <a href="{{ route('beers.index', compact('beer')) }}" class="btn btn-danger"><i class="fas fa-undo">Undo</i></a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>



@endsection
