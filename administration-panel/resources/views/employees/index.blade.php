@extends('layouts.app')

@section('title')
    Empresas
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-users mr-2"></i>
                            Funcionarios
                        </div>

                        <a href="{{route('employees.create')}}" class="btn btn-primary text-white d-flex flex-row align-items-center justify-content-center">
                            <i class="fa fa-plus mr-2"></i>
                            Cadastrar
                        </a>
                    </div>

                    <div class="card-body">
                        @if($employees->total())
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $count = 1; @endphp
                                @foreach($employees as $employee)
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td><a href="{{route('companies.show', $employee->company->id)}}">{{$employee->company->name}}</a></td>
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

                            {{$employees->links()}}

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

@endsection
