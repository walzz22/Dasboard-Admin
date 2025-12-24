@extends('layout.app')

@section('content')
<div class="mx-auto max-w-7xl py-6">
    {{-- Header tetap menggunakan desain Anda --}}
    <div class="mb-8 flex justify-between items-center">
        <h2 class="text-2xl font-bold">Info Kantor</h2>
        <a href="{{ route('admin.info.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg">Tambah</a>
    </div>

    {{-- DI SINI POWERGRID BEKERJA --}}
    <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-200">
        <livewire:admin.info-table />
    </div>
</div>
@endsection