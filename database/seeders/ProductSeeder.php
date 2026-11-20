<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('public')->makeDirectory('products');

        $categories = Category::all()->keyBy('slug');

        $products = [
            [
                'category_slug' => 'cake',
                'name' => 'Chocolate Dream Cake',
                'price' => 125000,
                'stock' => 50,
                'rating' => 4.9,
                'reviews_count' => 120,
                'sales_count' => 120,
                'weight_portion' => 'Diameter 18 cm (6-8 porsi)',
                'ingredients' => 'Kue cokelat lembut dengan lapisan cokelat couverture premium Belgia, dark cocoa ganache, mentega Wijsman, dan krim segar New Zealand.',
                'description' => 'Chocolate Dream Cake adalah kue cokelat premium dengan tekstur lembut dan rasa yang kaya. Cocok untuk ulang tahun, perayaan, atau sekadar menikmati hari spesial bersama orang tersayang.',
                'is_featured' => true,
                'is_available' => true,
                'image_name' => 'chocolate-dream-cake.jpg',
                'bg_color' => [85, 45, 25],
                'badge' => 'Chef Favorite',
            ],
            [
                'category_slug' => 'cake',
                'name' => 'Vanilla Strawberry Cake',
                'price' => 120000,
                'stock' => 45,
                'rating' => 4.9,
                'reviews_count' => 95,
                'sales_count' => 65,
                'weight_portion' => 'Diameter 18 cm (6-8 porsi)',
                'ingredients' => 'Sponge cake vanilla lembut, buah stroberi segar Ciwidey, chantilly cream vanilla bean Madagascar, selai stroberi homemade.',
                'description' => 'Kue vanilla lembut berpadu krim segar ringan dan potongan buah stroberi pilihan yang manis segar alami. Tampilan manis dan elegan untuk berbagai pesta.',
                'is_featured' => true,
                'is_available' => true,
                'image_name' => 'vanilla-strawberry-cake.jpg',
                'bg_color' => [235, 120, 130],
                'badge' => 'Fresh & Sweet',
            ],
            [
                'category_slug' => 'cake',
                'name' => 'Red Velvet Cake',
                'price' => 130000,
                'stock' => 30,
                'rating' => 4.8,
                'reviews_count' => 88,
                'sales_count' => 55,
                'weight_portion' => 'Diameter 18 cm (6-8 porsi)',
                'ingredients' => 'Tepung terigu protein sedang, cocoa powder, buttermilk, cream cheese frosting lembut, ekstrak vanilla alami.',
                'description' => 'Kue red velvet klasik bertekstur moist dan lembut, dipadukan dengan cream cheese frosting gurih asam manis yang pas di lidah.',
                'is_featured' => true,
                'is_available' => true,
                'image_name' => 'red-velvet-cake.jpg',
                'bg_color' => [180, 50, 60],
                'badge' => 'Classic Best',
            ],
            [
                'category_slug' => 'pastry',
                'name' => 'Butter Croissant',
                'price' => 35000,
                'stock' => 100,
                'rating' => 4.8,
                'reviews_count' => 140,
                'sales_count' => 95,
                'weight_portion' => '1 Pcs (90 gram)',
                'ingredients' => 'Tepung gandum Prancis, French Butter AOP Lescure 84%, susu murni, ragi alami, garam laut.',
                'description' => 'Croissant autentik khas Prancis dengan lapisan luar yang renyah berderak (flaky) dan rongga dalam yang empuk lembut dengan aroma butter harum memikat.',
                'is_featured' => true,
                'is_available' => true,
                'image_name' => 'butter-croissant.jpg',
                'bg_color' => [205, 130, 45],
                'badge' => 'French Artisan',
            ],
            [
                'category_slug' => 'cookies',
                'name' => 'Choco Cookies',
                'price' => 25000,
                'stock' => 80,
                'rating' => 4.8,
                'reviews_count' => 110,
                'sales_count' => 80,
                'weight_portion' => '1 Pouch (isi 8 pcs, 180g)',
                'ingredients' => 'Dark chocolate chips, butter murni, brown sugar tebu, ekstrak vanilla, tepung terigu pilihan.',
                'description' => 'Kue kering cokelat dengan tekstur renyah di luar dan fudgy lembut di dalam dengan taburan chocolate chip melimpah yang lumer di mulut.',
                'is_featured' => true,
                'is_available' => true,
                'image_name' => 'choco-cookies.jpg',
                'bg_color' => [110, 65, 40],
                'badge' => 'Best Snack',
            ],
            [
                'category_slug' => 'pastry',
                'name' => 'Almond Pastry',
                'price' => 30000,
                'stock' => 60,
                'rating' => 4.8,
                'reviews_count' => 75,
                'sales_count' => 40,
                'weight_portion' => '1 Pcs (95 gram)',
                'ingredients' => 'Puff pastry mentega, krim frangipane almond, irisan kacang almond California panggang, taburan gula salju.',
                'description' => 'Pastry berlapis dengan isian krim almond manis gurih dan taburan kacang almond renyah yang dipanggang hingga keemasan sempurna.',
                'is_featured' => false,
                'is_available' => true,
                'image_name' => 'almond-pastry.jpg',
                'bg_color' => [210, 160, 95],
                'badge' => 'Nutty Delight',
            ],
            [
                'category_slug' => 'cake',
                'name' => 'Basque Burnt Cheesecake',
                'price' => 140000,
                'stock' => 25,
                'rating' => 4.9,
                'reviews_count' => 90,
                'sales_count' => 35,
                'weight_portion' => 'Diameter 16 cm (6 porsi)',
                'ingredients' => 'Cream cheese impor premium, dairy fresh cream 35%, telur organik, gula tebu alami, sari lemon segar.',
                'description' => 'Cheesecake panggang ala San Sebastian dengan permukaan karamelisasi eksotis dan bagian tengah bertekstur lembut meleleh di mulut.',
                'is_featured' => false,
                'is_available' => true,
                'image_name' => 'basque-burnt-cheesecake.jpg',
                'bg_color' => [210, 140, 60],
                'badge' => 'Cheesy Sensation',
            ],
            [
                'category_slug' => 'roti',
                'name' => 'Country Sourdough Bread',
                'price' => 45000,
                'stock' => 40,
                'rating' => 4.9,
                'reviews_count' => 65,
                'sales_count' => 30,
                'weight_portion' => '1 Loaf (550 gram, 12 slice)',
                'ingredients' => 'Tepung unbleached, tepung gandum utuh organik (whole wheat), wild sourdough starter alami umur 5 tahun, garam laut.',
                'description' => 'Roti fermentasi lambat selama 24 jam tanpa ragi kimia. Menghasilkan crust renyah, crumb kenyal berongga, dan rasa asam segar yang menyehatkan lambung.',
                'is_featured' => false,
                'is_available' => true,
                'image_name' => 'country-sourdough-bread.jpg',
                'bg_color' => [165, 115, 65],
                'badge' => 'Healthy Artisan',
            ],
            [
                'category_slug' => 'roti',
                'name' => 'Japanese Shokupan Milk Bread',
                'price' => 35000,
                'stock' => 50,
                'rating' => 4.8,
                'reviews_count' => 80,
                'sales_count' => 45,
                'weight_portion' => '1 Loaf (8 potong tebal)',
                'ingredients' => 'Tepung terigu Komachi Jepang, susu segar murni, unsalted butter, madu randu asli, ragi instan.',
                'description' => 'Roti tawar susu khas Jepang metode Yudane. Serat roti selembut awan kapas dengan rasa manis susu alami yang sangat nikmat dipanggang atau dimakan langsung.',
                'is_featured' => false,
                'is_available' => true,
                'image_name' => 'japanese-shokupan-milk-bread.jpg',
                'bg_color' => [230, 195, 145],
                'badge' => 'Daily Bread',
            ],
            [
                'category_slug' => 'cookies',
                'name' => 'Almond Snow Cookies',
                'price' => 60000,
                'stock' => 60,
                'rating' => 4.7,
                'reviews_count' => 50,
                'sales_count' => 25,
                'weight_portion' => '1 Toples (30 pcs, 280g)',
                'ingredients' => 'Kacang almond California sangrai cincang, butter murni, tepung maizena, gula salju dingin premium.',
                'description' => 'Kue putri salju almond istimewa yang renyah dan lumer saat dikunyah, diselimuti gula salju dingin yang memberikan kesegaran manis khas.',
                'is_featured' => false,
                'is_available' => true,
                'image_name' => 'almond-snow-cookies.jpg',
                'bg_color' => [225, 205, 175],
                'badge' => 'Festive Favorite',
            ],
        ];

        foreach ($products as $item) {
            $cat = $categories->get($item['category_slug']);
            if (!$cat) continue;

            $imageRelativePath = 'products/' . $item['image_name'];
            $fullStoragePath = storage_path('app/public/' . $imageRelativePath);

            if (!file_exists($fullStoragePath)) {
                $this->generateBakeryImage($fullStoragePath, $item['name'], $cat->name, $item['bg_color'], $item['badge']);
            }

            Product::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($item['name'])],
                [
                    'category_id' => $cat->id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'rating' => $item['rating'],
                    'reviews_count' => $item['reviews_count'],
                    'sales_count' => $item['sales_count'],
                    'weight_portion' => $item['weight_portion'],
                    'ingredients' => $item['ingredients'],
                    'description' => $item['description'],
                    'image' => $imageRelativePath,
                    'is_featured' => $item['is_featured'],
                    'is_available' => $item['is_available'],
                ]
            );
        }
    }

    protected function generateBakeryImage(string $filePath, string $title, string $category, array $rgb, string $badge): void
    {
        $width = 800;
        $height = 600;
        $image = imagecreatetruecolor($width, $height);

        $bg = imagecolorallocate($image, $rgb[0], $rgb[1], $rgb[2]);
        imagefilledrectangle($image, 0, 0, $width, $height, $bg);

        $softWhite = imagecolorallocatealpha($image, 255, 255, 255, 105);
        imagefilledellipse($image, 120, 120, 280, 280, $softWhite);
        imagefilledellipse($image, 680, 480, 320, 320, $softWhite);
        imagefilledellipse($image, 400, 300, 460, 460, $softWhite);

        $cardBg = imagecolorallocatealpha($image, 255, 253, 249, 25);
        imagefilledrectangle($image, 80, 80, 720, 520, $cardBg);

        $borderColor = imagecolorallocatealpha($image, 255, 255, 255, 60);
        imagerectangle($image, 90, 90, 710, 510, $borderColor);

        $white = imagecolorallocate($image, 255, 255, 255);
        $gold = imagecolorallocate($image, 255, 230, 170);

        imagestring($image, 5, 120, 120, "NUVELLA BAKEHOUSE - " . strtoupper($category), $gold);
        imagestring($image, 4, 120, 150, "Freshly Baked, Made with Heart", $white);

        imagestring($image, 5, 120, 280, strtoupper($title), $white);
        imagestring($image, 4, 120, 320, "[ " . $badge . " ]", $gold);

        imagestring($image, 3, 120, 440, "PT Nuvella Pangan Sejahtera * Premium Artisan Ingredients", $white);
        imagestring($image, 2, 120, 470, "Higienis - Halal - Tanpa Bahan Pengawet - Dipanggang Setiap Hari", $gold);

        imagejpeg($image, $filePath, 90);
        imagedestroy($image);
    }
}
