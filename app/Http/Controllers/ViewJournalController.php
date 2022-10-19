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
use Illuminate\Support\Facades\Response;

class ViewJournalController extends Controller
{
    public function enterjournal($path)
    {
        $requestjournal = Journal::where('path', $path)->first();
        $requestabout = About::where('journalpath', $path)->first();
        $requestissue = Issue::where('path_jr', $path)->latest()->paginate(5);
        $requestannouncement = Announcement::where('path_jr', $path)->latest()->first();
        $reqAnnouncement =  Announcement::where('path_jr', $path)->get();
        $requesteditors = Editors::where('path_jr', $path)->paginate(3);
        $requestcurrentissue = Issue::where([
            ['path_jr', '=', $path],
            ['current', '=', "active"],
        ])->first();
        $requestissuearticle = $requestcurrentissue->id ?? 'None';
        $requestcurrentarticle = Article::where([
            ['path_jr', '=', $path],
            ['id_issue', '=', $requestissuearticle],
        ])->get();
        $themejournal = $requestjournal->theme;
        $countview = Populer::where('path_jr', $path)->first();
        $countview->views = $countview->views + 1;
        $countview->update();
        if ($themejournal == "novelty") {
            return view('openviews.themejournal.scholartheme', [
                'journal' => $requestjournal,
                'about' => $requestabout,
                'issue' => $requestissue,
                'announc' => $requestannouncement,
                'editor' => $requesteditors,
            ]);
        } elseif ($themejournal == "classy") {
            return view('openviews.themejournals.clasytheme', [
                'journal' => $requestjournal,
                'about' => $requestabout,
                'currentissue' => $requestcurrentissue,
                'announc' => $reqAnnouncement,
                'editor' => $requesteditors,
                'articlecurent' => $requestcurrentarticle,
            ]);
        }
    }
    public  function aboutpage($path)
    {
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestabout = About::where('journalpath', $path)->firstOrFail();
        $themejournal = $requestjournal->theme;
        if ($themejournal == "novelty") {
            return view('openviews.themejournal.scholarview.aboutpage', [
                'journal' => $requestjournal,
                'about' => $requestabout,
            ]);
        } elseif ($themejournal == "classy") {
            return "this Journal Theme are classy";
        }
    }
    public  function announcementpage($path)
    {
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestannounc = Announcement::where('path_jr', $path)->get();
        $themejournal = $requestjournal->theme;
        if ($themejournal == "novelty") {
            return view('openviews.themejournal.scholarview.announcementpage', [
                'journal' => $requestjournal,
                'announcement' => $requestannounc,
            ]);
        } elseif ($themejournal == "classy") {
            return "this Journal Theme are classy";
        }
    }
    public  function announcementselfpage($path, $id)
    {
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestannounc = Announcement::where('id', $id)->get();
        $requestannounc1 = Announcement::where('path_jr', $path)->get();
        $themejournal = $requestjournal->theme;
        if ($themejournal == "novelty") {
            return view('openviews.themejournal.scholarview.announcementpageself', [
                'journal' => $requestjournal,
                'announcement' => $requestannounc,
            ]);
        } elseif ($themejournal == "classy") {
            return view('openviews.themejournals.announcement.announcementpage', [
                'journal' => $requestjournal,
                'announcement' => $requestannounc,
                'announc' => $requestannounc1,
            ]);
        }
    }
    public  function archivepage($path)
    {
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestissu = Issue::where('path_jr', $path)->get();
        $requestannounc = Announcement::where('path_jr', $path)->get();
        $themejournal = $requestjournal->theme;
        if ($themejournal == "novelty") {
            return view('openviews.themejournal.scholarview.issuepage.issuepage', [
                'journal' => $requestjournal,
                'issue' => $requestissu,
            ]);
        } elseif ($themejournal == "classy") {
            return view('openviews.themejournals.Issuepage.issupage', [
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'announce' => $requestannounc,
            ]);
        }
    }
    public  function archivepageself($path, $id)
    {
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestissu = Issue::where('id', $id)->get();
        $requestarticle = Article::where('id_issue', $id)->get();
        $requestannounc = Announcement::where('path_jr', $path)->get();
        $themejournal = $requestjournal->theme;
        if ($themejournal == "novelty") {
            return view('openviews.themejournal.scholarview.issuepage.issueselfpage', [
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'article' => $requestarticle,
            ]);
        } elseif ($themejournal == "classy") {
            return view('openviews.themejournals.Issuepage.issueselfpage', [
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'article' => $requestarticle,
                'announce' => $requestannounc,
            ]);
        }
    }
    public  function articleself($path, $id)
    {
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requestissu = Issue::where('id', $id)->get();
        $requestarticle = Article::where('id', $id)->get();
        $themejournal = $requestjournal->theme;
        $requestannounc = Announcement::where('path_jr', $path)->get();
        if ($themejournal == "novelty") {
            return view('openviews.themejournal.scholarview.issuepage.articlepage', [
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'article' => $requestarticle,
            ]);
        } elseif ($themejournal == "classy") {
            return view('openviews.themejournals.Issuepage.articlepage', [
                'journal' => $requestjournal,
                'issue' => $requestissu,
                'article' => $requestarticle,
                'announce' => $requestannounc,
            ]);
        }
    }
    public  function editorspage($path)
    {
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $requesteditors = Editors::where('path_jr', $path)->get();
        $requestannounc = Announcement::where('path_jr', $path)->get();
        $themejournal = $requestjournal->theme;
        if ($themejournal == "novelty") {
            return view('openviews.themejournal.scholarview.editorialteam.editorialpage', [
                'journal' => $requestjournal,
                'editor' => $requesteditors,
            ]);
        } elseif ($themejournal == "classy") {
            return view('openviews.themejournals.editorialteam.editorialpage', [
                'journal' => $requestjournal,
                'announce' => $requestannounc,
                'editor' => $requesteditors,
            ]);
        }
    }
    public function ekonomicategory(){
        $categoryekonomicount = Journal::where([['status','=', 'publish'],
        ['category', '=', 'ekonomi']])->count();
        $categorysportsport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'sport']])->count();
        $categorycomputersport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'computer']])->count();
        $categorypolitiksport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'politik']])->count();

        $categoryekonomi = Journal::where([['status','=', 'publish'],
        ['category', '=', 'ekonomi']])->get();
        return view('openviews.journalcategori.categoryjournalpage', [
            'data' => $categoryekonomi,
            'title' => "Ekonomi",
            'ekonomicate' => $categoryekonomicount,
            'sportcate' => $categorysportsport,
            'computercate' => $categorycomputersport,
            'politikcate' => $categorypolitiksport,
        ]);
    }
    public function sportcategory(){
        $categoryekonomicount = Journal::where([['status','=', 'publish'],
        ['category', '=', 'ekonomi']])->count();
        $categorysportsport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'sport']])->count();
        $categorycomputersport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'computer']])->count();
        $categorypolitiksport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'politik']])->count();

        $categorysport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'sport']])->get();
        return view('openviews.journalcategori.categoryjournalpage', [
            'data' => $categorysport,
            'title' => "Sports",
            'ekonomicate' => $categoryekonomicount,
            'sportcate' => $categorysportsport,
            'computercate' => $categorycomputersport,
            'politikcate' => $categorypolitiksport,
        ]);
    }
    public function computercategory(){
        $categoryekonomicount = Journal::where([['status','=', 'publish'],
        ['category', '=', 'ekonomi']])->count();
        $categorysportsport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'sport']])->count();
        $categorycomputersport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'computer']])->count();
        $categorypolitiksport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'politik']])->count();

        $categorycomputer = Journal::where([['status','=', 'publish'],
        ['category', '=', 'computer']])->get();
        return view('openviews.journalcategori.categoryjournalpage', [
            'data' => $categorycomputer,
            'title' => "Computer",
            'ekonomicate' => $categoryekonomicount,
            'sportcate' => $categorysportsport,
            'computercate' => $categorycomputersport,
            'politikcate' => $categorypolitiksport,
        ]);
    }
    public function politikcategory(){
        $categoryekonomicount = Journal::where([['status','=', 'publish'],
        ['category', '=', 'ekonomi']])->count();
        $categorysportsport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'sport']])->count();
        $categorycomputersport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'computer']])->count();
        $categorypolitiksport = Journal::where([['status','=', 'publish'],
        ['category', '=', 'politik']])->count();

        $categorypolitik = Journal::where([['status','=', 'publish'],
        ['category', '=', 'politik']])->get();
        return view('openviews.journalcategori.categoryjournalpage', [
            'data' => $categorypolitik,
            'title' => "Politik",
            'ekonomicate' => $categoryekonomicount,
            'sportcate' => $categorysportsport,
            'computercate' => $categorycomputersport,
            'politikcate' => $categorypolitiksport,
        ]);
    }
    public  function downloadpage($path){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $themejournal = $requestjournal->theme;
        $articlejournal = Article::where('path_jr', $path)->get();
        $requestannounc1 = Announcement::where('path_jr', $path)->get();
        if ($themejournal=="novelty") {
            return view('openviews.themejournal.scholarview.downloadpage.downloadpage',[
                'journal' => $requestjournal,
                'article' => $articlejournal
            ]);
        }  elseif ($themejournal=="classy") {
            return view('openviews.themejournals.downloadpage.downloadpage',[
                'journal' => $requestjournal,
                'article' => $articlejournal,
                'announc' => $requestannounc1,
            ]);
        }
    }
    public  function downloadfile($path, $filepath){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $themejournal = $requestjournal->theme;
        $articlejournal = Article::where('path_jr', $path)->get();
        $file= public_path(). "/file/journal/".$filepath;
        return Response::download($file, $filepath);
    }
    public  function downloadfilearticle($path, $filepath){
        $requestjournal = Journal::where('path', $path)->firstOrFail();
        $themejournal = $requestjournal->theme;
        $articlejournal = Article::where('path_jr', $path)->get();
        $file= public_path(). "/file/article/".$filepath;
        return Response::download($file, $filepath);
    }
}
