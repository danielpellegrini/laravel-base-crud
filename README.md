# Laravel CRUD

## CREATE A NEW PROJECT

    composer create-project --prefer-dist laravel/laravel:^7.0 repo-name cd repo-name


--------------------------------------------------------------------

## PUSH REPO ON GIT 

select HTTPS on gitHub

    git init

    git remote add origin <select the complete string on gitHub>

    git add .

    git commit -am initial commit  (a= add m= message)

    git push --set-upstream origin main

    git push

--------------------------------------------------------------------

## UPDATING LARAVEL-MIX

root -> open package.json -> change "laravel-mix" in --> ^6.0.13

    npm install

then

    npm audit fix

then

    npx mix



--------------------------------------------------------------------

## INSTALLING BOOTSTRAP

    composer require laravel/ui:^2.4

then

    php artisan ui bootstrap <- updating dependencies

then

    npm install

then

    open .blade.php file and add:
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

--------------------------------------------------------------------

## INSTALLING FONTAWESOME

    npm install --save-dev @fortawesome/fontawesome-free

into app.scss

    // Fontawesome
    @import '~@fortawesome/fontawesome-free/css/all.min.css';

--------------------------------------------------------------------

## CREATING A NEW EMPTY DATABASE

Open MAMP -> phpMyAdmin -> New

Open .env file (project root) and update DB values: 

`DB_CONNECTION=mysql `\
`DB_HOST=127.0.0.1 `\
`DB_PORT=3306`\
`DB_DATABASE=db_name` \<- same database name chose on SQL\
`DB_USERNAME=root`\
`DB_PASSWORD=root` <- add this value

## Testing connection with database
    php artisan tinker


then

    DB::Connection()->getPdo();

--------------------------------------------------------------------
## DATABASE: MIGRATIONS Generate the migration for a new db table

    php artisan make:migration create_tablename_table

-- https://laravel.com/docs/7.x/migrations#creating-tables --

check into root/database/migrations you should have a new file

    if you need to drop the table from the database to edit it:

    php artisan migrate:rollback 
    

--------------------------------------------------------------------
## FILLING DATABASE THROUGH phpMyAdmin

Open your database in phpMyAdmin then select SQL and create a new (or more) query


--------------------------------------------------------------------
## FILLING DATABASE THROUGH MIGRATIONS (root/database/migrations)

            public function up()
    {
        Schema::create('dbName', function (Blueprint $table) {
            $table->id();
            $table->string('item_1', 45)->default(value);
            $table->string('item_2', 45)->required();
            $table->timestamps();
        });
    }


--------------------------------------------------------------------
## MAKING A MODEL

    php artisan make:model ModelName  <- PascalCase

then add to root/app/model

    protected $table = 'tableName'; <singular>   
    
    protected $fillable =
    [
        'item_1',
        'item_2',
    ];

--------------------------------------------------------------------
## MAKING A CONTROLLER WITH --resource (CRUD)

    php artisan make:controller --resource NameController <- PascalCase

--------------------------------------------------------------------
## CONNECTING DATABASE (database/migrations)

Open routes/web.php and add:

    Route::resource('/dbName', NameController::class);

then



--------------------------------------------------------------------
## SETTING CONTROLLER (root/app/Http/Controllers)

namespace App\Http\Controllers;

    use App\ModelName;   <- add this

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
            $items = ModelName::all();
            return view('items.index', compact('items'));
        }

add into resources/views

        folderIntoView

create a function to validate the form at the end, before 'destroy'.

    private function validateForm(Request $request) {

        $request->validate([
            "item_1" => 'required|max:255',
            "item_2" => 'required|max:255'
        ])

    }

EDITING create

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create(ModelName $item)
        {
            return view('folderIntoView.create', compact('item'));
        }



 EDITING store 

    /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(Request $request)
        {
            $this->validateForm($request);

            $data = $request->all();

            $item = new ModelName();
            $item->fill($data);
            $item->save();            
            $itemOrdered = ModelName::orderBy('id', 'desc')->first();

            return redirect()->route('folderIntoView.index', $itemOrdered);
        }

EDITING show 

    /**
        * Display the specified resource.
        *
        * @param  int  $item
        * @return \Illuminate\Http\Response
        */
        public function show(ModelName $item)
        {

            return view('folderIntoView.show', compact('item'));
        }

EDITING edit 

    /**
        * Show the form for editing the specified resource.
        *
        * @param  ModelName  $item
        * @return \Illuminate\Http\Response
        */
        public function edit(ModelName $item)
        {
            // dd($item);
            return view('folderIntoView.edit', compact('item'));
        }

EDITING update

    /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $item
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, ModelName $item)
        {
            $data = $request->all();
            // validation
            $item->update($data); // similar to $item->fill in store

            return redirect()->route('folderIntoView.show', compact('item')); <- gli stiamo passando i parametri dinamici della rotta 
        }

EDITING destroy

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $item
        * @return \Illuminate\Http\Response
        */
        public function destroy(ModelName $item)
        {
            $item->delete();

            return redirect()->route('folderIntoView.index');
    }


    




--------------------------------------------------------------------

# VIEW



## CREATING MAIN LAYOUT (resources/views)

create a folder name:

    template

then inside:

    layout.blade.php

then inside:

    <!DOCTYPE html>
    <html lang="en">

        <head>

            <title>Laravel-base-crud - @yield('title')</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="{{ asset('css/app.css')}}">
            <script src="{{ asset('js/app.js') }}"></script>

        </head>

        <body>

            <header>
                <div class="container">            
                    <h1>Title</h1>
                </div>
            </header>

            <div class="container">
                @yield('content')
            </div>


        </body>

    </html>



--------------------------------------------------------------------
## ADDING LAYOUT TO RESOURCES/VIEW/CREATE.BLADE.PHP

    @extends('template.layout)

    @section('title', 'Choose a title here')

    @section ('content')

        <Write the code here>

    @endsection

--------------------------------------------------------------------
## ADDING FORM INTO CREATE.BLADE

    <h1>Add a new item</h1>

    <form class="needs-validation" action="{{ route('folderIntoView.store') }}" method="post" novalidate>
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="validationCustomUsername" class="form-label">Title</label>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="validationCustomUsername" placeholder="Name">
            {{-- VALIDATION: FIELD **REQUIRED** --}}
            <div class="invalid-feedback">
            {{ $errors->first('name') }}
            </div>
        </div>
    

        <div class="mb-3">
            <a href="{{ route('beers.index', compact('beer')) }}" class="btn btn-danger"><i class="fas fa-undo">Undo</i></a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

--------------------------------------------------------------------

            




