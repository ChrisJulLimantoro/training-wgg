<div>
    <div class="lg:grid lg:grid-cols-2 mx-auto px-3 pb-6 gap-10 max-w-[830px]">
        {{-- Students --}}
        <div class="bg-gray-200 rounded-lg border lg:mb-0 mb-8">
            <div class="text-center my-1 text-xl font-semibold">Student</div>
            <div class="bg-white rounded-lg min-h-[100px] h-[30.7rem] overflow-y-auto px-1" id="students">
                @foreach ($students as $student)
                    <div role="button" tabindex="0" wire:click="setSelectedStudent('{{ $student->id }}')"
                        class="student flex items-center justify-between w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-gray-100 hover:bg-opacity-80 active:bg-gray-100 active:bg-opacity-80 hover:text-gray-900 focus:text-gray-900 active:text-gray-900 outline-none">
                        <div>
                            <h6
                                class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-gray-900">
                                {{ $student->name }}</h6>
                            <div class="flex gap-3">
                                <div>{{ $student->nrp }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Courses --}}
        <div class="bg-gray-200 rounded-lg border">
            <div class="text-center my-1 text-xl font-semibold">Course</div>
            <div class="relative w-full h-[30.75rem]">
                <div class="absolute w-full bg-white rounded-lg min-h-[100px] h-[30.7rem] overflow-y-auto px-4 py-4"
                    id="courses">
                    @if ($selectedStudent)
                        @foreach ($courses as $i => $course)
                            <div class='mb-3' data-course-id="{{ $course->id }}"
                                wire:key="{{ $course->id }}:{{ $course->joined }}">
                                <div class="flex items-center justify-between mb-2">
                                    <label class="inline-flex items-center cursor-pointer">
                                        {{ (int) $course->joined }}
                                        @if ($course->joined)
                                            <input type="checkbox" wire:change="leaveCourse('{{ $course->id }}')"
                                                class="sr-only peer" checked>
                                        @else
                                            <input type="checkbox" wire:change="joinCourse('{{ $course->id }}')"
                                                class="sr-only peer">
                                        @endif
                                        <div
                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                        </div>
                                        <span
                                            class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-600">{{ $course->name }}</span>
                                    </label>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
