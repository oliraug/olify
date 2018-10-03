
    function getQuantitySold(){
        var salesForm = document.forms("sales_form");
        var quantity_sold = salesForm.elements["quantity_sold"];
        var nos = 0;
        //if the textbox is not blank
        if (quantity_sold.value!="") {
            nos = parseInt(quantity_sold.value);
        }
        return nos;
    }

 function getAmount(){
        var salesForm = document.forms("sales_form");
        var amount = salesForm.elements["amount"];
        var nos = 0;
        //if the textbox is not blank
        if (amount.value!="") {
            nos = parseInt(amount.value);
        }
        return nos;
    }

function getTotal(){
        var itemSale = getQuantitySold() + getAmount();
        //Display the result 
       var totalObj = document.getElementById('total');
       totalObjo.innerHTML = itemSale;

    }



    function calculate() {
        'use strict';
        var total;

        var quantity_sold = document.getElementById('quantity_sold').value;
        var amount = document.getElementById('amount').value;

        total = quantity_sold*amount;

        document.getElementById('total').value = total;

        return false;
    }

    function init(){
        'use strict';
        var theForm = document.getElementById('sales_form');
        theForm.onsubmit = calculate;

        window.onload = init;
    }

    /*<?php

        $divsion = 0;
        switch(true){
            case $divsion <=12:
            echo "Your in Division 1";
            break;
            case $divsion >12 && <=24:
            echo "Your in Division 2";
            break;
            case $divsion >24 && <=32:
            break;
            echo "Your in Division 3";
            case $divsion >32:
            echo "Your in Division 4";
            break;
            Default:
            echo "No Division";
        }
    ?-->