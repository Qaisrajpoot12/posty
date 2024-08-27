<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posty | Blog</title>
    <meta name="csrf-token" content="{{ @csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('blog/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <nav>
        <div class="nav-container">
            <a href="/" class="logo">Posty</a>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name ?? '' }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                    @auth
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    @endauth

                </ul>
            </div>

        </div>
    </nav>


    <div class="message_show mt-3">

    </div>
    @yield('main_content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="{{ mix('resources/js/bootstrap.js') }}"></script>

    {{-- <script src="{{ asset('dist/js/iziToast.min.js') }}"></script> --}}







    <script type="module">
        window.Echo.channel('posts')
            .listen('PostCreated', (event) => {
                showNewPost( event.post);
                console.log( event.message);
              $('.message_show').html(`  <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> ${event.message}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`);
            });



        function showNewPost(data) {
        $('.blog_row').prepend(`
            <div class="col-md-4 my-2">
                <div class="blog">
                    <div class="blog-image">
                        <img src="{{ asset('post_images/${data.image}') }}" alt="${data.title}">
                        <div class="date">${new Date(data.created_at).toLocaleString()}</div>
                    </div>
                    <div class="blog-content">
                        <h2>${data.title}</h2>
                        <p>${data.content}</p>
                <a href="/blog-detail/${data.id}">Read More</a>
                                    </div>
                </div>
            </div>`);

            $('.no-record').hide();


    }
    </script>
</body>

</html>
