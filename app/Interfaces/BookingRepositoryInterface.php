<?php

namespace App\Interfaces;

interface BookingRepositoryInterface 
{
    public function createBooking(array $bookingDetails);
    public function storeBookedUniversities($bookingId, array $bookedUniversityDetails);
}