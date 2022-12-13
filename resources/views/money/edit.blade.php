@extends('layouts.main')
@section ('title')
     Edit Money Safe
@endsection
@section ('content')
     <div class="row justify-content-center">
            <div class="col-lg-5">
                {{-- Jika kita berhasil melakukan registrasi alert ini akan muncul , alert ini diatur didalam RegisterController --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session ('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="container">
                    <main class="form-register input">
                        <div class="card shadow p-5 bg-secondary bg-opacity-25">
                        <form action="{{ route('updateMoney', $data->id) }}" method="post">
                           @csrf
                            <h1 class="h3 mb-3 fw-normal text-center">Edit Money Safe</h1>
                              @error ('nis')
                                   <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                   </div>
                              @enderror
                              <div class="form-floating">
                                <input type="text" name="nis" class="form-control mt-2" id="nis" value="{{$data->nis}}">
                                <label for="nis">NIS</label>
                              </div>
                              <div class="form-floating">
                                <input type="text" name="name" class="form-control mt-2" id="name" value="{{$data->name}}" >
                                <label for="name">Name</label>
                              </div>
                              <div class="form-floating mb-3 mt-3">
                                   <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="region" value="{{$data->region}}" >
                                        <option value="Cicurug 1">Cicurug 1</option>
                                        <option value="Cicurug 2">Cicurug 2</option>
                                        <option value="Cicurug 3">Cicurug 3</option>
                                        <option value="Cicurug 4">Cicurug 4</option>
                                        <option value="Cicurug 5">Cicurug 5</option>
                                        <option value="Cicurug 6">Cicurug 6</option>
                                        <option value="Cicurug 7">Cicurug 7</option>
                                        <option value="Ciawi 1">Ciawi 1</option>
                                        <option value="Ciawi 2">Ciawi 2</option>
                                        <option value="Ciawi 3">Ciawi 3</option>
                                        <option value="Ciawi 4">Ciawi 4</option>
                                        <option value="Ciawi 5">Ciawi 5</option>
                                        <option value="Cibedug 1">Cibedug 1</option>
                                        <option value="Cibedug 2">Cibedug 2</option>
                                        <option value="Cibedug 3">Cibedug 3</option>
                                        <option value="Cisarua 1">Cisarua 1</option>
                                        <option value="Cisarua 2">Cisarua 2</option>
                                        <option value="Cisarua 3">Cisarua 3</option>
                                        <option value="Cisarua 4">Cisarua 4</option>
                                        <option value="Cisarua 5">Cisarua 5</option>
                                        <option value="Cisarua 6">Cisarua 6</option>
                                        <option value="Tajur 1">Tajur 1</option>
                                        <option value="Tajur 2">Tajur 2</option>
                                        <option value="Tajur 3">Tajur 3</option>
                                        <option value="Tajur 4">Tajur 4</option>
                                        <option value="Tajur 5">Tajur 5</option>
                                        <option value="Sukasari 1">Sukasari 1</option>
                                        <option value="Sukasari 2">Sukasari 2</option>
                                        <option value="Wikrama 1">Wikrama 1</option>
                                        <option value="Wikrama 2">Wikrama 2</option>
                                        <option value="Wikrama 3">Wikrama 3</option>
                                        <option value="Wikrama 4">Wikrama 4</option>
                                   </select>
                                   <label for="floatingSelect">Region</label>
                              </div>
                              <div class="form-floating mb-3">
                                   <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="class" value="{{$data->class}}" >
                                        <option value="PPLG">PPLG</option>
                                        <option value="TJKT">TJKT</option>
                                        <option value="DKV">DKV</option>
                                        <option value="MPLB">MPLB</option>
                                        <option value="PMN">PMN</option>
                                        <option value="HTL">HTL</option>
                                        <option value="KLN">KLN</option>
                                   </select>
                                   <label for="floatingSelect">Class</label>
                              </div>
                              <div class="form-floating mb-3">
                                   <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="action" >
                                        <option selected>Select this action</option>
                                        <option value="add">Add your money</option>
                                        <option value="take">Take your money</option>
                                   </select>
                                   <label for="floatingSelect">Action</label>
                              </div>

                              <div class="form-floating">
                                   <input type="text" name="money" class="form-control mt-2" id="money" placeholder="Add Money" value="{{$data->money}}">
                                   <label for="money">Money</label>
                              </div>
                            <div class="row justify-content-center">
                              <button class="w-50 btn btn-lg btn-secondary mt-4" type="submit">Edit Money Safe</button>
                            </div>
                        </form>
                    </div>
                    </main>
                </div>
            </div>
        </div>
     </div>
@endsection

