<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Borrower extends User
{
    use HasFactory;
    protected $table = 'users';

    /**
     * Sets the borrower role automatically on creation
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $model->role_id = 2;
        });
    }

    /**
     * Set a Global Scope on the model to retrieve borrowers only
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('borrower', function ($builder) {
            $builder->where('role_id', 2);
        });
    }

    /**
     * Get the jobs associated with the borrower.
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class,'user_id');
    }

    /**
     * Get the bank accounts associated with the borrower.
     */
    public function bankAccounts(): HasMany
    {
        return $this->hasMany(BankAccount::class,'user_id');
    }
}
