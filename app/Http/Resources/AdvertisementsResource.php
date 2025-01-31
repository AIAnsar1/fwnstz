<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'photos' => $this->photos,
            'options' => $this->options,
            'price' => $this->price,
            'square' => $this->square,
            'we_can_agree' => $this->we_can_agree,
            'address' => $this->address,
            'type' => $this->type,
            'user_id' => $this->whenLoaded('users', function () {
                return [
                    'name' => $this->name,
                    'surname' => $this->surname,
                    'email' => $this->email,
                    'phone' => $this->phone,
                ];
            }),
            'category_id' => $this->whenLoaded('categories', function () {
                return AdvertisementsResource::collection($this->category_id);
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
