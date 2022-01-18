package com.hteam.restaurant.application.services;

import com.hteam.restaurant.domain.Booking;
import com.hteam.restaurant.domain.Table;
import com.hteam.restaurant.domain.User;
import com.hteam.restaurant.repository.BookingRepository;
import com.hteam.restaurant.repository.TableRepository;
import com.hteam.restaurant.repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;


import java.time.LocalDateTime;
import java.time.LocalTime;
import java.util.List;

@Service
public class BookingService {

    @Autowired
    private UserRepository userRepository;
    @Autowired
    private BookingRepository bookingRepository;
    @Autowired
    TableRepository tableRepository;

    public List<Booking> findAllBookingByUserName(String userName) {
        return bookingRepository.findAllByUserUserName(userName);
    }

    public Booking saveBooking(int tableId, String username,int numberOfGuests, LocalDateTime restaurantBookingTime){
        Table table = tableRepository.findById(tableId).get();
        User user = userRepository.findByUserName(username);

        Booking booking = new Booking();
        booking.setTable(table);
        booking.setUser(user);
        booking.setNumberOfGuests(numberOfGuests);
        booking.setRestaurantBookingTime(restaurantBookingTime);

        return bookingRepository.save(booking);

    }

    public List<Booking> findAllBooking(){
        return bookingRepository.findAll();
    }

    public List<Table> findAllTablesByRestaurantId(int restaurantId){return tableRepository.findByRestaurantId(restaurantId);}

    public Table saveTable(Table table){return tableRepository.save(table);}
}
