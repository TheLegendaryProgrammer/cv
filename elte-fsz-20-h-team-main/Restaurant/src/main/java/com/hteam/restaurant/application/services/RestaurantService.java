package com.hteam.restaurant.application.services;

import com.hteam.restaurant.domain.Booking;
import com.hteam.restaurant.domain.Restaurant;
import com.hteam.restaurant.domain.Table;
import com.hteam.restaurant.domain.User;
import com.hteam.restaurant.repository.BookingRepository;
import com.hteam.restaurant.repository.RestaurantRepository;
import com.hteam.restaurant.repository.TableRepository;
import com.hteam.restaurant.repository.UserRepository;
import com.sun.source.tree.LambdaExpressionTree;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.time.LocalDateTime;
import java.util.List;
import java.util.concurrent.locks.ReentrantLock;


@Service
public class RestaurantService {


    @Autowired
    private RestaurantRepository restaurantRepository;
    @Autowired
    private TableRepository tableRepository;

    @Autowired
    private BookingRepository bookingRepository;

    public List<Restaurant> findAllRestaurants(){
        return restaurantRepository.findAll();
    }
    public List<Restaurant> findTerraceRestaurant(Restaurant restaurant){
        return restaurantRepository.findByTerrace(restaurant.isTerrace());
    }
    public List<Restaurant> findDisabledFriendlyRestaurant(Restaurant restaurant){
        return restaurantRepository.findByDisabledFriendly(restaurant.isDisabledFriendly());
    }
    public void saveTable(Table table){
        tableRepository.save(table);
    }
    public Table findById(int id){
        return tableRepository.findById(id).get();
    }
    public Restaurant saveRestaurant(Restaurant restaurant){return restaurantRepository.save(restaurant);}

    public Restaurant findRestaurantById(int id) {
        return restaurantRepository.findById(id).get();
    }


}
