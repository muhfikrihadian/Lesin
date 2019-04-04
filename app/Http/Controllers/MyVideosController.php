<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

Use App\User;
Use App\ProfileGuru;
Use App\ProfileMurid;
Use App\Order;
use App\MyVideos;
Use App\Videos;
use Auth;

class MyVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myVideos()
    {
        //
    }
    public function buyVideo(Request $r)
    {
        $lesco = $r->lesco;
        $buy = new MyVideos;
        $buy->iduser = Auth::user()->id;
        $buy->guru = $r->guru;
        $buy->judul = $r->judul;
        $buy->deskripsi = $r->deskripsi;
        $buy->video = $r->video;
        $buy->sampul = $r->sampul;
        $buy->lesco = $r->lesco;
        $buy->save();

        $transaction = ProfileMurid::where('idmurid', Auth::user()->id)->first();
        $transaction->lesco -= $lesco;
        $transaction->save();
        return redirect()->route('murid.profileMurid');
    }
}
