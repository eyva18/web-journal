<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\About;
use App\Models\Announcement;
use App\Models\Issue;
use App\Models\Article;
use App\Models\Editors;
use App\Models\Account;
use App\Models\RequestJournal;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Setting Route
    public function settingabout($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requestabout = About::where('journalpath', $reqpathjournal)->first();
        if ($requestaccount != null) {
            return view('settingjournal.mainsetting.settingabout', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'about' => $requestabout,
                'title' => "aboutset",
                'pathjournal' => $reqpathjournal
            ]);
        } else {
            return back();
        }
    }



    // Setting Route for Issue 
    public function settingissue($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requestissue = Issue::where('path_jr', $reqpathjournal)->get();
        if ($requestaccount != null) {
            return view('settingjournal.settingissue.settingissue', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'issue' => $requestissue,
                'title' => "issueset",
                'pathjournal' => $reqpathjournal
            ]);
        } else {
            return back();
        }
    }

    public function createissue($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requestissue = Issue::where('path_jr', $reqpathjournal)->get();
        if ($requestaccount != null) {
            return view('settingjournal.settingissue.createissue', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'issue' => $requestissue,
                'title' => "issueset",
                'pathjournal' => $reqpathjournal
            ]);
        } else {
            return back();
        }
    }
    public function editissue($idaccount, $idjr, $idissue)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requestissue = Issue::where('id', $idissue)->first();
        if ($requestaccount != null) {
            return view('settingjournal.settingissue.editissue', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'issue' => $requestissue,
                'title' => "issueset",
                'pathjournal' => $reqpathjournal
            ]);
        } else {
            return back();
        }
    }




    // Setting Route for Article 
    public function settingarticle($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requestarticle = Article::where('path_jr', $reqpathjournal)->get();
        if ($requestaccount != null) {
            return view('settingjournal.settingarticle.settingarticle', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'article' => $requestarticle,
                'title' => "articleset",
                'pathjournal' => $reqpathjournal
            ]);
        } else {
            return back();
        }
    }
    public function createarticle($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requestarticle = Article::where('path_jr', $reqpathjournal)->get();
        $requestissue = Issue::where('path_jr', $reqpathjournal)->get();
        if ($requestaccount != null) {
            return view('settingjournal.settingarticle.createarticle', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'article' => $requestarticle,
                'title' => "articleset",
                'pathjournal' => $reqpathjournal,
                'issue' => $requestissue
            ]);
        } else {
            return back();
        }
    }
    public function editarticle($idaccount, $idjr, $idarticle)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requestarticle = Article::where('id', $idarticle)->first();
        $requestissue = Issue::where('path_jr', $reqpathjournal)->get();
        if ($requestaccount != null) {
            return view('settingjournal.settingarticle.editarticle', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'article' => $requestarticle,
                'title' => "articleset",
                'pathjournal' => $reqpathjournal,
                'issue' => $requestissue
            ]);
        } else {
            return back();
        }
    }


    // Setting Route for Announcement 
    public function settingannouncement($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requestannounc = Announcement::where('path_jr', $reqpathjournal)->get();
        if ($requestaccount != null) {
            return view('settingjournal.settingannounc.settingannounc', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'announc' => $requestannounc,
                'title' => "announcset",
                'pathjournal' => $reqpathjournal
            ]);
        } else {
            return back();
        }
    }
    public function createannouncement($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requestannounc = Announcement::where('path_jr', $reqpathjournal)->get();
        if ($requestaccount != null) {
            return view('settingjournal.settingannounc.createannounc', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'announc' => $requestannounc,
                'title' => "announcset",
                'pathjournal' => $reqpathjournal,
            ]);
        } else {
            return back();
        }
    }
    public function editannouncement($idaccount, $idjr, $idannouncement)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requestannounc = Announcement::where('id', $idannouncement)->first();
        if ($requestaccount != null) {
            return view('settingjournal.settingannounc.editannounc', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'announc' => $requestannounc,
                'title' => "announcset",
                'pathjournal' => $reqpathjournal,
            ]);
        } else {
            return back();
        }
    }

    // Setting Route for Editorial Team 
    public function settingeditorialteam($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requesteditorialteam = Editors::where('path_jr', $reqpathjournal)->get();
        if ($requestaccount != null) {
            return view('settingjournal.editorialsetting.editorsetting', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'editorialteam' => $requesteditorialteam,
                'title' => "editorset",
                'pathjournal' => $reqpathjournal
            ]);
        } else {
            return back();
        }
    }
    public function createeditorialteam($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requesteditorialteam = Editors::where('path_jr', $reqpathjournal)->get();
        if ($requestaccount != null) {
            return view('settingjournal.editorialsetting.editorcreate', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'editorialteam' => $requesteditorialteam,
                'title' => "editorset",
                'pathjournal' => $reqpathjournal,
            ]);
        } else {
            return back();
        }
    }
    public function editeditorialteam($idaccount, $idjr, $ideditorialteam)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $requestjournal = Journal::where('id', $idjournal)->firstOrFail();
        $reqpathjournal = $requestjournal->path;
        $requesteditorialteam = Editors::where('id', $ideditorialteam)->first();
        if ($requestaccount != null) {
            return view('settingjournal.editorialsetting.editoredit', [
                'account' => $requestaccount,
                'journal' => $requestjournal,
                'editorialteam' => $requesteditorialteam,
                'title' => "editorset",
                'pathjournal' => $reqpathjournal,
            ]);
        } else {
            return back();
        }
    }


    //Setting Route for Admin--------------------------------
    
    //Admin Journal
    public function admineditjournal($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        if ($requestaccount != null) {
            $journaledit = Journal::find($idjr);
            return view('settingjournal.mainsetting.admin.adminjournal.editadminjournal', [
                'account' => $requestaccount,
                'journal' => $journaledit,
                'title' => 'adminjournal'

            ]);
        } else {
            return back();
        }
    }

    //Admin Account
    public function adminaccount($idaccount)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        if ($requestaccount != null) {
            $account = Account::all();
            return view('settingjournal.mainsetting.admin.adminaccount.adminaccount', [
                'account' => $requestaccount,
                'dataaccount' => $account,
                'title' => 'adminaccount'
            ]);
        } else {
            return back();
        }
    }
    public function admincreateaccount($idaccount)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        if ($requestaccount != null) {
            $journal = Journal::all();
            return view('settingjournal.mainsetting.admin.adminaccount.adminaccountcreate', [
                'account' => $requestaccount,
                'title' => 'adminaccount',
                'journal' => $journal
            ]);
        } else {
            return back();
        }
    }
    public function admineditaccount($idaccount, $account_id)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        if ($requestaccount != null) {
            $accountedit = Account::find($account_id);
            $journal = Journal::all();
            return view('settingjournal.mainsetting.admin.adminaccount.admineditaccount', [
                'account' => $requestaccount,
                'accountedit' => $accountedit,
                'title' => 'adminaccount',
                'journal' => $journal

            ]);
        } else {
            return back();
        }
    }

    //Admin Request
    public function adminrequest($idaccount)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        if ($requestaccount != null) {
            $requestforjournal = RequestJournal::all();
            return view('settingjournal.mainsetting.admin.adminrequest.requestpage', [
                'account' => $requestaccount,
                'request' => $requestforjournal,
                'title' => 'adminrequest'
            ]);
        } else {
            return back();
        }
    }

}
