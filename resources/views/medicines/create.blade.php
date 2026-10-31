@extends('layouts.app')

@section('title', 'Add Medicine')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white py-3">
                <h3 class="h4 mb-0">Add a new Medicine</h3>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('medicines.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="name">Medicine Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="stock">Stock</label>
                            <select id="stock" name="stock" class="form-select @error('stock') is-invalid @enderror">
                                <option value="">Stock</option>
                                <option value="Full" @selected(old('stock') == 'Full')>Full Stock</option>
                                <option value="Lowstock" @selected(old('stock') == 'Lowstock')>Low Stock</option>
                            </select>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="expiry_date">Expiry Date</label>
                            <input type="date" id="expiry_date" name="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{ old('expiry_date') }}">
                            @error('expiry_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="type">Type</label>
                            <select id="type" name="type" class="form-select @error('type') is-invalid @enderror">
                                <option value="">Type of Medicine</option>
                                <option value="Syrup" @selected(old('type') == 'Syrup')>Liquid</option>
                                <option value="Tablet" @selected(old('type') == 'Tablet')>Tablet</option>
                                <option value="Capsule" @selected(old('type') == 'Capsule')>Capsule</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold" for="available">Available</label>
                            <select id="available" name="available" class="form-select @error('available') is-invalid @enderror">
                                <option value="">Medicine Status</option>
                                <option value="true" @selected(old('available') == 'true')>Yes</option>
                                <option value="false" @selected(old('available') == 'false')>No</option>
                            </select>
                            @error('available')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary px-4">Save</button>
                        <a class="btn btn-outline-secondary px-4" href="{{ route('medicines.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
