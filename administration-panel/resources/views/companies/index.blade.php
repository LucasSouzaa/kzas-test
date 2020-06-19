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
                            <i class="fa fa-briefcase mr-2"></i>
                            Empresas
                        </div>

                        <a href="{{route('companies.create')}}" class="btn btn-primary text-white d-flex flex-row align-items-center justify-content-center">
                            <i class="fa fa-plus mr-2"></i>
                            Cadastrar
                        </a>
                    </div>

                    <div class="card-body">
                        @if($companies->total())
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Site</th>
                                    <th scope="col">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $count = 1; @endphp
                                @foreach($companies as $company)
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td><img src="{{$company->logo}}"></td>
                                        <td>{{$company->name}}</td>
                                        <td>{{$company->email}}</td>
                                        <td><a target="_blank" href="{{$company->website}}">{{$company->website}}</a></td>
                                        <td>
                                            <a href="{{route('companies.show', $company->id)}}" class="btn-sm btn-primary text-white mr-1"><i class="fa fa-eye"></i></a>
                                            <a onclick="confirm_action('{{route('companies.destroy', $company->id)}}', 'Tem certeza que deseja remover esta empresa?')" class="btn-sm btn-danger text-white">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{$companies->links()}}

                        @else

                            <div class="d-flex flex-column p-5 align-items-center justify-content-center">
                                <i class="fa fa-folder-open-o h1"></i>
                                <p>Nenhuma empresa cadastrada ainda</p>
                                <a href="{{route('companies.create')}}" class="btn btn-primary text-white d-flex flex-row align-items-center justify-content-center">
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
