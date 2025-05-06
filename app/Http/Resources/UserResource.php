<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request)
  {
    return [
      't_user_id' => $this->t_user_id,
      't_user_nama' => $this->t_user_nama,
      't_user_email' => $this->t_user_email,
    ];
  }
}
