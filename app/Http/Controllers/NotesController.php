<?php

namespace App\Http\Controllers;

use App\Card;
use App\Note;
use Illuminate\Http\Request;
use App\Http\Requests;

 
class NotesController extends Controller
{
    //



    public function store(Request $request, Card $card)
    {
        $this->validate($request, [
            'body'=> 'required|min:5|max:140'
            ]);
         $note = new Note($request->all());
        $note->user_id = $request->user()->id;
        $card->notes()->save($note);
        session()->flash('flash_message', 'Wow, Note Created');
    	return back();
    }


    public function edit(Note $note)
    {
        
    	return view('note.edit', compact('note'));
    }


    public function update(Request $request, Note $note)
    {
    	$note->update($request->all());
    	return redirect('card');
    }

    
    public function delete(Request $request, Note $note)
    {
        $note->delete();
        session()->flash('flash_message', 'Sorry, Note Deleted!!!');
        return redirect('card');
    }

}
