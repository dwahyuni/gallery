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

    <a href="#" class="btn btn-lg bg-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

</body>

<table class="table" style="width: 50%;margin-left: 360px;margin-top: 65px;">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Level</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $pengguna)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pengguna->name }}</td>
                <td>{{ $pengguna->email }}</td>
                <td>{{ $pengguna->level }}</td>
                <td>

                    <form action="{{ route('user.destroy', $pengguna->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-info btn-sm"><a href="/editpengguna/{{ $pengguna->id }}"><i class="fa fa-pen" style="color:white;"></i></a></button>
                        <button onclick="return confirm('Hapus user ini?')" class="btn btn-danger btn-sm" style="margin-left: 10px"><i class="fas fa-trash"></i></button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

</html>
