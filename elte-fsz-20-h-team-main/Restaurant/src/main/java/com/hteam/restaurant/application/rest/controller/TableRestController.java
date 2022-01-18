package com.hteam.restaurant.application.rest.controller;

import com.hteam.restaurant.application.rest.domain.TableResponse;
import com.hteam.restaurant.application.services.BookingService;
import com.hteam.restaurant.application.transformer.TableTransformer;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
public class TableRestController {

    @Autowired
    BookingService bookingService;

    @Autowired
    TableTransformer tableTransformer;

    @GetMapping("/api/restaurants/{restaurantId}/tables")
    Iterable<TableResponse> all(@PathVariable int restaurantId){
        return tableTransformer.transformedTableResponse(bookingService.findAllTablesByRestaurantId(restaurantId));
    }
}
