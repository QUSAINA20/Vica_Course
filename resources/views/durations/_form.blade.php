<!-- resources/views/durations/_form.blade.php -->

<div class="mb-3">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title"
            value="{{ old('title', $duration->title ?? '') }}" required>
    </div>
</div>



<div class="mb-3">
    <label for="from" class="form-label"> From:</label>
    <input type="time" name="from" id="from" class="form-control"
        value="{{ old('from', $duration->from ?? '') }}" required>
    @error('from')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="to" class="form-label"> To:</label>
    <input type="time" name="to" id="to" class="form-control"
        value="{{ old('to', $duration->to ?? '') }}" required>
    @error('to')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
