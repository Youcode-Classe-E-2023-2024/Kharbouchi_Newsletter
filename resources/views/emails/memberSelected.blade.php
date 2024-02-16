<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            background: #121212;
            font-family: 'Roboto', sans-serif;
        }
        #news-slider {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 80px 20px;
        }
        .post-slide {
            background: #1e1e1e;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .post-img img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }
        .post-slide:hover .post-img img {
            transform: scale(1.1);
        }
        .post-content {
            padding: 20px;
            background: linear-gradient(to bottom, #000000, #434343);
            color: #ffffff;
        }
        .post-title a {
            color: #ffffff;
            font-weight: 700;
            text-decoration: none;
        }
        .post-description {
            color: #bbbbbb;
            margin-top: 10px;
        }
        .post-date {
            font-size: 14px;
            color: #aaaaaa;
        }
        .post-date i {
            margin-right: 5px;
        }
        .read-more {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 25px;
            background: #007bff;
            color: #ffffff;
            border-radius: 25px;
            text-transform: uppercase;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .read-more:hover {
            background: #0056b3;
        }
        @media (max-width: 768px) {
            #news-slider {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div id="news-slider">
        <!-- Example of a single post slide -->
        <div class="post-slide">
            <div class="post-img">
                <img src="{{ Storage::url($item->file_path) }}" alt="Post Title">
            </div>
            <div class="post-content">
                <h3 class="post-title">
                    <a href="#">{{ $item->title }}</a>
                </h3>
                <p class="post-description">{{ $item->text }}</p>
                <span class="post-date"><i class="fa fa-clock-o"></i>{{ $item->created_at->format('M d, Y') }}</span>
                <a href="#" class="read-more">Télécharger PDF</a>
            </div>
        </div>
        <!-- Add more post slides as needed -->
    </div>
    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
