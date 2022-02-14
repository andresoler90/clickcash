<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LegacyBalance
 *
 * @property int $id
 * @property int $users_id Id del usuario al que se le cargo el registro
 * @property float $amount Monto abonado
 * @property string $type Tipo de registro
 * @property int|null $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance query()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyBalance whereUsersId($value)
 * @mixin \Eloquent
 */
class LegacyBalance extends Model
{
    //
}
