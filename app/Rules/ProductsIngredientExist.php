<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Product;
use App\Models\Ingredient;

class ProductsIngredientExist implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $allExist = true;

        foreach ($value as $product) {
            if (Product::find($product['id']) == null || $product['quantity'] < 1) {
                $allExist = false;
            }
            foreach ($product['ingredients'] as $ingredient) {
                if (Ingredient::find($ingredient['id']) == null) {
                    $allExist = false;
                }
            }
        }


        return $allExist;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The order contains a non-existing product/ingredient';
    }
}
