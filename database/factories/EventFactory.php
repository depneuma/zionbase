<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'time' => $this->faker->time,
            'venue' => $this->faker->text(255),
            'schedule' => $this->faker->text,
            'rsvp_three_id' => \App\Models\User::factory(),
            'rsvp_two_id' => \App\Models\User::factory(),
            'rsvp_one_id' => \App\Models\User::factory(),
        ];
    }
}
