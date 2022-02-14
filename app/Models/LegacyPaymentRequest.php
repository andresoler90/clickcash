<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\LegacyPaymentRequest
 *
 * @property int $id
 * @property int $users_id
 * @property float $amount_remove
 * @property int $type 0 => BITCOIN / 1 => ETHER
 * @property string $address_wallet
 * @property int $status 0 => Pendiente / 1 => Pagado / 2 => Rechazado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest approve()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest newQuery()
 * @method static \Illuminate\Database\Query\Builder|LegacyPaymentRequest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest pending()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest refuse()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest whereAddressWallet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest whereAmountRemove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPaymentRequest whereUsersId($value)
 * @method static \Illuminate\Database\Query\Builder|LegacyPaymentRequest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|LegacyPaymentRequest withoutTrashed()
 * @mixin \Eloquent
 */
class LegacyPaymentRequest extends Model
{
    use SoftDeletes, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'amount_remove',
        'type',
        'address_wallet',
        'status',
    ];

    protected static $logAttributes = [
        'users_id',
        'amount_remove',
        'type',
        'address_wallet',
        'status',
    ];

    public function scopePending($query)
    {
        return $query->where('status', 0);
    }

    public function scopeApprove($query)
    {
        return $query->where('status', 1);
    }

    public function scopeRefuse($query)
    {
        return $query->where('status', 2);
    }

    public function user()
    {
        return $this->hasOne('App\User','id','users_id');
    }

    public function balanceTotalById($id)
    {
        return UserBalance::where('users_id', $id)->sum('amount');
    }
}
