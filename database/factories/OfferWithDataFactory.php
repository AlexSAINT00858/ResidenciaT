<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfferWithData>
     */
    class OfferWithDataFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'offerName' => $this->faker->title,
                'descriptionOffer' => $this->faker->title,
                'publicationDate' => strval($this->faker->dateTimeBetween('-10 years','now')->format('Y-m-d H:i:s')),
                'eliminationDate' => $this->faker->date,
                'salary' => $this->faker->numberBetween(1,10000)/100,
                'email' => $this->faker->randomElement(["osapat@gmail.com","ferrepat@gmail.com","corona@gmail.com","patsa@gmail.com"]),
                'state' => $this->faker->randomElement(["active","inactive"])
            ];
        }
    }
