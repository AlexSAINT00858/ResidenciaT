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
                'publicationDate' => $this->faker->dateTime,
                'eliminationDate' => $this->faker->dateTime,
                'email' => $this->faker->randomElement(["osapat@gmail.com","ferrepat@gmail.com","corona@gmail.com","patsa@gmail.com"]),
                'state' => $this->faker->randomElement(["active","inactive"])
            ];
        }
    }