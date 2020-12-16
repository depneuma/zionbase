<?php

namespace Database\Factories;

use App\Models\Hero;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'line_one' => 'Welcome To',
            'line_two' => 'Shammah Divine Zion Ministry',
            'line_three' => 'Transforming Lives In Zion Through The Power In The Word of God To Transform Generations'
        ];
    }
}
