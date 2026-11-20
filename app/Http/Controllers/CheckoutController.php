<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Tampilkan formulir checkout pemesanan.
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        // Jika keranjang kosong, beri contoh item agar mockup checkout langsung terlihat cantik
        if (empty($cart)) {
            $cake = Product::where('slug', 'chocolate-dream-cake')->first() ?? Product::first();
            $croissant = Product::where('slug', 'butter-croissant')->first() ?? Product::skip(1)->first();

            if ($cake) {
                $cart[$cake->id] = [
                    'id' => $cake->id,
                    'name' => $cake->name,
                    'slug' => $cake->slug,
                    'price' => $cake->price,
                    'image' => $cake->image_url,
                    'category' => $cake->category->name,
                    'quantity' => 1,
                ];
            }
            if ($croissant) {
                $cart[$croissant->id] = [
                    'id' => $croissant->id,
                    'name' => $croissant->name,
                    'slug' => $croissant->slug,
                    'price' => $croissant->price,
                    'image' => $croissant->image_url,
                    'category' => $croissant->category->name,
                    'quantity' => 1,
                ];
            }
            session()->put('cart', $cart);
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $shippingCost = 15000;
        $grandTotal = $subtotal + $shippingCost;

        return view('pages.checkout', compact('cart', 'subtotal', 'shippingCost', 'grandTotal'));
    }

    /**
     * Proses checkout dan simpan data order.
     */
    public function process(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_address' => 'required|string|max:300',
            'customer_city' => 'required|string|max:100',
            'customer_postal_code' => 'required|string|max:10',
            'customer_phone' => 'required|string|max:20',
            'payment_method' => 'required|string|in:midtrans,transfer,cod',
            'notes' => 'nullable|string|max:500',
        ], [
            'customer_name.required' => 'Nama lengkap penerima wajib diisi.',
            'customer_address.required' => 'Alamat lengkap pengiriman wajib diisi.',
            'customer_city.required' => 'Kota pengiriman wajib diisi.',
            'customer_postal_code.required' => 'Kode pos wajib diisi.',
            'customer_phone.required' => 'Nomor HP/WhatsApp wajib diisi.',
            'payment_method.required' => 'Silakan pilih metode pembayaran.',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Keranjang belanja Anda masih kosong.');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $shippingCost = 15000;
        $grandTotal = $subtotal + $shippingCost;
        $orderNumber = 'NVL-' . date('Ymd') . '-' . rand(100, 999);

        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'customer_address' => $validated['customer_address'],
            'customer_city' => $validated['customer_city'],
            'customer_postal_code' => $validated['customer_postal_code'],
            'payment_method' => $validated['payment_method'],
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'grand_total' => $grandTotal,
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        // Kosongkan keranjang setelah checkout
        session()->forget('cart');

        return redirect()->route('checkout.success', $order->order_number)
            ->with('success', 'Pesanan Anda (' . $order->order_number . ') berhasil dibuat!');
    }

    /**
     * Halaman konfirmasi pesanan berhasil.
     */
    public function success($order_number)
    {
        $order = Order::with('items')->where('order_number', $order_number)->firstOrFail();

        return view('pages.checkout-success', compact('order'));
    }
}
