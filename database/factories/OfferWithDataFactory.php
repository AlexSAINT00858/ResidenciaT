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
                'publicationDate' => $this->faker->dateTime,
                'eliminationDate' => $this->faker->dateTime,
                'salary' => $this->faker->numberBetween(1,10000)/100,
                'email' => $this->faker->randomElement(["osapat@gmail.com","ferrepat@gmail.com","corona@gmail.com","patsa@gmail.com"]),
                'state' => $this->faker->randomElement(["active","inactive"])
            ];
        }
    }
