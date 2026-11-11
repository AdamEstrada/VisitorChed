@extends('visitors.layout')

@section('title', 'Visitor record')

@section('content')
    <div class="page-heading d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3">
        <div>
            <div class="eyebrow">Records office · Record V-{{ str_pad($visitor->id, 5, '0', STR_PAD_LEFT) }}</div>
            <h1>Visitor record</h1>
            <p>Official visitor information on file with the university.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('visitors.index') }}" class="btn btn-outline-secondary px-3">Back to directory</a>
            <a href="{{ route('visitors.edit', $visitor->id) }}" class="btn btn-primary px-4">Edit record</a>
        </div>
    </div>

    <section class="record-card">
        <div class="card-heading d-flex justify-content-between align-items-center gap-3">
            <div>
                <h2>{{ $visitor->name }}</h2>
                <p>Visitor record V-{{ str_pad($visitor->id, 5, '0', STR_PAD_LEFT) }}</p>
            </div>
            <span class="role-badge">{{ $visitor->position }}</span>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="detail-label">Full name</div>
                    <div class="detail-value">{{ $visitor->name }}</div>
                </div>
                <div class="col-md-6">
                    <div class="detail-label">Position / university role</div>
                    <div class="detail-value">{{ $visitor->position }}</div>
                </div>
                <div class="col-12">
                    <div class="detail-label">Address</div>
                    <div class="detail-value">{{ $visitor->address }}</div>
                </div>
                <div class="col-md-6">
                    <div class="detail-label">Date registered</div>
                    <div class="detail-value">{{ $visitor->created_at->format('F j, Y') }}</div>
                </div>
                <div class="col-md-6">
                    <div class="detail-label">Last updated</div>
                    <div class="detail-value">{{ $visitor->updated_at->format('F j, Y') }}</div>
                </div>
            </div>
        </div>
    </section>
@endsection
