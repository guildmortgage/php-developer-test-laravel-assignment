<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrower extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'email'];

    public function job()
    {
        return $this->hasOne(Job::class);
    }

    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }
}