<?php

use Illuminate\Database\Seeder;
use App\Models\TaskDetail;
use App\Models\TaskConfig;
use App\Models\UserTask;

class TaskDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TaskConfig::class,10)->create();
        factory(TaskDetail::class,100)->create();
        factory(UserTask::class,50)->create();
    }
}
