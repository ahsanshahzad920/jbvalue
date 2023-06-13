<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class items extends Model
{
    use HasFactory;
    protected $casts = [
        'value_yesterday_avg_value' => 'integer',
    ];
    /**
     * Get all of the valueHistory for the items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valueHistory()
    {
        return $this->hasMany(valueHistory::class, 'item_id', 'id');
    }

    /**
     * Get the value associated with the items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function value()
    {
        return (int)$this->hasOne(ValueHistory::class, 'item_id', 'id')->whereDate('created_at',Carbon::now()->subDay())->select(DB::raw("AVG(value) as avg_value"))->get()[0]->avg_value;
    }

    /**
     * Get the value associated with the items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function valueYesterday()
    {
        return $this->hasOne(ValueHistory::class, 'item_id', 'id')->whereDate('created_at',Carbon::now()->subDay());
    }


}
