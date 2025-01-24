<?php

namespace Database\Seeders;
use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [];
        for($i=1;$i<=100;$i++){
            category::create([
                'name' => 'Category'.$i,
                'created_at' => now(),
                'updated_at' => now()
                
            ]);
        }
        
    }
}
