<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        $arr = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
        return $arr;
    }
}
