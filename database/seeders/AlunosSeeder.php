<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Aluno $aluno)
    {
        
        $aluno->create([
            'name'=>'Julia Duran',
            'Ra'=> '220092120',
            'Cpf'=> '49519088503',
            'Cidade'=>'Jundiai',
            'Cep'=>'13202500',
            'Rua'=> 'Rua Moises Abaid',
            'Estado'=>'SP',
            'numero'=>'161',
            'fav_film' => "novica rebelde",
        ]);

        $aluno->create([
            'name'=>'Taina Duran',
            'Ra'=> '220093320',
            'Cpf'=> '49519088903',
            'Cidade'=>'Jundiai',
            'Cep'=>'13202500',
            'Rua'=> 'Rua Moises Abaid',
            'Estado'=>'SP',
            'numero'=>'181',
            'fav_film' => "pitch paerfect",
        ]);

        $aluno->create([
            'name'=>'Luigi Bertoli',
            'Ra'=> '220098720',
            'Cpf'=> '49519054903',
            'Cidade'=>'Campinas',
            'Cep'=>'13202300',
            'Rua'=> 'Rua das Ponter',
            'Estado'=>'SP',
            'numero'=>'161',
            'fav_film' => "som do coracao",
        ]);
    }
}
