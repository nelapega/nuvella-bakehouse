<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BakeryWebsiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Test halaman publik (Home, About, Contact, Katalog, Detail).
     */
    public function test_public_pages_load_successfully(): void
    {
        // 1. Home
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('PT NUVELLA PANGAN SEJAHTERA');
        $response->assertSee('Freshly Baked');

        // 2. About
        $response = $this->get('/tentang-kami');
        $response->assertStatus(200);
        $response->assertSee('Tentang Nuvella Bakehouse');

        // 3. Contact
        $response = $this->get('/kontak');
        $response->assertStatus(200);
        $response->assertSee('Hubungi Nuvella Bakehouse');

        // 4. Products Index
        $response = $this->get('/produk');
        $response->assertStatus(200);
        $response->assertSee('Pilihan Menu & Produk Bakery');

        // 5. Product Show (Detail per item)
        $product = Product::first();
        $response = $this->get('/produk/' . $product->slug);
        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee($product->formatted_price);
    }

    /**
     * Test halaman admin dashboard dan daftar produk.
     */
    public function test_admin_dashboard_and_product_list(): void
    {
        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Dashboard Ringkasan');

        $response = $this->get('/admin/products');
        $response->assertStatus(200);
        $response->assertSee('Daftar Seluruh Produk Bakery');

        $response = $this->get('/admin/categories');
        $response->assertStatus(200);
        $response->assertSee('Daftar Kategori Produk');
    }

    /**
     * Test CRUD produk admin: Create, Store with file upload & 3 validation rules.
     */
    public function test_admin_can_create_product_with_image_upload(): void
    {
        Storage::fake('public');

        $category = Category::first();
        $file = UploadedFile::fake()->image('test_cake.jpg', 600, 600);

        $response = $this->post('/admin/products', [
            'name' => 'Strawberry Choco Cake',
            'category_id' => $category->id,
            'price' => 125000,
            'weight_portion' => 'Diameter 16 cm',
            'ingredients' => 'Tepung, stroberi segar, cokelat',
            'description' => 'Kue cokelat lezat dengan taburan buah stroberi segar dan krim lembut manis.',
            'image' => $file,
            'is_available' => '1',
            'is_featured' => '1',
        ]);

        $response->assertRedirect('/admin/products');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('products', [
            'name' => 'Strawberry Choco Cake',
            'category_id' => $category->id,
            'price' => 125000,
        ]);

        $product = Product::where('name', 'Strawberry Choco Cake')->first();
        $this->assertNotNull($product->image);
        Storage::disk('public')->assertExists($product->image);
    }

    /**
     * Test validasi form di sisi server (minimal 3 aturan: required, max, data type).
     */
    public function test_product_store_validation_rules(): void
    {
        $response = $this->post('/admin/products', [
            'name' => '', // Gagal rule 1 (required)
            'category_id' => 'bukan_angka', // Gagal rule 3 (integer / exists)
            'price' => 'bukan_angka', // Gagal rule 3 (numeric)
            'description' => '', // Gagal rule 1 (required)
            // image missing -> Gagal rule 1 (required)
        ]);

        $response->assertSessionHasErrors(['name', 'category_id', 'price', 'description', 'image']);
    }

    /**
     * Test update dan delete produk.
     */
    public function test_admin_can_update_and_delete_product(): void
    {
        $product = Product::first();

        // Update
        $response = $this->put('/admin/products/' . $product->id, [
            'name' => 'Updated Cake Name',
            'category_id' => $product->category_id,
            'price' => 250000,
            'description' => 'Deskripsi yang sudah diperbarui dengan baik dan lengkap.',
            'is_available' => '1',
        ]);

        $response->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Cake Name',
            'price' => 250000,
        ]);

        // Delete
        $response = $this->delete('/admin/products/' . $product->id);
        $response->assertRedirect('/admin/products');
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
