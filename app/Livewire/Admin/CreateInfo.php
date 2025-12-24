<?php

namespace App\Livewire\Admin;

use App\Models\Info;
use Livewire\Component;

class CreateInfo extends Component
{
    // Properti sesuai kolom Database
    public $title, $author, $type = 'Umum', $published_at, $content, $status = 'Draft';

    protected $rules = [
        'title'        => 'required|min:5',
        'author'       => 'required',
        'type'         => 'required',
        'published_at' => 'required|date',
        'content'      => 'required',
        'status'       => 'required',
    ];

    public function mount()
    {
        // Set tanggal hari ini sebagai default
        $this->published_at = date('Y-m-d');
    }

    public function save()
    {
        $this->validate();

        Info::create([
            'title'        => $this->title,
            'author'       => $this->author,
            'type'         => $this->type,
            'published_at' => $this->published_at,
            'content'      => $this->content,
            'status'       => $this->status,
        ]);

        session()->flash('success', 'Data Info berhasil diterbitkan!');
        return redirect()->route('admin.info.index');
    }

    public function render()
    {
        return view('livewire.admin.create-info');
    }
}