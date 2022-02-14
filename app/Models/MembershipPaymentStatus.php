<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class MembershipPaymentStatus extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        "id_user_membership",
        "id_transaction",
        "status",
        "status_description",
        "type_coin",
        "payment_received"
    ];

    protected static $logAttributes = [
        "id_user_membership",
        "id_transaction",
        "status",
        "status_description",
        "type_coin",
        "payment_received"
    ];

    public function userMembership()
    {
        return $this->hasOne('App\Models\userMembership', 'id', 'id_user_membership');
    }
}
