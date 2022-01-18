package com.hteam.restaurant.application.controller;

import com.hteam.restaurant.application.services.GuestService;
import com.hteam.restaurant.application.webdomain.AddUser;
import com.hteam.restaurant.domain.User;
import com.hteam.restaurant.domain.UserType;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;

import javax.validation.Valid;

@Controller
public class RegistrationController {

    @Autowired
    GuestService guestService;
    @Autowired
    PasswordEncoder passwordEncoder;

    private static final Logger LOGGER = LoggerFactory.getLogger(RegistrationController.class);

    @GetMapping("/registration")
    public String registration(Model model) {
        model.addAttribute("addUser", new User());

        return "registration";
    }

    @PostMapping("/registration")
    public String addUser(@ModelAttribute("addUser") AddUser addUser, BindingResult bindingResult) {

        if (bindingResult.hasErrors()) {
            return "registration";
        }

        User user = new User();
        user.setUserName(addUser.getUserName());
        user.setEmail(addUser.getEmail());
        user.setPassword(passwordEncoder.encode(addUser.getPassword()));
        user.setUserType(UserType.GUEST);

        guestService.saveUser(user);

        LOGGER.info("User successfully saved [name: {}] [email: {}] [password: {}].",
                user.getUserName(),user.getEmail(),user.getPassword());
        return "redirect:/restaurants";
    }
}
