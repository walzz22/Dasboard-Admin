<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class InfoController extends Controller {
    public function index() { return view('admin.info.index'); }
    public function create() { return view('admin.info.create'); }
}