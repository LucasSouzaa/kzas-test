@extends('layouts.app')

@section('title')
    Visualizar Empresa
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-briefcase mr-2"></i>
                            Empresa: <strong>{{$company->name}}</strong>
                        </div>

                        <a href="{{route('companies.edit', $company->id)}}" class="btn btn-primary text-white d-flex flex-row align-items-center justify-content-center">
                            <i class="fa fa-pencil mr-2"></i>
                            Editar
                        </a>
                    </div>

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-center">
                                <div class="w-100 logo-border d-flex flex-column align-items-center">
                                    <img src="{{$company->logo}}" class="logo-placeholder" />
                                </div>

                                @if($errors->has('logo'))
                                    <div class="text-center mt-2 text-danger text-small">
                                        <small>{{$errors->first('logo')}}</small>
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-8 mt-3 mt-md-0">
                                <span class="text-black-50">Nome da empresa</span>
                                <p class="lead">{{$company->name}}</p>

                                <span class="text-black-50">Email da empresa</span>
                                <p class="lead">{{$company->email}}</p>

                                <span class="text-black-50">Website da empresa</span>
                                <p class="lead"><a target="_blank" href="{{$company->website}}">{{$company->website}}</a></p>
                            </div>
                        </div>

                        <div class="row mt-4 border-top pt-3">
                            <div class="col-md-12">
                                <h2 class="h2">Funcionarios</h2>

                                @if($company->employees->count())
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">CPF</th>
                                            <th scope="col">
                                                <a href="{{route('employees.create')}}" class="btn btn-primary text-white d-flex flex-row align-items-center justify-content-center">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $count = 1; @endphp
                                        @foreach($company->employees as $employee)
                                            <tr>
                                                <th scope="row">{{$count++}}</th>
                                                <td>{{$employee->name}}</td>
                                                <td>{{$employee->email}}</td>
                                                <td>{{$employee->phone}}</td>
                                                <td>{{$employee->cpf}}</td>
                                                <td>
                                                    <a href="{{route('employees.show', $employee->id)}}" class="btn-sm btn-primary text-white mr-1"><i class="fa fa-eye"></i></a>
                                                    <a onclick="confirm_action('{{route('employees.destroy', $employee->id)}}', 'Tem certeza que deseja remover este funcionario?')" class="btn-sm btn-danger text-white">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                @else

                                    <div class="d-flex flex-column p-5 align-items-center justify-content-center">
                                        <i class="fa fa-users h1"></i>
                                        <p>Nenhum funcionario cadastrado ainda</p>
                                        <a href="{{route('employees.create')}}" class="btn btn-primary text-white d-flex flex-row align-items-center justify-content-center">
                                            <i class="fa fa-plus mr-2"></i>
                                            Cadastrar
                                        </a>
                                    </div>

                                @endif
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
