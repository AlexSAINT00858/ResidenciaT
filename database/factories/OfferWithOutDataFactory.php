<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfferWithOutData>
     */
    class OfferWithOutDataFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'offerImage' => "empresa.png",
                'publicationDate' => strval($this->faker->dateTimeBetween('-10 years','now')->format('Y-m-d H:i:s')),
                'eliminationDate' => $this->faker->date,
                'email' => $this->faker->randomElement(["osapat@gmail.com","ferrepat@gmail.com","corona@gmail.com","patsa@gmail.com"]),
                'state' => $this->faker->randomElement(["active","inactive"])
            ];
        }
    }
