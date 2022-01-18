package com.hteam.restaurant.application.rest.domain;

import org.springframework.format.annotation.DateTimeFormat;

import java.time.LocalDateTime;

public class SaveBookingRequest {

    private int tableId;
    @DateTimeFormat(pattern = "yyyy-MM-dd'T'HH:mm")
    private LocalDateTime restaurantBookingTime;
    private int numberOfGuests;

    public int getTableId() {
        return tableId;
    }

    public void setTableId(int tableId) {
        this.tableId = tableId;
    }

    public LocalDateTime getRestaurantBookingTime() {
        return restaurantBookingTime;
    }

    public void setRestaurantBookingTime(LocalDateTime restaurantBookingTime) {
        this.restaurantBookingTime = restaurantBookingTime;
    }

    public int getNumberOfGuests(int i) {
        return numberOfGuests;
    }

    public void setNumberOfGuests(int numberOfGuests) {
        this.numberOfGuests = numberOfGuests;
    }
}
