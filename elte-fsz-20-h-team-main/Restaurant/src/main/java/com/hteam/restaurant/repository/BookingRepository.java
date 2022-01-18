package com.hteam.restaurant.repository;

import com.hteam.restaurant.domain.Booking;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface BookingRepository extends CrudRepository<Booking, Integer> {
    List<Booking> findAll();
    List<Booking> findAllByUserUserName(String userName);
}
