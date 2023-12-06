<?php

namespace App\Models;
use App\Models\Peoples;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = "clients";

    protected $fillable = ['people_id'];

    public function people() {
        return $this->hasOne(Peoples::class, 'id', 'people_id');
    }

}
