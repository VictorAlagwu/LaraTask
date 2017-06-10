<?php

namespace App\Http\Controllers;


use App\Card;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;


class CardsController extends Controller
{
    //Controller for handling cards created by users
    




    public function index(){
        $cards = Card::all();
    	return view('card.index', compact('cards'));
    }

    public function show(Card $card){
        $card->load('notes.user');
        return view('card.show', compact('card'));
    }

    public function create(Request $request){
        $card = new Card($request->all());  
        $card->user_id = $request->user()->id;
        $card->save();
        session()->flash('flash_message', 'Wow, Card Created!');
        return redirect('/card');

    }

    public function delete(Request $request, Card $card){
        $card -> delete();
        session()->flash('flash_message', 'Sorry, Card Deleted!.');
        return redirect('card');
    }





}
