<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'content' => 'string|required',
            'parent_id' => 'nullable|exists:comment,id',
            'post_id' => 'nullable|exists:post,id',
        ]);

        $data['user_id'] = auth()->user()->id;

        # 如果有設定 parent_id, 就指定 level id
        if (isset($data['parent_id'])){
            $data['level'] = Comment::find($data['parent_id'])->level + 1;
        }

        Comment::create($data);

        return response()->json(['status_code' => 'success', 'status_message' => '已留言']);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'content' => 'string|required',
        ]);

        # 檢查留言者跟當前登入者是否是同一個人
        $comment = Comment::find($id);

        if ($comment->user_id != auth()->user()->id) {
            return response()->json(['status_code' => 'error', 'status_message' => '沒有權限']);
        }

        $comment->update($data);

        return response()->json(['status_code' => 'success', 'status_message' => '已更新']);
    }

    public function destroy(Request $request, $id) {
        $comment = Comment::find($id);

        if ($comment->user_id != auth()->user()->id) {
            return response()->json(['status_code' => 'error', 'status_message' => '沒有權限']);
        }

        Comment::deleteComment($id);

        return response()->json(['status_code' => 'success', 'status_message' => '已刪除']);
    }
}
