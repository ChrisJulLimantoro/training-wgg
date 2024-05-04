<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex justify-center items-center w-full">
        <div class="w-3/4 mx-auto">
            <table class="border-seperate border border-slate-400 border-spacing-px p-3 w-full">
                <thead>
                    <tr>
                        <th class="border border-slate-300 uppercase">nrp</th>
                        <th class="border border-slate-300 uppercase">name</th>
                        <th class="border border-slate-300 uppercase">address</th>
                        <th class="border border-slate-300 uppercase">action</th>
                    </tr>
                </thead>
                <tbody id="data">

                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-10 px-16 w-full flex flex-col gap-8 mb-8">
        <h1 class="text-center uppercase text-2xl font-bold text-black">Form Add Student</h1>
        <div>
            <label class="text-gray-800 font-bold text-lg pl-5 m-0">NRP</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required type="text" id="nrp" placeholder="NRP">
        </div>
        <div>
            <label class="text-gray-800 font-bold text-lg pl-5 m-0">Name</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required type="text" id="name" placeholder="Name">
        </div>
        <div>
            <label class="text-gray-800 font-bold text-lg pl-5 m-0">Address</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required type="text" id="address" placeholder="Address">
        </div>
        <button type="button" onclick="addStudent()"
            class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Add</button>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script>
    // Fetch all students first
    fetch("{{ route('students.index') }}", {
            'method': 'GET',
            'headers': {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(student => {
                document.getElementById('data').innerHTML += `
                    <tr>
                        <td class="border border-slate-300 text-center items-center justify-center">${student.nrp}</td>
                        <td class="border border-slate-300 text-center items-center justify-center">${student.name}</td>
                        <td class="border border-slate-300 text-center items-center justify-center">${student.address}</td>
                        <td class="border border-slate-300 text-center items-center justify-center">
                            <button onclick="deleteStudent('${student.id}')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                        </td>
                    </tr>
                `;
            })
        })

    // Delete student
    function deleteStudent(id) {
        fetch("{{ route('students.index') }}/" + id, {
                'method': 'DELETE',
                'headers': {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                alert('Student deleted');
                location.reload();
            })
    }

    function addStudent() {
        let nrp = document.getElementById('nrp').value;
        let name = document.getElementById('name').value;
        let address = document.getElementById('address').value;
        fetch("{{ route('students.store') }}", {
                'method': 'POST',
                'headers': {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                'body': JSON.stringify({
                    'nrp': nrp,
                    'name': name,
                    'address': address
                })
            })
            .then(function(response) {
                if (!response.ok) {
                    throw response;
                }
                return response.json();
            })
            .then(data => {
                alert('Student added');
                location.reload();
            })
            .catch(function(err) {
                err.json().then(function(error) {
                    // Initialize an empty string to store formatted error messages
                    let errorMessage = '';
                    // Iterate over each key-value pair in the error object
                    for (const [key, value] of Object.entries(error)) {
                        // Add the error message for each key to the errorMessage string
                        errorMessage += `${key}: ${value.join(', ')}\n`;
                    }
                    // Display the error messages in an alert dialog
                    alert(errorMessage);
                });
            });
    }
</script>

</html>
