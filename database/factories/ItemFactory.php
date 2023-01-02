<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return
        DB::table('items')->insert(
        [
            'name' => 'カット',
            'memo' => 'カットの詳細',
            'price' => 6000,
        ],
        [
            'name' => 'カラー',
            'memo' => 'カラーの詳細',
            'price' => 8000,
        ],
        [
            'name' => 'パーマ（カット込み）',
            'memo' => 'パーマ、カットの詳細',
            'price' => 13000,
        ]
    );
    }
}
