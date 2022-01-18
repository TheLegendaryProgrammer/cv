package com.hteam.restaurant.repository;

import com.hteam.restaurant.domain.Restaurant;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface RestaurantRepository extends CrudRepository<Restaurant, Integer> {
    List<Restaurant> findAll();
    List<Restaurant> findByTerrace(boolean terrace);
    List<Restaurant> findByDisabledFriendly(boolean disabledFriendly);
}
