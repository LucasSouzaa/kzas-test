<?php

namespace App\Employees\Repositories;

use App\Employees\Address;
use App\Employees\Employee;
use Illuminate\Support\Facades\DB;
use Exception;

class EmployeeRepository {

    private $model;

    public function __construct(Employee $employee)
    {
        $this->model = $employee;
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
            $employee = $this->model->create($data);

            if($employee) {
                $address = new Address($data);
                $employee->address()->save($address);
            }

        } catch (Exception $e)
        {
            DB::rollBack();
            toastr()->error('Ocorreu um erro ao cadastrar funcionario.');
            return false;
        }

        DB::commit();
        toastr()->success('Funcionario cadastrado com sucesso!.');
        return $employee;
    }

    public function get($id) {
        $employee = $this->model->with('company')->find($id);

        return $employee;
    }

    public function update($data, $id) {
        try
        {
            DB::beginTransaction();
            $employee = $this->model->find($id);
            $employee->update($data);
            $employee->address->update($data);
        } catch (Exception $e)
        {
            DB::rollBack();
            toastr()->error('Ocorreu um erro ao atualizar funcionario.');
            return false;
        }

        DB::commit();
        toastr()->success('Funcionario atualizado com sucesso.');
        return true;
    }

    public function delete ($id) {
        try
        {
            $employee = $this->model->find($id);
            $employee->address->delete();
            $employee->delete();
        } catch (Exception $e)
        {
            DB::rollBack();
            toastr()->error('Falha ao remover funcionario.');
            return false;
        }

        DB::commit();
        toastr()->success('Funcionario removido com sucesso.');
        return true;
    }
}
