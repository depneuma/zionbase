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
            'date_time' => $this->faker->dateTime,
            'schedule' => $this->faker->text,
            'venue' => $this->faker->text(255),
            'rsvp_three_id' => \App\Models\User::factory(),
            'rsvp_two_id' => \App\Models\User::factory(),
            'rsvp_one_id' => \App\Models\User::factory(),
        ];
    }
}
