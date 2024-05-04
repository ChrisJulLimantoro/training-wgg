<div>
    <div class="flex justify-center items-center w-full">
        <div class="w-3/4 mx-auto">
            <table class="border-seperate border border-slate-400 border-spacing-px p-3 w-full">
                <thead>
                    <tr>
                        <th class="border border-slate-300 uppercase">id</th>
                        <th class="border border-slate-300 uppercase">name</th>
                    </tr>
                </thead>
                <tbody id="data">
                    @foreach ($courses as $course)
                        <tr wire:key="{{ $course->id }}">
                            <td class="border border-slate-300">{{ $course->id }}</td>
                            <td class="border border-slate-300">{{ $course->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form class="mt-10 px-16 w-full flex flex-col gap-8 mb-8" wire:submit="create">
        <h1 class="text-center uppercase text-2xl font-bold text-black">Form Add Course</h1>
        <div>
            <label class="text-gray-800 font-bold text-lg pl-5 m-0">Course Name</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required type="text" id="nrp" placeholder="Course Name" wire:model='newCourseName'>
            @error('newCourseName')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="button"
            class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Add</button>
    </form>
</div>
