<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\TaskDetail
 *
 * @property int $id
 * @property int $task_config_id Id de la configuración asignada a la tarea
 * @property string $description Descripcion de la tarea que se crea
 * @property string $link Url que pertenece a la tarea creada
 * @property int $created_user Id del usuario que crea la tarea
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\TaskConfig|null $task_config
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail newQuery()
 * @method static \Illuminate\Database\Query\Builder|TaskDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereTaskConfigId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TaskDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TaskDetail withoutTrashed()
 * @mixin \Eloquent
 */
class TaskDetail extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        'task_config_id',
        'description',
        'link',
        'created_user'
    ];

    protected static $logAttributes = [
        'task_config_id',
        'description',
        'link',
        'created_user'
    ];

    public function task_config()
    {
        return $this->hasOne('App\Models\TaskConfig', 'id', 'task_config_id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','created_user');
    }

    public function today(){
        return '';
    }
}
