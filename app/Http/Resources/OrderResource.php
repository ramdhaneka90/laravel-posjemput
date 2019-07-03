<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name_receiver'    => $this->name_receiver,
            'name_order'         => $this->name_order,
            'category'         => $this->category,
            'quantity'         => $this->quantity,
            'weight'        =>  $this->weight,
            'address_receiver'       => $this->address_receiver,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
          ];
    }
}
