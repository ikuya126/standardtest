<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{

    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'gender' => rand(1, 2),
            'postcode' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'building_name' => $this->faker->secondaryAddress(),
            'email' => $this->faker->email(),
            'opinion' => $this->faker->realText(50),

        ];
    }
}
