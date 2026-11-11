@extends('visitors.layout')

@section('title', 'Register visitor')

@section('content')
    <div class="page-heading">
        <div class="eyebrow">Records office</div>
        <h1>Register a visitor</h1>
        <p>Enter the visitor's details to add a record to the university directory.</p>
    </div>

    <section class="record-card">
        <div class="card-heading">
            <h2>Visitor information</h2>
            <p>All fields are required.</p>
        </div>
        <div class="card-body">
            @include('visitors._form', ['visitor' => null])
        </div>
    </section>
@endsection
