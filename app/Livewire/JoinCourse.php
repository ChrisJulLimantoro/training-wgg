<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Student;
use Livewire\Attributes\On;
use Livewire\Component;

class JoinCourse extends Component
{
    public $students;
    public $courses;
    public $selectedStudent;

    public function mount($students)
    {
        $this->courses = Course::all();
        foreach ($this->courses as $course) {
            $course->joined = false;
        }
        $this->students = $students;
    }

    public function render()
    {
        return view('livewire.join-course');
    }

    public function setSelectedStudent(Student $student)
    {
        $this->selectedStudent = $student;
        $this->refreshCoursesJoinedStatus();
    }

    public function joinCourse(Course $course)
    {
        $this->selectedStudent->courses()->attach($course->id);
        $this->refreshCoursesJoinedStatus();
        $this->dispatch('fire-swal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Join course successfully',
        ]);
    }

    public function leaveCourse(Course $course)
    {
        $this->selectedStudent->courses()->detach($course->id);
        $this->refreshCoursesJoinedStatus();
        $this->dispatch('fire-swal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'Leave course successfully',
        ]);
    }

    private function refreshCoursesJoinedStatus()
    {
        foreach ($this->courses as $course) {
            $course->joined = $this->selectedStudent->courses->contains($course->id);
        }
    }

    #[On('course-created')]
    public function updateCourses()
    {
        $this->courses = Course::all();
        if ($this->selectedStudent) {
            $this->refreshCoursesJoinedStatus();
        }
    }
}
