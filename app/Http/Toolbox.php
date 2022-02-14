<?php

/**
 * Class Toolbox
 * Clase que contiene funciones con distintos propositos que puede ser usados de manera transversal a todo el sistema
 */
class Toolbox
{

    public static function taskDay()
    {

        $task_daily = \App\Models\TaskConfig::where('periodicity', 'daily')->get()->pluck('id')->toArray();
        $task_weekly = \App\Models\TaskConfig::where('periodicity', 'weekly')->where('value', date('N'))->get()->pluck('id')->toArray();
        $task_monthly = \App\Models\TaskConfig::where('periodicity', 'monthly')->where('value', date('d'))->get()->pluck('id')->toArray();
        $task_config_id = array_merge($task_daily, $task_weekly, $task_monthly);

        return \App\Models\TaskDetail::whereIn('task_config_id', $task_config_id)->get();
    }
}
