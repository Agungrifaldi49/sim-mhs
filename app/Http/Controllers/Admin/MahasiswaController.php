<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Mahasiswa\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Mahasiswa::query();

        // Filter
        if ($request->filled('npm')) {
            $query->where('npm', 'like', '%'.$request->npm.'%');
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->name.'%');
        }

        if ($request->filled('program_studi')) {
            $query->where('program_studi', 'like', '%'.$request->program_studi.'%');
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Pagination
        $mahasiswas = $query->latest()->paginate(10);

        // Sertakan query string agar pagination mempertahankan filter
        $mahasiswas->appends($request->except('page'));

        // View berada di resources/views/admin/mahasiswa/index.blade.php
        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
        echo "aaa";
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm'          => 'required|unique:mahasiswas,npm',
            'email'        => 'required|email|unique:mahasiswas,email',
            'name'         => 'required|string|max:255',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'       => 'required|in:Belum Aktif,Aktif,Cuti,Lulus,Dropout',
        ]);

        $data = $request->only([
            'fakultas','program_studi','program','semester','kelas',
            'npm','name','tempat_lahir','tanggal_lahir','jenis_kelamin',
            'agama','no_hp','email','email_affiliasi','alamat_lengkap','status'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/mahasiswa'), $filename);
            $data['foto'] = $filename;
        }

        Mahasiswa::create($data);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'npm'          => 'required|unique:mahasiswas,npm,' . $mahasiswa->id,
            'email'        => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'name'         => 'required|string|max:255',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'       => 'required|in:Belum Aktif,Aktif,Cuti,Lulus,Dropout',
        ]);

        $data = $request->only([
            'fakultas','program_studi','program','semester','kelas',
            'npm','name','tempat_lahir','tanggal_lahir','jenis_kelamin',
            'agama','no_hp','email','email_affiliasi','alamat_lengkap','status'
        ]);

        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto && File::exists(public_path('uploads/mahasiswa/'.$mahasiswa->foto))) {
                File::delete(public_path('uploads/mahasiswa/'.$mahasiswa->foto));
            }
            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/mahasiswa'), $filename);
            $data['foto'] = $filename;
        }

        $mahasiswa->update($data);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        if ($mahasiswa->foto && File::exists(public_path('uploads/mahasiswa/'.$mahasiswa->foto))) {
            File::delete(public_path('uploads/mahasiswa/'.$mahasiswa->foto));
        }

        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.show', compact('mahasiswa'));
    }
}
