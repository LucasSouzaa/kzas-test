<?php

namespace App\Companies\Repositories;

use App\Companies\Company;
use Illuminate\Support\Facades\DB;
use Exception;
use PhpParser\Node\Expr\Cast\Object_;

class CompanyRepository {

    private $model;

    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    public function search()
    {
        $query = $this->model->paginate(10);
        return $query;
    }

    public function store($data)
    {
        try
        {
            DB::beginTransaction();
            $company = $this->model->create($data);
        } catch (Exception $e)
        {
            DB::rollBack();
            toastr()->error('Ocorreu um erro ao cadastrar empresa.');
            return false;
        }

        DB::commit();
        toastr()->success('Empresa cadastrada com sucesso!.');
        return true;
    }

    public function get($id) {
        $company = $this->model->with('employees')->find($id);

        return $company;
    }

    public function update($data, $id) {
        try
        {
            DB::beginTransaction();
            $company = $this->model->find($id);
            $company->update($data);
        } catch (Exception $e)
        {
            DB::rollBack();
            toastr()->error('Ocorreu um erro ao atualizar empresa.');
            return false;
        }

        DB::commit();
        toastr()->success('Empresa atualizada com sucesso.');
        return true;
    }

    public function delete ($id) {
        try
        {
            $company = $this->model->find($id);
            $company->delete();
        } catch (Exception $e)
        {
            DB::rollBack();


            return false;
        }

        DB::commit();
        toastr()->success('Empresa removida com sucesso.');
        return true;
    }
}
