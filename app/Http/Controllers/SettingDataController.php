<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\About;
use App\Models\Announcement;
use App\Models\Issue;
use App\Models\Article;
use App\Models\Editors;
use App\Models\Account;
use App\Models\Populer;
use App\Models\RequestJournal;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SettingDataController extends Controller
{
    //Setting Main Interaction to Database
    public function settingsavejournal(Request $request, $idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        $journalimagefind = Journal::where('path', $reqpathjournal)->first();
        $imagejournal = $journalimagefind->thum;
        $journalfile = $journalimagefind->filejr;
        if ($requestaccount != null) {
            $journal->title = $request->title;
            $journal->path = $request->path;
            $journal->issn = $request->issn;
            $journal->desc = $request->desc;
            $journal->category = $request->category;
            if ($request->path != null) {
                About::where('journalpath', $reqpathjournal)->update(['journalpath' => $request->path]);
                Issue::where('path_jr', $reqpathjournal)->update(['path_jr' => $request->path]);
                Announcement::where('path_jr', $reqpathjournal)->update(['path_jr' => $request->path]);
                Article::where('path_jr', $reqpathjournal)->update(['path_jr' => $request->path]);
                Editors::where('path_jr', $reqpathjournal)->update(['path_jr' => $request->path]);
            }

            if ($image = $request->file('image')) {
                $destinationPath = 'image/cover/';
                $profileImage = date('YmdHis') . "_" . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $journal['thum'] = "$profileImage";
                $image1 = $imagejournal;
                File::delete(public_path("image/cover/$image1"));
            } else {
                unset($journal['image']);
            }
            if ($file = $request->file('filejournal')) {
                $destinationPath = 'file/journal/';
                $profileImage = date('YmdHis') . "_" . $file->getClientOriginalName();
                $file->move($destinationPath, $profileImage);
                $journal['filejr'] = "$profileImage";
                File::delete(public_path("file/journal/$journalfile"));
            }
            $journal->update();
            return back();
        }
    }

    // Publish & Unpublish Journal
    public function publishjournal($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $journal = Journal::find($idjr);
        if ($requestaccount != null) {
            $journal->status = 'publish';
            $journal->update();
            return back();
        }
    }
    public function unpublishjournal($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $journal = Journal::find($idjr);
        if ($requestaccount != null) {
            $journal->status = 'unpublish';
            $journal->update();
            return back();
        }
    }

    //Setting About Journal Interaction to Database
    public function settingsaveaboutjournal(Request $request, $idaccount, $idjr, $idabout)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $about = About::find($idabout);
        $reqpathjournal = $journal->path;
        if ($requestaccount != null) {
            $about->title_about = $request->titleabout;
            $about->journalpath = $reqpathjournal;
            $about->about = $request->content;
            $about->update();
            return back();
        }
    }



    //Setting Issue Journal Interaction to Database
    public function settingcreateissue(Request $request, $idaccount, $idjr)
    {

        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        $currentissue =  Issue::where([
            ['path_jr', '=', $reqpathjournal],
            ['current', '=', 'active'],
        ])->first();
        if ($currentissue != null) {
            $currentissue->current = null;
            $currentissue->update();
        }
        if ($requestaccount != null) {
            $issue = new Issue();
            $issue->judul = $request->titleissue;
            $issue->path_jr = $reqpathjournal;
            $issue->volume = $request->volume;
            $issue->published = $request->published;
            $issue->current = $request->current;
            if ($image = $request->file('image')) {
                $destinationPath = 'image/Issue/';
                $profileImage = date('YmdHis') . "_" . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $issue['image'] = "$profileImage";
            } else {
                unset($issue['image']);
            }
            $issue->save();
            return back();
        }
    }
    public function settingupdateissue(Request $request, $idaccount, $idjr, $idissue)
    {

        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        $currentissue =  Issue::where([
            ['path_jr', '=', $reqpathjournal],
            ['current', '=', 'active'],
        ])->first();

        if ($request->current == "active") {
            if ($currentissue != null) {
                $currentissue->current = null;
                $currentissue->update();
            }
        }
        if ($requestaccount != null) {
            $issueimagereq = Issue::find($idissue);
            $issue = Issue::find($idissue);
            $issue->judul = $request->titleissue;
            $issue->path_jr = $reqpathjournal;
            $issue->volume = $request->volume;
            $issue->published = $request->published;
            $issue->current = $request->current;
            $imageissue = $issueimagereq->image;
            if ($image = $request->file('image')) {
                $destinationPath = 'image/Issue/';
                $profileImage = date('YmdHis') . "_" . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $issue['image'] = "$profileImage";
                $image1 = $imageissue;
                File::delete(public_path("image/Issue/$image1"));
            } else {
                unset($issue['image']);
            }
            $issue->update();
            return back();
        }
    }
    public function settingdeleteissue($idaccount, $idjr, $idissue)
    {

        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        $issuecount = DB::table('issue')->where('path_jr', $reqpathjournal)->count();
        $issue = Issue::find($idissue);
        if ($issuecount > 1) {
            $reqmaycurrentissue = Issue::where('path_jr', $reqpathjournal)->latest()->get();
            $reqcurrent = $reqmaycurrentissue[1];
            if ($issue->current == "active") {
                $reqcurrent->current = "active";
                $reqcurrent->update();
            }
        }
        if ($requestaccount != null) {
            $issueimagereq = Issue::find($idissue);
            $imageissue = $issueimagereq->image;
            $image1 = $imageissue;
            File::delete(public_path("image/Issue/$image1"));
            $issue->delete();
            return back();
        }
    }




    //Setting Article Journal Interaction to Database
    public function settingcreatearticle(Request $request, $idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        if ($requestaccount != null) {
            $article = new Article();
            $article->judul_article = $request->titlearticle;
            $article->path_jr = $reqpathjournal;
            $article->id_issue = $request->idissue;
            $article->author = $request->author;
            $article->abstract = $request->abstract;
            $article->isi = $request->isi;
            if ($image = $request->file('image')) {
                $destinationPath = 'image/Issue/article/';
                $profileImage = date('YmdHis') . "_" . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $article['image'] = "$profileImage";
            } else {
                unset($article['image']);
            }
            if ($file = $request->file('filearticle')) {
                $destinationPath = 'file/article/';
                $profileImage = date('YmdHis') . "_" . $file->getClientOriginalName();
                $file->move($destinationPath, $profileImage);
                $article['filearticle'] = "$profileImage";
            }
            $article->save();
            return back();
        }
    }
    public function settingupdatearticle(Request $request, $idaccount, $idjr, $idarticle)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        $article = Article::find($idarticle);
        $articleimagereq = Article::find($idarticle);
        $imagearticle = $articleimagereq->image;
        $filearticle = $articleimagereq->filearticle;
        if ($requestaccount != null) {
            $article->judul_article = $request->titlearticle;
            $article->path_jr = $reqpathjournal;
            $article->id_issue = $request->idissue;
            $article->author = $request->author;
            $article->abstract = $request->abstract;
            $article->isi = $request->isi;
            if ($image = $request->file('image')) {
                $destinationPath = 'image/Issue/article/';
                $profileImage = date('YmdHis') . "_" . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $article['image'] = "$profileImage";
                $image1 = $imagearticle;
                File::delete(public_path("image/Issue/article/$image1"));
            } else {
                unset($article['image']);
            }
            if ($file = $request->file('filearticle')) {
                $destinationPath = 'file/article/';
                $profileImage = date('YmdHis') . "_" . $file->getClientOriginalName();
                $file->move($destinationPath, $profileImage);
                $article['filearticle'] = "$profileImage";
                File::delete(public_path("file/article/$filearticle"));
            }
            $article->update();
            return back();
        }
    }
    public function settingdeletearticle($idaccount, $idjr, $idarticle)
    {

        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        $article = Article::find($idarticle);
        if ($requestaccount != null) {
            $issueimagereq = Article::find($idarticle);
            $imageissue = $issueimagereq->image;
            $filearticle = $issueimagereq->filearticle;
            $image1 = $imageissue;
            File::delete(public_path("image/Issue/article/$image1"));
            File::delete(public_path("file/article/$filearticle"));
            $article->delete();
            return back();
        }
    }



    //Setting Announcement Journal Interaction to Database
    public function settingcreateannouncement(Request $request, $idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        if ($requestaccount != null) {
            $announcement = new Announcement();
            $announcement->title = $request->title;
            $announcement->path_jr = $reqpathjournal;
            $announcement->published = $request->published;
            $announcement->content = $request->content;
            $announcement->save();
            return back();
        }
    }
    public function settingupdateannouncement(Request $request, $idaccount, $idjr, $idannouncement)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        if ($requestaccount != null) {
            $announcement = Announcement::find($idannouncement);
            $announcement->title = $request->title;
            $announcement->path_jr = $reqpathjournal;
            $announcement->published = $request->published;
            $announcement->content = $request->content;
            $announcement->update();
            return back();
        }
    }
    public function settingdeleteannouncement(Request $request, $idaccount, $idjr, $idannouncement)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        if ($requestaccount != null) {
            $announcement = Announcement::find($idannouncement);
            $announcement->delete();
            return back();
        }
    }




    //Setting Editorialteam Journal Interaction to Database
    public function settingcreateeditorialteam(Request $request, $idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        if ($requestaccount != null) {
            $editors = new Editors();
            $editors->name = $request->name;
            $editors->path_jr = $reqpathjournal;
            $editors->affiliation = $request->affiliation;
            $editors->from = $request->from;
            if ($image = $request->file('image')) {
                $destinationPath = 'image/editors/';
                $profileImage = date('YmdHis') . "_" . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $editors['image'] = "$profileImage";
            } else {
                unset($editors['image']);
            }
            $editors->save();
            return back();
        }
    }
    public function settingupdateeditorialteam(Request $request, $idaccount, $idjr, $ideditorialteam)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        $editors = Editors::find($ideditorialteam);
        $editorsimagereq = Editors::find($ideditorialteam);
        $imageeditors = $editorsimagereq->image;
        if ($requestaccount != null) {
            $editors->name = $request->name;
            $editors->path_jr = $reqpathjournal;
            $editors->affiliation = $request->affiliation;
            $editors->from = $request->from;
            if ($image = $request->file('image')) {
                $destinationPath = 'image/editors/';
                $profileImage = date('YmdHis') . "_" . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $editors['image'] = "$profileImage";
                $image1 = $imageeditors;
                File::delete(public_path("image/editors/$image1"));
            } else {
                unset($editors['image']);
            }
            $editors->update();
            return back();
        }
    }
    public function settingdeleteeditorialteam($idaccount, $idjr, $ideditorialteam)
    {

        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $idjournal = $requestaccount->id_journal;
        $journal = Journal::find($idjournal);
        $reqpathjournal = $journal->path;
        $editors = Editors::find($ideditorialteam);
        if ($requestaccount != null) {
            $issueimagereq = Editors::find($ideditorialteam);
            $imageissue = $issueimagereq->image;
            $image1 = $imageissue;
            File::delete(public_path("image/editors/$image1"));
            $editors->delete();
            return back();
        }
    }









    //Setting Route for Admin--------------------------------

    //Admin Setting Journal
    public function adminnewjournal($idaccount)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        if ($requestaccount != null) {
            $journal = new Journal();
            $journal->title =  "NewJournal" . "_" . date('YmdHis');
            $journal->path =  date('YmdHis');
            $journal->save();
            $about = new About();
            $about->journalpath = date('YmdHis');
            $about->save();
            $populer = new Populer();
            $populer->path_jr = date('YmdHis');
            $populer->views = 0;
            $populer->save();
            return back();
        } else {
            return back();
        }
    }
    public function adminupdatejournal(Request $request, $idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        $journal = Journal::find($idjr);
        $reqpathjournal = $journal->path;
        $imagejournal = $journal->thum;
        $filejournal = $journal->filejr;
        if ($requestaccount != null) {
            if ($request->path != null) {
                About::where('journalpath', $reqpathjournal)->update(['journalpath' => $request->path]);
                Issue::where('path_jr', $reqpathjournal)->update(['path_jr' => $request->path]);
                Announcement::where('path_jr', $reqpathjournal)->update(['path_jr' => $request->path]);
                Article::where('path_jr', $reqpathjournal)->update(['path_jr' => $request->path]);
                Editors::where('path_jr', $reqpathjournal)->update(['path_jr' => $request->path]);
            }
            $journal->title = $request->title;
            $journal->path = $request->path;
            $journal->desc = $request->desc;
            $journal->issn = $request->issn;
            $journal->category = $request->category;
            $journal->theme = $request->theme;
            if ($image = $request->file('image')) {
                $destinationPath = 'image/cover/';
                $profileImage = date('YmdHis') . "_" . $image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $journal['thum'] = "$profileImage";
                $image1 = $imagejournal;
                File::delete(public_path("image/cover/$image1"));
            } else {
                unset($journal['image']);
            }
            if ($file = $request->file('filejournal')) {
                $destinationPath = 'file/journal/';
                $profileImage = date('YmdHis') . "_" . $file->getClientOriginalName();
                $file->move($destinationPath, $profileImage);
                $journal['filejr'] = "$profileImage";
                File::delete(public_path("file/journal/$filejournal"));
            }
            $journal->update();
            return back();
        } else {
            return back();
        }
    }
    public function admindeletejournal($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        $journal = Journal::find($idjr);
        $reqpathdeletejournal = $journal->path;
        if ($requestaccount != null) {
            $issueimagereq = Journal::find($idjr);
            $imageissue = $issueimagereq->image;
            $image1 = $imageissue;
            File::delete(public_path("image/editors/$image1"));
            $journal->delete();
            About::where('journalpath', $reqpathdeletejournal)->delete();
            Issue::where('path_jr', $reqpathdeletejournal)->delete();
            Announcement::where('path_jr', $reqpathdeletejournal)->delete();
            Article::where('path_jr', $reqpathdeletejournal)->delete();
            Editors::where('path_jr', $reqpathdeletejournal)->delete();
            return back();
        }
    }



    //Admin Setting Account
    public function adminnewaccount(Request $req, $idaccount)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        if ($requestaccount != null) {
            $account = new Account();
            $account->username = $req->username;
            $account->password =  $req->password;
            $account->status =  $req->role;
            if ($req->role != "guest") {
                $account->id_journal =  $req->idjournal;
            } elseif ($req->role == "guest") {
                $account->id_journal =  null;
            }
            $account->save();
            return back();
        } else {
            return back();
        }
    }
    public function adminupdateaccount(Request $req, $idaccount, $account_id)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        if ($requestaccount != null) {
            $account = Account::find($account_id);
            $account->username = $req->username;
            $account->password =  $req->password;
            $account->status =  $req->role;
            if ($req->role != "guest") {
                $account->id_journal =  $req->idjournal;
            } elseif ($req->role == "guest") {
                $account->id_journal =  null;
            }
            $account->update();
            return back();
        } else {
            return back();
        }
    }
    public function admindeleteaccount($idaccount, $account_id)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        $account = Account::find($account_id);
        if ($requestaccount != null) {
            $account->delete();
            return back();
        }
    }


    //Admin Setting Request
    public function admindeleterequest($idaccount, $idrequest)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['status', '=', "admin"],
        ])->first();
        $requestguest = RequestJournal::find($idrequest);
        if ($requestaccount != null) {
            $requestguest->delete();
            return back();
        }
    }




    //Admin Setting Request
    public function memberdeletejournal($idaccount, $idjr)
    {
        $requestaccount = Account::where([
            ['id', '=', $idaccount],
            ['id_journal', '=', $idjr],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "taufiq"],
        ])->orWhere([
            ['id', '=', $idaccount],
            ['status', '=', "nayif"],
        ])->first();
        $journal = Journal::find($idjr);
        $reqpathdeletejournal = $journal->path;
        if ($requestaccount != null) {
            $requestaccount->id_journal = null;
            $requestaccount->status = "guest";
            $requestaccount->save();
            $journal->delete();
            About::where('journalpath', $reqpathdeletejournal)->delete();
            Issue::where('path_jr', $reqpathdeletejournal)->delete();
            Announcement::where('path_jr', $reqpathdeletejournal)->delete();
            Article::where('path_jr', $reqpathdeletejournal)->delete();
            Editors::where('path_jr', $reqpathdeletejournal)->delete();
            return redirect('/' . $idaccount . '/journal');
        }
    }
}
