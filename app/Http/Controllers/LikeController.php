<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLike;
use App\Models\Post;
use App\Models\Comment;

class LikeController extends Controller
{
    public function like(Request $request) {
        $data = $request->validate([
            'link_id' => 'required',
            'link_type' => 'required|in:post,comment'
        ]);

        if ($data['link_type'] == 'post') {
            $classes = Post::class;
        }else{
            $classes = Comment::class;
        }

        // 如果按讚紀錄存在就改成刪除
        if (UserLike::where([
            ['link_id', '=', $data['link_id']],
            ['link_type', '=', $data['link_type']],
            ['user_id', '=', auth()->user()->id]
        ])->exists()) {
            UserLike::where([
                ['link_id', '=', $data['link_id']],
                ['link_type', '=', $data['link_type']],
                ['user_id', '=', auth()->user()->id]
            ])->delete();
        }else{
            $data['user_id'] = auth()->user()->id;

            UserLike::create($data);
        }

        $new_count = $classes::find($data['link_id'])->likes;

        return response()->json(['status_code' => 'success', 'status_message' => 'Success', 'new_count' => $new_count]);
    }
}
