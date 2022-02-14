<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\TaskConfig
 *
 * @property int $id
 * @property string $name
 * @property string $periodicity Periodicidad de las tareas
 * @property int|null $value Valor que corresponde a la misma peridicidad
 * @property string $date Fecha de configuración de la cual se va a repetir la tarea
 * @property int $created_users_id Id del usuario que crea la configuración
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $periodicity_name
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig newQuery()
 * @method static \Illuminate\Database\Query\Builder|TaskConfig onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereCreatedUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig wherePeriodicity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskConfig whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|TaskConfig withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TaskConfig withoutTrashed()
 * @mixin \Eloquent
 */
class TaskConfig extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        'name',
        'periodicity',
        'value',
        'date',
        'created_users_id'
    ];

    protected static $logAttributes = [
        'name',
        'periodicity',
        'value',
        'date',
        'created_users_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'created_users_id');
    }

    public function getPeriodicityNameAttribute()
    {
        return config('options.periodicity.' . $this->periodicity);
    }

}
