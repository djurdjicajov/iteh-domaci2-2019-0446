<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'id' => $this->resource->id,
            'model_name' => $this->resource->model_name,
            'description' => $this->resource->description,
            'color' => $this->resource->color,
            'price' => $this->resource->price,
            'manufacturer' => $this->resource->manufacturer,
            'type' => new TypeResource($this->resource->type)
        ];
    }

    public static $wrap = 'vehicle';
}
