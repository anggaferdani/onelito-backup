<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        if ($this->request->ajax()) {
            $admins = Admin::query()
                ->where('status_aktif', 0);

            return DataTables::of($admins)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
               return "";
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.pages.admin.index')->with([
            'type_menu' => 'manage-admin'
        ]);
    }
}
