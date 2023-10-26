<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray($request)
    {
        $arr = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => strip_tags($this->description),
            'created_at' => Carbon::parse($this->create_at)->format('Y-m-d H:i'),
        ];
        $arr['user'] = new UserResource($this->user);
        $arr['comments'] = CommentResource::collection($this->comments);
        return $arr;
    }
}
