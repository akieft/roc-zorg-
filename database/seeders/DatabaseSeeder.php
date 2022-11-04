<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Standaard data
        DB::insert('insert into users (email, password) values (?, ?)', ['hans.back@hotmail.nl', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi']);
        DB::insert('insert into users (email, password, name_company) values (?, ?, ?)', ['jan.back@hotmail.nl', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jan.inc']);
        DB::insert('insert into users (first_name, email, password) values (?, ?, ?)', ['Piet', 'piet.back@hotmail.nl', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi']);
        DB::insert('insert into users (first_name, email, password) values (?, ?, ?)', ['Johan', 'johan.back@hotmail.nl', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi']);

        // Random data
        \App\Models\User::factory(20)->create();
        \App\Models\Hour::factory(10)->create();
        \App\Models\Dossier::factory(10)->create();
        \App\Models\Coach::factory(10)->create();
        \App\Models\Connection::factory(10)->create();
        \App\Models\CoreTask::factory(10)->create();
        \App\Models\WorkProcess::factory(10)->create();
        \App\Models\Competence::factory(10)->create();
        \App\Models\CoreWorkProcess::factory(10)->create();
        \App\Models\WorkCompetence::factory(10)->create();
        \App\Models\UserCoreTask::factory(10)->create();
        \App\Models\UserWorkProcess::factory(10)->create();
        \App\Models\UserCompetence::factory(10)->create();
//        \App\Models\

        Model::unguard();

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        //$this->call('UsersTableSeeder');

        Model::reguard();

        // Standerd data
        DB::insert('insert into role_user (role_id, user_id) values (?, ?)', [1, 1]);
        DB::insert('insert into role_user (role_id, user_id) values (?, ?)', [2, 2]);
        DB::insert('insert into role_user (role_id, user_id) values (?, ?)', [3, 3]);
        DB::insert('insert into role_user (role_id, user_id) values (?, ?)', [4, 4]);
    }
}
