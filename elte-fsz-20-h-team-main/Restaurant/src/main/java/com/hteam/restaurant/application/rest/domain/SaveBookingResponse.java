package com.hteam.restaurant.application.rest.domain;

public class SaveBookingResponse {
    private final int bookingId;

    public SaveBookingResponse(int bookingId) {
        super();
        this.bookingId = bookingId;
    }

    public int getBookingId() {
        return bookingId;
    }
}
