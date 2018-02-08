<?php

use Illuminate\Database\Seeder;
use estoque\Models\Painel\Categoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('AdminSeeder');
    }
}

/**
 *
 */
