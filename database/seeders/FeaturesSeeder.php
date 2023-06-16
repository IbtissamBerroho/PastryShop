<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Features;

class FeaturesSeeder extends Seeder
{

    public function run()
    {
        Features::create([
            'nom' => "talian bread",
            'prix' => "5.00$",
            'categorie' => "bread",
            'recette' => "1 1/2 c. all-purpose flour 1 tbsp. baking powder 2 tbsp. granulated sugar  1 tsp. kosher salt 3/4 c. whole milk  1/2 c. ricotta 2 large eggs 1 tsp. pure vanilla extract Juice and zest of 1 lemon Butter, for cooking Maple syrup, for serving  Powdered sugar, for serving",
            'photo' => "bg3.jpg"
        ]);
        Features::create([
            'nom' => "Pancetta",
            'prix' => "11.00$",
            'categorie' => "Cake",
            'recette' => "1 1/2 c. all-purpose flour 1 tbsp. baking powder 2 tbsp. granulated sugar  1 tsp. kosher salt 3/4 c. whole milk  1/2 c. ricotta 2 large eggs 1 tsp. pure vanilla extract Juice and zest of 1 lemon Butter, for cooking Maple syrup, for serving  Powdered sugar, for serving",
            'photo' => "img2.jpg"
        ]);
        Features::create([
            'nom' => "Gaston Lenôtre",
            'prix' => "7.00$",
            'categorie' => "Cookies",
            'recette' => "1 1/2 c. all-purpose flour 1 tbsp. baking powder 2 tbsp. granulated sugar  1 tsp. kosher salt 3/4 c. whole milk  1/2 c. ricotta 2 large eggs 1 tsp. pure vanilla extract Juice and zest of 1 lemon Butter, for cooking Maple syrup, for serving  Powdered sugar, for serving",
            'photo' => "img4.jpg"
        ]);
    }
}
