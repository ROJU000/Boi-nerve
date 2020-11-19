<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dashboard extends Model
{
    use SoftDeletes;

    protected $dates = ['enumerator','firstname','lastname','middlename','gender','dob','phone','tradetype','tradesubtype','state','lga','cluster_location','disbursement','date_disbursement','is_disbursed','date_enumerated','wallet_name','senatorial_zone','is_cashedout','date_cashout','region','product','status','src','closure_date','amount_repaid_closed','no_of_trans_onecard','total_amount_onecard','last_pay_date_onecard','no_of_trans_paydirect','total_amount_paydirect','last_pay_date_paydirect','total_payments_made','last_pay_date_bankone','boi_bankone_amount','amount_due','amount_default','customer_grade'];

}

