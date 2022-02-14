<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\UserTransfer
 *
 * @property int $id
 * @property int $from_users_id Id del usuario que hace la transferencia
 * @property int $from_balance_id Id de del balance que se transfirio
 * @property int $to_users_id Id del usuario al que se le hace la transferencia
 * @property int $to_balance_id Id de del balance que se recibio
 * @property string $comment Es la nota por la cual se transfiere
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserTransfer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer whereFromBalanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer whereFromUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer whereToBalanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer whereToUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTransfer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|UserTransfer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserTransfer withoutTrashed()
 * @mixin \Eloquent
 */
class UserTransfer extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        'from_users_id',
        'from_balance_id',
        'to_users_id',
        'to_balance_id',
        'comment'
    ];

    protected static $logAttributes = [
        'from_users_id',
        'from_balance_id',
        'to_users_id',
        'to_balance_id',
        'comment'
    ];
}
