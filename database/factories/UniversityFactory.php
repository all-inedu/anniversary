<?php

namespace Database\Factories;

use App\Models\University;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\University>
 */
class UniversityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = University::class;

    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'name' => $this->faker->company(),
            'session_start' => $this->faker->dateTimeBetween('2023-04-01', '2023-04-8'),
            'time_start' => $this->faker->time(),
            'thumbnail' => 'thumbnail/juFOPztxMl3dIpxCXa0lqyHTJQ9zWnNGUK6FixHv.jpg',
            'description' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
