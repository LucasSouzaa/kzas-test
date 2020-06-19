<?php

namespace App\Employees;

use App\Companies\Company;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * @package App\Address
 */
class Address extends Model {

    /**
     * @var string
     */
    protected $table = 'adresses';

    /**
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'cep',
        'street',
        'neighborhood',
        'complement',
        'number',
        'city',
        'state',
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
