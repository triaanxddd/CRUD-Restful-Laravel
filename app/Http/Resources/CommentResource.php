<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id"=> $this->id,
            "post_id" => $this->post_id,
            "user_id" => $this->user_id,
            "comment_content" => $this->comment_content,
            "commentator" => $this->whenLoaded("commentator"),
            "created_at" => date_format($this->created_at, "Y-m-d H:i:s"),
        ];
    }
}
