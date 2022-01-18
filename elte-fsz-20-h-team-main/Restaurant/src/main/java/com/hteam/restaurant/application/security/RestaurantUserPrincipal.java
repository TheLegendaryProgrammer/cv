package com.hteam.restaurant.application.security;


import com.hteam.restaurant.domain.User;
import com.hteam.restaurant.domain.UserType;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.userdetails.UserDetails;

import java.util.List;
import java.util.Collection;

public class RestaurantUserPrincipal implements UserDetails{

    final private User user;

    public RestaurantUserPrincipal(User user){this.user = user;}

    @Override
    public Collection<? extends GrantedAuthority> getAuthorities() {
        return List.of(user.getUserType() == UserType.ADMIN ? Role.ROLE_ADMIN : Role.ROLE_GUEST);
    }

    @Override
    public String getPassword() {
        return user.getPassword();
    }

    @Override
    public String getUsername() {
        return user.getUserName();
    }

    @Override
    public boolean isAccountNonExpired() {
        return true;
    }

    @Override
    public boolean isAccountNonLocked() {
        return true;
    }

    @Override
    public boolean isCredentialsNonExpired() {
        return true;
    }

    @Override
    public boolean isEnabled() {
        return true;
    }
}
