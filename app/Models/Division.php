<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Upazilla;
use App\Models\Division;
use App\Models\Area;

class Division extends Model
{
    protected $table = 'location_divisions';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_by', 'updated_by', 'deleted_by', 'deleted_at', 'created_at', 'updated_at'];

    public function districts()
    {
        return $this->hasMany(District::class, 'division_id');
    }

    public function upazillas()
    {
        return $this->hasManyThrough(Upazilla::class, District::class);
    }

    public function areas()
    {
        return $this->hasManyThrough(Area::class, District::class);
    }
}
