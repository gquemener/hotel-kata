<?php

use App\Booking\Booking;
use App\Booking\BookingService;
use App\HotelManagement\HotelService;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use function PHPUnit\Framework\assertNotNull;

class BookingContext implements Context
{
    private const HOTEL_ID = 'hotel-1';
    private const EMPLOYEE_ID = 'employee-1';

    private readonly HotelService $hotels;

    private readonly BookingService $booking;

    private ?Booking $bookingConfirmation;


    public function __construct()
    {
        $this->hotels = new HotelService();
        $this->booking = new BookingService();
        $this->bookingConfirmation = null;
    }

    #[Given('a hotel named :hotelName has opened')]
    public function aHotelHasOpened(string $hotelName): void
    {
        $this->hotels->addHotel(self::HOTEL_ID, $hotelName);
    }

    #[Given('it has the following rooms:')]
    public function itHasTheFollowingRooms(TableNode $table): void
    {
        foreach($table->getHash() as $room) {
            $this->hotels->setRoom(self::HOTEL_ID, $room['number'], $room['type']);
        }
    }

    #[When('I book a business room between :checkIn and :checkOut')]
    public function iBookABusinessRoomBetweenAnd(string $checkIn, string $checkOut): void
    {
        $checkIn = DateTimeImmutable::createFromFormat('!Y-m-d', $checkIn);
        $checkOut = DateTimeImmutable::createFromFormat('!Y-m-d', $checkOut);


        $this->bookingConfirmation = $this->booking->book(self::EMPLOYEE_ID, self::HOTEL_ID, 'business', $checkIn, $checkOut);
    }

    #[Then('I should have a booking confirmation')]
    public function iShouldHaveABookingConfirmation(): void
    {
        assertNotNull($this->bookingConfirmation);
    }
}
