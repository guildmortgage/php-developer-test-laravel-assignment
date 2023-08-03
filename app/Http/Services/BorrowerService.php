<?php
namespace App\Http\Services;
use Illuminate\Support\Facades\DB;

class BorrowerService{

    /**
     * Returns with the totals of the all bank account balances of each borrower
     * @return int|mixed
     */
    static function getTotalBalances(){
        return DB::table('users')->join('bank_accounts','bank_accounts.user_id','users.id')->where('users.role_id',2)->sum('bank_accounts.balance');
    }

    /**
     * Returns with the totals of the all annual salaries of each borrower
     * @return int|mixed
     */
    static function getTotalAnnualSalaries(){
        return DB::table('users')->join('jobs','jobs.user_id','users.id')->where('users.role_id',2)->sum('jobs.annual_salary');
    }

}
