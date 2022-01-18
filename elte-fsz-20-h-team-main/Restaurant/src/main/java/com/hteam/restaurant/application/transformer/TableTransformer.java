package com.hteam.restaurant.application.transformer;

import com.hteam.restaurant.application.rest.domain.BookingResponse;
import com.hteam.restaurant.application.rest.domain.TableResponse;
import com.hteam.restaurant.domain.Booking;
import com.hteam.restaurant.domain.Table;
import org.springframework.stereotype.Component;

import java.util.List;
import java.util.stream.Collectors;

@Component
public class TableTransformer {

    public List<TableResponse> transformedTableResponse(List<Table> tables){
        return tables.stream().map(t->{
            TableResponse tt = new TableResponse();
            tt.setId(t.getId());
            tt.setSeats(t.getSeats());
            tt.setTaken(t.isTaken());
            tt.getTableType(t.getLocation());
            tt.setTableNumber(t.getTableNumber());
            return tt;
        }).collect(Collectors.toList());
    }

    public List<BookingResponse> transformBookingResponse(List<Booking> bookings){
        return bookings.stream().map(b->{
            BookingResponse bb = new BookingResponse();
            bb.setBookingId(b.getId());
            bb.setRestaurantName(b.getTable().getRestaurant().getRestaurantName());
            bb.setTableNumber(b.getTable().getTableNumber());
            bb.setBookingReservationTime(b.getRestaurantBookingTime());
            bb.setNumberOfGuests(b.getNumberOfGuests());
            return bb;
        }).collect(Collectors.toList());
    }
}
