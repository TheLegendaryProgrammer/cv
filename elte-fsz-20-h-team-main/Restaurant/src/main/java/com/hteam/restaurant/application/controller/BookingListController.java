package com.hteam.restaurant.application.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class BookingListController {

    @GetMapping("/newReservation")
    public String newReservation(Model model) {
        return "newReservation";
    }
}
