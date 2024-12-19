<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostDetailResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'news_content' => $this->news_content,
            'created_at' =>  date("Y-m-d", strtotime($this->created_at)),
            'author' => $this->writer->username,
            'writer' => $this->whenLoaded('writer'),
            'comments' =>  $this->whenLoaded('comments', function() {
                return collect($this->comments)->each(function($comment){
                    $comment->commentator;
                    return $comment;
                });
            }),
            'comments_count' => $this->whenLoaded('comments', function() {
                return count($this->comments);
            })
        ];
    }
}
