<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">DASHBOARD</a>
            <div class="container">
                <form action="{{route('logout')}}" method="GET">

                    <div class="mb-3 form-check">
                        <button type="submit" class="btn btn-primary">LOGOUT</button>
                    </div>
                </form>
            </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Welcome, {{ $user->name }}</h3>
                    </div>
                    <div class="card-body">
                        <p>Email: {{ $user->email }}</p>
                        <!-- Add more user information here as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Log in success',
            text: '{{ session('success') }}'
        });
    @endif

</script>
</html>

