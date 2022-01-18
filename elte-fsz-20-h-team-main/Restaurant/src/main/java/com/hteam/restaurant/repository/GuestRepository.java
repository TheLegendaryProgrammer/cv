package com.hteam.restaurant.repository;

import com.hteam.restaurant.domain.Guest;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

@Repository

public interface GuestRepository extends CrudRepository<Guest, Integer> {

    Guest findByName(String name);
}
