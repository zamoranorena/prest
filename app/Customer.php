<?php

namespace App;
use App\Events\CreateToken;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'first_name',
        'last_name',
        'nick_name',
        'phone',
        'company_id',
        'position_id',
        'address',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function boot ()
    {
        parent::boot();
        static::creating(function($customer) {
            $id = Auth::user()->id;
            $customer->token = str_random(30);
            $customer->user_id = $id;
        });
    }

    public function scopeCounts ($query) {
        return $query->count();
    }

    public function scopeFindByToken ($query, $token) {
        return $query->where ('token', $token)->first ();
    }

    public function full_name() {
        return "$this->first_name $this->last_name";
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function position() {
        return $this->belongsTo('App\Position');
    }

    public function loan() {
        return $this->hasOne('App\Loan');
    }

}
