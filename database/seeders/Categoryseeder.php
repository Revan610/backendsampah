<?php

namespace Database\Seeders;
use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->upsert([
            ['name' => 'Organik'],
            ['name' => 'Kertas'],
            ['name' => 'Plastik'],
        ], ['name']); // Cegah duplikasi berdasarkan kolom 'name'
        
    }
}
