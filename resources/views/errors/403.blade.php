<!-- resources/views/errors/403.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Acceso Denegado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal-custom-background .swal2-popup {
            background: url('https://th.bing.com/th/id/OIP.0OSmtBzjgEOj0kB9VeMtUAHaHa?w=626&h=626&rs=1&pid=ImgDetMain') no-repeat center center;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-danger">
            <h4 class="alert-heading">Acceso Denegado</h4>
            <p>No tienes permiso para acceder a esta página.</p>
        </div>
    </div>

    <script>
        Swal.fire({
    title: 'Acceso Denegado',
    text: 'No tienes permiso para acceder a esta página.',
    icon: 'error',
    confirmButtonText: 'Aceptar',
    customClass: {
        container: 'swal-custom-background' // Clase personalizada
    },
    willClose: () => {
        // Redirigir al dashboard
        window.location.href = '{{ url('/dashboard') }}'; // Ajusta la ruta si es diferente
    }
});
    </script>
</body>
</html>
