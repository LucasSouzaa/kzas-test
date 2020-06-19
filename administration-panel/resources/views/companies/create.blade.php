@extends('layouts.app')

@section('title')
    Nova Empresa
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-briefcase mr-2"></i>
                            Nova empresa
                        </div>
                    </div>

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-center">
                                <div class="logo-border {{$errors->has('logo') ? 'is-invalid' : ''}} {{!is_null(old('logo')) && !$errors->has('logo') ? 'is-valid' : ''}} d-flex flex-column align-items-center">
                                    <img src="{{ is_null(old('logo')) ? asset('imgs/logo-placeholder.png') : old('logo') }}" class="logo-placeholder" />
                                    <p class="text-black-50">Selecionar logo</p>
                                </div>

                                @if($errors->has('logo'))
                                    <div class="text-center mt-2 text-danger text-small">
                                        <small>{{$errors->first('logo')}}</small>
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-8 mt-3 mt-md-0">
                                <form action="{{route('companies.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nome da empresa</label>
                                        <input
                                            type="text"
                                            value="{{old('name')}}"
                                            class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} {{!is_null(old('name')) && !$errors->has('name') ? 'is-valid' : ''}}"
                                            id="name"
                                            name="name"
                                            placeholder="Digite o nome da empresa"
                                        >
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('name')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email da empresa</label>
                                        <input
                                            type="email"
                                            value="{{old('email')}}"
                                            class="form-control {{$errors->has('email') ? 'is-invalid' : ''}} {{!is_null(old('email')) && !$errors->has('email') ? 'is-valid' : ''}}"
                                            id="email"
                                            name="email"
                                            placeholder="Digite o email da empresa"
                                        >
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('email')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Website da empresa</label>
                                        <input
                                            type="text"
                                            value="{{old('website')}}"
                                            class="form-control {{$errors->has('website') ? 'is-invalid' : ''}} {{!is_null(old('website')) && !$errors->has('website') ? 'is-valid' : ''}}"
                                            id="website"
                                            name="website"
                                            placeholder="Digite a url completa do site da empresa"
                                        >
                                        @if($errors->has('website'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('website')}}
                                            </div>
                                        @endif
                                    </div>

                                    <input hidden name="logo" value="https://pt.freelogodesign.org/Content/img/logo-samples/flooop.png" id="logo" />

                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fa fa-check"></i>
                                        Cadastrar
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection
