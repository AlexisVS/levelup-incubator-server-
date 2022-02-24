<?php

namespace Modules\Incubator\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Incubator\Entities\Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->text(10),
            "description" => $this->faker->text(10),
            "status" => $this->faker->randomElement(['undo', 'done', 'pending']),
            "startup_id" => 1
        ];
    }
}
