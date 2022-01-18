package com.hteam.restaurant.repository;

import com.hteam.restaurant.domain.User;
import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface UserRepository extends CrudRepository<User, Integer> {

    User findByUserName(String userName);
}
