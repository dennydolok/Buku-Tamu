<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontak;
use DB;
class KontakController extends Controller
{
	public function index()
	{
		$data = Kontak::paginate(6);
		$cek  = 'ad'; 
		return view('index',compact('data','cek'));
	}
	public function report()
	{
		$data = Kontak::paginate(6);
		$cek  = 'ad'; 
		return view('report',compact('data','cek'));
	}
	public function hapus($id)
	{
		Kontak::destroy($id);
		return back()->withMessage('terhapus');
	}
	public function edit($id)
	{
		$data = Kontak::where('id',$id)->first();
		return view('edit',compact('data'));
	}
	public function create()
	{
		return view('create');
	}
	public function simpan(Request $request)
	{
		$this->validate($request,[
			'nama'=>'required',
			'email'=>'required|unique:kontaks',
			'foto'=>'required',
		]);

		if ($request->hasFile('foto')) {
			$foto	= $request->file('foto');
			$name 	= 'Kontak_'.time().'.'.$foto->getClientOriginalExtension();
			$folder = public_path('images');
			$foto->move($folder,$name);
			$cek = Kontak::create([
						'nama' 	=>$request->nama,
						'email' =>$request->email,
						'foto' 	=>$name
					]);
			return redirect('kontak')->withMessage('Saved!');
		}
	}	
	// }
	// public function hah(){
	// 	return 'hah';
	// }
	public function update(Request $request,$id)
	{
		$this->validate($request,[
			'nama'=>'required',
			'email'=>'required',
			'foto'=>'required',
		]);
		if ($request->hasFile('foto')) {
			$foto	= $request->file('foto');
			$name 	='Kontak_'.time().'.'.$foto->getClientOriginalExtension();
			$folder = public_path('images');
			$foto->move($folder,$name);

			kontak::findOrFail($id)->update([
				'nama' 	=>$request->nama,
				'email' =>$request->email,
				'foto' 	=>$name
			]);
			return redirect('kontak')->withMessage('Updated');
		}
	}
}

