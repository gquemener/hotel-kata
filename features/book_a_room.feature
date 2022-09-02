Feature: Booking room
    As an employee
    In order to increase hotel revenue
    I need to be able to book rooms

    Scenario: Successfully book a room
        Given a hotel named "Tortilla" has opened
        And it has the following rooms:
            | type     | number |
            | standard | 10     |
            | business | 5      |
            | high-end | 1      |
        When I book a business room between "2022-09-15" and "2022-09-22"
        Then I should have a booking confirmation
