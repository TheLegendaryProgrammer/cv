package com.hteam.restaurant.application.transformer;

import org.springframework.stereotype.Component;
import com.hteam.restaurant.application.webdomain.EditRestaurantForm;
import com.hteam.restaurant.domain.Restaurant;

@Component
public class RestaurantTransformer {
    public void transform(Restaurant restaurant, EditRestaurantForm editRestaurantForm){
        editRestaurantForm.setId(restaurant.getId());
        editRestaurantForm.setRestaurantName(restaurant.getRestaurantName());
        editRestaurantForm.setOpening(restaurant.getOpening());
        editRestaurantForm.setClosing(restaurant.getClosing());
        editRestaurantForm.setPhoneNumber(restaurant.getPhoneNumber());
        editRestaurantForm.setDisabledFriendly(restaurant.isDisabledFriendly());
        editRestaurantForm.setTerrace(restaurant.isTerrace());
        editRestaurantForm.setCapacity(restaurant.getCapacity());
        editRestaurantForm.setNumberOfTables(restaurant.getNumberOfTables());

    }

    public void transform(EditRestaurantForm editRestaurantForm, Restaurant restaurant){
        restaurant.setId(editRestaurantForm.getId());
        restaurant.setRestaurantName(editRestaurantForm.getRestaurantName());
        restaurant.setOpening(editRestaurantForm.getOpening());
        restaurant.setClosing(editRestaurantForm.getClosing());
        restaurant.setPhoneNumber(editRestaurantForm.getPhoneNumber());
        restaurant.setDisabledFriendly(editRestaurantForm.isDisabledFriendly());
        restaurant.setTerrace(editRestaurantForm.isTerrace());
        restaurant.setCapacity(editRestaurantForm.getCapacity());
        restaurant.setNumberOfTables(editRestaurantForm.getNumberOfTables());
    }

}


