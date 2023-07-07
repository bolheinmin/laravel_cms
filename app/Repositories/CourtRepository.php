<?php

namespace App\Repositories;

use App\Interfaces\CourtRepositoryInterface;
use App\Models\Court;

class CourtRepository implements CourtRepositoryInterface
{
    public function getAllCourts()
    {
        return Court::all();
    }
    public function getCourtById($courtId)
    {
        return Court::findOrFail($courtId);
    }
    public function deleteCourt($courtId)
    {
        Court::destroy($courtId);
    }
    public function createCourt(array $court)
    {
        return Court::create($court);
    }
    public function updateCourt($courtId, array $newcourt)
    {
        return Court::whereId($courtId)->update($newcourt);
    }

}