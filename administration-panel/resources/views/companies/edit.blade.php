@extends('layouts.app')

@section('title')
    Editar Empresa
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-briefcase mr-2"></i>
                            Editar empresa
                        </div>
                    </div>

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-center">
                                <div id="logo-uploader" class="w-100 logo-border {{$errors->has('logo') ? 'is-invalid' : ''}} {{!is_null(old('logo')) && !$errors->has('logo') ? 'is-valid' : ''}} d-flex flex-column align-items-center">
                                    <img src="{{ is_null(old('logo')) ? $company->logo : old('logo') }}" class="logo-placeholder" data-path="" id="logo-img" />
                                    <p class="text-black-50 mt-2">Alterar logo</p>

                                    <input type="file" hidden id="upload-input" name="upload" accept="image/*">
                                </div>

                                @if($errors->has('logo'))
                                    <div class="text-center mt-2 text-danger text-small">
                                        <small>{{$errors->first('logo')}}</small>
                                    </div>
                                @endif

                                <div class="full-div-loader" id="logo-loader">
                                    <div class="loader"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8 mt-3 mt-md-0">
                                <form action="{{route('companies.update', $company->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nome da empresa</label>
                                        <input
                                            type="text"
                                            value="{{is_null(old('name')) ? $company->name : old('name')}}"
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
                                            value="{{is_null(old('email')) ? $company->email : old('email')}}"
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
                                            value="{{is_null(old('website')) ? $company->website : old('website')}}"
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

                                    <input hidden name="logo" value="{{is_null(old('logo')) ? $company->logo : old('logo')}}" id="logo" />
                                    <input name="_method" type="hidden" value="PUT">

                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fa fa-check"></i>
                                        Atualizar
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
      $('#logo-uploader').click(function() {
        $('#upload-input').click();
      });

      $('#upload-input').change(function(e) {

        var logo_img = $('#logo-img');

        if(logo_img.data('path')) {
          handleDelete("http://docker.localhost:7000", logo_img.data('path'));
          $('input[name=logo]').val('');
        }

        $('#logo-loader').css('display', 'flex');
        handleUpload("http://docker.localhost:7000", e.target.files[0], {
          response: function (data) {
            console.log(data);
            $('#logo-loader').css('display', 'none');
            logo_img.attr('src', data.url);
            logo_img.data('path', data.file_location);
            $('input[name=logo]').val(data.url);
          }
        });
      })
    </script>
@endsection
