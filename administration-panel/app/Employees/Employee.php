<?php

namespace App\Employees;

use App\Companies\Company;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * @package App\Employee
 */
class Employee extends Model {

    /**
     * @var string
     */
    protected $table = 'employees';

    /**
     * @var array
     */
    protected $fillable = [
        'company_id',
        'name',
        'email',
        'phone',
        'cpf',
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

}
