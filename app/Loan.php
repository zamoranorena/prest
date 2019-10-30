<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Loan extends Model
{
    use SoftDeletes;

    protected $table = 'loans';

    protected $fillable = [
        'amount',
        'percentaje_id',
        'amount_payable',
        'customer_id',
        'user_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function boot ()
    {
        parent::boot();
        static::creating(function($loan) {
            $id = Auth::user()->id;
            $loan->token = str_random(30);
            $loan->user_id = $id;
        });
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function scopeCounts ($query) {
        return $query->count();
    }

    public function percentaje() {
        return $this->belongsTo('App\Percentaje');
    }
}
