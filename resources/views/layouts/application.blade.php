<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<div class = 'container'>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('pages.main')}}">Main</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post.posts')}}">Posts</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('pages.about')}}">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('pages.contacts')}}">Contacts</a>
                    </li>

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            Dropdown--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                            <li><hr class="dropdown-divider"></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link disabled">Disabled</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <form class="d-flex" role="search">--}}
{{--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--                </form>--}}
                </ul>
            </div>
        </div>
    </nav>
    @yield('contents')
</div>
</body>
</html>
