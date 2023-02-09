<?php

namespace App\Repositories;

use App\Interfaces\BookingRepositoryInterface;
use App\Models\Booking;

class BookingRepository implements BookingRepositoryInterface
{
    public function createBooking(array $bookingDetails)
    {

        $booking = Booking::create($bookingDetails);
        return $booking;
    }

    public function storeBookedUniversities($bookingId, array $bookedUniversityDetails)
    {
        $booking = Booking::find($bookingId);
        $booking->university()->attach($bookedUniversityDetails);
        return $booking;
    }

}
