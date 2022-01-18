package com.hteam.restaurant;

import com.hteam.restaurant.application.services.BookingService;
import com.hteam.restaurant.application.services.GuestService;
import com.hteam.restaurant.application.services.RestaurantService;
import com.hteam.restaurant.application.services.TestDataGenerator;
import  org.springframework.boot.CommandLineRunner;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.Bean;

@SpringBootApplication
public class RestaurantApplication {

	@Autowired
	private RestaurantService restaurantService;
	@Autowired
	private GuestService guestService;
	@Autowired
	private BookingService bookingService;
	@Autowired
	private TestDataGenerator testDataGenerator;

	public static void main(String[] args) {SpringApplication.run(RestaurantApplication.class, args);

	}
	@Bean
	public CommandLineRunner commandLineRunner(ApplicationContext ctx) {
		return args -> {
			testDataGenerator.createTestData();

		};
	}


}
