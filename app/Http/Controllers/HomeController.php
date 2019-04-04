<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

Use App\User;
Use App\ProfileGuru;
Use App\ProfileMurid;
Use App\Order;
Use App\Videos;
Use App\MyVideos;
use Auth;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function indexMurid()
    {
        $data['profil'] = ProfileMurid::where('idmurid', Auth::id())->get();
        return view('murid.dashboard', $data);
    }
    public function searchOnline()
    {
        $data['orders'] = Order::where('status', '=', 'Waiting')->where('type','=','Online')->orderBy('id', 'desc')->get();
        return view('guru.hasil_cari', $data);
    }
    public function indexGuru(){
        $data['profil'] = ProfileGuru::where('idguru', Auth::id())->get();
        return view('guru.index', $data);
    }
    public function createOffline(){
        $data['profil'] = ProfileMurid::where('idmurid', Auth::id())->get();
        return view('murid.createOffline', $data);
    }
    public function createOfflinePost(Request $r){
     $lesco = $r->lesco;

     $post = new Order;
     $post->studentname = Auth::user()->name;
     $post->nmr_murid = $r->nmr_murid;
     $post->photo_murid = $r->photo_murid;
     $post->teachername = "";
     $post->pelajaran = $r->pelajaran;
     $post->kategori_pelajaran = $r->kategori_pelajaran;
     $post->deskripsi = $r->deskripsi;
     $post->durasi = $r->durasi;
     $post->lesco = $lesco;
     $post->alamat = $r->alamat;
     $post->status = "Waiting";
     $post->jenjang = $r->jenjang;
     $post->type = "Offline";
     $post->save();

     $profile = ProfileMurid::where('idmurid', Auth::user()->id)->first();
     $profile->lesco -= $lesco;
     $profile->save();

     return redirect()->route('murid.taskMurid');
 }
 public function searchOffline(){
    $data['orders'] = Order::where('status', '=', 'Waiting')->where('type','=','Offline')->orderBy('id', 'desc')->get();
    return view('guru.searchOffline', $data);
}
public function searchOfflineFilter(Request $r){
    $data['filter'] = Order::where('jenjang', '=', $r->jenjang)->where('pelajaran','=',$r->pelajaran)->where('kategori_pelajaran','=', '%'.$r->materi.'%')->orderBy('id', 'desc')->get();
    return redirect()->route('guru.searchOffline', $data);
}
public function searchOfflineDetail($id){
    $data['orders'] = Order::where('id', '=', $id)->get();
    return view('guru.searchOfflineDetail', $data);
}
public function searchOfflineAction(Request $r){
    DB::table('order')->where('id', $r->input('idOrder'))->update(
        ['teachername' => $r->input('teacherName'),
        'status' => "Accept"
        ]
        );
    return redirect()->route('guru.taskGuru');
}
public function searchOfflineProcess(Request $r){
    DB::table('order')->where('id', $r->input('idOrder'))->update(
        ['status' => "Process"]
        );
    return redirect()->route('guru.taskGuru');
}
public function searchOfflineFinished(Request $r){
    $lesco = $r->lesco;
    DB::table('order')->where('id', $r->input('idOrder'))->update(
        ['status' => "Success"]
        );

    $profile = ProfileGuru::where('idguru', Auth::user()->id)->first();
    $profile->lesco += $lesco;
    $profile->save();
    return redirect()->route('guru.taskGuru');
}
public function createOfflineFinished(Request $r){

    DB::table('order')->where('id', $r->input('idOrder'))->update(
        ['status' => "Success"]
        );
    return redirect()->route('murid.taskMurid');
}
public function createOnline(){
        return view('murid.createOnline');
    }
