<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    public function index()
    {
        if ($this->request->ajax()) {
            $members = Member::query()
                ->where('status_aktif', 0);

            return DataTables::of($members)
            ->addIndexColumn()
            ->addColumn('action','admin.pages.member.dt-action')
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.pages.member.index')->with([
            'type_menu' => 'manage-member'
        ]);
    }

    public function store()
    {
        $data = $this->request->all();

        $data['create_by'] = Auth::guard('admin')->id();

        $data['update_by'] = Auth::guard('admin')->id();
        $data['status_aktif'] = 0;

        $createMember = Member::create($data);

        if($createMember){
            return redirect()->back()->with([
                'success' => true,
                'message' => 'Sukses Menambahkan Peserta',

            ],200);
        }else{
            return redirect()->back()->with([
                'success' => false,
                'message' => 'Gagal Menambahkan Peserta'
            ],500);
        }
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);

        if($member){
            return response()->json($member);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Not Found'
            ],404);
        }
    }
}
