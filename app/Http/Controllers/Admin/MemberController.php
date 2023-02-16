<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EmailUserActivated;
use App\Mail\EmailVerification;
use App\Models\Member;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    public function index()
    {
        if ($this->request->ajax()) {
            $filterStatusEmail = $this->request->input('filter_status_email', 'all');
            $filterStatusAktif = $this->request->input('filter_status_aktif', 'all');

            $members = Member::query()
                ->when($filterStatusAktif !== 'all', function ($q) use ($filterStatusAktif) {
                    $q->where('status_aktif', $filterStatusAktif);
                })
                ->when($filterStatusEmail !== 'all', function ($q) use ($filterStatusEmail) {
                    if ($filterStatusEmail === 'verified') {
                        $q->whereNotNull('email_verified_at');
                    } else {
                        $q->whereNull('email_verified_at');
                    }
                })
                ->where('status_hapus', 0)
                ->orderBy('created_at', 'desc')
                ->with(['province', 'city', 'district', 'subdistrict']);

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
            ->editColumn('email_verified_at', function ($data) {
                if ($data->email_verified_at !== null) {
                    return "Sudah verifikasi";
                }

                return "Belum verifikasi";
            })
            ->editColumn('status_aktif', function ($data) {
                if ($data->status_aktif === 1) {
                    return "Aktif";
                }

                return "Tidak Aktif";
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
        $statusAktif = $member->status_aktif;
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
            if ($statusAktif === 0 && $data['status_aktif'] === "1") {
                Mail::to($member->email)->send(new EmailUserActivated($member->email));
            }

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
