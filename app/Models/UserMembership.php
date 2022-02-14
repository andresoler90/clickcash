<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\UserMembership
 *
 * @property int $id
 * @property int $memberships_id Id de la membresia
 * @property int $users_id id del usuario
 * @property float $price Monto que pago el usuario al momento de adquirir la membresia
 * @property string $status Estatus de la membresia P: Pendiente / R: Rechazado / A: Aprobado / V: Vencido
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $transaction_id
 * @property string|null $transaction_address
 * @property string|null $transaction_url
 * @property float|null $transaction_amount
 * @property string|null $transaction_date
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Membership|null $membership
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserMembership onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereMembershipsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereTransactionAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereTransactionAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereTransactionUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMembership whereUsersId($value)
 * @method static \Illuminate\Database\Query\Builder|UserMembership withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserMembership withoutTrashed()
 * @mixin \Eloquent
 */
class UserMembership extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        "memberships_id",
        "users_id",
        "price",
        "status",
        "transaction_id",
        "transaction_address",
        "transaction_url",
        "transaction_amount",
        "transaction_date",
        "expiration_date"
    ];

    protected static $logAttributes = [
        "memberships_id",
        "users_id",
        "price",
        "status",
        "transaction_id",
        "transaction_address",
        "transaction_url",
        "transaction_amount",
        "transaction_date",
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'users_id');
    }

    public function membership()
    {
        return $this->hasOne('App\Models\Membership', 'id', 'memberships_id');
    }
}


