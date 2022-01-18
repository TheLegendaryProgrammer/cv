package com.hteam.restaurant.application.rest.domain;

import java.time.LocalDateTime;

public class BookingResponse {

    private int bookingId;
    private String restaurantName;
    private int tableNumber;
    private int numberOfGuests;
    private LocalDateTime bookingReservationTime;

    public int getBookingId() {
        return bookingId;
    }

    public void setBookingId(int bookingId) {
        this.bookingId = bookingId;
    }

    public String getRestaurantName(String restaurantName) {
        return this.restaurantName;
    }

    public void setRestaurantName(String restaurantName) {
        this.restaurantName = restaurantName;
    }

    public int getTableNumber(int tableNumber) {
        return this.tableNumber;
    }

    public void setTableNumber(int tableNumber) {
        this.tableNumber = tableNumber;
    }

    public LocalDateTime getBookingReservationTime() {
        return bookingReservationTime;
    }

    public void setBookingReservationTime(LocalDateTime bookingReservationTime) {
        this.bookingReservationTime = bookingReservationTime;
    }

    public int getNumberOfGuests() {
        return numberOfGuests;
    }

    public void setNumberOfGuests(int numberOfGuests) {
        this.numberOfGuests = numberOfGuests;
    }
}
