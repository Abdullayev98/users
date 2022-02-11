<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class ClearingTasksTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clearing tasks which have not users and are not completed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Task::whereDate('created_at', '<=', now()->addHour()->toDateTimeString())->where('user_id', null)->delete();
        Task::whereDate('created_at', '<=', now()->addHour()->toDateTimeString())->where('status', null)->delete();
    }
}
