<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call('AssinaturaTableSeeder');

        Model::reguard();
    }
}

class AssinaturaTableSeeder extends Seeder
{
    public function run()
    {
        if(\App\Assinatura::count() < 40){
            for($i=0; $i<40; $i++)
                factory(\App\Assinatura::class)->make()->save();
        }
    }
}
