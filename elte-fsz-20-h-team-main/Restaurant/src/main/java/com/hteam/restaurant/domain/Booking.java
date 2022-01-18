package com.hteam.restaurant.domain;

import java.time.LocalDateTime;
import java.time.LocalTime;
import javax.persistence.*;

@Entity
public class Booking {


    @ManyToOne
    private User user;

    @ManyToOne
    private com.hteam.restaurant.domain.Table table;


    @Id
    @GeneratedValue(strategy=GenerationType.AUTO)
    private int id;
    private LocalDateTime restaurantBookingTime;
    private int numberOfGuests;
    private boolean personalOrBusiness;


    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public LocalDateTime getRestaurantBookingTime() {
        return restaurantBookingTime;
    }

    public void setRestaurantBookingTime(LocalDateTime restaurantBookingTime) {
        this.restaurantBookingTime = restaurantBookingTime;
    }

    public int getNumberOfGuests() {
        return numberOfGuests;
    }

    public void setNumberOfGuests(int numberOfGuests) {
        this.numberOfGuests = numberOfGuests;
    }

    public boolean isPersonalOrBusiness() {
        return personalOrBusiness;
    }

    public void setPersonalOrBusiness(boolean personalOrBusiness) {
        this.personalOrBusiness = personalOrBusiness;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User guest) {
        this.user = user;
    }

    public com.hteam.restaurant.domain.Table getTable() {
        return table;
    }

    public void setTable(Table table) {
        this.table = table;
    }

}
