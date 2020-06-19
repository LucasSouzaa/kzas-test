@extends('layouts.app')

@section('title')
    Editar funcionário(a)
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-users mr-2"></i>
                            Editar funcionário(a)
                        </div>
                    </div>

                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <form action="{{route('employees.update', $employee->id)}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nome do funcionário</label>
                                                <input
                                                    type="text"
                                                    value="{{is_null(old('name')) ? $employee->name : old('name')}}"
                                                    class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} {{!is_null(old('name')) && !$errors->has('name') ? 'is-valid' : ''}}"
                                                    id="name"
                                                    name="name"
                                                    placeholder="Digite o nome do funcionário"
                                                >
                                                @if($errors->has('name'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('name')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email do funcionário</label>
                                                <input
                                                    type="email"
                                                    value="{{is_null(old('email')) ? $employee->email : old('email')}}"
                                                    class="form-control {{$errors->has('email') ? 'is-invalid' : ''}} {{!is_null(old('email')) && !$errors->has('email') ? 'is-valid' : ''}}"
                                                    id="email"
                                                    name="email"
                                                    placeholder="Digite o email do funcionário"
                                                >
                                                @if($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('email')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Telefone do funcionário</label>
                                                <input
                                                    type="text"
                                                    value="{{is_null(old('phone')) ? $employee->phone : old('phone')}}"
                                                    class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}} {{!is_null(old('phone')) && !$errors->has('phone') ? 'is-valid' : ''}}"
                                                    id="phone"
                                                    name="phone"
                                                    placeholder="Digite o telefone do funcionário"
                                                >
                                                @if($errors->has('phone'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('phone')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">CPF do funcionário</label>
                                                <input
                                                    type="text"
                                                    value="{{is_null(old('cpf')) ? $employee->cpf : old('cpf')}}"
                                                    class="form-control {{$errors->has('cpf') ? 'is-invalid' : ''}} {{!is_null(old('cpf')) && !$errors->has('cpf') ? 'is-valid' : ''}}"
                                                    id="cpf"
                                                    name="cpf"
                                                    placeholder="Digite o cpf do funcionário"
                                                >
                                                @if($errors->has('cpf'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('cpf')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Selecione a empresa</label>
                                                <select name="company_id" class="form-control {{$errors->has('company_id') ? 'is-invalid' : ''}} {{!is_null(old('company_id')) && !$errors->has('company_id') ? 'is-valid' : ''}}">
                                                    <option value="">Selecione uma empresa</option>
                                                    @foreach($companies as $company)
                                                        <option {{$company->id == $employee->company->id ? 'selected' : ''}} value="{{$company->id}}">{{$company->name}}</option>
                                                    @endforeach
                                                </select>

                                                @if($errors->has('company_id'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('company_id')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">CEP</label>
                                                <input
                                                    type="text"
                                                    value="{{is_null(old('cep')) ? $employee->address->cep : old('cep')}}"
                                                    class="form-control {{$errors->has('cep') ? 'is-invalid' : ''}} {{!is_null(old('cep')) && !$errors->has('cep') ? 'is-valid' : ''}}"
                                                    id="cep"
                                                    name="cep"
                                                    placeholder="00000-000"
                                                >
                                                @if($errors->has('cep'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('cep')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cidade</label>
                                                <input
                                                    type="text"
                                                    value="{{is_null(old('city')) ? $employee->address->city : old('city')}}"
                                                    class="form-control {{$errors->has('city') ? 'is-invalid' : ''}} {{!is_null(old('city')) && !$errors->has('city') ? 'is-valid' : ''}}"
                                                    id="city"
                                                    name="city"
                                                    placeholder="Cidade do funcionário"
                                                    readonly
                                                >
                                                @if($errors->has('city'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('city')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Estado</label>
                                                <input
                                                    type="text"
                                                    value="{{is_null(old('state')) ? $employee->address->state : old('state')}}"
                                                    class="form-control {{$errors->has('state') ? 'is-invalid' : ''}} {{!is_null(old('state')) && !$errors->has('state') ? 'is-valid' : ''}}"
                                                    id="state"
                                                    name="state"
                                                    placeholder="AA"
                                                    readonly
                                                >
                                                @if($errors->has('state'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('state')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Rua</label>
                                                <input
                                                    type="text"
                                                    value="{{is_null(old('street')) ? $employee->address->street : old('street')}}"
                                                    class="form-control {{$errors->has('street') ? 'is-invalid' : ''}} {{!is_null(old('street')) && !$errors->has('street') ? 'is-valid' : ''}}"
                                                    id="street"
                                                    name="street"
                                                    placeholder="Rua exemplo 1"
                                                >
                                                @if($errors->has('street'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('street')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Número</label>
                                                <input
                                                    type="text"
                                                    value="{{is_null(old('number')) ? $employee->address->number : old('number')}}"
                                                    class="form-control {{$errors->has('number') ? 'is-invalid' : ''}} {{!is_null(old('number')) && !$errors->has('number') ? 'is-valid' : ''}}"
                                                    id="number"
                                                    name="number"
                                                    placeholder=""
                                                >
                                                @if($errors->has('number'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('number')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Bairro</label>
                                                <input
                                                    type="text"
                                                    value="{{is_null(old('neighborhood')) ? $employee->address->neighborhood : old('neighborhood')}}"
                                                    class="form-control {{$errors->has('neighborhood') ? 'is-invalid' : ''}} {{!is_null(old('neighborhood')) && !$errors->has('neighborhood') ? 'is-valid' : ''}}"
                                                    id="neighborhood"
                                                    name="neighborhood"
                                                    placeholder="Bairro exemplo 1"
                                                >
                                                @if($errors->has('neighborhood'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('neighborhood')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Complemento</label>
                                                <input
                                                    type="text"
                                                    value="{{is_null(old('complement')) ? $employee->address->complement : old('complement')}}"
                                                    class="form-control {{$errors->has('complement') ? 'is-invalid' : ''}} {{!is_null(old('complement')) && !$errors->has('complement') ? 'is-valid' : ''}}"
                                                    id="complement"
                                                    name="complement"
                                                    placeholder="Apartamento A"
                                                >
                                                @if($errors->has('complement'))
                                                    <div class="invalid-feedback">
                                                        {{$errors->first('complement')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <input name="_method" type="hidden" value="PUT">

                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fa fa-check"></i>
                                        Cadastrar
                                    </button>

                                </form>
                            </div>
                        </div>

                        <div class="full-div-loader" id="cep-loader">
                            <div class="loader"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
      var cep = $('#cep');
      var phone = $('#phone');
      var cpf = $('#cpf');

      cep.mask('99999-999');
      phone.mask('(99)99999-9999');
      cpf.mask('999.999.999-99');

      cep.on('keyup', function(){
        if (this.value.length === 9) {
          $('#cep-loader').css('display', 'flex');
          $.get( "https://viacep.com.br/ws/"+this.value+"/json/", function( data ) {
            $('#cep-loader').css('display', 'none');
            $('#street').val(data.logradouro);
            $('#neighborhood').val(data.bairro);
            $('#city').val(data.localidade);
            $('#state').val(data.uf);
          });
        }
      })
    </script>
@endsection
