package com.hteam.restaurant.domain;

import java.math.BigDecimal;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Enumerated;
import javax.persistence.EnumType;

@Entity
public class Guest {
    @Id
    @GeneratedValue(strategy=GenerationType.AUTO)
    private int id;



    @Enumerated(EnumType.STRING)
    private Currency currency;
    private String name;
    private int phoneNumberGuest;
    private int accountNumber;
    private BigDecimal balance;

    @Enumerated
    public Currency getCurrency() {
        return currency;
    }

    public void setCurrency(Currency currency) {
        this.currency = currency;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getPhoneNumberGuest() {
        return phoneNumberGuest;
    }

    public void setPhoneNumberGuest(int phoneNumberGuest) {
        this.phoneNumberGuest = phoneNumberGuest;
    }

    public int getAccountNumber() {
        return accountNumber;
    }

    public void setAccountNumber(int accountNumber) {
        this.accountNumber = accountNumber;
    }

    public BigDecimal getBalance() {
        return balance;
    }

    public void setBalance(BigDecimal balance) {
        this.balance = balance;
    }
}
