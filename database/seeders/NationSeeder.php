<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Nation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nations = ['India','Japan','Thailand','Korea'];
        foreach ($nations as $nation){
            Nation::factory()->create([
                'name' => $nation
            ]);
        }
    }
}
