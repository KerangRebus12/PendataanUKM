<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use App\Telepon;
use App\Prodi;
use Storage;
use Validator;

class AdminController extends Controller
{
    public function index(){
        $profil_list = Profil::orderBy('nama', 'asc')->paginate(5);
        $totaldata = Profil::all()->count();
        return view('profil.index', compact('profil_list', 'totaldata'));
    }

    public function create(){
        $list_prodi = Prodi::pluck('nama_prodi', 'id');
        return view('profil.create', compact('list_prodi'));
    }

    public function show($id){
        $profil = Profil::findOrFail($id);
        return view('profil.show', compact('profil'));
    }

    public function store(Request $request){
       $input = $request->all();
       
       $validator = Validator::make($input,[
           'nim' => 'required|string|size:4|unique:profile,nim',
           'nama' => 'required|string|max:30',
           'alamat' => 'required|string|max:50',
           'jenis_kelamin' => 'required|string|in:L,P',
           'nomor_telepon' => 'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon',
           'id_prodi' => 'required',
           'posisi' => 'required',
           'angkatan' => 'required|numeric',
           'foto' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:500|dimensions:width=256, height=256',
       ]);

       if($validator->fails()){
           return redirect('profil/create')->withInput()->withErrors($validator);
       }

       if($request->hasFile('foto')){
           $foto = $request->file('foto');
           $ext = $foto->getClientOriginalExtension();
           if($request->file('foto')->isValid()){
               $foto_name = date('YdmHis'). ".$ext";
               $foto_path = 'fotoupload';
               $request->file('foto')->move($foto_path, $foto_name);
               $input['foto'] = $foto_name;
           }
       }
       $profil = Profil::create($input); 
       
       $telepon = new Telepon;
       $telepon->nomor_telepon = $request->input('nomor_telepon');
       $profil->telepon()->save($telepon);

       return redirect('profil'); 
    }

    public function edit($id){
        $profil = Profil::findOrFail($id);
        $list_prodi = Prodi::pluck('nama_prodi', 'id');

        if(!empty($profil->telepon->nomor_telepon)){
            $profil->nomor_telepon = $profil->telepon->nomor_telepon;
        }
        return view('profil.edit', compact('profil', 'list_prodi'));
    }

    public function update($id, Request $request){
        $profil = Profil::findOrFail($id);
        $input = $request->all();
        $profil->update($request->all());

        $validator = Validator::make($input,[
            'nim' => 'required|string|size:4|unique:profile,nim,'. $request->input('id'),
            'nama' => 'required|string|max:30',
            'alamat' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string|in:L,P',
            'nomor_telepon' => 'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon,'. $request->input('id') . ',id_siswa',
            'id_prodi' => 'required',
            'posisi' => 'required',
            'angkatan' => 'required|numeric',
            'foto' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:500|dimensions:width=256, height=256',
        ]);

        if($validator->fails()){
            return redirect('profil/'. $id . '/edit')->withInput()->withErrors($validator);
        }

        // foto
        if($request->hasFile('foto')){

            $exist = Storage::disk('foto');
            if(isset($profil->foto) && $exist){
                $delete = Storage::disk('foto')->delete($profil->foto);
            }

            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
                $foto_name = date('YdmHis'). ".$ext";
                $foto_path = 'fotoupload';
                $request->file('foto')->move($foto_path, $foto_name);
                $input['foto'] = $foto_name;
            }
        }

        $profil->update($input);

        if($profil->telepon){
            // jika telp diisi, update
            if($request->filled('nomor_telepon')){
                $telepon =  $profil->telepon;
                $telepon ->nomor_telepon = $request->input('nomor_telepon');
                $profil->telepon()->save($telepon);
            }
            // jika telp tidak diisi
            else{
                $profil->telepon()->delete();
            }
        }
        // buat entry baru, jika sebelumnya tidak ada nomer telp
        else{
            if($request->filled('nomor_telepon')){
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $profil->telepon()->save($telepon);
            }
        }

        return redirect('profil');
    }

    public function destroy($id){
        $profil = Profil::findOrfail($id);
        $profil->delete();
        return redirect('profil');
    }
}
