<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SessionRoom;
use App\Models\Tenant;

class FillDescriptions extends Command
{
    protected $signature = 'tenant:fill-descriptions';
    protected $description = 'Preenche com conteúdo a coluna description da tabela sessions_rooms.';

    public function handle()
    {
        $description = 'Um ser malévolo conhecido como Jester aterroriza os habitantes de uma pequena cidade na noite de Halloween,
                        incluindo duas irmãs estrangeiras que devem se unir para encontrar uma maneira de derrotar a entidade maligna.';

        $tenants = Tenant::all();

        $tenants->each(function ($tenant) use ($description) {
            tenancy()->initialize($tenant);

            SessionRoom::query()->update(['description' => $description]);
        });

        $this->info('Descrições das salas preenchidas com sucesso!');
    }
}
