package com.hteam.restaurant.application.security;

import org.springframework.security.core.GrantedAuthority;

public enum Role implements GrantedAuthority {

    ROLE_GUEST, ROLE_ADMIN;

    @Override
    public String getAuthority() {
        return name();
    }
}
