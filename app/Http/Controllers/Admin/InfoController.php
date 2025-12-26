<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Info;

class InfoController extends Controller {
    public function index() { return view('admin.info.index'); }
    public function create() { return view('admin.info.create'); }
    public function edit(Info $info) { return view('admin.info.edit', compact('info')); }
}