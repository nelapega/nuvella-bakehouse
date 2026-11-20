@extends('layouts.admin')

@section('title', 'Ubah Produk - ' . $product->name)
@section('header_title', 'Ubah Data Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">

        <!-- Form Card -->
        <div class="card-admin mb-4">
            <div class="card-admin-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="font-serif fw-bold mb-1" style="color: var(--admin-primary);">Ubah Data: {{ $product->name }}</h5>
                    <small class="text-muted">Perbarui informasi produk dan foto jika diperlukan.</small>
                </div>
                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                </a>
            </div>

            <div class="p-4">
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <!-- Nama Produk -->
                        <div class="col-md-8">
                            <label for="name" class="form-label fw-bold small">
                                Nama Produk <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   value="{{ old('name', $product->name) }}" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   required>
                            <div class="form-text small">Aturan: Wajib diisi &bull; Teks string &bull; Maksimal 150 karakter.</div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kategori (Relasi) -->
                        <div class="col-md-4">
                            <label for="category_id" class="form-label fw-bold small">
                                Kategori <span class="text-danger">*</span>
                            </label>
                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text small">Aturan: Wajib dipilih &bull; Integer &bull; Valid di tabel categories.</div>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga Produk -->
                        <div class="col-md-6">
                            <label for="price" class="form-label fw-bold small">
                                Harga Produk (Rupiah) <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light fw-bold">Rp</span>
                                <input type="number" 
                                       name="price" 
                                       id="price" 
                                       value="{{ old('price', $product->price) }}" 
                                       class="form-control @error('price') is-invalid @enderror" 
                                       min="1000" 
                                       step="500" 
                                       required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text small">Aturan: Wajib diisi &bull; Tipe numerik &bull; Minimal Rp 1.000.</div>
                        </div>

                        <!-- Porsi / Berat -->
                        <div class="col-md-6">
                            <label for="weight_portion" class="form-label fw-bold small">
                                Porsi / Berat / Dimensi
                            </label>
                            <input type="text" 
                                   name="weight_portion" 
                                   id="weight_portion" 
                                   value="{{ old('weight_portion', $product->weight_portion) }}" 
                                   class="form-control @error('weight_portion') is-invalid @enderror">
                            <div class="form-text small">Opsional &bull; Teks string &bull; Maksimal 100 karakter.</div>
                            @error('weight_portion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Komposisi Bahan -->
                        <div class="col-12">
                            <label for="ingredients" class="form-label fw-bold small">
                                Komposisi / Bahan Pilihan (Ingredients)
                            </label>
                            <input type="text" 
                                   name="ingredients" 
                                   id="ingredients" 
                                   value="{{ old('ingredients', $product->ingredients) }}" 
                                   class="form-control @error('ingredients') is-invalid @enderror">
                            <div class="form-text small">Opsional &bull; Teks string &bull; Maksimal 500 karakter.</div>
                            @error('ingredients')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="col-12">
                            <label for="description" class="form-label fw-bold small">
                                Deskripsi Lengkap Produk <span class="text-danger">*</span>
                            </label>
                            <textarea name="description" 
                                      id="description" 
                                      rows="4" 
                                      class="form-control @error('description') is-invalid @enderror" 
                                      required>{{ old('description', $product->description) }}</textarea>
                            <div class="form-text small">Aturan: Wajib diisi &bull; Teks string &bull; Maksimal 3000 karakter.</div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Foto Saat Ini vs Foto Baru -->
                        <div class="col-md-4">
                            <label class="form-label fw-bold small d-block">Foto Saat Ini (Tersimpan di Storage)</label>
                            <div class="border rounded-4 p-2 text-center bg-light">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="rounded-3 shadow-sm w-100" style="max-height: 160px; object-fit: cover;">
                                <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">File: <code>{{ $product->image ?? 'Default' }}</code></small>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="image" class="form-label fw-bold small">
                                Ganti Foto Baru (Opsional)
                            </label>
                            <input type="file" 
                                   name="image" 
                                   id="image" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   accept="image/jpeg,image/png,image/jpg,image/webp" 
                                   onchange="previewNewImage(event)">
                            <div class="form-text small">
                                Biarkan kosong jika tidak ingin mengubah foto &bull; Tipe: jpeg, png, jpg, webp &bull; Maks 2MB.
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-bold small d-block">Pratinjau Foto Baru</label>
                            <div class="border rounded-4 p-2 text-center bg-light" style="min-height: 120px; display: flex; align-items: center; justify-content: center;">
                                <img id="newImagePreview" src="#" alt="Pratinjau" class="rounded-3 shadow-sm d-none w-100" style="max-height: 120px; object-fit: cover;">
                                <div id="newPreviewText" class="text-muted small" style="font-size: 0.72rem;">
                                    Belum memilih foto baru
                                </div>
                            </div>
                        </div>

                        <!-- Checkboxes -->
                        <div class="col-12">
                            <div class="p-3 bg-light rounded-3 d-flex flex-wrap gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_available" value="1" id="is_available" {{ old('is_available', $product->is_available) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold small" for="is_available">
                                        Produk Tersedia (Ready Stock)
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold small" for="is_featured">
                                        Tandai sebagai Produk Unggulan (Featured)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="col-12 pt-3 border-top d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-admin-primary px-4 rounded-pill">
                                <i class="bi bi-save me-1"></i> Simpan Perubahan Produk
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewNewImage(event) {
        const input = event.target;
        const preview = document.getElementById('newImagePreview');
        const text = document.getElementById('newPreviewText');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
                text.classList.add('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
