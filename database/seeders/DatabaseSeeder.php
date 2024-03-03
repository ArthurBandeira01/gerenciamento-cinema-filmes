<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Tenant;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $tenantCinemaNorte = Tenant::create(['id' => 'cinemaNorte']);
        $tenantCinemaNorte->domains()->create(['domain' => 'cinemaNorte.localhost']);

        Tenant::all()->runForEach(function () {
            User::insert([
                'name' => 'Arthur Bandeira tenant',
                'email' => 'arthurbandeirafc@gmail.com',
                'password' => bcrypt('secret123'),
            ]);
        });

        User::create([
            'name' => 'Arthur Bandeira',
            'email' => 'arthurbandeirafc@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
