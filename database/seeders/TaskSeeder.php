<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks= [
            [
                'title'=> 'Task one',
                'description'=> 'Complete some assignment',
                'completed'=> true
            ],

            [
                'title' => 'Task two',
                'description' => 'Do Laundry',
                'completed' => false
            ],

            [
                'title' => 'Task three',
                'description' => 'Watch Documentary',
                'completed' => true
            ],

        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }

    }
}