public function createOnlinePost(Request $r){
     $lesco = $r->lesco;

     $post = new Order;
     $post->studentname = Auth::user()->name;
     $post->teachername = "";
     $post->pelajaran = $r->pelajaran;
     $post->deskripsi = $r->deskripsi;
     $post->durasi = $r->durasi;
     $post->lesco = $lesco;
     $post->alamat = "";
     $post->status = "Waiting";
     $post->jenjang = $r->jenjang;
     $post->type = "Online";
     $post->save();

     $profile = ProfileMurid::where('idmurid', Auth::user()->id)->first();
     $profile->lesco -= $lesco;
     $profile->save();

     return redirect()->route('murid.taskMurid');
 }
public function taskMurid(){
    $data['profile_murid'] = ProfileMurid::where('idmurid', Auth::id())->get();
    $data['orders'] = Order::where('studentname', '=', Auth::user()->name)->where('status','!=','Success')->orderBy('id', 'desc')->paginate(5);
    return view('murid.task', $data);
}
public function taskGuru(){
    $data['orders'] = Order::where('teachername', '=', Auth::user()->name)->where('status','!=','Success')->orderBy('id', 'desc')->get();
    return view('guru.task', $data);
}
public function createMateri(){
    return view('guru.createMateri');
}
public function createMateriPost(Request $r){
    $file = $r->file('sampul');
    $gambar = $file->getClientOriginalName();
    $r->file('sampul')->move(public_path('sampul'), $gambar);

    $data = new Videos;
    $data->guru = Auth::user()->name;
    $data->judul = $r->judul;
    $data->deskripsi = $r->deskripsi;
    $data->video = $r->videos;
    $data->sampul = $gambar;
    $data->lesco = $r->lesco;
    $data->save();

    return redirect()->route('guru.index');
}

public function detailOrderMurid($id){
  $data['orders'] = Order::where('id', '=', $id)->get();
  return view('murid.detailOrder', $data);
}
public function searchMateri(){
    return view('murid.cariMateri');
}
public function materi($id){
    $data['videos'] = Videos::where('id', '=', $id)->get();
    return view('murid.materi', $data);
}

public function searchMateriPost(Request $r){
    $data['videos'] = Videos::where('judul', 'like', '%'.$r->materi.'%')->get();
        // dd($data['videos']);
    return view('murid.cariMateri', $data);
}
public function profileGuru(){
    $data['profiles'] = User::where('name', '=', Auth::user()->name)->get();
    $data['videos'] = Videos::where('guru', '=', Auth::user()->name)->paginate(5);
    $data['history'] = Order::where('teachername', '=', Auth::user()->name)->where('status', '=', 'Success')->paginate(5);
    $data['profil'] = ProfileGuru::where('idguru', '=', Auth::user()->id)->get();
    return view('guru.profile', $data);
}

public function isiProfileGuru(){
    return view('guru.isi_profile');
}
public function isiProfileGuruAction(Request $r){
    $file = $r->file('photo');
    $gambar = $file->getClientOriginalName();
    $r->file('photo')->move(public_path('photoguru'), $gambar);

    $post = new ProfileGuru;
    $post->idguru = $r->idguru;
    $post->photo = $gambar;
    $post->lesco = null;
    $post->ktp = $r->ktp;
    $post->norek = $r->norek;
    $post->phone = $r->phone;
    $post->alamat = $r->alamat;
    $post->tentang = $r->tentang;
    $post->save();
    return redirect()->route('guru.profileGuru');
}
public function updateProfileGuru($id){
    $data['profil'] = ProfileGuru::where('id', '=', $id)->get();
    return view('guru.update_profile', $data);
}
public function updateProfileGuruAction(Request $r){
    if(isset($r->photo)){
        $file = $r->file('photo');
        $gambar = $file->getClientOriginalName();
        $r->file('photo')->move(public_path('photoguru'), $gambar);

        DB::table('profile_gurus')->where('idguru', $r->input('idguru'))->update(
            [
            'photo' => $gambar,
            'ktp' => $r->input('ktp'),
            'norek' => $r->input('norek'),
            'phone' => $r->input('phone'),
            'alamat' => $r->input('alamat'),
            'tentang' => $r->input('tentang')
            ]
            );
    }else{
        DB::table('profile_gurus')->where('idguru', $r->input('idguru'))->update(
            [
            'ktp' => $r->input('ktp'),
            'norek' => $r->input('norek'),
            'phone' => $r->input('phone'),
            'alamat' => $r->input('alamat'),
            'tentang' => $r->input('tentang')
            ]
            );
    }
    return redirect()->route('guru.profileGuru');
}

