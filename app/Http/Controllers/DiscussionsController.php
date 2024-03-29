<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Discussions;
use App\DiscussionReplies;
use Auth;

class DiscussionsController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }

    public function index()
    {
        $discussions = $this->getDiscussions();

        return view('user.discussions', [
          'discussions' => $discussions,
        ]);
    }

    public function saveNewDiscussion(Request $request){


        $discussion = new Discussions;
        $discussion->title = $request->discussionTitle;
        $discussion->content = $request->discussionContent;;
        $discussion->channels = $request->discussionChannel;
        $discussion->user_id = Auth::user()->id;
        $discussion->user = Auth::user()->name;
        $discussion->save();

        return redirect('/discussions');
    }

    public function addDiscussion()
    {
        return view('user.discussions.add');
    }

    public function view($id)
    {
    $discussion = Discussions::
        where('id', $id)
        ->with('discussionReplies')
        ->first();
       return view('user.discussions.view', [
         'discussion' => $discussion,
       ]);
    }

    public function getDiscussions() {
       return Discussions::
        orderBy('created_at', 'desc')
        ->with('discussionReplies')
        ->Paginate(10);
    }

    public function delete($id)
    {
        $deletedRows = DiscussionReplies::where('discussions_id', $id)->delete();
        $discussion = Discussions::find($id);
        $discussion->delete();

        return redirect('/discussions');
    }
}
