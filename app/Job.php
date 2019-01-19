<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = ['position','company_id'];

    public function getSpecificSelectData() {
        $mappedData = [];
        $result = DB::select("SELECT concat(`position`, '  - ', `created_at`) as `customValue`, `id` FROM jobsdb.jobs;");
        if (!empty($result)) {
            foreach($result as $key => $value) {
                $mappedData[$value->id] = $value->customValue;
            }
        }

        return $mappedData;
    }
}
