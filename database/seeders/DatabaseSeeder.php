<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */

        // Admin
        User::firstOrCreate(
    ['email' => 'admin@zevana.com'],
    [
        'name' => 'Admin',
        'password' => bcrypt('password'),
        'role' => 'admin',
    ]
);

        // Customers
        User::factory(10)->create([
            'role' => 'customer',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Main Categories
        |--------------------------------------------------------------------------
        */

        $watches     = Category::factory()->create(['name' => 'Watches']);
        $eyewear     = Category::factory()->create(['name' => 'Eyewear']);
        $jewelry     = Category::factory()->create(['name' => 'Jewelry']);
        $accessories = Category::factory()->create(['name' => 'Accessories']);
        $fragrance   = Category::factory()->create(['name' => 'Fragrance']);
        $skincare    = Category::factory()->create(['name' => 'Skincare']);

        /*
        |--------------------------------------------------------------------------
        | Jewelry Subcategories
        |--------------------------------------------------------------------------
        */

        $rings = Category::factory()->create([
            'name' => 'Rings',
            'parent_id' => $jewelry->id,
        ]);

        $earrings = Category::factory()->create([
            'name' => 'Earrings',
            'parent_id' => $jewelry->id,
        ]);

        $bracelets = Category::factory()->create([
            'name' => 'Bracelets',
            'parent_id' => $jewelry->id,
        ]);

        $necklaces = Category::factory()->create([
            'name' => 'Necklaces',
            'parent_id' => $jewelry->id,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Accessories Subcategories
        |--------------------------------------------------------------------------
        */

        $bags = Category::factory()->create([
            'name' => 'Bags',
            'parent_id' => $accessories->id,
        ]);

        $belts = Category::factory()->create([
            'name' => 'Belts',
            'parent_id' => $accessories->id,
        ]);

        $pens = Category::factory()->create([
            'name' => 'Pens',
            'parent_id' => $accessories->id,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Skincare Subcategories
        |--------------------------------------------------------------------------
        */

        $makeup = Category::factory()->create([
            'name' => 'Makeup',
            'parent_id' => $skincare->id,
        ]);

        $moisturizer = Category::factory()->create([
            'name' => 'Moisturizer',
            'parent_id' => $skincare->id,
        ]);

        $naturalOil = Category::factory()->create([
            'name' => 'Natural Oil',
            'parent_id' => $skincare->id,
        ]);

        $tools = Category::factory()->create([
            'name' => 'Tools',
            'parent_id' => $skincare->id,
        ]);

        $lipcare = Category::factory()->create([
            'name' => 'Lip Care',
            'parent_id' => $skincare->id,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Products (attached to subcategories)
        |--------------------------------------------------------------------------
        */

        Product::factory(10)->create(['category_id' => $rings->id]);
        Product::factory(10)->create(['category_id' => $earrings->id]);
        Product::factory(10)->create(['category_id' => $bracelets->id]);
        Product::factory(10)->create(['category_id' => $necklaces->id]);

        Product::factory(10)->create(['category_id' => $bags->id]);
        Product::factory(10)->create(['category_id' => $belts->id]);
        Product::factory(10)->create(['category_id' => $pens->id]);

        Product::factory(10)->create(['category_id' => $makeup->id]);
        Product::factory(10)->create(['category_id' => $moisturizer->id]);
        Product::factory(10)->create(['category_id' => $naturalOil->id]);
        Product::factory(10)->create(['category_id' => $tools->id]);
        Product::factory(10)->create(['category_id' => $lipcare->id]);

        /*
        |--------------------------------------------------------------------------
        | Tags
        |--------------------------------------------------------------------------
        */

        $tags = Tag::factory(10)->create();

        Product::all()->each(function ($product) use ($tags) {
            $product->tags()->attach(
                $tags->random(2)->pluck('id')->toArray()
            );
        });
    }
}
