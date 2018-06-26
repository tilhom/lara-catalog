<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Water animals',
        	'name_uz' => 'Suv hayvonari',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus nam provident, quaerat reiciendis hic! Consequatur earum quisquam nam repellat neque pariatur distinctio recusandae, suscipit! Necessitatibus quisquam tenetur iusto, earum architecto.',
        	'image' => 'water.jpeg'
        ]);
        Category::create([
            'name' => 'Air animals',
        	'name_uz' => 'Havo hayvonlari',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias magni quos quae totam ab sapiente voluptas, corporis ratione id ipsum, ex esse. Quidem, molestiae, ipsam.',
        	'image' => 'air.jpeg'
        ]);
        Category::create([
            'name' => 'Land animals',
        	'name_uz' => 'Quruqlik hayvonlari',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi sapiente quos expedita explicabo asperiores tenetur nostrum sed doloribus. Expedita, ex cupiditate fugit tenetur nemo sit vero error. Autem facere totam ullam, porro maiores saepe sapiente iste molestias quis suscipit dicta, officia, possimus alias, sed placeat neque similique ex provident quisquam.',
        	'image' => 'land.jpeg'
        ]);
    }
}
