<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Sudija;
use \App\Models\KrivicnoDelo;
use \App\Models\Svedok;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //brisanje svega iz tabela
         User::truncate();
         Sudija::truncate();
         KrivicnoDelo::truncate();
         Svedok::truncate();

        User::factory(5)->create();
        Sudija::factory(10)->create();

        $krivicnodelo1 = KrivicnoDelo::create([
            'naziv' => 'krivicno delo protiv zivota i tela'
        ]);

        $krivicnodelo2 = KrivicnoDelo::create([
            'naziv' => 'krivicno delo protiv sloboda i prava gradjana'
        ]);

        $krivicnodelo3 = KrivicnoDelo::create([
            'naziv' => 'krivicno delo protiv polne slobode'
        ]);

        $krivicnodelo4 = KrivicnoDelo::create([
            'naziv' => 'krivicno delo protiv polne slobode'
        ]);

        $krivicnodelo5 = KrivicnoDelo::create([
            'naziv' => 'krivicno delo protiv imovine'
        ]);

        $svedok1 = Svedok::create([
            'datumIVreme' => now(),
            'user' => 1,
            'krivicnodelo' => 1,
            'sudija'=>2,
            'note' => 'Svedok video i priznao sve.'
        ]);

        $svedok2 = Svedok::create([
            'datumIVreme' => now(),
            'user' => 2,
            'krivicnodelo' => 1,
            'sudija'=>1,
            'note' => 'Svedok delimicno video izvrseno krivicno delo, nije siguran.'
        ]);

       
    }
}
