
@extends('layouts.app')

@section('title', 'All Medicines')

@section('content')

<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0">Medicines</h4>
            <span class="badge bg-light text-primary rounded-pill">{{ count($medicines) }} items</span>
        </div>

        <div class="card-body">
            <div class="d-flex flex-wrap gap-3 mb-4">
                <div class="btn-group" role="group">
                    <a href="{{ route('medicines.index') }}" class="btn btn-outline-primary {{ !request('type') ? 'active' : '' }}">All</a>
                    <a href="{{ route('medicines.index', ['type' => 'Tablet', 'stock' => request('stock')]) }}" class="btn btn-outline-primary {{ request('type') === 'Tablet' ? 'active' : '' }}">Tablet</a>
                    <a href="{{ route('medicines.index', ['type' => 'Capsule', 'stock' => request('stock')]) }}" class="btn btn-outline-primary {{ request('type') === 'Capsule' ? 'active' : '' }}">Capsule</a>
                    <a href="{{ route('medicines.index', ['type' => 'Syrup', 'stock' => request('stock')]) }}" class="btn btn-outline-primary {{ request('type') === 'Syrup' ? 'active' : '' }}">Syrup</a>
                </div>

                <div class="btn-group" role="group">
                    <a href="{{ route('medicines.index', ['type' => request('type'), 'stock' => 'Lowstock']) }}" class="btn btn-outline-danger {{ request('stock') === 'Lowstock' ? 'active' : '' }}">Low Stock</a>
                    <a href="{{ route('medicines.index', ['type' => request('type'), 'stock' => 'Full']) }}" class="btn btn-outline-success {{ request('stock') === 'Full' ? 'active' : '' }}">Full</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-center">Stock</th>
                            <th scope="col">Type</th>
                            <th scope="col">Expiry Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($medicines as $medicine)
                            <tr>
                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('medicines.show', $medicine['id']) }}" class="fw-semibold text-decoration-none">
                                        {{ $medicine['name'] }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill {{ $medicine['stock'] <= 10 ? 'bg-danger' : 'bg-success' }}">
                                        {{ $medicine['stock'] }}
                                    </span>
                                </td>
                                <td><span class="badge bg-info-subtle text-info-emphasis">{{ $medicine['type'] }}</span></td>
                                <td>{{ $medicine['expiry_date'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">
                                    <span class="fw-bold">No Medicine Found</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
