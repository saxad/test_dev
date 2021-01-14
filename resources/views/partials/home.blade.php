@extends('layouts.main')

@section('content')


<!-- ------------------ main container ------------------ -->

<div class="container-fluid main ">

  <div class="row d-flex justify-content-around">

    <!-- ------------------ SIDE BAR ------------------ -->
    <div class="col-md-4 side-bar" style=" max-height:640px;">

      <div class="row ">
        <div class="col" style="margin: 20px;">
          <div class="jumbotron sticky-top list-title-block">
            <h1 class="list-title">liste de célébrités</h1>
            <hr>
          </div>

          @if(isset($stars) && !$stars->isEmpty())
          <ul class="list-group list-group-flush">
            @foreach($stars as $star)


            <li class="list-group-item starbox lip" id="{{ $star->id }}">
              <img class="picture-liste " src="{{ url($star->image)  }}" alt="" width="50" height="50">
              {{ $star->first_name  }} {{ $star->last_name  }}
            </li>

            @endforeach
          </ul>
          @else
          <p class="noentry">
            aucune célébrité n'est trouvée
          </p>
          @endif
        </div>

      </div>

    </div>
    <!-- / ------------------ SIDE BAR ------------------ -->


    <!-- ------------------ STAR INFORMATION ------------------ -->

    <div class="col-md-7  main-content">

      <!-- ------------------ STAR HEADER ------------------ -->

      <div class="row justify-content-center">
        @if(isset($stars) && !$stars->isEmpty())

        <div class="col-md-6 text-center info-pic">
          <img class="main-image" src="{{url($stars->first()->image)}}" alt="">
          <h4 id="{{ $stars->first()->id}}"><span class="first-name">{{ $stars->first()->first_name}}</span> <span class="last-name">{{ $stars->first()->last_name}}</span></h4>
        </div>
      </div>
      <!-- / ------------------ STAR HEADER ------------------ -->

      <!--  ------------------ STAR DESCRIPTION ------------------ -->

      <div class="row description-block">
        <div class="col">
          <p class="description">
            {{ $stars->first()->description}}
          </p>
          <!-- delet change block-->
          <div >
            <div style="display: inline-block;">
            <form method="POST" class="delete-user" action="{{route('delete', $star->first()->id)}}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}

              <div class="form-group">
                <input type="submit" class="btn btn-info " value="supprimer">
              </div>
            </form>

            </div>
           
            <!-- Button trigger modal -->
            <button  style="display: inline-block;" id="show-edit-box" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editstar">
              Modifier
            </button>
          </div>
          <!-- /  delet change block-->



        </div>

      </div>
      <!-- / ------------------ STAR DESCRIPTION ------------------ -->
      @else
      <p>
        <img src="{{ asset('images/404.png')}}" alt="">
      </p>
      @endif
    </div>
    <!-- / ------------------ STAR INFORMATION ------------------ -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="editstar" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modification de la star</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form class="update-form" action="{{ route('edit','0')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="" id="starid" name="id">
            <div class="form-group">
              <label for="last_name">Nom</label>
              <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last_name" name="last_name" placeholder="Nom ...">
              <small class="form-text  input-erros" style="color:red !important"> {{ $errors->first('last_name')  }} </small>
            </div>
            <div class="form-group">
              <label for="first_name">Prenom</label>
              <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name" name="first_name" placeholder="Prenom ...">
              <small class="form-text  input-erros" style="color:red !important"> {{ $errors->first('first_name')  }} </small>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" placeholder="Description ..."></textarea>
              <small class="form-text  input-erros" style="color:red !important"> {{ $errors->first('description')  }}</small>
            </div>
            <div class="">
              <input type="file" class=" {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" id="customFile">
              <label class="" for="customFile">Choisissez une image</label>
              <small class="form-text  input-erros" style="color:red !important"> {{ $errors->first('image')  }} </small>
            </div>


            <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary " id="modifier">Modifier</button>
            </div>
        </div>
        </form>
      </div>

    </div>
  </div>



  <!-- ---------------------------------------------->

</div>

<!-- / ------------------ main container ------------------ -->
@endsection


@section('script')

<script>
  window.onload = function() {

    // load star from side bar to main content
    $(".starbox").click(function() {


      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      var id = $(this).attr('id');

      $.ajax({
        type: "POST",
        url: `{{url('/loadstar/${id}')}}`,
        data: {
          id: id
        },
        success: function(response) {
          $(".info-pic h4").attr('id', response.id)
          $(".first-name").html(response.first_name);
          $(".last-name").html(response.last_name);
          $(".description").html(response.description)
          $(".main-image").attr('src', response.image)
          var id = response.id;
          var url = '{{ route("delete", ":id") }}';
          url = url.replace(':id', response.id);
          $('.delete-user').attr('action', url)
        },
        error: function(error) {
          console.log(error);
        }
      });
    })


    //load  star information in modal box
    $('#show-edit-box').click(function() {

      $(".modal-body #starid").val($(".info-pic h4").attr('id'));
      $(".modal-body #last_name").val($("span.last-name").html());
      $(".modal-body #first_name").val($(".first-name").html());
      $(".modal-body #description").val($(".description-block p").html());
      $('#customFile').replaceWith($('#customFile').val('').clone(true));
    });

    //reset  picture onload of modal box
    $("#modifier").click(function() {

      var id = $(".modal-body #starid").val();
      $(".update-form").attr('action', `{{url('/editstar/${id}')}}`)

    });
  }
</script>

@endsection