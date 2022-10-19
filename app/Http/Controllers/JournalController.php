<?php

namespace App\Http\Controllers;
use App\Models\Journal;
use App\Models\About;
use App\Models\Announcement;
use App\Models\Issue;
use App\Models\Article;
use App\Models\Editors;
use App\Models\Account;
use Illuminate\Support\Facades\Response;


use Illuminate\Http\Request;

class JournalController extends Controller
{
    public  function empetydashboard($id){
        $reqaccount = Account::Where('id', $id)->first();
        $reqstatus = $reqaccount->status;
        if($reqstatus == "guest"){
        return view('homapage.erroraccountlog',[
                    'account' => $reqaccount,
        ]);
        }
        elseif ($reqstatus == "admin") {
            $journal = Journal::all();
            return view('settingjournal.mainsetting.admin.adminpage', [
                'account' => $reqaccount,
                'journal' => $journal,
                'title' => "adminjournal"
            ]);
        }
        elseif ($reqstatus == "taufiq") {
            $journal = Journal::where('category', "computer")->get();
            return view('settingjournal.mainsetting.2admin.settingjournal.journalpage', [
                'account' => $reqaccount,
                'journal' => $journal,
                'title' => "journal1",
                'journal1is' => "Computer",
                'journal2is' => "Politik",
                'journalcategory' => "computer"
            ]);
        }
        elseif ($reqstatus == "nayif") {
            $journal = Journal::where('category', "ekonomi")->get();
            return view('settingjournal.mainsetting.2admin.settingjournal.journalpage', [
                'account' => $reqaccount,
                'journal' => $journal,
                'journal1is' => "Ekonomi",
                'journal2is' => "Sport",
                'title' => "journal1",
                'journalcategory' => "ekonomi"
            ]);
        }
    }

    public  function category2($id){
        $reqaccount = Account::Where('id', $id)->first();
        $reqstatus = $reqaccount->status;
        if($reqstatus == "guest"){
        return view('homapage.erroraccountlog',[
                    'account' => $reqaccount,
        ]);
        }
        elseif ($reqstatus == "taufiq") {
            $journal = Journal::where('category', "politik")->get();
            return view('settingjournal.mainsetting.2admin.settingjournal.journalpage', [
                'account' => $reqaccount,
                'journal' => $journal,
                'title' => "journal2",
                'journal1is' => "Computer",
                'journal2is' => "Politik",
                'journalcategory' => "politik"
            ]);
        }
        elseif ($reqstatus == "nayif") {
            $journal = Journal::where('category', "sport")->get();
            return view('settingjournal.mainsetting.2admin.settingjournal.journalpage', [
                'account' => $reqaccount,
                'journal' => $journal,
                'journal1is' => "Ekonomi",
                'journal2is' => "Sport",
                'title' => "journal2",
                'journalcategory' => "sport"
            ]);
        }
    }
    public  function profile($id){
        $reqaccount = Account::Where('id', $id)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        $reqjournal = Journal::Where('id', $requestpathjournal)->first();
        $reqjournalaccount = $reqjournal->title ?? "None Journal";
            return view('profile.profilepage',[
                    'account' => $reqaccount,
                    'journal' => $reqjournalaccount,
                    'accountjournal' => $requestpathjournal,
                    'journalset' => $reqjournal

            ]);
    }
    public  function aboutpage($id ,$path){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestabout = About::where('journalpath', $path)->firstOrFail();
        $themejournal = $requestjournal->theme;
        $reqaccount = Account::Where('id', $id)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        if ($themejournal=="novelty") {
            return view('themejournal.scholarview.aboutpage',[
                'journal' => $requestjournal,
                'about' => $requestabout,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal

            ]);
        }  elseif ($themejournal=="classy") {
            return "this Journal Theme are classy";
        }
    }

    public  function downloadpage($id ,$path){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $themejournal = $requestjournal->theme;
        $articlejournal = Article::where('path_jr', $path)->get();
        $reqaccount = Account::Where('id', $id)->first();
        $requestannounc1 = Announcement::where('path_jr', $path)->get();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        if ($themejournal=="novelty") {
            return view('themejournal.scholarview.downloadpage.downloadpage',[
                'journal' => $requestjournal,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal,
                'article' => $articlejournal

            ]);
        }  elseif ($themejournal=="classy") {
            return view('themejournals.downloadpage.downloadpage',[
                'journal' => $requestjournal,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal,
                'article' => $articlejournal,
                'announc' => $requestannounc1,
            ]);
        }
    }
    
    public  function downloadfile($id ,$path, $filepath){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $themejournal = $requestjournal->theme;
        $articlejournal = Article::where('path_jr', $path)->get();
        $reqaccount = Account::Where('id', $id)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        $file= public_path(). "/file/journal/".$filepath;
        return Response::download($file, $filepath);
    }
    public  function downloadfilearticle($id ,$path, $filepath){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $themejournal = $requestjournal->theme;
        $articlejournal = Article::where('path_jr', $path)->get();
        $reqaccount = Account::Where('id', $id)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        $file= public_path(). "/file/article/".$filepath;
        return Response::download($file, $filepath);
    }

