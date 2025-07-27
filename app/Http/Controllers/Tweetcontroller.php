<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTweetRequest;
use Illuminate\Http\Request;    
use App\Models\Tweet;
class Tweetcontroller extends Controller
{
    function index(){


     $tweets =    Tweet::query()
          ->where('parent_tweet_id',null)
          ->orderByDesc('created_at')
          ->limit(1000)
          ->get();


         return view( 'home' ,compact('tweets'));
       
       
    }


    function view(Tweet $tweet){


       

        return view('tweet.view' , compact('tweet'));
    }

    function store(StoreTweetRequest $request){

       $tweet = Auth::user()->tweets()->create($request->validated());
         
        if($tweet->parentTweet()->exists()){
            $tweet->baseTweet()->associate($tweet->parentTweet->baseTweet->id)->save();



        }else{
                   $tweet->baseTweet()->associate($tweet)->save();

        }




        return redirect()->back();


    }
}
