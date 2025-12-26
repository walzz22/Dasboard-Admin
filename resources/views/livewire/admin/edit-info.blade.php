<div class="max-w-6xl mx-auto py-5 px-4 md:px-0">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-black text-slate-800 tracking-tight">Edit Info Kantor</h2>
            <p class="text-[11px] text-slate-500 font-medium">Perbarui data sesuai dengan format database.</p>
        </div>
        <button onclick="history.back()" class="flex items-center gap-2 px-4 py-2 text-xs font-bold text-slate-500 hover:text-blue-600 transition-all">
            <span class="material-icons-outlined text-sm">west</span> Kembali
        </button>
    </div>

    <div class="bg-white rounded-2xl border-2 border-slate-100 shadow-sm overflow-hidden">
        <form wire:submit.prevent="update">
            
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6 border-b border-slate-100">
                <div class="space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Judul Pengumuman</label>
                    <input type="text" wire:model="title" 
                        class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-0 transition-all outline-none text-sm font-semibold text-slate-700 hover:border-slate-200" 
                        placeholder="Contoh: Jadwal Cuti Bersama">
                    @error('title') <p class="text-[10px] text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Penulis / Unit</label>
                    <input type="text" wire:model="author" 
                        class="w-full px-4 py-3 bg-slate-50 border-2 border-slate-100 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-0 transition-all outline-none text-sm font-semibold text-slate-700 hover:border-slate-200" 
                        placeholder="Admin / HRD">
                    @error('author') <p class="text-[10px] text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6 border-b border-slate-100 bg-slate-50/20">
                <div class="space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Tipe Informasi</label>
                    <select wire:model="type" 
                        class="w-full px-4 py-3 bg-white border-2 border-slate-100 rounded-xl focus:border-blue-500 focus:ring-0 transition-all outline-none text-sm font-bold text-slate-700 cursor-pointer">
                        <option value="Umum">Umum</option>
                        <option value="Teknis">Teknis</option>
                        <option value="Kebijakan">Kebijakan</option>
                        <option value="Event">Event</option>
                    </select>
                </div>

                    <div class="space-y-1.5" wire:ignore>
            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Tanggal Publikasi</label>
            <div 
                x-data="{ 
                    value: @entangle('published_at'),
                    init() {
                        flatpickr($refs.input, {
                            dateFormat: 'Y-m-d',
                            altInput: true,
                            altFormat: 'd F Y',
                            defaultDate: this.value,
                            onChange: (selectedDates, dateStr) => {
                                this.value = dateStr;
                            }
                        })
                    }
                }" 
                class="relative group"
            >
                <span class="material-icons-outlined absolute left-4 top-3 text-slate-400 group-focus-within:text-blue-500 transition-colors z-10">calendar_month</span>
                <input 
                    x-ref="input"
                    type="text" 
                    class="w-full pl-12 pr-4 py-3 bg-white border-2 border-slate-100 rounded-xl focus:border-blue-500 focus:ring-0 transition-all outline-none text-sm font-bold text-slate-700 hover:border-slate-200 cursor-pointer" 
                    placeholder="Pilih Tanggal...">
            </div>
            @error('published_at') <p class="text-[10px] text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
        </div>

            <div class="p-6 border-b border-slate-100">
                <div class="space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Detail Informasi</label>
                    <textarea wire:model="content" rows="4" 
                        class="w-full p-4 bg-slate-50 border-2 border-slate-100 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-0 transition-all outline-none text-sm font-medium text-slate-700 shadow-inner" 
                        placeholder="Tulis detail informasi di sini..."></textarea>
                    @error('content') <p class="text-[10px] text-red-500 font-bold mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="p-6 flex flex-col md:flex-row items-end justify-between gap-6 bg-slate-50/30">
                <div class="w-full md:w-64 space-y-1.5">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Status Publikasi</label>
                    <div class="relative">
                        <select wire:model="status" 
                            class="w-full pl-4 pr-10 py-3 bg-white border-2 border-slate-100 rounded-xl focus:border-blue-500 focus:ring-0 transition-all outline-none appearance-none text-sm font-bold {{ $status === 'Terbit' ? 'text-green-600' : 'text-blue-600' }} cursor-pointer">
                            <option value="Draft">Draft (Hanya disimpan)</option>
                            <option value="Terbit">Terbit (Publikasikan)</option>
                        </select>
                        <span class="material-icons-outlined absolute right-3 top-3 text-slate-400 pointer-events-none">expand_more</span>
                    </div>
                </div>

                <button type="submit" 
                    class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white px-10 py-3 rounded-xl text-sm font-black shadow-lg shadow-blue-100 transition-all flex items-center justify-center gap-2 active:scale-95 group">
                    <span class="material-icons-outlined text-sm">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
