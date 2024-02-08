<?php

namespace App\Jobs\Tenancy;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Stancl\Tenancy\Database\DatabaseManager;
use Stancl\Tenancy\Jobs\CreateDatabase;
use App\Jobs\Tenancy\DeleteDatabaseJob;

class CreateDatabaseJob extends CreateDatabase
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(DatabaseManager $databaseManager)
    {
        if(!app()->isProduction()) {
            (new DeleteDatabaseJob($this->tenant))->handle();
        }

        parent::handle($databaseManager);
    }
}
