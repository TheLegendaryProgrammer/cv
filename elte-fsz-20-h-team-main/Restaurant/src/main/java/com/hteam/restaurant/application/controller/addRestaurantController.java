package com.hteam.restaurant.application.controller;

import com.hteam.restaurant.application.services.RestaurantService;
import com.hteam.restaurant.application.webdomain.AddRestaurantRequest;
import com.hteam.restaurant.domain.Restaurant;
import com.hteam.restaurant.domain.User;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class addRestaurantController {

    @Autowired
    private RestaurantService restaurantService;

    @GetMapping("addRestaurants")
    public String addRestaurant(Model model) {
        model.addAttribute("addRestaurantRequest", new Restaurant());
        return "addRestaurants";
    }

    @PostMapping("/addRestaurants")
    public String addRestaurantForm(@ModelAttribute("addRestaurantRequest") AddRestaurantRequest addRestaurantRequest, BindingResult bindingResult){
        if (bindingResult.hasErrors()) {
            return "registration";
        }


        Restaurant restaurant = new Restaurant();
        restaurant.setRestaurantName(addRestaurantRequest.getRestaurantName());
        restaurant.setOpening(addRestaurantRequest.getOpening());
        restaurant.setClosing(addRestaurantRequest.getClosing());
        restaurant.setPhoneNumber(addRestaurantRequest.getPhoneNumber());
        restaurant.setDisabledFriendly(addRestaurantRequest.isDisabledFriendly());
        restaurant.setTerrace(addRestaurantRequest.isTerrace());
        restaurant.setCapacity(addRestaurantRequest.getCapacity());
        restaurant.setNumberOfTables(addRestaurantRequest.getNumberOfTables());

        restaurantService.saveRestaurant(restaurant);


        return "redirect:restaurants";
    }



}
