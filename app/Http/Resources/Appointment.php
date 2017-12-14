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
        Resource::withoutWrapping();
        $id = $this->id;
        return [
            'id'         => $id,
            'barber'     => $this->barber,
            'date'       => $this->date,
            'time'       => $this->time,
            '_links' => [
                'self' => [
                    "href" => "http://gbhavelaar.nl/api/appointments/".$id
                ],
                'collection' => [
                    "href" => "http://gbhavelaar.nl/api/appointments"
                ]

            ]

        ];
    }
}
