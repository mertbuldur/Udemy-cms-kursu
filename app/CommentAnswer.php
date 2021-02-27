<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentAnswer extends Model
{
    protected  $guarded = [];

    static function getMessageControl($commentId)
    {
        return (CommentAnswer::where('commentId',$commentId)->count() != 0) ? true : false;
    }
    static function getMessage($commentId)
    {

        if(self::getMessageControl($commentId))
        {
            $w = CommentAnswer::where('commentId',$commentId)->get();
            return $w[0]['text'];
        }
        else
        {
            return "";
        }
    }

    static function getField($commentId,$field)
    {
        if(self::getMessageControl($commentId))
        {
            $w = CommentAnswer::where('commentId',$commentId)->get();
            return $w[0][$field];
        }
        else
        {
            return "";
        }
    }
}
