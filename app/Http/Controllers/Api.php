<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

/**
 * Call Model
*/
use App\Member;
use App\Bq;
use App\personil;
use App\perlengkapan;
use App\lain;

/**
 * End Call Model
 */

use Illuminate\Support\Arr;
use Validator;

class Api extends Controller
{
    public function login(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');


        $get_encrypt_password = Member::query()->select('*')
        ->where('user',$username)
        ->get()
        ->toArray();
        if(count($get_encrypt_password) == 0 ){
            $encrypt_password = rand(1000,9000);
        }else{
        $encrypt_password = $get_encrypt_password[0]['pass'];
        }
        if(password_verify($password,$encrypt_password)){ 

            $store_data = Arr::except($get_encrypt_password[0], ['pass']);
            $request->session()->put('login', true);
            $request->session()->put('user_data', $store_data);
            return ['status' => 200, 'msg' => 'Sucess Login!'];            
            
        }else{ 
            return ['status' => 401, 'msg' => 'Password Salah!'];
        }

    }

    public function checkAdminSession(Request $request)
    {
        return $request->session()->get('user_data');
    }

    public function LogOut(Request $request)
    {
        $request->session()->forget('user_data');
        return [ 'status' => 200, 'msg' => 'Logout Success' ];
    }

    public function AddMember(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'user' => 'required|unique:members|max:20',
            'pass' => 'required|min:5|max:100',
            'nama' => 'required|min:5|max:50',
            'jabatan' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
            exit;
        }

        $data = [
            'user' => $request->input('user'),
            'pass' => bcrypt($request->input('pass')),
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan')
        ];

        Member::create($data);

        return ['status' => 200, 'msg' => 'Add Member Success!'];

        
    }

    private function getFKBq($nama)
    {
        $getID = BQ::query()->select('id')
        ->where('nama', $nama)
        ->first();

        return $getID->id;
    }


    public function InputBQTender(Request $request)
    {
        $req = $request->json()->all();
        $validator = Validator::make($req, [
            'nama' => 'required',
            'nilai' => 'required',
            'instansi' => 'required',
            'lama_tender' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 400, 'msg' => $validator->errors() ];
            exit;
        }

        $data = [
            'nama' => $req['nama'],
            'nilai' => $req['nilai'],
            'instansi' => $req['instansi'],
            'lama_tender' => $req['lama_tender']
        ];

        Bq::create($data);

        return ['status' => 200, 'msg' => 'Sukses Tambah BQ Tender'];
        
    }

    public function InputPersonil(Request $request)
    {
        $req = $request->json()->all();
        $validator = Validator::make($req, [
            'nama' => 'required',
            'jabatan' => 'required',
            'gaji' => 'required',
            'jumlah' => 'required',
        ]);

        if ($validator->fails()) {
            return ['status' => 400, 'msg' => $validator->errors() ];
            exit;
        }

        $data = [
            'jabatan' => $req['jabatan'],
            'gaji' => $req['gaji'],
            'jumlah' => $req['jumlah'],
            'id_bq' => $this->getFKBq($req['nama'])
        ];

        personil::create($data);

        return ['status' => 200, 'msg' => 'Sukses Tambah InputPersonil Tender'];
    }

    public function InputPerlengkapan(Request $request)
    {
        $req = $request->json()->all();
        $validator = Validator::make($req, [
            'nama' => 'required',
            'nominal' => 'required',
            'jumlah' => 'required',
            'nama_perlengkapan' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 400, 'msg' => $validator->errors() ];
            exit;
        }

        $data = [
            'nama' => $req['nama_perlengkapan'],
            'nominal' => $req['nominal'],
            'jumlah' => $req['jumlah'],
            'id_bq' => $this->getFKBq($req['nama'])
        ];

        perlengkapan::create($data);

        return ['status' => 200, 'msg' => 'Sukses Tambah InputPerlengkapan Tender'];
    }


    public function InputLain2(Request $request)
    {
        $req = $request->json()->all();
        $validator = Validator::make($req, [
            'nama' => 'required',
            'nominal' => 'required',
            'jumlah' => 'required',
        ]);

        if ($validator->fails()) {
            return ['status' => 400, 'msg' => $validator->errors() ];
            exit;
        }

        $data = [
            'nama' => $req['nama'],
            'nominal' => $req['nominal'],
            'jumlah' => $req['jumlah'],
            'id_bq' => $this->getFKBq($req['nama'])
        ];

        lain::create($data);

        return ['status' => 200, 'msg' => 'Sukses Tambah InputPerlengkapan Tender'];
    }




}
