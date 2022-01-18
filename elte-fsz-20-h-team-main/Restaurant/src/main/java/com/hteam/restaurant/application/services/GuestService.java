package com.hteam.restaurant.application.services;

import com.hteam.restaurant.domain.Guest;
import com.hteam.restaurant.domain.User;
import com.hteam.restaurant.repository.GuestRepository;
import com.hteam.restaurant.repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class GuestService {

    @Autowired
    private GuestRepository guestRepository;
    @Autowired
    private UserRepository userRepository;


    public void saveGuest(Guest guest){
        guestRepository.save(guest);
    }
    public Guest findGuest(String guest){
        return guestRepository.findByName(guest);
    }
    public void saveUser(User user){
        userRepository.save(user);
    }
    public User findUser(String user){
        return userRepository.findByUserName(user);
    }

}
