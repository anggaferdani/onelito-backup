<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    public function index()
    {
        if ($this->request->ajax()) {
            $members = Member::query()
                ->with(['province', 'city', 'district', 'subdistrict'])
                ->where('status_aktif', 1);

            return DataTables::of($members)
            ->addIndexColumn()
            ->addColumn('action','admin.pages.member.dt-action')
            ->editColumn('province.prov_name', function ($data) {
                if ($data->province === null) {
                    return "";
                }

                return $data->province->prov_name;
            })
            ->editColumn('city.city_name', function ($data) {
                if ($data->city === null) {
                    return "";
                }

                return $data->city->city_name;
            })
            ->editColumn('district.dis_name', function ($data) {
                if ($data->district === null) {
                    return "";
                }

                return $data->district->dis_name;
            })
            ->editColumn('subdistrict.city_name', function ($data) {
                if ($data->subdistrict === null) {
                    return "";
                }

                return $data->subdistrict->subdis_name;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $provinces = Province::get();

        return view('admin.pages.member.index')->with([
            'type_menu' => 'manage-member',
            'provinces' => $provinces,
        ]);
    }

    public function store()
    {
        $data = $this->request->all();

        $data['create_by'] = Auth::guard('admin')->id();

        $data['update_by'] = Auth::guard('admin')->id();
        $data['status_aktif'] = 1;

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
        $member = Member::with(['province', 'city', 'district', 'subdistrict'])->findOrFail($id);

        if($member){
            return response()->json($member);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Not Found'
            ],404);
        }
    }

    public function update($id)
    {
        $member = Member::findOrFail($id);
        $data = $this->request->all();
        $validator = Validator::make($this->request->all(), [
            'email' => 'required|email',
            'nama'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data['update_by'] = Auth::guard('admin')->id();
        $updateMember = $member->update($data);

        if($updateMember){
            return response()->json([
                'success' => true,
                'message' => [
                    'title' => 'Berhasil',
                    'content' => 'Mengubah data peserta',
                    'type' => 'success'
                ],
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => [
                    'title' => 'Gagal',
                    'content' => 'Mengubah data peserta',
                    'type' => 'error'
                ],
            ],400);
        }
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->status_aktif = 0;

        $member->save();

        return response()->json([
            'success' => true,
        ],200);
    }
}
