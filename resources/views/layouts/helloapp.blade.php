<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        body {
            font-size: 16pt;
            color: #999;
            margin: 5px;
        }

        h1 {
            font-size: 50pt;
            text-align: right;
            color: #f6f6f6;
            margin: -20px 0px 0px 0px;
            letter-spacing: -4pt;
        }

        ul {
            font-size: 12pt;
            list-style: none;
            margin-top: 1rem;
        }

        hr {
            margin: 25px 100px;
            border-top: 1px dashed #ddd;
        }

        .menutitle {
            font-size: 14pt;
            font-weight: bold;
            margin: 0px;
        }

        .content {
            margin: 10px;
        }

        .footer {
            text-align: right;
            font-size: 10pt;
            margin: 10px;
            border-bottom: solid 1px #ccc;
            color: #ccc;
        }

        th {
            background-color: #999;
            color: fff;
            padding: 5px 10px;
        }

        td {
            border: solid 1px #aaa;
            color: #999;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/hello">Hello</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/person">Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/board">Board</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rest">REST</a>
                </li>
            </ul>
        </div>
    </nav>
    <ul>
        <li>@show</li>
    </ul>
    <hr size="1">
    <div class="content"></div>
    @yield('content')
    </div>
    <div class="footer"></div>
    @yield('footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>