<?php

namespace App\Employees\Http\Controllers;

use App\Companies\Repositories\CompanyRepository;
use App\Employees\Http\FormRequests\EmployeeStoreRequest;
use App\Employees\Http\FormRequests\EmployeeUpdateRequest;
use App\Employees\Repositories\EmployeeRepository;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    private $repository, $company_repository;

    public function __construct(EmployeeRepository $repository, CompanyRepository $company)
    {
        $this->repository = $repository;
        $this->company_repository = $company;
    }


    public function index()
    {
        $employees = $this->repository->search();
        return view('employees.index', ['employees' => $employees]);
    }


    public function create()
    {
        $companies = $this->company_repository->search();
        return view('employees.create', ['companies' => $companies]);
    }


    public function store(EmployeeStoreRequest $request)
    {
        $result = $this->repository->store($request->all());
        if($result){
            return redirect()->route('companies.show', $result->company_id);
        }
        return redirect()->route('companies.index');
    }


    public function show($id)
    {
        $employee = $this->repository->get($id);

        if($employee) {
            return view('employees.show', ['employee' => $employee]);
        } else {
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $employee = $this->repository->get($id);
        $companies = $this->company_repository->search();

        if($employee) {
            return view('employees.edit', ['companies' => $companies, 'employee' => $employee]);
        } else {
            return redirect()->back();
        }
    }


    public function update(EmployeeUpdateRequest $request, $id)
    {
        $result = $this->repository->update($request->all(), $id);
        return redirect()->route('employees.show', $id);
    }


    public function destroy($id)
    {
        $result = $this->repository->delete($id);
        return redirect()->back();
    }
}
