<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'category_id' => $this->category_id,
            'category' => $this->category->friendly_name,
            'sale_from' => $this->sale?->start,
            'sale_end' => $this->sale?->end,
            'created_at' => $this->created_at,
            'price' => $this->price,
            $this->mergeWhen($this->sale != null, [
                    'price_with_sale' => $this->price - ($this->price * ($this->sale?->sale / 100))
                ]
            ),
            $this->mergeWhen($this->sale == null, [
                    'price_with_sale' => null
                ]

            ),
            'quantity' => $this->quantity,
            'rate' => $this->avgRating()
        ];
    }
}
