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

           
            $request->session()->put('login', true);
            $request->session()->put('user_data', Arr::except($get_encrypt_password, 'pass'));
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


    public function InputBQTender(Request $request)
    {
        $data = [
            'nama' => $request->input('nama'),
            'nilai' => $request->input('nilai'),
            'instansi' => $request->input('instansi'),
            'lama_tender' => $request->input('lama_tender')
        ];

        Bq::create($data);

        return ['status' => 200, 'msg' => 'Sukses Tambah BQ Tender'];
        
    }

    public function InputPersonil(Request $request)
    {
        $ID_BQ = BQ::query()->select('id')
        ->where('nama',$request->input('nama'))
        ->first();

        $data = [
            'jabatan' => $request->input('jabatan'),
            'gaji' => $request->input('gaji'),
            'jumlah' => $request->input('jumlah'),
            'id_bq' => $ID_BQ->id
        ];

        personil::create($data);

        return ['status' => 200, 'msg' => 'Sukses Tambah InputPersonil Tender'];
    }

    public function InputPerlengkapan(Request $request)
    {
        $ID_BQ = BQ::query()->select('id')
        ->where('nama',$request->input('nama'))
        ->first();

        $data = [
            'nama' => $request->input('nama'),
            'nominal' => $request->input('nominal'),
            'jumlah' => $request->input('jumlah'),
            'id_bq' => $ID_BQ->id
        ];

        perlengkapan::create($data);

        return ['status' => 200, 'msg' => 'Sukses Tambah InputPerlengkapan Tender'];
    }


    public function InputLain2(Request $request)
    {
        $ID_BQ = BQ::query()->select('id')
        ->where('nama',$request->input('nama'))
        ->first();

        $data = [
            'nama' => $request->input('nama'),
            'nominal' => $request->input('nominal'),
            'jumlah' => $request->input('jumlah'),
            'id_bq' => $ID_BQ->id
        ];

        perlengkapan::create($data);

        return ['status' => 200, 'msg' => 'Sukses Tambah InputPerlengkapan Tender'];
    }




}
