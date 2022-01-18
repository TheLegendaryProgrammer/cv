package com.hteam.restaurant.application.webdomain;

import java.time.LocalTime;

public class RestaurantListView {
    private final int id;
    private final String restaurantName;
    private final LocalTime opening;
    private final LocalTime closing;
    private final int phoneNumber;
    private final boolean disabledFriendly;
    private final boolean terrace;
    private final int capacity;
    private final int numberOfTables;


    public RestaurantListView(int id, String restaurantName, LocalTime opening, LocalTime closing, int phoneNumber, boolean disabledFriendly, boolean terrace, int capacity, int numberOfTables) {
        super();
        this.id = id;
        this.restaurantName = restaurantName;
        this.opening = opening;
        this.closing = closing;
        this.phoneNumber = phoneNumber;
        this.disabledFriendly = disabledFriendly;
        this.terrace = terrace;
        this.capacity = capacity;
        this.numberOfTables = numberOfTables;
    }

    public int getId() {
        return id;
    }

    public String getRestaurantName() {
        return restaurantName;
    }

    public LocalTime getOpening() {
        return opening;
    }

    public LocalTime getClosing() {
        return closing;
    }

    public int getPhoneNumber() {
        return phoneNumber;
    }

    public boolean isDisabledFriendly() {
        return disabledFriendly;
    }

    public boolean isTerrace() {
        return terrace;
    }

    public int getCapacity() {
        return capacity;
    }

    public int getNumberOfTables() {
        return numberOfTables;
    }
}
