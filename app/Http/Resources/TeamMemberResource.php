<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'fullName'  => $this->first_name . ' ' . $this->last_name,
            'jobTitle'  => $this->job_title,
            'bio'       => $this->bio,
            'image'     => $this->image,
            'linkedIn'  => $this->linked_in,
            'email'     => $this->email,
            'createdAt' => $this->created_at,
        ];
    }
}
