package com.hteam.restaurant.domain;

public enum TableType {
    NEXT_TO_WINDOW("Next to window"),
    ON_TERRACE("On terrace"),
    VIP("VIP"),
    INSIDE("Inside");

    private String value;

    public String getValue() {
        return value;
    }

    public void setValue(String value) {
        this.value = value;
    }

    private TableType(String value) {
        this.value = value;
    }
}
