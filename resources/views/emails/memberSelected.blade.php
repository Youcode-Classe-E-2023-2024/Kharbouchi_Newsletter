<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <div class="post-slide">
        @if(isset($item->image_url))
            <div class="post-img">
                <img src="{{ $item->image_url }}" alt="">
            </div>
        @endif

        <div class="post-content">
            @if(isset($item->title))
                <h3 class="post-title">{{ $item->title }}</h3>
            @endif

            @if(isset($item->text))
                <p class="post-description">{{ $item->text }}</p>
            @endif

            @if(isset($item->created_at))
                <span class="post-date">{{ $item->created_at->format('M d, Y') }}</span>
            @endif
        </div>
    </div>
</body>
</html>
