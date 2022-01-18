package com.hteam.restaurant.repository;


import com.hteam.restaurant.domain.Table;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository

public interface TableRepository extends CrudRepository<Table, Integer> {
    List<Table> findByRestaurantId(int id);

}
