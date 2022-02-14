<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\UserTask
 *
 * @property int $id
 * @property int $task_details_id Id de la tarea realizada
 * @property int $users_id Id del usuario
 * @property int $duration Tiempo que dura el usuario en la tarea asignada
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\TaskDetail|null $task
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserTask onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereTaskDetailsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTask whereUsersId($value)
 * @method static \Illuminate\Database\Query\Builder|UserTask withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserTask withoutTrashed()
 * @mixin \Eloquent
 */
class UserTask extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        'task_details_id',
        'users_id',
        'duration'
    ];
    protected static $logAttributes = [
        'task_details_id',
        'users_id',
        'duration'
    ];

    public function task()
    {
        return $this->hasOne('App\Models\TaskDetail', 'id', 'task_details_id');
    }
}
