<?php

namespace App\Http\Resources\UserAddresses;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Cities\CitiesResource;
use App\Http\Resources\Cities\AreasResource;

class UserAddressResource extends JsonResource
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
            'address' => $this->address,
            'description' => $this->description,
            'city' => new CitiesResource($this->city),
            'area' => new AreasResource($this->area),
            'district' => $this->district,
            'street' => $this->street,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'is_default' => $this->is_default
        ];
    }
}
