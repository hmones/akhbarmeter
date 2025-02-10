<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    public function toArray($request): array
    {
        $teamMember = $this->whenLoaded('teamMember', function () {
            return (new TeamMemberResource($this->teamMember))->toArray(request());
        });

        $tags = $this->whenLoaded('tags', function () {
            return (TagResource::collection($this->tags))->toArray(request());
        });

        return [
            'title'                     => $this->title,
            'sub_title'                 => $this->sub_title,
            'slug'                      => $this->slug,
            'description'               => $this->description,
            'brief_description_summary' => $this->brief_description_summary,
            'claim_reference'           => $this->claim_reference,
            'fact_check_reference'      => $this->fact_check_reference,
            'legal_statement'           => $this->legal_statement,
            'correction_statement'      => $this->correction_statement,
            'image'                     => $this->image,
            'author_name'               => $this->author_name,
            'author_avatar'             => $this->author_avatar,
            'type'                      => $this->type,
            'published_at'              => $this->published_at,
            'active'                    => $this->active,
            'updated_at'                => $this->updated_at,
            'teamMember'                => $teamMember,
            'tags'                      => $tags
        ];
    }
}
