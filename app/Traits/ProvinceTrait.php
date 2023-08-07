<?php

namespace App\Traits;

use App\Models\Regency;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

trait ProvinceTrait
{
    /**
     * Province has many districts.
     */
    public function districts(): HasManyThrough
    {
        return $this->hasManyThrough(Regency::class);
    }

    /**
     * check if province has districts by name.
     */
    public function hasDistrictName(string|array $name, bool $requireAll = false): bool
    {
        if (is_array($name)) {
            foreach ($name as $districtName) {
                $hasDistrict = $this->hasDistrictName(strtoupper($districtName));
                if ($hasDistrict && !$requireAll) {
                    return true;
                } elseif (!$hasDistrict && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the districts were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the districts were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            $getDistrictName = array_column($this->districts->toArray(), "name");
            if (in_array(strtoupper($name), $getDistrictName)) {
                return true;
            }
        }
        return false;
    }

    /**
     * check if province has districts by ID.
     */
    public function hasDistrictId(string|array $id, bool $requireAll = false): bool
    {
        if (is_array($id)) {
            foreach ($id as $districtId) {
                $hasDistrict = $this->hasDistrictId($districtId);
                if ($hasDistrict && !$requireAll) {
                    return true;
                } elseif (!$hasDistrict && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the districts were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the districts were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            $getDistrictId = array_column($this->districts->toArray(), "id");
            if (in_array(strtoupper($id), $getDistrictId)) {
                return true;
            }
        }
        return false;
    }
}
