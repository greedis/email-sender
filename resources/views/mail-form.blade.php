<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Send Email</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('send.email') }}" method="POST">
        @csrf
        <div class="form-group mt-2">
            <label for="from">From</label>
            <input type="email" id="from" name="from" class="form-control @error('from') is-invalid @enderror" value="{{ old('from') }}">
            @error('from')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="to">To</label>
            <input type="email" id="to" name="to" class="form-control @error('to') is-invalid @enderror" value="{{ old('to') }}">
            @error('to')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="cc">CC</label>
            <input type="email" id="cc" name="cc" class="form-control @error('cc') is-invalid @enderror" value="{{ old('cc') }}">
            @error('cc')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}">
            @error('subject')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="type">Type</label>
            <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                <option value="text" {{ old('type') === 'text' ? 'selected' : '' }}>Text</option>
                <option value="html" {{ old('type') === 'html' ? 'selected' : '' }}>HTML</option>
            </select>
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="body">Body</label>
            <textarea id="body" name="body" class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
            @error('body')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2">Send Email</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
