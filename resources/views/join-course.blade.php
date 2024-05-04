<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <main class="mt-24">
        <div class="mb-16">
            @livewire('join-course', ['students' => $students])
        </div>
        <div>
            @livewire('crud-course')
        </div>
    </main>

    <script>
        document.addEventListener('livewire:init', function() {
            Livewire.on('fire-swal', function(e) {
                Swal.fire({
                    ...e[0],
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    timer: 1800
                });
            });
        });
    </script>
</body>

</html>
