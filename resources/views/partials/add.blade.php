@extends('layouts.main')

@section('content')


<div class="container-fluid main ">
        <div class="row d-flex justify-content-around">
            <div class="col-md-6 side-bar">


                <div class="row ">
                    <div class="col " style="margin: 20px;">
                        <div class="jumbotron sticky-top list-title-block">
                            <h1 class="list-title">add star </h1>
                            <hr>
                        </div>

                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="nom">
                                <small id="emailHelp" class="form-text text-muted"> &nbsp;</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Prenom</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="prenom">
                                <small id="emailHelp" class="form-text text-muted"> &nbsp;</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>

                                <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="description"></textarea>
                                <small id="emailHelp" class="form-text text-muted"> &nbsp;</small>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>

                </div>



            </div>

        </div>

    </div>

@endsection