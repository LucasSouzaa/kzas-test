<?php

namespace App\Companies\Http\Controllers;

use App\Companies\Http\FormRequests\CompanyStoreRequest;
use App\Companies\Http\FormRequests\CompanyUpdateRequest;
use App\Companies\Repositories\CompanyRepository;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    private $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        $companies = $this->repository->search();
        return view('companies.index', ['companies' => $companies]);
    }


    public function create()
    {
        return view('companies.create');
    }


    public function store(CompanyStoreRequest $request)
    {
        $result = $this->repository->store($request->all());
        return redirect()->route('companies.index');
    }


    public function show($id)
    {
        $company = $this->repository->get($id);

        if($company) {
            return view('companies.show', ['company' => $company]);
        } else {
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $company = $this->repository->get($id);

        if($company) {
            return view('companies.edit', ['company' => $company]);
        } else {
            return redirect()->back();
        }
    }


    public function update(CompanyUpdateRequest $request, $id)
    {
        $result = $this->repository->update($request->all(), $id);
        return redirect()->route('companies.show', $id);
    }


    public function destroy($id)
    {
        $result = $this->repository->delete($id);
        return redirect()->route('companies.index');
    }
}
