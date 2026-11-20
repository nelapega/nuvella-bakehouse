<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cake',
                'slug' => 'cake',
                'description' => 'Aneka kue tart, sponge cake, dan sliced cake premium untuk perayaan dan momen spesial.',
                'icon' => 'bi-cake2',
            ],
            [
                'name' => 'Cookies',
                'slug' => 'cookies',
                'description' => 'Kue kering renyah dan lumer dengan butter pilihan, cokelat Belgia, dan kacang panggang.',
                'icon' => 'bi-cookie',
            ],
            [
                'name' => 'Pastry',
                'slug' => 'pastry',
                'description' => 'Pastry berlapis renyah keemasan khas Prancis dengan isian manis dan gurih aromatik.',
                'icon' => 'bi-pie-chart',
            ],
            [
                'name' => 'Roti',
                'slug' => 'roti',
                'description' => 'Roti tawar artisan, sourdough, dan roti manis lembut yang dipanggang segar setiap hari.',
                'icon' => 'bi-egg-fried',
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
