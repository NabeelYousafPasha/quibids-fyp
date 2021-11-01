<?php

namespace App\Console\Commands;

use App\Models\{
    Role,
    Permission
};
use Database\Seeders\PermissionSeeder;
use Illuminate\Console\Command;

class AllowAllPermissionsToAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'allow-all-permissions-to-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will update permissions table
                              and allow access to all for admin';

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
        $this->line("\nRunning Command: {$this->signature}");

        $adminRole = Role::where('name', '=', Role::ADMIN)->first();

        if (is_null($adminRole)) {
            $this->error("\nCommand Failure: Role ADMIN not found\n");
            return 0;
        }

        $this->line("\nseeding all permissions");
        $this->call('db:seed', [
            '--class' => PermissionSeeder::class,
        ]);
        $this->line("\nseeded permissions");

        $this->line("\nstarting syncing permissions for admin");
        $adminRole->syncPermissions(Permission::all());
        $this->line("\npermissions synced for admin");

        $this->info("\nCommand Success: command ran successfully\n");

        return 1;
    }
}
