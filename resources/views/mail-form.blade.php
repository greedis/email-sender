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
    <form method="POST" action="{{ route('send.email') }}">
        @csrf
        <div class="mb-3">
            <label for="from" class="form-label">From (Sender Email)</label>
            <input type="email" class="form-control" id="from" name="from" required>
        </div>

        <div class="mb-3">
            <label for="to" class="form-label">To (Recipient Email)</label>
            <input type="email" class="form-control" id="to" name="to" required>
        </div>

        <div class="mb-3">
            <label for="cc" class="form-label">CC (Optional)</label>
            <input type="email" class="form-control" id="cc" name="cc">
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" id="type" name="type" required>
                <option value="text">Text</option>
                <option value="html">HTML</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Send Email</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
