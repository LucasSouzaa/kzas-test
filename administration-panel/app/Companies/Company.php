<?php

namespace App\Companies;

use App\Employees\Employee;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\Company
 */
class Company extends Model {

    /**
     * @var string
     */
    protected $table = 'companies';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
