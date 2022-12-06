@extends('layouts.main')
@section('title')
     Dashboard Money Safe
@endsection

@section('content')    

@if ($message = Session::get('success'))
<div class="alert alert-success d-flex justify-content-center" width="15" height="10" role="alert">
     <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="success:"><use xlink:href="#check-circle-fill"/></svg>
     <div>
        {{$message}}
     </div>
</div>
@endif

@if ($message = Session::get('edit'))
<div class="alert alert-primary d-flex justify-content-center" width="15" height="10" role="alert">
     <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
     <div>
        {{$message}}
     </div>
</div>
@endif

@if ($message = Session::get('delete'))
<div class="alert alert-danger d-flex justify-content-center" width="15" height="10" role="alert">
     <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
     <div>
        {{$message}}
     </div>
</div>
@endif

<!-- @if ($message = Session::get('fial'))
<div class="alert alert-danger d-flex justify-content-center" width="15" height="10" role="alert">
     <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
     <div>
        {{$message}}
     </div>
</div>
@endif -->

@if(session('fail'))
<div class="alert alert-danger my-3">
     {{session('fail')}}
</div>
@endif



<!-- @error ('fail')
     <div class="container text-danger fs-6">
          {{ $message }}
     </div>
@enderror -->
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Money Safe
                            <a href="{{ route('createMoney') }}" class="btn btn-success float-end">Add Money Safe</a>
                        </h4>
                        
                    </div>
                    <table class="table-bordered table table-striped text-center">
                        <tr class="table-dark">
                            <th>NIS</th>
                            <th>Name</th>
                            <th>Region</th>
                            <th>Class</th>
                            <th>Money</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data as $dt)
                        <tr>  
                        <td>{{$dt->nis}}</td>
                        <td>{{$dt->name}}</td>
                        <td>{{$dt->region}}</td>
                        <td>{{$dt->class}}</td>
                        <td>Rp. {{number_format($dt->money,2,",",".")}}</td>
                        <td>
                        <form action="{{route('destroyMoney', $dt->id) }}" method="post">
                                <a class="btn btn-success" href="{{route('editMoney', $dt->id) }}">Edit</a>
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection