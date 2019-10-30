<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Percentaje extends Model
{
    use SoftDeletes;

    protected $table = 'percentajes';

    protected $fillable = [
        'interest'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function loan() {
        return $this->hasOne('App\Loan');
    }
}
