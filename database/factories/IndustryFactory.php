<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IndustryFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
        ];
    }
}
