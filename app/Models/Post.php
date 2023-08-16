<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasFactory, HasTags;

    protected $guarded = [];
    protected $table = "post";

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getImageUrlAttribute() {
        if ($this->preview_img_url) {
            return asset(str_replace('public', 'storage', $this->preview_img_url));
        }else{
            return asset('img/forum/features/random1.jpg');
        }
    }

    public static function createPost($data) {
        try {
            DB::transaction(function () use ($data) {
                if (!is_null($data['file'])) {
                    $file = $data['file'];
                    $file_name = md5_file($file->getRealPath()).'.jpg';
                    $file_path = $file->storeAs('public/uploads', $file_name);

                    $data['preview_img_url'] = $file_path;
                }

                unset($data['file']);
                
                $data['user_id'] = auth()->user()->id;
                
                $model = self::create($data);

                if (isset($data['tags']) && count($data['tags']) > 0) {
                    $model->attachTags($data['tags']);
                }
            });

            return [
                'status_code' => 'success',
                'status_message' => '新增成功'
            ];
        } catch (\Throwable $th) {
            Log::error($th);

            return [
                'status_code' => 'error',
                'status_message' => '新增失敗'
            ];
        }
    }

    public static function updatePost($id, $data) {
        try {
            DB::transaction(function () use ($data, $id) {
                if (isset($data['tags'])){
                    $tags = $data['tags'];
                }else{
                    $tags = [];
                }
                
                $model = self::find($id);
                
                $model->update($data);
                $model->syncTags($tags);
            });

            return [
                'status_code' => 'success',
                'status_message' => '新增成功'
            ];
        } catch (\Throwable $th) {
            Log::error($th);

            return [
                'status_code' => 'error',
                'status_message' => '新增失敗'
            ];
        }
    } 
}
