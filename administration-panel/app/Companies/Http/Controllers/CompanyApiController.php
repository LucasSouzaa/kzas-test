<?php

namespace App\Companies\Http\Controllers;

use App\Companies\Repositories\CompanyRepository;
use App\Http\Controllers\Controller;

class CompanyApiController extends Controller
{
    private $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $companies = $this->repository->search();

        return response($companies);
    }

    public function show($id)
    {
        $company = $this->repository->get($id);

        return response($company);
    }

}
