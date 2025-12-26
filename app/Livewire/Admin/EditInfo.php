<?php

namespace App\Livewire\Admin;

use App\Models\Info;
use Livewire\Component;

class EditInfo extends Component
{
    public $infoId;
    public $title, $author, $type, $published_at, $content, $status;

    protected $rules = [
        'title'        => 'required|min:5',
        'author'       => 'required',
        'type'         => 'required',
        'published_at' => 'required|date',
        'content'      => 'required',
        'status'       => 'required',
    ];

    public function mount($info)
    {
        // $info passing validation from Controller check or just ID
        // Assuming Route Model Binding: public function mount(Info $info)
        // But let's handle the ID/Model passed from the view/controller.
        // If controller passes $id, we fetch. If model, we fill.
        
        $this->infoId = $info->id;
        $this->title = $info->title;
        $this->author = $info->author;
        $this->type = $info->type;
        $this->published_at = $info->published_at;
        $this->content = $info->content;
        $this->status = $info->status;
    }

    public function update()
    {
        $this->validate();

        $info = Info::find($this->infoId);
        $info->update([
            'title'        => $this->title,
            'author'       => $this->author,
            'type'         => $this->type,
            'published_at' => $this->published_at,
            'content'      => $this->content,
            'status'       => $this->status,
        ]);

        session()->flash('success', 'Data Info berhasil diperbarui!');
        return redirect()->route('admin.info.index');
    }

    public function render()
    {
        return view('livewire.admin.edit-info');
    }
}
