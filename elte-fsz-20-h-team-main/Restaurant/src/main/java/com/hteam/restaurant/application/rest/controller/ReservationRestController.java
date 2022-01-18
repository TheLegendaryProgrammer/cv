package com.hteam.restaurant.application.rest.controller;


import com.hteam.restaurant.application.rest.domain.BookingResponse;
import com.hteam.restaurant.application.rest.domain.SaveBookingRequest;
import com.hteam.restaurant.application.rest.domain.SaveBookingResponse;
import com.hteam.restaurant.application.security.SecurityHelper;
import com.hteam.restaurant.application.services.BookingService;
import com.hteam.restaurant.application.transformer.TableTransformer;
import com.hteam.restaurant.domain.Booking;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
public class ReservationRestController {

    private static final Logger LOGGER = LoggerFactory.getLogger(ReservationRestController.class);

    @Autowired
    private BookingService bookingService;

    @Autowired
    private TableTransformer tableTransformer;


    @PostMapping("/api/bookings/")
    public SaveBookingResponse save(SaveBookingRequest request){

        String userName = SecurityHelper.getUserName();
        Booking booking = bookingService.saveBooking(request.getTableId(), userName, request.getNumberOfGuests(5), request.getRestaurantBookingTime());

        LOGGER.info("Restaurant [id: {}] successfully saved.", request.getTableId());

        return new SaveBookingResponse(booking.getId());
    }

    @GetMapping("/api/bookings/")
    Iterable<BookingResponse> all(){
        List<Booking> bookings = bookingService.findAllBookingByUserName(SecurityHelper.getUserName());
        return tableTransformer.transformBookingResponse(bookings);
    }
}
