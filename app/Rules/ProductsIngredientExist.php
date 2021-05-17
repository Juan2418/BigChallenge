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
            if ($this->isInvalidProduct($product)) {
                $allExist = false;
            }
            $allExist = $this->checkAllIngredientsAreValid($allExist, $product['ingredients']);
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

    /**
     * @param $ingredients
     * @return false
     */
    private function checkAllIngredientsAreValid($allExist, $ingredients): bool
    {
        foreach ($ingredients as $ingredient) {
            if (Ingredient::find($ingredient['id']) == null) {
                $allExist = false;
            }
        }
        return $allExist;
    }

    /**
     * @param $product
     * @return bool
     */
    private function isInvalidProduct($product): bool
    {
        return Product::find($product['id']) == null || $product['quantity'] < 1;
    }
}
