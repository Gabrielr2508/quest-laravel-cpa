<?php

use Illuminate\Database\Seeder;
use estoque\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'       => 'CPA UNIVASF',
            'email'      => 'cpa@univasf.edu.br',
            'aluno_professor'      => 2,
            'password'   => bcrypt('cpa@@2016')
        ]);
    }
}