public function profileMurid(){
    $data['profiles'] = User::where('name', '=', Auth::user()->name)->get();
    $data['history'] = Order::where('studentname', '=', Auth::user()->name)->where('status', '=', 'Success')->get();
    $data['profil'] = ProfileMurid::where('idmurid', '=', Auth::user()->id)->get();
    $data['videos'] = MyVideos::where('iduser', '=', Auth::user()->id)->get();
    return view('murid.profile', $data);
}

public function isiProfileMurid(){
    return view('murid.isi_profile');
}
public function isiProfileMuridAction(Request $r){
    $file = $r->file('photo');
    $gambar = $file->getClientOriginalName();
    $r->file('photo')->move(public_path('photoguru'), $gambar);

    $post = new ProfileMurid;
    $post->idmurid = $r->idmurid;
    $post->photo = $gambar;
    $post->lesco = null;
    $post->sekolah = $r->sekolah;
    $post->jenjang = $r->jenjang;
    $post->nisn = $r->nisn;
    $post->norek = $r->norek;
    $post->phone = $r->phone;
    $post->alamat = $r->alamat;
    $post->tentang = $r->tentang;
    $post->save();
    return redirect()->route('murid.profileMurid');
}
public function updateProfileMurid($id){
    $data['profil'] = ProfileMurid::where('idmurid', Auth::id())->get();
    return view('murid.update_profile', $data);
}
public function updateProfileMuridAction(Request $r){
    if(isset($r->photo)){
        $file = $r->file('photo');
        $gambar = $file->getClientOriginalName();
        $r->file('photo')->move(public_path('photomurid'), $gambar);

        DB::table('profile_murids')->where('idmurid', $r->input('idmurid'))->update(
            [
            'photo' => $gambar,
            'sekolah' => $r->input('sekolah'),
            'jenjang' => $r->input('jenjang'),
            'nisn' => $r->input('nisn'),
            'norek' => $r->input('norek'),
            'phone' => $r->input('phone'),
            'alamat' => $r->input('alamat'),
            'alamat' => $r->input('alamat'),
            'tentang' => $r->input('tentang')
            ]
            );
    }else{
        DB::table('profile_murids')->where('idmurid', $r->input('idmurid'))->update(
            [
            'sekolah' => $r->input('sekolah'),
            'jenjang' => $r->input('jenjang'),
            'nisn' => $r->input('nisn'),
            'norek' => $r->input('norek'),
            'phone' => $r->input('phone'),
            'alamat' => $r->input('alamat'),
            'alamat' => $r->input('alamat'),
            'tentang' => $r->input('tentang')
            ]
            );
    }
    return redirect()->route('murid.profileMurid');
}
public function depositMuridAction(Request $r)
{
    $lesco = $r->lesco;
    $profile = ProfileMurid::where('idmurid', Auth::user()->id)->first();
    $profile->lesco += $lesco;
    $profile->save();
    return redirect()->route('murid.index');
}
public function withdrawGuruAction(Request $r)
{
    $lesco = $r->lesco;
    $profile = ProfileGuru::where('idguru', Auth::user()->id)->first();
    $profile->lesco -= $lesco;
    $profile->save();
    return redirect()->route('guru.index');
}
public function printSertifikat($id)
{
    $data['users'] = User::where('name', Auth::user()->name)->get();
    $data['videos'] = MyVideos::where('id', $id)->get();
    $pdf = PDF::loadview('murid.sertifikat-materi', $data);
    return $pdf->download('sertifikat-materi.pdf');
}
}