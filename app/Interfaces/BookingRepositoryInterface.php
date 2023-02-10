<?php

namespace App\Interfaces;

interface BookingRepositoryInterface 
{
    public function createBooking(array $bookingDetails);
    public function updateBooking($bookingId, array $newDetails);
    public function storeBookedUniversities($bookingId, array $bookedUniversityDetails);
    public function updateBookedUniversities($bookingId, array $newBookedUniversityDetails);
}