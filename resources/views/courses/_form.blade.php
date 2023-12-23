<div class="mb-3">
    <label for="category_id" class="form-label">Category:</label>
    <select name="category_id" id="category_id" class="form-select" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @isset($course)
                {{ old('category_id', $course->category_id ?? '') == $category->id ? 'selected' : '' }}
                @endisset>
                {{ $category->title }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label">Title:</label>
    <input type="text" name="title" id="title" class="form-control"
        value="{{ old('title', $course->title ?? '') }}" required>
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description:</label>
    <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $course->description ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Image:</label>
    <input type="file" name="image" id="image" class="form-control" accept="image/*">
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price:</label>
    <input type="number" name="price" id="price" class="form-control"
        value="{{ old('price', $course->price ?? '') }}" required>
    @error('price')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="currency" class="form-label">Currency:</label>
    <select name="currency" id="currency" class="form-select" required>
        <option value="USD" {{ old('currency', $course->currency ?? '') == 'USD' ? 'selected' : '' }}>USD</option>
        <option value="EUR" {{ old('currency', $course->currency ?? '') == 'EUR' ? 'selected' : '' }}>EUR</option>
        <option value="GBP" {{ old('currency', $course->currency ?? '') == 'GBP' ? 'selected' : '' }}>GBP</option>
    </select>
    @error('currency')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="cities" class="form-label">Cities:</label>
    <select name="cities[]" id="cities" class="form-select" multiple required>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}"
                @isset($course)
                {{ in_array($city->id, old('cities', $course->cities->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}
                @endisset>
                {{ $city->name }}
            </option>
        @endforeach
    </select>
    @error('cities')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
