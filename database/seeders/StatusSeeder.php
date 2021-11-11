<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([[
            'slug' => 'todo',
            'libelle' => 'To Do'
        ],
        [
            'slug' => 'in-progress',
            'libelle' => 'En cours'
        ],
        [
            'slug' => 'refused',
            'libelle' => 'Refusé'
        ],
        [
            'slug' => 'done',
            'libelle' => 'Réalisé'
        ]]);
    }
}
