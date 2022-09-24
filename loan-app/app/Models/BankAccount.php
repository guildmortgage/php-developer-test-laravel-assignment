<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes;

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

    public function scopeTotalBalances($query)
    {
        return $query->selectRaw('balance, type, status, created_at')
            ->where('status', 1)
            ->latest('created_at')
            ->get()
            ->groupBy(fn ($balance) =>  $balance->created_at->year);
    }
}
