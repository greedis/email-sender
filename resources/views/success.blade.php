<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="alert alert-success text-center">
        <h1>Success!</h1>
        <p>Your email has been sent successfully.</p>
        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go Back</a>
    </div>
    <div class="mt-4">
        <h3>Details:</h3>
        <ul class="list-group">
            <li class="list-group-item"><strong>From:</strong> {{ $mail['from'] }}</li>
            <li class="list-group-item"><strong>To:</strong> {{ $mail['to'] }}</li>
            <li class="list-group-item"><strong>CC:</strong> {{ $mail['cc'] ?? 'N/A' }}</li>
            <li class="list-group-item"><strong>Subject:</strong> {{ $mail['subject'] }}</li>
            <li class="list-group-item"><strong>Type:</strong> {{ ucfirst($mail['type']) }}</li>
            <li class="list-group-item"><strong>Body:</strong> {{ $mail['body'] }}</li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
