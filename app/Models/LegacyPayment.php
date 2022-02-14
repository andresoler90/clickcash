<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\LegacyPayment
 *
 * @property int $id
 * @property int $users_id
 * @property int $user_payment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPayment newQuery()
 * @method static \Illuminate\Database\Query\Builder|LegacyPayment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPayment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPayment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPayment whereUserPaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyPayment whereUsersId($value)
 * @method static \Illuminate\Database\Query\Builder|LegacyPayment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|LegacyPayment withoutTrashed()
 * @mixin \Eloquent
 */
class LegacyPayment extends Model
{
    use SoftDeletes, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'user_payment_id'
    ];

    protected static $logAttributes = [
        'users_id',
        'user_payment_id'
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'id';
}
