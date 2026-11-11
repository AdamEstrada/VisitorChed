@php($isEditing = isset($visitor))

<form action="{{ $isEditing ? route('visitors.update', $visitor->id) : route('visitors.store') }}" method="POST">
    @csrf
    @if ($isEditing)
        @method('PUT')
    @endif

    <div class="mb-4">
        <label for="name" class="form-label">Full name</label>
        <input
            id="name"
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $isEditing ? $visitor->name : '') }}"
            autocomplete="name"
            maxlength="255"
            required
        >
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="address" class="form-label">Address</label>
        <input
            id="address"
            type="text"
            name="address"
            class="form-control @error('address') is-invalid @enderror"
            value="{{ old('address', $isEditing ? $visitor->address : '') }}"
            autocomplete="street-address"
            maxlength="255"
            required
        >
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="position" class="form-label">Position / university role</label>
        <input
            id="position"
            type="text"
            name="position"
            class="form-control @error('position') is-invalid @enderror"
            value="{{ old('position', $isEditing ? $visitor->position : '') }}"
            list="position-options"
            placeholder="For example, Librarian"
            maxlength="255"
            required
        >
        <datalist id="position-options">
            <option value="Student">
            <option value="Faculty">
            <option value="Staff">
            <option value="Librarian">
            <option value="Administrator">
            <option value="Guest">
        </datalist>
        <div class="form-text">Choose a suggested role or enter another position.</div>
        @error('position')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex flex-wrap gap-2 pt-2">
        <button type="submit" class="btn btn-primary px-4">
            {{ $isEditing ? 'Save changes' : 'Save visitor record' }}
        </button>
        <a href="{{ route('visitors.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
    </div>
</form>
