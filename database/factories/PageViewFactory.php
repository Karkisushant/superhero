<?php

namespace Database\Factories;

use App\Enums\PageNameEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PageViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'page_name'=>$this->faker->randomElement([PageNameEnum::PRODUCTS->value,PageNameEnum::CONTACT->value]),
        ];
    }
}
