<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email</title>
</head>
<body>
    <div class="post-slide">
        <div class="post-img">
            <img src="{{ $item->image_url }}" alt="">
        </div>
        <div class="post-content">
            <h3 class="post-title">{{ $item->title }}</h3>
            <p class="post-description">{{ $item->text }}</p>
            <span class="post-date">{{ $item->created_at->format('M d, Y') }}</span>
        </div>
    </div>
</body>
</html>