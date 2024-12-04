<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Notification;
use App\Models\ConversationMember;
use RealRashid\SweetAlert\Facades\Alert;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        $authUser = auth()->user();
        $companyId = $request->query('company_id');
        if (!$request->has(key: 'company_id')) {
            Alert::warning('Please select a company to follow.', 'warning');
            return redirect()->back();
        }

        $alreadyFollowing = Follow::where('company_id', $companyId)
            ->where('follower_id', $authUser->id)
            ->exists();

        if ($alreadyFollowing) {
            Alert::warning('You are already following this company.', 'warning');
            return redirect()->back();
        }

        Follow::create([
            'company_id' => $companyId,
            'follower_id' => $authUser->id,
        ]);

        return redirect()->back();
    }

    public function respond(Request $request)
    {
        $request->validate([
            'follow_id' => 'required|exists:follows,id',
            'response' => 'required|in:accepted,rejected',
        ]);

        $follow = Follow::find($request->follow_id);

        $author = auth()->user();

        $company = $author->company;
        if ($follow->company_id !== $company->id) {
            Alert::warning('You are not authorized to respond to this follow request.', 'warning');
            return redirect()->back();
        }

        $follow->status = $request->response;
        $follow->save();

        if ($request->response === 'accepted') {

            $conversation = Conversation::create([
                'name' => $company->title . ' - ' . $follow->follower->name,
            ]);

            ConversationMember::create([
                'conversation_id' => $conversation->id,
                'user_id' => $author->id,
                'is_admin' => true
            ]);

            ConversationMember::create([
                'conversation_id' => $conversation->id,
                'user_id' => $follow->follower_id,
            ]);

            Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $author->id,
                'content' => 'Welcome to ' . $company->title . '!',
            ]);

            Notification::create([
                'user_id' => $follow->follower_id,
                'title' => 'Follow Request Accepted',
                'body' => $company->title . ' has accepted your follow request. You can now chat with them in the company dashboard.
                                            go to the company dashboard to start a conversation.',
            ]);
        }

        Alert::success('Follow request responded successfully.', 'success');
        return redirect()->back();
    }


    public function dashboard()
    {
        $company = auth()->user()->company;
        $follows = $company->followers()->where('status', 'accepted')->paginate(10);

        return view('account.follow', compact('follows'));
    }
}
