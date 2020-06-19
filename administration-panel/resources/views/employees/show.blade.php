@extends('layouts.app')

@section('title')
    Visualizar Funcionario
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-users mr-2"></i>
                            Funcionario: <strong>{{$employee->name}}</strong>
                        </div>

                        <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary text-white d-flex flex-row align-items-center justify-content-center">
                            <i class="fa fa-pencil mr-2"></i>
                            Editar
                        </a>
                    </div>

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <span class="text-black-50">Nome do funcionario</span>
                                <p class="lead">{{$employee->name}}</p>

                                <span class="text-black-50">Email do funcionario</span>
                                <p class="lead">{{$employee->email}}</p>

                                <span class="text-black-50">Telefone do funcionario</span>
                                <p class="lead">{{$employee->phone}}</p>

                                <span class="text-black-50">CPF do funcionario</span>
                                <p class="lead">{{$employee->cpf}}</p>

                                <span class="text-black-50">Empresa</span>
                                <p><a href="{{route('companies.show', $employee->company->id)}}" class="lead">{{$employee->company->name}}</a></p>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <span class="text-black-50">Cep</span>
                                <p class="lead">{{$employee->address->cep}}</p>

                                <span class="text-black-50">Rua</span>
                                <p class="lead">{{$employee->address->street}}, {{$employee->address->number}}</p>

                                <span class="text-black-50">Complemento</span>
                                <p class="lead">{{$employee->address->complement}}</p>

                                <span class="text-black-50">Bairro</span>
                                <p class="lead">{{$employee->address->neighborhood}}</p>

                                <span class="text-black-50">Cidade / Estado</span>
                                <p class="lead">{{$employee->address->city}} / {{$employee->address->state}}</p>

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
