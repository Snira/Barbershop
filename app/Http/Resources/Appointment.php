<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Appointment extends Resource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $id = $this->id;
        return [
            'data'  => [
                'id'         => $id,
                'barber'     => $this->barber,
                'date'       => $this->date,
                'time'       => $this->time,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'links' => [
                'self' => "/api/appointment/". $id,
            ]
        ];
    }
}
