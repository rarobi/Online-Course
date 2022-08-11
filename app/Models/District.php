<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Upazilla;
use App\Models\Division;
use App\Models\Area;

class District extends Model
{
    protected $table = 'location_districts';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_by', 'updated_by', 'deleted_by', 'deleted_at', 'created_at', 'updated_at'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function upazilla()
    {
        return $this->hasMany(Upazilla::class, 'district_id');
    }

    public function areas()
    {
        return $this->hasMany(Area::class, 'district_id');
    }
}
