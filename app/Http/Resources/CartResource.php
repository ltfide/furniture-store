<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'quantity' => $this->quantity,
            'data' => [
                'id' => $this->product->id, 
                'title' => $this->product->title,
                'slug' => $this->product->slug,
                'product_image' => $this->product->product_image,
                'price' => $this->product->price,
            ] 
        ];
    }
}
