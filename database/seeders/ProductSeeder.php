<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{

    public function run()
    {
        // Product::create([
        //     'nom'=> 'Focaccia, Italian bread with rosemary',
        //     'prix' => "1.79$",
        //     'categorie' => "bread",
        //     'recette' => "500 gr de farine 1 c. à café de sel 10 gr de levure de boulanger fraîche 15 gr d'huile d'olive 31 cl d'eau 70 ml d'huile d'olive 30 ml d'eau romarin (frais ou séché) fleur de sel",
        //     'photo' => "p1.jpg"
        // ]);
        // Product::create([
        //     'nom' => "Pain Marocain",
        //     'prix' => "3.00$",
        //     'categorie' => "bread",
        //     'recette' => "350 g de farine type 55 150 g de farine semi-complète Type 110 2 cuillères à soupe de levure fraîche 1 cuillère à soupe rase de sel 1 cuillère de sucre semoule 1 cuillère à soupe d'huile d'olive 300 ml d'eau tiède",
        //     'photo' => "p2.jpg"
        // ]);
        // Product::create([
        //     'nom' => "Pain pita (Pita)",
        //     'prix' => "4.00$",
        //     'categorie'=> "bread",
        //     'recette' => "400 g de farine 23 cl d'eau tiède 2 cuillerées à soupe d'huile d'olive 1 sachet de levure de boulanger déshydraté (8g)1 cuillerée à café de sucre 1 cuillerée à café de sel",
        //     'photo' =>  "p3.jpg"
        // ]);
        // Product::create([
        //     'nom' => "Homemade Italian Bread",
        //     'prix' => "5.00$",
        //     'categorie' => "bread",
        //     'recette' => "All purpose flour 50 g, all-purpose variety 25 g Yeast  2 g, Fresh All purpose flour 300 g, all-purpose variety 130 g Yeast 10 g Lard 15 g",
        //     'photo' => "p4.jpg"
        // ]);
        // Product::create([
        //     'nom' => "Aish Baladi | Vegan Egyptian Flatbread",
        //     'prix' => "2.00$",
        //     'categorie'=> "bread",
        //     'recette'=> "Whole wheat flour - 2 ½ cups Active dry yeast - ½ TBSP Sugar - 2 tsp Salt - ½ TBSP Oil - ½ tablespoon plus more to grease Cracked wheat bran - about ¼ cup Warm water - about 1 ¼ cup (more or less as needed to make the dough)",
        //     'photo' => "p5.jpg"
        // ]);
        Product::create([
            'nom' => "Lemon Ricotta Pancakes",
            'prix' => "10.00$",
            'categorie' => "Pancake",
            'recette' => "1 1/2 c. all-purpose flour 1 tbsp. baking powder 2 tbsp. granulated sugar  1 tsp. kosher salt 3/4 c. whole milk  1/2 c. ricotta 2 large eggs 1 tsp. pure vanilla extract Juice and zest of 1 lemon Butter, for cooking Maple syrup, for serving  Powdered sugar, for serving",
            'photo' => "pc2.png"
        ]);
    }
}
