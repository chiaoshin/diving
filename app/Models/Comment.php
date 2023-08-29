<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getLikesAttribute() {
        return UserLike::where([['link_id', '=', $this->id], ['link_type', '=', 'comment']])->count();
    }

    public static function deleteComment($id) {
        # 刪除所有子層的留言
        $comments = self::where('parent_id', $id)->get();

        foreach ($comments as $key => $comment) {
            self::deleteComment($comment->id);

        }

        self::find($id)->delete();
    }

    public static function getCommentTree($post_id) {
        $comments = self::where(['post_id' => $post_id, 'level' => 1])->get();

        $result = [];

        foreach ($comments as $comment) {
            $tmp = [];

            $result["comment_" . $comment->id] = [
                'id' => $comment->id,
                'content' => $comment->content,
                'level' => $comment->level,
                'creator' => $comment->user->name,
                'created_at' => $comment->created_at,
                'like_count' => $comment->likes,
                'is_like' => UserLike::where([['user_id', '=', auth()->user()->id], ['link_id', '=', $comment->id], ['link_type', '=', 'comment']])->exists(),
                'children' => self::getChildComment($comment->id, $tmp)
            ];
        }

        return $result;
    }

    protected static function getChildComment($parent_id, &$result) {
        $comments = self::where('parent_id', $parent_id)->get();

        foreach ($comments as $comment) {
            $tmp = [];

            $result["comment_" . $comment->id] = [
                'id' => $comment->id,
                'content' => $comment->content,
                'level' => $comment->level,
                'creator' => $comment->user->name,
                'created_at' => $comment->created_at,
                'like_count' => $comment->likes,
                'is_like' => UserLike::where([['user_id', '=', auth()->user()->id], ['link_id', '=', $comment->id], ['link_type', '=', 'comment']])->exists(),
                'children' => self::getChildComment($comment->id, $tmp)
            ];
        }

        return $result;
    }

}
