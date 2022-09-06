<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'image' => $this->product_image,
            'price' => number_format($this->price, 0,0,'.'),
            'discount' => $this->discount,
            'stock' => $this->stock,
            'sold' => $this->sold,
            'detail_product' => $this->detail_product,
            'created' => $this->created_at->format('d M Y h:i'),
            'category' => [
                'name' => $this->category->name,
                'slug' => $this->category->slug,
                'price' => $this->price
            ]
        ];
    }
}
