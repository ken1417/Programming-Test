<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Teachers;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teachers>
 */
class TeachersFactory extends Factory
{

  protected $model = Teachers::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'fullName' => $this->faker->name(),
          'major' => $this->faker->randomElement(["Science","Mathematics","English","MAPEH","Computer","Chemistry","Economics","Araling Panlipunan","Music"]),
          'dateHired' => $this->faker->date('Y-m-d'),
        ];
    }
}
