<?php

namespace Database\Factories;

use App\Models\Sermon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SermonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sermon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'slug' => $this->faker->slug,
            'description' => $this->faker->sentence(15),
            'price' => 'Free',
            'downloads' => $this->faker->randomDigit,
            'audio' => $this->faker->text(255),
            'video' => $this->faker->text(255),
            'pdf' => $this->faker->text(255),
            'event_id' => \App\Models\Event::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
