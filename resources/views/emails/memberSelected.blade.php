<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/journal.css') }}" />
    <style>
        .upload-container {
            background-color: rgb(239, 239, 239);
            border-radius: 6px;
            padding: 10px;
        }

        .border-container {
            border: 5px dashed rgba(198, 198, 198, 0.65);
            /*   border-radius: 4px; */
            padding: 20px;
        }

        .border-container p {
            color: #130f40;
            font-weight: 600;
            font-size: 1.1em;
            letter-spacing: -1px;
            margin-top: 30px;
            margin-bottom: 0;
            opacity: 0.65;
        }

        #file-browser {
            text-decoration: none;
            color: rgb(22, 42, 255);
            border-bottom: 3px dotted rgba(22, 22, 255, 0.85);
        }

        #file-browser:hover {
            color: rgb(0, 0, 255);
            border-bottom: 3px dotted rgba(0, 0, 255, 0.85);
        }

        .icons {
            color: #95afc0;
            opacity: 0.55;
        }
    </style>
    <style>
        #wrapper {

            display: flex;
            justify-content: center;
            align-items: center;

        }

        #news-slider {
            display: grid;
            margin: 0 auto;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 80px;
            justify-content: center;
            align-items: center;
        }


        .post-slide {
            width: 400px;
            height: 400px;
            background: #fff;
            margin: 20px 15px 20px;
            border-radius: 15px;
            padding-top: 1px;
            box-shadow: 0px 14px 22px -9px #bbd8f0;
        }

        #selectBankList {
            display: block;
            background: #fff;
            margin: 0 auto;
            width: 50%;
        }

        .post-slide .post-img {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin: -12px 15px 8px 15px;
            margin-left: -10px;
        }

        .post-slide .post-img img {
            width: 400px;
            height: 200px;
            transform: scale(1, 1);
            transition: transform 0.2s linear;
        }

        .post-slide:hover .post-img img {
            transform: scale(1.1, 1.1);
        }

        .post-slide .over-layer {
            width: 400px;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            background: linear-gradient(-45deg,
                    #06bef4bf 0%,
                    rgba(45, 112, 253, 0.6) 100%);
            transition: all 0.5s linear;
        }

        .post-slide:hover .over-layer {
            opacity: 1;
            text-decoration: none;
        }

        .post-slide .over-layer i {
            position: relative;
            top: 45%;
            text-align: center;
            display: block;
            color: #ffffff;
            font-size: 25px;
        }

        .post-slide .post-content {
            background: #24ccffbf;
            padding: 2px 20px 40px;
            border-radius: 15px;
            height: 200px;
        }

        .post-slide .post-title a {
            font-size: 15px;
            font-weight: bold;
            color: #000000;
            display: inline-block;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
        }

        .post-slide .post-title a:hover {
            text-decoration: none;
            color: #3498db;
        }

        .post-slide .post-description {
            line-height: 24px;
            color: #000000;
            margin-bottom: 25px;
        }

        .post-slide .post-date {
            color: #000000;
            font-size: 14px;
        }

        .post-slide .post-date i {
            font-size: 20px;
            margin-right: 8px;
            color: #cfdace;
        }

        .post-slide .read-more {
            padding: 7px 20px;
            float: right;
            font-size: 12px;
            background: #2196f3;
            color: #ffffff;
            box-shadow: 0px 10px 20px -10px #1376c5;
            border-radius: 25px;
            text-transform: uppercase;
        }

        .post-slide .read-more:hover {
            background: #3498db;
            text-decoration: none;
            color: #fff;
        }

        .owl-controls .owl-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .owl-controls .owl-buttons .owl-prev {
            background: #fff;
            position: absolute;
            top: -13%;
            left: 15px;
            padding: 0 18px 0 15px;
            border-radius: 50px;
            box-shadow: 3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }

        .owl-controls .owl-buttons .owl-next {
            background: #fff;
            position: absolute;
            top: -13%;
            right: 15px;
            padding: 0 15px 0 18px;
            border-radius: 50px;
            box-shadow: -3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }

        .owl-controls .owl-buttons .owl-prev:after,
        .owl-controls .owl-buttons .owl-next:after {
            content: "\f104";
            font-family: FontAwesome;
            color: #333;
            font-size: 30px;
        }

        .owl-controls .owl-buttons .owl-next:after {
            content: "\f105";
        }

        @media only screen and (max-width: 1280px) {
            .post-slide .post-content {
                padding: 0px 15px 25px 15px;
            }
        }
    </style>
</head>
<body>
    <div id="news-slider" class="owl-carousel">
        {{-- cadre1 --}}
       
            <div class="post-slide {$item}">
                <div class="post-img">
                    <img src="{{ Storage::url($item->file_path) }}" alt="">
                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                </div>
                <div class="post-content ">
                    <h3 class="post-title">
                        <a href="#">{{ $item->title }}</a>
                    </h3>
                    <p class="post-description">{{ $item->text }}</p>
                    <div>
                        <span class="post-date">
                            <i
                                class="fa fa-clock-o"></i>{{ $item->created_at->format('M d, Y') }}
                        </span>
                        <div id="wrapper" class="mt-2">

                        </div>
                    </div>
                </div>
            </div>

    </div>
</body>
</html>