<?php

namespace App\Http\Livewire;

use Filament\Forms;
use App\Models\Course;
use Livewire\Component;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class Classroom extends Component implements Forms\Contracts\HasForms
{

    use Forms\Concerns\InteractsWithForms;

    public $course_title, $course_description, $deleteId, $course_image, $course_id;
    public $courses;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('course_image')
                ->directory('images')
                ->image(),
            TextInput::make('course_title'),
            Textarea::make('course_description'),
        ];
    }
    public function resetFields()
    {
        $this->course_title = '';
        $this->course_description = '';
    }

    public function create(): void
    {
        Course::create($this->form->getState());
        $this->courses = Course::all();
        $this->resetFields();
    }
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $this->course_title = $course->course_title;
        $this->course_description = $course->course_description;
        $this->course_id = $course->id;
    }

    public function update()
    {
        // Validate request
        $this->validate();
        try {
            // Update category
            Course::find($this->course_id)->fill([
                'course_title' => $this->course_title,
                'course_description' => $this->course_description
            ])->save();
            session()->flash('success', 'Course Updated Successfully!!');

            $this->cancel();
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while updating course!!');
            $this->cancel();
        }
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function delete()
    {
        Course::find($this->deleteId)->delete();
    }

    public function render()
    {
        $this->courses = Course::all();
        return view('livewire.classroom.classroom');
    }
}
