<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\About;
use App\Models\Issue;
use App\Models\Announcement;
use App\Models\Editors;
use App\Models\Account;
use App\Models\Article;
use App\Models\Populer;
use App\Models\RequestJournal;
use Illuminate\Support\Facades\View;

class EnterWebController extends Controller
{
    private $idaccount;

    public  function loginaccount(Request $req){
        $requestaccount = Account::where([['username', '=', $req->username],
        ['password', '=', $req->password],])->first();
        $requestpathjournal = $requestaccount->id_journal ?? 'empetyjournal';
        if($requestaccount == null){
            return back()->with('error', 'Invalid Username or Password!');
        }elseif($requestaccount != null){
            $data = Journal::where('status', 'publish')->get();
            View::share('account', $requestaccount);
            return view('homapage\home', [
                'journal' => $data,
                'account' => $requestaccount,
                'accountjournal' => $requestpathjournal
            ]); 
        }
    }
    public  function journalpage( $id){
        $requestaccount = Account::Where('id', $id)->first();
        $requestpathjournal = $requestaccount->id_journal ?? 'empetyjournal';
        if($requestaccount == null){
            return back()->with('error', 'Invalid Username or Password!');
        }elseif($requestaccount != null){
            $data = Journal::where('status', 'publish')->get();
            View::share('account', $requestaccount);
            return view('homapage\home', [
                'journal' => $data,
                'account' => $requestaccount,
                'accountjournal' => $requestpathjournal
            ]); 
        }
    }
    public  function requestpage($id){
        $requestaccount = Account::Where('id', $id)->first();
        if($requestaccount != null){
            $data = Journal::all();
            View::share('account', $requestaccount);
            return view('homapage\requestjournal', [
                'journal' => $data,
                'account' => $requestaccount,
            ]); 
        }
    }
    public  function sendrequest($id, Request $req){
        $requestaccount = Account::Where('id', $id)->first();
        if($requestaccount != null){
             $request = new RequestJournal();
             $request->username = $req->username;
             $request->title_journal = $req->title;
             $request->theme = $req->theme;
             $request->save();
             return redirect('/'.$id.'/journal');
        }
    }
    public function explorejournal()
    {
        $categoryekonomi = Journal::where([['status','=', 'publish'],
        ['category', '=', 'ekonomi']])->count();
        $categorysport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'sport']])->count();
        $categorycomputer = Journal::where([['status','=', 'publish'],
        ['category', '=', 'computer']])->count();
        $categorypolitik = Journal::where([['status','=', 'publish'],
        ['category', '=', 'politik']])->count();
        $data = Journal::where('status', 'publish')->get();
        return view('openviews.journalpage', [
            'journal' => $data,
            'ekonomicate' => $categoryekonomi,
            'sportcate' => $categorysport,
            'computercate' => $categorycomputer,
            'politikcate' => $categorypolitik,
        ]);
    }
    public  function gohome(){
        $reqpopuler = Populer::orderByDesc('views')->take(4)->get();
        if($reqpopuler != null){
        $req1popular = $reqpopuler[0] ?? null;
        $req2popular = $reqpopuler[1] ?? null;
        $req3popular = $reqpopuler[2] ?? null;
        $req4popular = $reqpopuler[3] ?? null;
        $pathpopulerjournal1 = $req1popular->path_jr ?? null;
        $pathpopulerjournal2 = $req2popular->path_jr ?? null;
        $pathpopulerjournal3 = $req3popular->path_jr ?? null;
        $pathpopulerjournal4 = $req4popular->path_jr ?? null;
        $journalpopular1 = Journal::where([['path', '=', $pathpopulerjournal1],
        ['status', '=', 'publish']])->first();
        $journalpopular2 = Journal::where([['path', '=', $pathpopulerjournal2],
        ['status', '=', 'publish']])->first();
        $journalpopular3 = Journal::where([['path', '=', $pathpopulerjournal3],
        ['status', '=', 'publish']])->first();
        $journalpopular4 = Journal::where([['path', '=', $pathpopulerjournal4],
        ['status', '=', 'publish']])->first();
        $categoryekonomicount = Journal::where([['status','=', 'publish'],
        ['category', '=', 'ekonomi']])->count();
        $categorysportsport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'sport']])->count();
        $categorycomputersport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'computer']])->count();
        $categorypolitiksport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'politik']])->count();
    }
    elseif ($reqpopuler == null) {
        $req1popular = null;
        $req2popular = null;
        $req3popular = null;
        $req4popular = null;
        $journalpopular1 = null;
        $journalpopular2 = null;
        $journalpopular3 = null;
        $journalpopular4 = null;
        $categoryekonomicount = Journal::where([['status','=', 'publish'],
        ['category', '=', 'ekonomi']])->count();
        $categorysportsport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'sport']])->count();
        $categorycomputersport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'computer']])->count();
        $categorypolitiksport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'politik']])->count();
    }
    if($req1popular == null and $req2popular == null and $req3popular == null and $req4popular == null ){
        $populerempety = null;
    }else{
        $populerempety = $reqpopuler;
    }
        return view('homapage\homepage', [
            'populerempety' => $populerempety,
            'popular1' => $req1popular,
            'popular2' => $req2popular,
            'popular3' => $req3popular,
            'popular4' => $req4popular,
            'journalpopular1' => $journalpopular1,
            'journalpopular2' => $journalpopular2,
            'journalpopular3' => $journalpopular3,
            'journalpopular4' => $journalpopular4,
            'ekonomicate' => $categoryekonomicount,
            'sportcate' => $categorysportsport,
            'computercate' => $categorycomputersport,
            'politikcate' => $categorypolitiksport,
        ]);
    }

    public function enterjournal($id ,$path)
    {
        $requestjournal = Journal::where('path', $path)->first();
        $requestabout = About::where('journalpath', $path)->first();
        $requestissue = Issue::where('path_jr', $path)->latest()->paginate(5);
        $requestannouncement = Announcement::where('path_jr', $path)->latest()->first();
        $reqAnnouncement =  Announcement::where('path_jr', $path)->get();
        $requesteditors = Editors::where('path_jr', $path)->paginate(3);
        $requestcurrentissue = Issue::where([['path_jr', '=', $path],
        ['current', '=', "active"],])->first();
        $requestissuearticle = $requestcurrentissue->id ?? 'None';
        $requestcurrentarticle = Article::where([['path_jr', '=', $path],
        ['id_issue', '=', $requestissuearticle],])->get();
        $themejournal = $requestjournal->theme;
        $reqaccount = Account::Where('id', $id)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        $countview = Populer::where('path_jr', $path)->first();
        $countview->views = $countview->views+1;
        $countview->update();
        if ($themejournal=="novelty") {
            return view('themejournal.scholartheme',[
                'journal' => $requestjournal,
                'about' => $requestabout,
                'issue' => $requestissue,
                'announc' => $requestannouncement,
                'editor' => $requesteditors,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal


            ]);
        }elseif ($themejournal=="classy") {
            return view('themejournals.clasytheme',[
                'journal' => $requestjournal,
                'about' => $requestabout,
                'currentissue' => $requestcurrentissue,
                'announc' => $reqAnnouncement,
                'editor' => $requesteditors,
                'articlecurent' => $requestcurrentarticle,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal

            ]);
        }    
    }
    public  function log(){
        return view('login.log');
    }

    public  function registeraccount(Request $req){
        $req->validate([
            'username' => 'required|unique:account',
            'password' => 'required|unique:account',
        ]);
        $account = Account::create([
                'username' => $req->username,
                'password' => $req->password
        ]);
        return view('homapage\homepage'); 
    }
    public  function login(Request $req){
        $nameari = "Eyva";
        if($req->username == $nameari){
        $name1 = "Eyva";
        $password1 = "12Eyva20016";
        if ($req->username == $name1) {
            if ($req->password == $password1) {
                return redirect('/home'); 
            }else {
                return "Password Wrong";
            }
        }else {
            return "Name Wrong";
        }
        }
        $namenayif = "nayif";
        if ($req->username == $namenayif) {
        $name2 = "nayif";
        $password2 = "ababababab";
        if ($req->username == $name2) {
            if ($req->password == $password2) {
                return redirect('/home'); 
            }else {
                return "Password Wrong";
            }
        }else {
            return "Name Wrong";
        }
    }
}

}
