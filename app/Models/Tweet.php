<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [

      
      'content',
      'parent_tweet_id',
    ];
    
    public function user(){

        return $this->belongsTo(User::class);
    }

    //التغريده الي قاعد ارد عليها
    public function parentTweet()
    {
    return $this->belongsTo(Tweet::class,'parent_tweet_id');
}

//التغريدات الي ردت عليا مباشرة
public function childTweets(){

  return $this->hasMany(Tweet::class,'parent_tweet_id');


}

//التغريده الاساسية الي بدات كل شيء
public function baseTweet(){

  return $this->belongsTo(Tweet::class,'base_tweet_id');


}

// كل الردود على تغريدتي حتى الغير مباشر
public function descendantsTweets(){

  return $this->hasMany(Tweet::class,'base_tweet_id');


}

}