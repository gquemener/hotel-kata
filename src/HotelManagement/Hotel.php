<?php
declare(strict_types=1);

namespace App\HotelManagement;

final class Hotel
{
    public static function named(string $name): self
    {
        return new self();
    }
}
