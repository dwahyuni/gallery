<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gallery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('/assets/img/favicon.ico') }}" rel="icon">

    <!-- Memuat jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Memuat JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container-fluid sticky-top shadow-sm bg-primary">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <h2 class="text-black">Gallery</h2>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/beranda" class="nav-item nav-link">Beranda</a>
                        @if (auth()->user()->level == 'admin')
                            <a href="/pengguna" class="nav-item nav-link">Pengguna</a>
                        @endif
                        <a href="/buat" class="nav-item nav-link">Buat</a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" data-bs-toggle="dropdown">
                            <i class="fa fa-user" style="font-size:30px;color: black;"></i>
                        </a>
                        <div class="dropdown-menu m-0" style="background-color: #b0c4a5;">
                            <a href="/profile" class="dropdown-item">Profile</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </div>
            </nav>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">

                <div class="row g-4" style="margin-left: 40px;">
                    @foreach ($posts as $post)
                        <div class="feature-item position-relative" style="width: fit-content;">
                            <div class="card" style="width: 20rem;">
                                <div class="show_image"><img src="image/{{ $post->image }}" alt=""></div>

                                <style type="text/css">
                                    .show_image img {
                                        width: 100%;
                                        height: 400px;
                                    }

                                    .desc-post {
                                        padding: 14px;
                                        margin-bottom: 22px;
                                    }

                                    .comment-body {
                                        background-color: #7e9770;
                                        color: #ffff;
                                        padding: 16px;
                                        border-top-right-radius: 25px;
                                        border-bottom-left-radius: 20px;
                                        margin-bottom: 18px;
                                    }
                                </style>

                                <div style="display:flex" class="card-body py-3 px-3">
                                    @if (auth()->user()->level=="user")
                                    {{-- <form action="/like" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="userid" value="{{ Auth::user()->userid }}">
                                        <input type="hidden" name="id_photo" value="{{ $post->id_photo }}">

                                        @if ($post->likes->where('user_id', Auth::user()->id)->count() > 0)
                                            <button type="submit" class="btn btnheartactive btn-lg mr-2">
                                                <i class="fa-solid fa-heart"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="btn btnheart btn-lg mr-2">
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        @endif
                                    </form> --}}
                                    <i style="font-size: 20px;" class="fa fa-heart"></i>
                                    <div style="display: flex; margin-left: 10px;">
                                        <a href="#modal_{{ $post->id }}" data-toggle="modal"><i
                                                class="fa fa-comment-dots"
                                                style="font-size: 20px;margin-left: 10px;color:#656565;">
                                                {{ $post->comments()->count() }} </i></a>
                                    </div>
                                    <button onclick="copyToClipboard('{{ $post->image }}')"
                                        style="border: none; background: transparent;">
                                        <i style="font-size: 20px;color:#656565; margin-left: 10px"
                                            id="icon3" class="fa fa-share"></i>
                                        </button>
                                    <a href="/delete/{{ $post->id }}" class="fa fa-trash"
                                        style="margin-top: 2px;margin-left: 150px;color:#656565;"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?');"></a>
                                        @endif
                                </div>
                               <p style="margin-left: 16px;"> {{ $post->description }} </p> 
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modal_{{ $post->id }}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body d-flex" style="margin-left: 228px;">
                                        <div class="show_image"><a href=""><img
                                                    src="image/{{ $post->image }}"></a></div>
                                    </div>

                                    <div class="desc-post">
                                        <p style="word-break: break-all;">
                                            {{ $post->description }}
                                        </p>
                                    </div>
                                    <div class="panel-footer" style="padding: 10px;">
                                        <span class="user-info">by {{ $post->user->name }}</span>
                                        <span class="user-time" style="float:right;">
                                            {{ $post->created_at->diffForHumans() }} </span>
                                    </div>
                                    <h4 style="margin-left: 10px;">Comment:</h4>
                                    <form style="padding: 10px;" action="{{ route('addComment', $post->id) }}"
                                        method="post">
                                        @csrf
                                        <div class="form-group">
                                            <textarea name="content" class="form-control" placeholder="Comment here"></textarea>
                                        </div>
                                        <button class="btn btn-block" style="background-color: #7e9770;color:white;"
                                            type="submit">Comment</button>
                                    </form>
                                    <hr>

                                    <div class="comment-list" style="padding: 10px;">
                                        @if ($post->comments->isEmpty())
                                            <div class="text-center">No comment!</div>
                                        @else
                                            @foreach ($post->comments as $comment)
                                                <div class="comment-body">
                                                    <p style="margin-left: 10px;font-size: 18px;">
                                                        {{ $comment->content }}</p>
                                                    <div style="font-size:small;margin-left: 72%;">
                                                        <span> {{ $comment->user->name }} </span>|
                                                        <span> {{ $comment->created_at->diffForHumans() }} </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="btn btn-lg bg-primary btn-lg-square back-to-top"
        style="background-color: #90bc79 !important;"><i class="bi bi-arrow-up"></i></a>

    <script>
        // Fungsi untuk menyalin link ke clipboard
        function copyToClipboard() {
            // Mengambil elemen input atau textarea dengan value berisi link yang ingin disalin
            const linkInput = document.createElement('input');
            const linkText = window.location.href;

            // Menambahkan link ke elemen input
            linkInput.value = linkText;

            // Menambahkan elemen input ke body
            document.body.appendChild(linkInput);

            // Memilih dan menyalin teks di dalam elemen input
            linkInput.select();
            document.execCommand('copy');

            // Menghapus elemen input setelah disalin
            document.body.removeChild(linkInput);

            // Pemberitahuan bahwa link berhasil disalin (opsional)
            alert('Link has been copied to clipboard: ' + linkText);
        }

        // Menambahkan event listener pada tombol
        const shareButton = document.getElementById('shareButton');
        shareButton.addEventListener('click', copyToClipboard);
    </script>

</body>

</html>
