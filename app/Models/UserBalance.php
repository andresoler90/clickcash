<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\UserBalance
 *
 * @property int $id
 * @property int $users_id Id del usuario al que se le cargo el registro
 * @property float $amount Monto abonado
 * @property string $type Tipo de registro
 * @property int|null $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserBalance onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserBalance whereUsersId($value)
 * @method static \Illuminate\Database\Query\Builder|UserBalance withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserBalance withoutTrashed()
 * @mixin \Eloquent
 */
class UserBalance extends Model
{
    use SoftDeletes, LogsActivity;
}
