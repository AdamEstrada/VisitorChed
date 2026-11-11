@extends('visitors.layout')

@section('title', 'Visitor directory')

@section('content')
    <div class="page-heading d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3">
        <div>
            <div class="eyebrow">Records office</div>
            <h1>Visitor directory</h1>
            <p>A centralized register of visitors and their university roles.</p>
        </div>
        <a href="{{ route('visitors.create') }}" class="btn btn-primary px-4">Register a visitor</a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-4">
            <section class="summary-card" aria-label="Visitor record count">
                <div class="summary-label">Visitor records</div>
                <div class="summary-value">{{ $visitors->count() }}</div>
            </section>
        </div>
        <div class="col-sm-6 col-lg-4">
            <section class="summary-card">
                <div class="summary-label">Latest registration</div>
                <div class="summary-value fs-5 mt-3">
                    {{ $visitors->isNotEmpty() ? $visitors->first()->created_at->format('M j, Y') : '—' }}
                </div>
            </section>
        </div>
    </div>

    <section class="record-card">
        <div class="card-heading d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
            <div>
                <h2>Registered visitors</h2>
                <p>Review and manage visitor information.</p>
            </div>
            <span class="text-secondary small">{{ $visitors->count() }} {{ \Illuminate\Support\Str::plural('record', $visitors->count()) }}</span>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Record</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Position</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($visitors as $visitor)
                        <tr>
                            <td class="record-id">V-{{ str_pad($visitor->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="record-name">{{ $visitor->name }}</td>
                            <td>{{ $visitor->address }}</td>
                            <td><span class="role-badge">{{ $visitor->position }}</span></td>
                            <td>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="{{ route('visitors.show', $visitor->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{ route('visitors.edit', $visitor->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ route('visitors.destroy', $visitor->id) }}" method="POST" onsubmit="return confirm('Delete this visitor record?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-5 text-center">
                                <div class="fw-semibold text-dark">No visitor records yet</div>
                                <div class="small text-secondary mt-1">Register a visitor to start the university directory.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
