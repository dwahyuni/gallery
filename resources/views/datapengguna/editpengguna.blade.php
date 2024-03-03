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

    <a href="/pengguna" class="fa fa-arrow-left" style="margin-left: 30px;margin-top: 5px;font-size: 20px;color:#656565;"></a>

    <div class="container" style="margin-top: 80px;">
        <div class="card" style="width: 1000px;height: 475px;margin-left: 70px;">
            <div style="margin-top: 45px;">
                <div class="card-body" style="margin-right: 202px; margin-left: 164px">
                    <form action="{{ route('user.updatepengguna', $pengguna->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <div class="mb-3">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" value="{{ $pengguna->name }}" class="form-control">
                        </div>
                    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ $pengguna->email }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" name="level">
                                <option {{$pengguna->level == "admin" ? 'selected':''}} value="admin">Admin</option>
                                <option {{$pengguna->level == "user" ? 'selected':''}} value="user">User</option>
                            </select>
                        </div>
                    
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;"
                        onclick="return confirm('Apakah Anda yakin ingin mengupdate data ini?');">Update</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</body>

</html>
