<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - BBBootstrap</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Noto Sans', sans-serif
        }

        html,
        body {
            height: 100%
        }

        body {
            display: grid;
            place-items: center;
            background: #f8c0b2
        }

        .card {
            color: #fff;
            width: 350px;
            border-radius: 10px;
            background: linear-gradient(145deg, #FFB19D, #F27272);
            box-shadow: 20px 20px 60px #FFB19D, -20px -20px 60px #F27272;
            border: none
        }

        .neo-button {
            width: 40px;
            height: 40px;
            outline: 0 !important;
            cursor: pointer;
            color: #fff;
            font-size: 15px;
            border: none;
            margin-right: 10px;
            border-radius: 50%;
            background: linear-gradient(145deg, #FFB19D, #F27272);
            box-shadow: inset 20px 20px 60px #FFB19D, inset -20px -20px 60px #F27272
        }

        .num {
            color: #eee !important
        }

        .line {
            color: #fff
        }

        .neo-button:active {
            border-radius: 50%;
            background: #f8c0b2;
            box-shadow: 28px 28px 57px #FFB19D, -28px -28px 57px #F27272
        }

        .neo-tiktok {
            width: 40px;
            height: 40px;
            outline: 0 !important;
            cursor: pointer;
            color: #fff;
            font-size: 15px;
            border: none;
            margin-right: 10px;
            border-radius: 50%;
            background: linear-gradient(145deg, #EE1D52, #69C9D0, #000000);
            box-shadow: inset 20px 20px 60px #EE1D52, inset -20px -20px 60px #69C9D0, #000000
        }

        .neo-tiktok:active {
            border-radius: 50px;
            background: rgb(238,29,82);
            box-shadow: 28px 28px 57px #EE1D52, -28px -28px 57px #69C9D0, #000000
        }

        .neo-instagram {
            width: 40px;
            height: 40px;
            outline: 0 !important;
            cursor: pointer;
            color: #fff;
            font-size: 15px;
            border: none;
            margin-right: 10px;
            border-radius: 50%;
            background: linear-gradient(145deg, #fdf497, #fdf497, #fd5949,#d6249f,#285AEB );
            box-shadow: inset 20px 20px 60px #fdf497, inset -20px -20px 60px #fdf497, #fd5949,#d6249f ,#285AEB;
        }

        .neo-instagram:active {
            border-radius: 50px;
            background: #d6249f;
            box-shadow: 28px 28px 57px #fdf497, -28px -28px 57px #fdf497, #fd5949,#d6249f,#285AEB,
        }

        .neo-facebook {
            width: 40px;
            height: 40px;
            outline: 0 !important;
            cursor: pointer;
            color: #fff;
            font-size: 15px;
            border: none;
            margin-right: 10px;
            border-radius: 50%;
            background: linear-gradient(145deg, #3b5998, #3b5998);
            box-shadow: inset 20px 20px 60px #3b5998, inset -20px -20px 60px #3b5998
        }

        .neo-facebook:active {
            border-radius: 50%;
            background: #f8c0b2;
            box-shadow: 28px 28px 57px #3b5998, -28px -28px 57px #3b5998
        }

        .fa-facebook {
            color: #fff
        }

        .fa-instagram {
            color: #fff;
        }

        .fa-tiktok {
            color: #fff;
        }

        .fa-youtube {
            color: #cd201f
        }

        .fa-twitter {
            color: #55acee
        }

        .profile_button {
            color: #fff;
            padding: 10px;
            border: none;
            outline: 0 !important;
            border-radius: 50px;
            background: #25D366;
            box-shadow: 28px 28px 57px #FFB19D, -28px -28px 57px #F27272
        }

    </style>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="container d-flex justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ url('/storage/anggota/'.$member->image) }}" width="100" class="rounded-circle">
                    <h3 class="mt-2">{{ strtoupper($member->name) }}</h3>
                    <span class="mt-1 clearfix">{{ $member->type }}</span>
                    <hr class="line"> <small class="mt-4">{{ $member->district->name }}, {{ $member->district->city->name }}, {{ $member->district->city->province->name }}</small>
                    <div class="social-buttons mt-5">
                        <button class="neo-facebook"><i class="fab fa-facebook fa-1x"></i></button>
                        <button class="neo-instagram"><i class="fab fa-instagram fa-1x"></i></button>
                        <button class="neo-tiktok"><i class="fab fa-tiktok fa-1x"></i></button>
                    </div>
                    <div class="profile mt-5">
                        <button class="profile_button px-5"><i class="fab fa-whatsapp"></i> Order Via Whatsapp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
    </script>
    <script type='text/javascript'></script>
</body>

</html>
