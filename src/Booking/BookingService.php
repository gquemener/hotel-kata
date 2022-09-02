<?php
declare(strict_types=1);

namespace App\Booking;

use DateTimeImmutable;

final class BookingService
{
    public function book(
        string $employeeId,
        string $hotelId,
        string $roomType,
        DateTimeImmutable $checkIn,
        DateTimeImmutable $checkOut
    ): ?Booking {
        return null;
    }
}
