@extends('visitors.layout')

@section('title', 'Edit visitor')

@section('content')
    <div class="page-heading">
        <div class="eyebrow">Records office · Record V-{{ str_pad($visitor->id, 5, '0', STR_PAD_LEFT) }}</div>
        <h1>Edit visitor record</h1>
        <p>Update the visitor's details, including their position or university role.</p>
    </div>

    <section class="record-card">
        <div class="card-heading">
            <h2>Visitor information</h2>
            <p>Make changes and save the updated record.</p>
        </div>
        <div class="card-body">
            @include('visitors._form', ['visitor' => $visitor])
        </div>
    </section>
@endsection
