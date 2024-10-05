<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brandsAndModels = [
            'Toyota' => ['Corolla', 'Camry', 'RAV4'],
            'Honda' => ['Civic', 'Accord', 'CR-V'],
            'Ford' => ['F-150', 'Escape', 'Explorer'],
            'Chevrolet' => ['Silverado', 'Equinox', 'Malibu'],
            'Mercedes-Benz' => ['C-Class', 'E-Class', 'GLC'],
            'BMW' => ['3 Series', '5 Series', 'X3'],
            'Audi' => ['A4', 'A6', 'Q5'],
            'Lexus' => ['RX', 'ES', 'NX'],
            'Porsche' => ['911', 'Cayenne', 'Macan'],
            'Volkswagen' => ['Golf', 'Passat', 'Tiguan']
        ];
    
        $brand = array_rand($brandsAndModels);
        $model = $this->faker->randomElement($brandsAndModels[$brand]);
    
        return [
            'brand' => $brand,
            'model' => $model,
            'year' => $this->faker->numberBetween(2000, date('Y')),
            'color' => $this->faker->colorName,
            'price' => $this->faker->randomFloat(2, 0, 999999),
            'mileage' => $this->faker->numberBetween(0, 200000),
        ];
    }
}