    public  function announcementpage($id ,$path){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestannounc = Announcement::where('path_jr', $path)->get();
        $themejournal = $requestjournal->theme;
        $reqaccount = Account::Where('id', $id)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        if ($themejournal=="novelty") {
            return view('themejournal.scholarview.announcementpage',[
                'journal' => $requestjournal,
                'announcement' => $requestannounc,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal
            ]);
        }  elseif ($themejournal=="classy") {
            return "this Journal Theme are classy";
        }
    }
    public  function announcementselfpage($idaccount ,$path, $id){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestannounc = Announcement::where('id', $id)->get();
        $requestannounc1 = Announcement::where('path_jr', $path)->get();
        $themejournal = $requestjournal->theme;
        $reqaccount = Account::Where('id', $idaccount)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        if ($themejournal=="novelty") {
            return view('themejournal.scholarview.announcementpageself',[
                'journal' => $requestjournal,
                'announcement' => $requestannounc,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal
            ]);
        }  elseif ($themejournal=="classy") {
            return view('themejournals.announcement.announcementpage',[
                'journal' => $requestjournal,
                'announcement' => $requestannounc,
                'announc' => $requestannounc1,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal
            ]);
        }
    }
    public  function archivepage($id,$path){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestissu = Issue::where('path_jr', $path)->get();
        $requestannounc = Announcement::where('path_jr', $path)->get();
        $themejournal = $requestjournal->theme;
        $reqaccount = Account::Where('id', $id)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        if ($themejournal=="novelty") {
            return view('themejournal.scholarview.issuepage.issuepage',[
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal
            ]);
        }  elseif ($themejournal=="classy") {
            return view('themejournals.Issuepage.issupage',[
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'announce' => $requestannounc,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal
            ]);
        }
    }
    public  function archivepageself($idaccount,$path, $id){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestissu = Issue::where('id', $id)->get();
        $requestarticle = Article::where('id_issue', $id)->get();
        $requestannounc = Announcement::where('path_jr', $path)->get();
        $themejournal = $requestjournal->theme;
        $reqaccount = Account::Where('id', $idaccount)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        if ($themejournal=="novelty") {
            return view('themejournal.scholarview.issuepage.issueselfpage',[
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'article' => $requestarticle,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal
            ]);
        }  elseif ($themejournal=="classy") {
            return view('themejournals.Issuepage.issueselfpage',[
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'article' => $requestarticle,
                'announce' => $requestannounc,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal
            ]);
        }
    }

    public  function articleself($idaccount,$path, $id){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestissu = Issue::where('id', $id)->get();
        $requestarticle = Article::where('id', $id)->get();
        $themejournal = $requestjournal->theme;
        $requestannounc = Announcement::where('path_jr', $path)->get();
        $reqaccount = Account::Where('id', $idaccount)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        if ($themejournal=="novelty") {
            return view('themejournal.scholarview.issuepage.articlepage',[
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'article' => $requestarticle,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal

            ]);
        }  elseif ($themejournal=="classy") {
            return view('themejournals.Issuepage.articlepage',[
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'article' => $requestarticle,
                'announce' => $requestannounc,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal

            ]);
        }
    }
    public  function editorspage($idaccount,$path){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requesteditors = Editors::where('path_jr', $path)->get();
        $requestannounc = Announcement::where('path_jr', $path)->get();
        $themejournal = $requestjournal->theme;
        $reqaccount = Account::Where('id', $idaccount)->first();
        $requestpathjournal = $reqaccount->id_journal ?? 'empetyjournal';
        if ($themejournal=="novelty") {
            return view('themejournal.scholarview.editorialteam.editorialpage',[
                'journal' => $requestjournal,
                'editor' => $requesteditors,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal
            ]);
        }  elseif ($themejournal=="classy") {
            return view('themejournals.editorialteam.editorialpage',[
                'journal' => $requestjournal,
                'announce' => $requestannounc,
                'editor' => $requesteditors,
                'account' => $reqaccount,
                'accountjournal' => $requestpathjournal

            ]);
        }
    }
    public  function settingweb($idaccount, $idjr){
        $requestaccount = Account::where([['id', '=', $idaccount],
        ['id_journal', '=', $idjr],])->first();
        $idjournal = $requestaccount->id_journal;
        if($requestaccount != null){
            $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
            $reqpathjournal = $requestjournal->path;
                return view('settingjournal.mainsetting.settingjournal',[
                        'account' => $requestaccount,
                        'journal' => $requestjournal,
                        'title' => "journalset",
                        'pathjournal' => $reqpathjournal
                ]);
        }else{
            return back();
        }
    }
}
