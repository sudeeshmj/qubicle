<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="card-title mb-3">{{ $post->title }}</h2>

                <p class="text-muted small mb-4">
                    Posted by <strong>{{ $post->author->name ?? 'Unknown' }}</strong>
                    on {{ $post->created_at->format('F j, Y') }}
                </p>

                <div class="card-text">
                    {!! nl2br(e($post->body ?? 'No content')) !!}
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-4">← Back</a>
            </div>
        </div>
    </div>
</body>

</html>
