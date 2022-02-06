<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Nop;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth::id());

        if ($user->is_admin) {
            $notes = DB::table('notes')
                ->join('users', 'users.id', '=', 'notes.user_id')->get();
            return view('home', ['notes' => $notes]);
        }
        $notes = DB::table('notes')
            ->join('users', 'users.id', '=', 'notes.user_id')->where('users.id', '=', $user->id)->get();
        return view('home', ['notes' => $notes]);
    }

    public function create_message(Request $req)
    {

        $valid = $req->validate(
            [
                'phone' => 'required|digits:11',
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]
        );

        $note = new Note();

        $note->phone = $req->input('phone');
        $note->message = $req->input('message');
        $note->user_id = $req->input('user_id');

        $note->save();

        return redirect()->route('home');
    }
    public function delete_message($id)
    {
        $note = Note::where('note_id', $id)->delete();
        return redirect()->route('home');
    }

    public function edit($note_id)
    {
        $req = DB::table('notes')
            ->join('users', 'users.id', '=', 'notes.user_id')->where('notes.note_id', '=', $note_id)->get();
        return view('admins.edit', ['req' => $req]);
    }

    public function update_message(Request $req)
    {
        Note::where('note_id', $req->input('note_id'))->update([
            'phone' => $req->input('phone'),
            'message' => $req->input('message')
        ]);

        return redirect()->route('home');
    }
}
