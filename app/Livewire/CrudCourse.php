<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CrudCourse extends Component
{
    public $courses;

    #[Validate('required|string|min:3')]
    public $newCourseName = '';

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function render()
    {
        return view('livewire.crud-course');
    }

    public function create()
    {
        $this->validate();
        Course::create(['name' => $this->newCourseName]);
        #refresh course
        $this->courses = Course::all();
        $this->dispatch('course-created');
    }
}
