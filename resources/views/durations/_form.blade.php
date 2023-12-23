<!-- resources/views/durations/_form.blade.php -->

<div class="mb-3">
    <label for="course_id" class="form-label">Course:</label>
    <select name="course_id" id="course_id" class="form-select" required>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}"
                @isset($duration)
                {{ old('course_id', $duration->course_id ?? '') == $course->id ? 'selected' : '' }}
            @endisset>
                {{ $course->title }}
            </option>
        @endforeach
    </select>
    @error('course_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="city_id" class="form-label">City:</label>
    <select name="city_id" id="city_id" class="form-select" required>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}"
                @isset($duration)
                {{ old('city_id', $duration->city_id ?? '') == $city->id ? 'selected' : '' }}
                @endisset>
                {{ $city->name }}
            </option>
        @endforeach
    </select>
    @error('city_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="date_from" class="form-label">Date From:</label>
    <input type="date" name="date_from" id="date_from" class="form-control"
        value="{{ old('date_from', $duration->date_from ?? '') }}" required>
    @error('date_from')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="date_to" class="form-label">Date To:</label>
    <input type="date" name="date_to" id="date_to" class="form-control"
        value="{{ old('date_to', $duration->date_to ?? '') }}" required>
    @error('date_to')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
