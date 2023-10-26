<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
       $arr = [
           'id' => $this->id,
           'comment' => $this->comment,
           'created_at' => Carbon::parse($this->create_at)->format('Y-m-d H:i'),
       ];
       $arr['user'] = new UserResource($this->user);
       return $arr;
    }
}
