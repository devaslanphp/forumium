<?php

namespace App\Http\Livewire;

use App\Models\Community;
use Filament\Forms;
use App\Models\Course;
use Livewire\Component;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class Classroom extends Component implements Forms\Contracts\HasForms
{

    use Forms\Concerns\InteractsWithForms;

    public Community $community;

    public $title, $description, $deleteId, $image, $course_id;
    public $courses;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('image')
                ->directory('images')
                ->image(),
            TextInput::make('title'),
            Textarea::make('description'),
        ];
    }

    public function resetFields()
    {
        $this->title = '';
        $this->description = '';
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
        $this->title = $course->title;
        $this->description = $course->description;
        $this->course_id = $course->id;
    }

    public function update()
    {
        // Validate request
        $this->validate();
        try {
            // Update category
            Course::find($this->course_id)->fill([
                'title' => $this->title,
                'description' => $this->description
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
        return view('livewire.classroom.classroom')
            ->layout('components.layout', ['community' => $this->community, 'title' => $this->community->name]);
    }
}
