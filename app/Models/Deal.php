<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;
use App\Models\Contact;

class Deal extends Model
{
    use HasFactory;

    protected $table = 'deals';
    protected $primaryKey = 'id';

    public function get_account_details()
    {
        return $this->hasOne(Account::class,'id','account_id');
    }

    public function get_contact_details()
    {
        return $this->hasOne(Contact::class,'id','contact_id');
    }
}
