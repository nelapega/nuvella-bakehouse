@extends('layouts.admin')

@section('title', 'Tambah Produk Baru')
@section('header_title', 'Tambah Produk Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">

        <!-- Form Card -->
        <div class="card-admin mb-4">
            <div class="card-admin-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="font-serif fw-bold mb-1" style="color: var(--admin-primary);">Formulir Tambah Produk Bakery</h5>
                    <small class="text-muted">Lengkapi seluruh kolom di bawah ini. Validasi server aktif minimal 3 aturan.</small>
                </div>
                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                </a>
            </div>

            <!-- Ketentuan Validasi Box -->
            <div class="p-3 bg-light border-bottom small text-muted">
                <i class="bi bi-info-circle-fill text-primary me-1"></i> 
                <strong>Ketentuan Validasi Sisi Server (3 Aturan):</strong> 
                <span class="badge bg-secondary">1. Wajib Diisi (required)</span>
                <span class="badge bg-secondary">2. Maksimal Karakter (max)</span>
                <span class="badge bg-secondary">3. Tipe Data (string / numeric / image)</span>
            </div>

            <div class="p-4">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-4">
                        <!-- Nama Produk -->
                        <div class="col-md-8">
                            <label for="name" class="form-label fw-bold small">
                                Nama Produk <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   value="{{ old('name') }}" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Contoh: Red Velvet Dream Cake" 
                                   required>
                            <div class="form-text small">Aturan: Wajib diisi &bull; Tipe data teks (string) &bull; Maksimal 150 karakter.</div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kategori (Relasi Database) -->
                        <div class="col-md-4">
                            <label for="category_id" class="form-label fw-bold small">
                                Kategori (Relasi Tabel) <span class="text-danger">*</span>
                            </label>
                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text small">Aturan: Wajib dipilih &bull; Tipe integer &bull; Valid di tabel categories.</div>
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
                                       value="{{ old('price') }}" 
                                       class="form-control @error('price') is-invalid @enderror" 
                                       placeholder="Contoh: 185000" 
                                       min="1000" 
                                       step="500" 
                                       required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text small">Aturan: Wajib diisi &bull; Tipe numerik (angka) &bull; Minimal Rp 1.000.</div>
                        </div>

                        <!-- Porsi / Berat -->
                        <div class="col-md-6">
                            <label for="weight_portion" class="form-label fw-bold small">
                                Porsi / Berat / Dimensi
                            </label>
                            <input type="text" 
                                   name="weight_portion" 
                                   id="weight_portion" 
                                   value="{{ old('weight_portion') }}" 
                                   class="form-control @error('weight_portion') is-invalid @enderror" 
                                   placeholder="Contoh: Diameter 18 cm (6-8 porsi) atau 250 gram">
                            <div class="form-text small">Opsional &bull; Tipe teks &bull; Maksimal 100 karakter.</div>
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
                                   value="{{ old('ingredients') }}" 
                                   class="form-control @error('ingredients') is-invalid @enderror" 
                                   placeholder="Contoh: French butter, cream cheese New Zealand, cocoa powder, tepung terigu gandum">
                            <div class="form-text small">Opsional &bull; Tipe teks &bull; Maksimal 500 karakter.</div>
                            @error('ingredients')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi Lengkap Produk -->
                        <div class="col-12">
                            <label for="description" class="form-label fw-bold small">
                                Deskripsi Lengkap Produk <span class="text-danger">*</span>
                            </label>
                            <textarea name="description" 
                                      id="description" 
                                      rows="4" 
                                      class="form-control @error('description') is-invalid @enderror" 
                                      placeholder="Jelaskan aroma, kelembutan tekstur, rasa lezat, dan saran penyajian produk..." 
                                      required>{{ old('description') }}</textarea>
                            <div class="form-text small">Aturan: Wajib diisi &bull; Tipe teks &bull; Maksimal 3000 karakter.</div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Upload Foto Produk (Ketentuan 5) -->
                        <div class="col-md-7">
                            <label for="image" class="form-label fw-bold small">
                                Upload Foto Produk <span class="text-danger">*</span>
                            </label>
                            <input type="file" 
                                   name="image" 
                                   id="image" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   accept="image/jpeg,image/png,image/jpg,image/webp" 
                                   onchange="previewImage(event)" 
                                   required>
                            <div class="form-text small">
                                Disimpan ke <code>storage/app/public/products</code> &bull; Tipe file gambar (jpeg, png, jpg, webp) &bull; Maksimal ukuran 2MB (2048 KB).
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Live Preview Box -->
                        <div class="col-md-5">
                            <label class="form-label fw-bold small d-block">Pratinjau Foto</label>
                            <div class="border rounded-4 p-2 text-center bg-light" style="min-height: 150px; display: flex; align-items: center; justify-content: center;">
                                <img id="imagePreview" src="#" alt="Pratinjau Foto" class="rounded-3 shadow-sm d-none" style="max-height: 140px; max-width: 100%; object-fit: cover;">
                                <div id="previewPlaceholder" class="text-muted small">
                                    <i class="bi bi-image fs-1 d-block text-secondary"></i>
                                    Foto yang dipilih akan muncul di sini
                                </div>
                            </div>
                        </div>

                        <!-- Checkboxes: Status & Unggulan -->
                        <div class="col-12">
                            <div class="p-3 bg-light rounded-3 d-flex flex-wrap gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_available" value="1" id="is_available" {{ old('is_available', '1') ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold small" for="is_available">
                                        Produk Tersedia (Ready Stock)
                                    </label>
                                    <div class="text-muted" style="font-size: 0.72rem;">Jika tidak dicentang, produk akan berstatus Pre-Order / Habis.</div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold small" for="is_featured">
                                        Tandai sebagai Produk Unggulan (Featured)
                                    </label>
                                    <div class="text-muted" style="font-size: 0.72rem;">Akan ditampilkan di section unggulan halaman beranda.</div>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="col-12 pt-3 border-top d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-admin-primary px-4 rounded-pill">
                                <i class="bi bi-cloud-arrow-up me-1"></i> Simpan Produk & Upload Foto
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
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('previewPlaceholder');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
                placeholder.classList.add('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
