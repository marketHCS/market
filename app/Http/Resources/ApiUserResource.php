<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\MarketUser;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $relations = MarketUser::where('user_id', '=', $this->id)->where('is_main', '=', true)->get();
        $markets = [];

        foreach ($relations as $relation) {
            $toPush = $relation->market()->get()[0];
            $toPush->role = $relation->role()->get()[0]->role;
            $toPush->logo = url('/')."/".$toPush->logo;
            $toPush->type = $toPush->type()->get()[0]->name;
            $toPush->relation_id = $relation->id;

            unset($toPush->user_id, $toPush->location_id, $toPush->type_id);

            array_push($markets, $toPush);
        }

        return [
            'name' => $this->name,
            'profile_photo_url' => $this->img,
            'email' => $this->email,
            'markets' => $markets
        ];
    }
}
