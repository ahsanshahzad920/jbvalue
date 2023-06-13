<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\items;
use App\Models\ValueHistory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table("items")->insert([
            [
                'description' => 'This is description',
                'image' => 'https://img.freepik.com/premium-photo/red-premium-business-sedan-car-sports-configuration-white-background-3d-rendering_101266-26319.jpg',
                'maxspeed' => '300',
                'name' => 'Red (Car)',
                'price' => '199',
                'type' => 'Sedan',
            ],
            [
                'description' => 'This is description',
                'image' => 'https://img.freepik.com/premium-photo/blue-premium-business-sedan-car-sports-configuration-white-background-3d-rendering_101266-26564.jpg',
                'maxspeed' => '500',
                'name' => 'Red (Car)',
                'price' => '499',
                'type' => 'Pick Up',
            ]
        ]);

        DB::table('value_histories')->insert([
            [
                "item_id"=>1,
                "value"=>9923499999,
            ],
            [
                "item_id"=>1,
                "value"=>39824792,
            ],
            [
                "item_id"=>1,
                "value"=>26323,
            ],
            [
                "item_id"=>1,
                "value"=>345463434,
            ],
            [
                "item_id"=>2,
                "value"=>23434542,
            ]
        ]);
    }
}
