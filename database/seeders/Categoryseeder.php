<?php

namespace Database\Seeders;
use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Organik', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Kertas', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Plastik', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
        
    }
}
