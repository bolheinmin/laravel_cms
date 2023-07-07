<?php

namespace App\Interfaces;

interface CourtRepositoryInterface
{
    public function getAllCourts();
    public function getCourtById($courtId);
    public function deleteCourt($courtId);
    public function createCourt(array $court);
    public function updateCourt($courtId, array $newCourt);
}