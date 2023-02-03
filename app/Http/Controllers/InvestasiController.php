<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            // 'perokok' => 'required',
            'nominal_investasi' => 'required',
            'lama_investasi' => 'required',
        ]);

        $pertambahan_investasi = 0;
        if ($request->jenis_kelamin == 'laki-laki') {
            if ($request->perokok) {
                $pertambahan_investasi = 0.01;
            } else {
                $pertambahan_investasi = 0.02;
            }
        } else {
            if ($request->perokok) {
                $pertambahan_investasi = 0.02;
            } else {
                $pertambahan_investasi = 0.03;
            }
        }
        
        if ($request->umur >= 0 && $request->umur <= 30) {
            if ($request->jenis_kelamin == 'laki-laki') {
                if ($request->perokok) {
                    $pertambahan_investasi = 0.02;
                } else {
                    $pertambahan_investasi = 0.03;
                }
            } else {
                if ($request->perokok) {
                    $pertambahan_investasi = 0.03;
                } else {
                    $pertambahan_investasi = 0.04;
                }
            }
        } else if ($request->umur >= 31 && $request->umur <= 50) {
            if ($request->jenis_kelamin == 'laki-laki') {
                if ($request->perokok) {
                    $pertambahan_investasi = 0.015;
                } else {
                    $pertambahan_investasi = 0.025;
                }
            } else {
                if ($request->jenis_kelamin == 'laki-laki') {
                    if ($request->perokok) {
                        $pertambahan_investasi = 0.01;
                    } else {
                        $pertambahan_investasi = 0.02;
                    }
                } else {
                    if ($request->perokok) {
                        $pertambahan_investasi = 0.02;
                    } else {
                        $pertambahan_investasi = 0.03;
                    }
                }
            }
        }
        



        $data = [];
        $awal = $request->nominal_investasi;
        $total = $request->lama_investasi;
        for ($i = 0; $i < $total; $i++){
            $bunga = $awal * $pertambahan_investasi;
            $total_investasi = $awal + $bunga;
            $data[$i + 1] = [
                'awal' => $awal,
                'bunga' => $bunga,
                'akhir' => $total_investasi,
            ];
            $awal = $total_investasi;
        }


        
        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
