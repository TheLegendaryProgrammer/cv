package com.hteam.restaurant.application.controller;

import com.hteam.restaurant.application.webdomain.RestaurantListView;
import com.hteam.restaurant.application.services.RestaurantService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import java.util.ArrayList;
import java.util.List;

@Controller
public class restaurantListController {

    @Autowired
    private RestaurantService restaurantServices;


    @GetMapping("restaurants")
    public String listallRestaurants(Model model){
        List<RestaurantListView> restaurantListViews = new ArrayList<>();

        restaurantServices.findAllRestaurants().forEach(r -> restaurantListViews.add(new RestaurantListView(r.getId(), r.getRestaurantName(),
                r.getOpening(), r.getClosing(), r.getPhoneNumber(), r.isDisabledFriendly(),
                r.isTerrace(), r.getCapacity(), r.getNumberOfTables())));


        model.addAttribute("restaurants", restaurantListViews);
        return "restaurants";
    }


}
