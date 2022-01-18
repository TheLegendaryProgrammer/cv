package com.hteam.restaurant.application.services;

import com.hteam.restaurant.domain.*;
import com.hteam.restaurant.repository.RestaurantRepository;
import com.hteam.restaurant.repository.TableRepository;
import com.hteam.restaurant.repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Component;

import javax.transaction.Transactional;
import java.time.LocalTime;

@Component
public class  TestDataGenerator {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private PasswordEncoder passwordEncoder;

    @Autowired
    private RestaurantRepository restaurantRepository;

    @Autowired
    TableRepository tableRepository;

    @Transactional
    public void createTestData() {

        Restaurant pizzaKing = createRestaurant("PizzaKing", 0630254516,LocalTime.now(), LocalTime.now().plusHours(12),true,true,100,25);
        restaurantRepository.save(pizzaKing);

        Restaurant michelin = createRestaurant("Michelin", 0630254516,LocalTime.now(),LocalTime.now().plusHours(12),true,true,100,25);
        restaurantRepository.save(michelin);

        tableRepository.save(createTable(pizzaKing,2,12,false,TableType.NEXT_TO_WINDOW));
        tableRepository.save(createTable(pizzaKing,4,2,false,TableType.INSIDE));

        tableRepository.save(createTable(michelin,5,10,false,TableType.VIP));
        tableRepository.save(createTable(michelin,3,4,false,TableType.ON_TERRACE));
        tableRepository.save(createTable(michelin,3,3,false,TableType.INSIDE));

        userRepository.save(createUser("user","user@test.com", UserType.GUEST));
        userRepository.save(createUser("admin","admin@test.com", UserType.ADMIN));

    }
    private User createUser(String name, String email, UserType userType) {

        User user = new User();
        user.setUserName(name);
        user.setEmail(email);
        user.setPassword(passwordEncoder.encode("password"));
        user.setUserType(userType);
        return user;
    }

    private Table createTable(Restaurant restaurant, int seats,
                             int tableNumber, boolean taken, TableType tableType){
        Table table = new Table();
        table.setRestaurant(restaurant);
        table.setSeats(seats);
        table.setTableNumber(tableNumber);
        table.setTaken(taken);
        table.setLocation(tableType);

        return  table;
    }

    private Restaurant createRestaurant(String name,int phoneNumber,
                                        LocalTime opening, LocalTime closing,
                                        boolean disabledFriendly, boolean terrace,
                                        int capacity, int numberOfTables) {
        Restaurant restaurant = new Restaurant();
        restaurant.setRestaurantName(name);
        restaurant.setPhoneNumber(phoneNumber);
        restaurant.setOpening(opening);
        restaurant.setClosing(closing);
        restaurant.setDisabledFriendly(disabledFriendly);
        restaurant.setTerrace(terrace);
        restaurant.setCapacity(capacity);
        restaurant.setNumberOfTables(numberOfTables);

        return restaurant;
    }
}
