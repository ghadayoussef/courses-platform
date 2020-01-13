<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\Comment;
use App\Http\Resources\CommentResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    { $teacher=User::find($this->user_id);
        return [
            'name' => $this->name,
            'price' => $this->price,
            'start_date' => date('d-m-Y',strtotime($this->start_date)),
            'end_date' => date('d-m-Y',strtotime($this->end_date)),
            'teacher_name'=>$teacher->name,
            'comments'=>CommentResource::collection($this->comments()->where('status', 1)->get())
        ];
    }
}
