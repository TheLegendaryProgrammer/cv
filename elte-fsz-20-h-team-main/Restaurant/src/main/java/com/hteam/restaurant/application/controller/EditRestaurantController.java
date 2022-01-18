package com.hteam.restaurant.application.controller;
import com.hteam.restaurant.application.services.RestaurantService;
import com.hteam.restaurant.application.transformer.RestaurantTransformer;
import com.hteam.restaurant.application.webdomain.EditRestaurantForm;
import com.hteam.restaurant.domain.Restaurant;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.util.Map;

@Controller
public class EditRestaurantController {

    private static final Logger LOGGER = LoggerFactory.getLogger(EditRestaurantController.class);
    @Autowired
    private RestaurantService restaurantService;
    @Autowired
    private RestaurantTransformer restaurantTransformer;

    @GetMapping("edit-restaurant/{id}")
    public String form(EditRestaurantForm editRestaurantForm, @PathVariable("id") int id){
        restaurantTransformer.transform(restaurantService.findRestaurantById(editRestaurantForm.getId()), editRestaurantForm);
        return "edit-restaurant";
    }
    @PostMapping("edit-restaurant")
    public String editRestaurant(@Valid EditRestaurantForm editRestaurantForm, BindingResult bindingResult, RedirectAttributes redirectAttributes) {
        if (bindingResult.hasErrors()) {
            return "edit-restaurant";
        }

        Restaurant restaurant = restaurantService.findRestaurantById(editRestaurantForm.getId());
        restaurantTransformer.transform(editRestaurantForm, restaurant);

        restaurantService.saveRestaurant(restaurant);

        LOGGER.info("Restaurant [id: {}] successfully saved.", restaurant.getId());
        redirectAttributes.addFlashAttribute("message", "Restaurant successfully saved.");
        return "redirect:restaurants";
    }




}
