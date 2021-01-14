@extends('layouts.main')

@section('content')

<div class="container-fluid main ">

    <div class="row d-flex justify-content-around">
        <div class="col-md-6 side-bar">

            <div class="row ">
                <div class="col " style="margin: 20px;">
                    <div class="jumbotron sticky-top list-title-block">
                        <h1 class="list-title">ajouter  une célébrité</h1>
                        <hr>
                    </div>

                    <form action="{{ route('savestar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="last_name">Nom</label>
                            <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last_name" name="last_name" placeholder="Nom">
                            <small class="form-text  input-erros" style="color:red !important"> {{ $errors->first('last_name')  }} </small>
                        </div>
                        <div class="form-group">
                            <label for="first_name">Prenom</label>
                            <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name" name="first_name" placeholder="Prenom">
                            <small class="form-text  input-erros" style="color:red !important"> {{ $errors->first('first_name')  }}  </small>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" placeholder="Description"></textarea>
                            <small class="form-text  input-erros" style="color:red !important"> {{ $errors->first('description')  }}</small>
                        </div>
                        <div class="">
                            <input type="file" class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" id="customFile">
                            <label class="" for="customFile">Choisissez une image</label>
                            <small class="form-text  input-erros" style="color:red !important"> {{ $errors->first('image')  }} </small>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection