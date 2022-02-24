<?php

namespace App\Console\Commands;

use App\Services\UserService;
use Illuminate\Console\Command;

class PullUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'external-users:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to pull users from 3rd-party source';

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
        $this->info("Pulling users...");
        resolve(UserService::class)->pullUsers();
        $this->info("Pull completed");
        return 0;
    }
}
