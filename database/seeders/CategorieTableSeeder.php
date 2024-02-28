<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'idCategoria' => 1,
            'categoria' => "Azione",
        ]);
    
        Categoria::create([
            'idCategoria' => 2,
            'categoria' => "Commedia",
        ]);
    
        Categoria::create([
            'idCategoria' => 3,
            'categoria' => "Drammatico",
        ]);
    
        Categoria::create([
            'idCategoria' => 4,
            'categoria' => "Fantascienza",
        ]);
    
        Categoria::create([
            'idCategoria' => 5,
            'categoria' => "Horror",
        ]);
    
        Categoria::create([
            'idCategoria' => 6,
            'categoria' => "Thriller",
        ]);
    
        Categoria::create([
            'idCategoria' => 7,
            'categoria' => "Fantasy",
        ]);
    
        Categoria::create([
            'idCategoria' => 8,
            'categoria' => "Animazione",
        ]);
    
        Categoria::create([
            'idCategoria' => 9,
            'categoria' => "Romantico",
        ]);
    
        Categoria::create([
            'idCategoria' => 10,
            'categoria' => "Documentario",
        ]);
    
        Categoria::create([
            'idCategoria' => 11,
            'categoria' => "Erotico",
        ]);
    
        Categoria::create([
            'idCategoria' => 12,
            'categoria' => "Avventura",
        ]);
    
        Categoria::create([
            'idCategoria' => 13,
            'categoria' => "Biografico",
        ]);

        Categoria::create([
            'idCategoria' => 14,
            'categoria' => "Storico",
        ]);
    
        Categoria::create([
            'idCategoria' => 15,
            'categoria' => "Musical",
        ]);

        Categoria::create([
            'idCategoria' => 16,
            'categoria' => "Western",
        ]);
    }
    
}
