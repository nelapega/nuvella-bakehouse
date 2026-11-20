@extends('layouts.admin')

@section('title', 'Data Kategori')
@section('header_title', 'Data Kategori')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4" style="background-color: #FFFFFF; border: 1px solid var(--admin-border) !important;">
    
    <!-- Table Header Toolbar (Matching Mockup Bottom-Right) -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h4 class="font-serif fw-bold mb-0" style="color: var(--admin-primary);">Data Kategori</h4>
            <small class="text-muted">Kelola kategori menu bakery (Tabel Relasi Eloquent)</small>
        </div>
        <div>
            <!-- Button Tambah Kategori Modal Trigger -->
            <button type="button" class="btn-choco-pill px-4 py-2" data-bs-toggle="modal" data-bs-target="#createCategoryModal" style="font-size: 0.88rem;">
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Kategori</span>
            </button>
        </div>
    </div>

    <!-- Table Matching Mockup (No | Nama Kategori | Aksi) -->
    <div class="table-responsive">
        <table class="table-mockup">
            <thead>
                <tr>
                    <th style="width: 70px;">No</th>
                    <th>Nama Kategori</th>
                    <th class="text-center" style="width: 140px;">Jumlah Produk</th>
                    <th class="text-center" style="width: 170px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $index => $cat)
                    <tr>
                        <td class="text-muted small">{{ $index + 1 }}</td>
                        <td>
                            <strong class="d-block" style="color: var(--admin-primary); font-size: 0.98rem;">{{ $cat->name }}</strong>
                            <small class="text-muted">{{ $cat->description ?? '-' }}</small>
                        </td>
                        <td class="text-center">
                            <span class="badge rounded-pill px-3 py-2" style="background-color: #FAF0E4; color: #7E4B25;">
                                {{ $cat->products_count }} Produk
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <!-- Edit Button (Matching Mockup) -->
                                <button type="button" class="btn-edit-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $cat->id }}">
                                    <i class="bi bi-pencil me-1"></i> Edit
                                </button>
                                <!-- Hapus Button (Matching Mockup) -->
                                <button type="button" class="btn-delete-pill" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $cat->id }}">
                                    <i class="bi bi-trash me-1"></i> Hapus
                                </button>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $cat->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered text-start">
                                    <div class="modal-content rounded-4 border-0 shadow">
                                        <form action="{{ route('admin.categories.update', $cat->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header border-0 pb-0">
                                                <h5 class="modal-title font-serif">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body py-3">
                                                <div class="mb-3">
                                                    <label class="form-label small fw-bold">Nama Kategori <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" value="{{ $cat->name }}" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label small fw-bold">Deskripsi</label>
                                                    <textarea name="description" rows="3" class="form-control">{{ $cat->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0 pt-0">
                                                <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-choco-pill rounded-pill px-4">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $cat->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered text-start">
                                    <div class="modal-content rounded-4 border-0 shadow">
                                        <div class="modal-header border-0 pb-0">
                                            <h5 class="modal-title font-serif text-danger">Hapus Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body py-3">
                                            <p class="mb-2">Hapus kategori <strong>{{ $cat->name }}</strong>?</p>
                                            @if($cat->products_count > 0)
                                                <div class="alert alert-warning small mb-0">
                                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                                    Kategori ini masih memiliki <strong>{{ $cat->products_count }} produk</strong> terkait. Hapus atau pindahkan produk terlebih dahulu.
                                                </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer border-0 pt-0">
                                            <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                                            @if($cat->products_count == 0)
                                                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger rounded-pill px-4">Hapus</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-serif" style="color: var(--admin-primary);">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body py-3">
                    <div class="mb-3">
                        <label for="new_cat_name" class="form-label small fw-bold">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="new_cat_name" class="form-control" placeholder="Contoh: Hampers / Dessert Box" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_cat_desc" class="form-label small fw-bold">Deskripsi</label>
                        <textarea name="description" id="new_cat_desc" rows="3" class="form-control" placeholder="Jelaskan jenis bakery di kategori ini..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-choco-pill rounded-pill px-4">Simpan Kategori</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
