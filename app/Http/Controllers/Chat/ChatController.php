<?php


namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        return view('pages.users');
    }

    public function listUsers(Request $request)
    {
        if ($request->search) {
            $users = User::where('name', 'like', '%'.$request->search. '%')
                ->where('id', '!=', Auth::id())->get();
        } else {
            $users = User::all()->except(Auth::id());
        }


        $currentUser = Auth::user();
        foreach ($users as $user) {
            $message = Message::where(function ($query) use ($user, $currentUser){
                    $query->where('sender', $user->id)
                        ->where('receiver', $currentUser->id);
                })->orWhere(function ($query) use ($user, $currentUser){
                    $query->where('sender', $currentUser->id)
                    ->where('receiver', $user->id);
                })->orderBy('created_at', 'DESC')
                ->first();
            $user->message = $message && $message->sender === $currentUser->id ? 'You: ' : '';
            $user->message .= $message ? $message->text : 'No message available';

        }

        return view('components.list-users',
            [
                'users' => $users,
                'currentUser' => $currentUser
            ]
        );
    }

    public function chat($id)
    {
        $user = User::find($id);

        return view('pages.chat',
            [
                'user' => $user,
            ]
        );
    }

    public function conversation($id)
    {
        $user = User::find($id);
        $currentUser = Auth::user();
        $messages = Message::where(function ($query) use ($user, $currentUser){
                $query->where('sender', $user->id)
                    ->where('receiver', $currentUser->id);
            })->orWhere(function ($query) use ($user, $currentUser){
                $query->where('sender', $currentUser->id)
                    ->where('receiver', $user->id);
            })->orderBy('created_at')
            ->get();

        if ($messages) {
            $messages = $messages->map(function ($message) use ($currentUser) {
                $message->outgoing = $message->sender === $currentUser->id ? true : false;
                return $message;
            });
        }


        return view('components.conversation',
            [
                'user' => $user,
                'messages' => $messages
            ]
        );
    }

    public function sendMessage(Request $request, $id)
    {
        $user = User::find($id);
        $currentUser = Auth::user();
        Message::create([
            'sender' => $currentUser->id,
            'receiver' => $user->id,
            'text' => $request->message
        ]);
    }

}
