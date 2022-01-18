package com.hteam.restaurant.application.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class doBookingController {

    @GetMapping("/reservation")
    public String reservation(Model model) {
        return "reservation";
    }
}
