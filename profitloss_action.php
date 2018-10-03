<?php
    //error_reporting(0);
    $conn = new PDO("mysql:host=localhost;dbname=EPriceStreetMarket", "root", "olira"); 
	session_start();
    $_POST = json_decode(file_get_contents('php://input'), true);
	
	if(!empty($_POST['gross_profit'])&& !empty($_POST['salaries']))
    {
       $query ="
	   INSERT INTO profit_loss_stmt (gross_profit, salaries, rent_rate_tax, unit, purchases, unit_mode, post_telgrm, elec_charges, water_bills, telphone_charges, print_stationery, carriage_outward, advertisement, commission, insurance, travel_expense, bad_debts, packing_expenses, depreciation, repairs, audit_fee, interest_paid, commission_paid, bank_charges, legal_charges, net_profit, from_date, to_date)
	   VALUES(:gross_profit, :salaries, :rent_rate_tax, :unit, :purchases, :unit_mode, :post_telgrm, :elec_charges, :water_bills, :telphone_charges, :print_stationery, :carriage_outward, :advertisement, :commission, :insurance, :travel_expense, :bad_debts, :packing_expenses, :depreciation, :repairs, :audit_fee, :interest_paid, :commission_paid, :bank_charges, :legal_charges, :net_profit, :from_date, :to_date)";
	   $ins_query=$conn->prepare($query);
	   $date = date('Y-m-d H:i:s');
       $ins_query->bindParam(':gross_profit', $_POST['gross_profit']);
	   $ins_query->bindParam(':salaries', $_POST['salaries']);
       $ins_query->bindParam(':rent_rate_tax', $_POST['rent_rate_tax']);
       $ins_query->bindParam(':unit', $_POST['unit']);
	   $ins_query->bindParam(':purchases', $_POST['purchases']);
	   $ins_query->bindParam(':unit_mode', $_POST['unit_mode']);
	   $ins_query->bindParam(':post_telgrm', $_POST['post_telgrm']);
	   $ins_query->bindParam(':elec_charges', $_POST['elec_charges']);
	   $ins_query->bindParam(':water_bills', $_POST['water_bills']);
	   $ins_query->bindParam(':telphone_charges', $_POST['telphone_charges']);
	   $ins_query->bindParam(':print_stationery', $_POST['print_stationery']);
	   $ins_query->bindParam(':carriage_outward', $_POST['carriage_outward']);
	   $ins_query->bindParam(':advertisement', $_POST['advertisement']);
	   $ins_query->bindParam(':commission', $_POST['commission']);
	   $ins_query->bindParam(':insurance', $_POST['insurance']);
	   $ins_query->bindParam(':travel_expense', $_POST['travel_expense']);
	   $ins_query->bindParam(':bad_debts', $_POST['bad_debts']);
	   $ins_query->bindParam(':packing_expenses', $_POST['packing_expenses']);
	   $ins_query->bindParam(':depreciation', $_POST['depreciation']);
	   $ins_query->bindParam(':repairs', $_POST['repairs']);
	   $ins_query->bindParam(':audit_fee', $_POST['audit_fee']);
	   $ins_query->bindParam(':interest_paid', $_POST['interest_paid']);
	   $ins_query->bindParam(':commission_paid', $_POST['commission_paid']);
	   $ins_query->bindParam(':bank_charges', $_POST['bank_charges']);
	   $ins_query->bindParam(':legal_charges', $_POST['legal_charges']);
	   $ins_query->bindParam(':net_profit', $_POST['net_profit']);
	   $ins_query->bindParam(':from_date', $date, PDO::PARAM_STR);
	   $ins_query->bindParam(':to_date', $date, PDO::PARAM_STR);
	    
       $ins_query->execute();
    
    $result = json_encode($ins_query->fetchAll());
	if (isset($result)) {
		echo "Profit & Loss Statement Added";
	}
	}
?> 
