@csrf

<div class="mb-3">
    <label for="name" class="form-label">Category Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
        value="{{ old('name', $category->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-success">Save</button>
