<?php
//product.php

include('config.php');
include('function.php');

/*if(!isset($_SESSION["type"]))
{
    header('location:login.php');
}

if(!isset($_SESSION['master']))
{
    header('location:index.php');
}*/

include('header.php');
?>
        <span id='alert_action'></span>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                                <h3 class="panel-title">Commodity List</h3>
                            </div>
                        
                            <div class="pop" align='right'>
                                <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#commodityModal" class="btn btn-success btn-xs">Add New Commodity</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" ng-controller="CommodityController">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                             <table id="product_data" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ui-options="dataTableOpt" ng-init="getCommodity()">
                         <tr class="grid-top-panel">
                             <th>Commodity Code</th>
                             <th>Category Name</th>
                             <th>Market User</th>
                             <th ng-click='sortColumn("product_name")'>Commodity Name</th>
                             <th ng-click='sortColumn("price")'>Price</th>
                             <!--th ng-click='sortColumn("units_in_stock")'>Units In Stock</th>
                             <th ng-click='sortColumn("units_on_order")'>Units On Order</th>
                             <th>Quantity Per Unit</th>
                             <th>Product Measures</th>
                             <th>Status</th>
                             <th>Intention</th-->
                             <th>Created Date</th>
                             <!--th>Updated Date</th-->
                             <th>Entered By</th>
                             <th>View</th>
                             <th>Edit</th>
                             <th>Delete</th>
                        </tr></thead>
                        <tr ng-repeat="prod in products | orderBy :'reverse' track by $index" ng-switch on="(editIndex == $index)">
                             <td>{{$index+1}}</td>
                             <td>{{prod.category_name}}</td>
                             <td>{{prod.company_name}}</td>
                             <td>{{prod.full_name}}</td>
                             <td>{{prod.product_name}}</td>
                             <td>{{prod.units}}</td>
                             <td>{{prod.price}}</td>
                             <td>{{prod.units_in_stock}}</td>
                             <td>{{prod.units_on_order}}</td>
                             <td>{{prod.quantity_per_unit}}</td>
                             <td>{{prod.product_measures}}</td>
                             <td><button type="button" class="btn btn-success btn-xs">{{prod.product_status}}</button></td>
                             <td>{{prod.product_intention}}</td>
                             <td>{{prod.created_date}}</td>
                             <!--td>{{prod.updated_date}}</td-->
                             <td>{{prod.entered_by}}</td>
                              <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-info btn-xs" title="View" ng-click="view($index);"><li class="glyphicon glyphicon-open"></li></button>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-warning btn-xs" title="Edit" data-toggle="modal" data-target="#productModal" ng-click="edit($index);"><li class="glyphicon glyphicon-pencil"></li></button>
                                   <!--Buttons for editing -->
                                        <button class="green" ng-switch-when="true" ng-click="saveEdit($index)">save</button>
                                        <button class="red" ng-switch-when="true" ng-click="cancelEdit()">X</button>
                                        
                               </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                   <button type="button" class="btn btn-danger btn-xs" title="Delete" ng-click="deleteProduct($index);"><li class="glyphicon glyphicon-trash"></li></button>
                                </div>
                            </td>
                        </tr>
                         </table>
                </div>
            </div>
        </div>
     </div>
    </div>
</div>

        <div id="commodityModal" class="modal fade pop-details" role="dialog">
            <div class="modal-dialog">
                <form ng-submit="newProduct()" name="productForm" id="product_form" ng-controller="CommodityController" class="well form-horizontal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add Commodity</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="category_name">Select Category</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="category_id" name="text" class="form-control selectpicker" ng-model="product.category_id" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select Category</option>
                                    <?php echo fill_category_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <!--div class="form-group">
                                <label class="col-md-4 control-label" for="supplier_name">Select Supplier</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="supplier_id" name="text" class="form-control selectpicker" ng-model="product.supplier_id" style="width: 15em;height: 2.5em;">
                                    <option value="">Select Supplier</option>
                                    <?php //echo fill_supplier_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="supplier_name">Select Market User</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="user_id" name="text" class="form-control selectpicker" ng-model="product.user_id" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select User</option>
                                    <?php echo fill_market_user_list($con); ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="units">Select Commodity Name</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="product_name" name="text" class="form-control selectpicker" ng-model="product.product_name" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select Commodity</option>
                                    <option value="Cavendish">Cavendish (Bogoya)</option>
                                    <option value="Yellow Bananas">Yellow Bananas</option>
                                    <option value="Sweet Bananas">Sweet Bananas</option>
                                    <option value="Pineapples">Pineapples</option>
                                    <option value="Mangoes">Mangoes</option>
                                    <option value="Oranges">Oranges</option>
                                    <option value="Water Melon">Water Melon</option>
                                    <option value="Apples">Apples</option>
                                    <option value="Lemon">Lemon</option>
                                    <option value="Passion Fruit">Passion Fruit</option>
                                    <option value="Avocado">Avocado</option>
                                    <option value="Paw Paw">Paw Paw</option>
                                    <option value="Jack Fruit">Jack Fruit</option>
                                    <option value="Grapes">Grapes</option>
                                    <option value="Strawberry">Strawberry</option>
                                    <option value="Guava">Guava</option>
                                    <option value="Apricot">Apricot</option>
                                    <option value="Blackberry">Blackberry</option>
                                    <option value="Coconut">Coconut</option>
                                    <option value="Papaya">Papaya</option>
                                    <option value="Peach">Peach</option>
                                    <option value="Pomelo">Pomelo</option>
                                    <option value="Star Apple">Star Apple</option>
                                    <option value="Sugar Canes">Sugar Canes</option>
                                    <option value="Guavas">Guavas</option>
                                    <option value="Pump Kins">Pump Kins</option>
                                    <option value="Matooke">Matooke</option>
                                    <option value="Pakistan Rice">Pakistan Rice</option>
                                    <option value="Super">Super Rice</option>
                                    <option value="Kayiso">Kayiso Rice</option>
                                    <option value="Rough">Rough Rice</option>
                                    <option value="Nambale Beans">Nambale Beans</option>
                                    <option value="Yellow Beans">Yellow Beans</option>
                                    <option value="Mazave Beans">Mazave Beans</option>
                                    <option value="Soybeans">Soybeans</option>
                                    <option value="Sim Sim">Sim Sim</option>
                                    <option value="Pea Nuts">Pea Nuts</option>
                                    <option value="Cawo Peas">Cawo Peas</option>
                                    <option value="Cashew Nuts">Cashew Nuts</option>
                                    <option value="Sun Flower Seeds">Sun Flower Seeds</option>
                                    <option value="Corn">Corn</option>
                                    <option value="Oats">Oats</option>
                                    <option value="Barley">Barley</option>
                                    <option value="Wheat">Wheat</option>
                                    <option value="Cocoa">Cocoa</option>
                                    <option value="Fresh Maize">Fresh Maize</option>
                                    <option value="Maize Grains">Maize Grains</option>
                                    <option value="Millet">Millet</option>
                                    <option value="Sorghum">Sorghum</option>
                                    <option value="Cassava">Cassava</option>
                                    <option value="Irish Potatoes">Irish Potatoes</option>
                                    <option value="Sweet Potatoes">Sweet Potatoes</option>
                                    <option value="Yams">Yams</option>
                                    <option value="Ginger">Ginger|Tangawizi</option>
                                    <option value="Whole-Wheat">Whole-Wheat</option>
                                    <option value="Maize Flour">Maize Flour</option>
                                    <option value="Millet Flour">Millet Flour</option>
                                    <option value="Sorghum Flour">Sorghum Flour</option>
                                    <option value="Cassava Flour">Cassava Flour</option>
                                    <option value="Wheat Flour">Wheat Flour</option>
                                    <option value="Soya Flour">Soya Flour</option>
                                    <option value="Tomatoes">Tomatoes</option>
                                    <option value="Onions">Onions</option>
                                    <option value="Carrots">Carrots</option>
                                    <option value="Garlic">Garlic</option>
                                    <option value="Red Pepper">Red Pepper</option>
                                    <option value="Green Pepper">Green Pepper</option>
                                    <option value="Cabagge">Cabagge</option>
                                    <option value="Cucumber">Cucumber</option>
                                    <option value="Egg plant">Egg Plant</option>
                                    <option value="Spinnach">Spinach</option>
                                    <option value="Brocolli">Brocolli</option>
                                    <option value="Cauliflower">Cauliflower</option>
                                    <option value="Lettuce">Lettuce</option>
                                    <option value="Celery">Celery</option>
                                    <option value="Kale">Kale</option>
                                    <option value="Turnip">Turnip</option>
                                    <option value="Cotton Oil">Cotton Oil</option>
                                    <option value="Palm Oil">Palm Oil</option>
                                    <option value="Sun Flower Oil">Sun Flower Oil</option>
                                    <option value="Beef">Beef</option>
                                    <option value="Pork Bellies">Pork Bellies</option>
                                    <option value="Goat Meat">Goat Meat</option>
                                    <option value="Sheep Meat">Sheep Meat</option>
                                    <option value="Rabbit Meat">Rabbit Meat</option>
                                    <option value="Donkey Meat">Donkey Meat</option>
                                    <option value="Milk">Milk</option>
                                    <option value="Cheese">Cheese</option>
                                    <option value="Yorghut">Yorghut</option>
                                    <option value="Butter">Butter</option>
                                    <option value="Cattle">Cattle</option>
                                    <option value="Goats">Goats</option>
                                    <option value="Sheep">Sheep</option>
                                    <option value="Pigs">Pigs</option>
                                    <option value="Pigglets">Pigglets</option>
                                    <option value="Rabbits">Rabbits</option>
                                    <option value="Cotton">Cotton</option>
                                    <option value="Arabica Coffee">Arabica Coffee</option>
                                    <option value="Robusta Coffee">Robusta Coffee</option>
                                    <option value="Tea">Tea</option>
                                    <option value="Fresh Tilapia">Fresh Tilapia</option>
                                    <option value="Fresh Nile Perch">Fresh Nile Perch</option>
                                    <option value="Fresh Lung Fish">Fresh Lung Fish</option>
                                    <option value="Fresh Silver Fish">Fresh Silver Fish</option>
                                    <option value="Fresh Cat Fish">Fresh Cat Fish</option>
                                    <option value="Smoked Tilapia">Smoked Tilapia</option>
                                    <option value="Smoked Nile Perch">Smoked Nile Perch</option>
                                    <option value="Smoked Lung Fish">Smoked Lung Fish</option>
                                    <option value="Dried Silver Fish">Dried Silver Fish</option>
                                    <option value="Smoked Cat Fish">Smoked Cat Fish</option>
                                    <option value="Local Chicken">Local Chicken</option>
                                    <option value="Exotic Chicken">Exotic Chicken</option>
                                    <option value="Chicks">Chicks</option>
                                    <option value="Turkeys">Turkeys</option>
                                    <option value="Local Ducks">Local Ducks</option>
                                    <option value="Exotic Ducks">Exotic Ducks</option>
                                    <option value="Pigeons">Pigeons</option>
                                    <option value="Guinea Fowls">Guinea Fowls</option>
                                    <option value="Local Eggs">Local Eggs</option>
                                    <option value="Exotic Eggs">Exotic Eggs</option>
                                    <option value="Turkeys Eggs">Turkeys Eggs</option>
                                    <option value="Ducks Eggs">Ducks Eggs</option>
                                    <option value="Organic Fertilizers">Organic Fertilizers</option>
                                    <option value="Inorganic Fertilizers">Inorganic Fertilizers</option>
                                    <option value="Phosphate Fertilizers">Phosphate Fertilizers</option>
                                    <option value="Potassium Fertilizers">Potassium Fertilizers</option>
                                    <option value="Chemical Nitrogenous Fertilizers">Chemical Nitrogenous Fertilizers</option>
                                    <option value="Organic Pesticides">Organic Pesticides</option>
                                    <option value="Chemical Pesticides">Chemical Pesticides</option>
                                    <option value="Weed Control & Herbicides">Weed Control & Herbicides</option>
                                    <option value="Fungicides">Fungicides</option>
                                    <option value="Insecticides">Insecticides</option>
                                    <option value="Disinfectants">Disinfectants</option>
                                    <option value="Repellents">Repellents</option>
                                    <option value="Layers Mash">Layers Mash</option>
                                    <option value="Broilers Mash">Broilers Mash</option>
                                    <option value="Passion Fruits Seedlings">Passion Fruits Seedlings</option>
                                    <option value="Mango Seedlings">Mango Seedlings</option>
                                    <option value="Orange Seedlings">Orange Seedlings</option>
                                    <option value="Lemon Seedlings">Lemon Seedlings</option>
                                    <option value="Paw Paw Seedlings">Paw Paw Seedlings</option>
                                    <option value="Coffee Seedlings">Coffee Seedlings</option>
                                    <option value="Jack Fruit Seedlings">Jack Fruit Seedlings</option>
                                    <option value="Avocado Seedlings">Avocado Seedlings</option>
                                    <option value="Tomatoes Seedlings">Tomatoes Seedlings</option>
                                    <option value="Apples Seedlings">Apples Seedlings</option>
                                    <option value="Jack Fruit Seedlings">Jack Fruit Seedlings</option>
                                    <option value="Cashew Nuts Seedlings">Cashew Nuts Seedlings</option>
                                    <option value="Grapes Seedlings">Grapes Seedlings</option>
                                    <option value="Animal Feeds For Milk">Animal Feeds For Milk</option>
                                    <option value="Animal Feeds For Beef">Animal Feeds For Beef</option>
                                    <option value="Maize Seeds">Maize Seeds</option>
                                    <option value="Onion Seeds">Onion Seeds</option>
                                    <option value="Carrot Seeds">Carrot Seeds</option>
                                    <option value="Tomato Seeds">Tomato Seeds</option>
                                    <option value="Rice Seeds">Rice Seeds</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="units">Select Sale Units</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="units" name="text" class="form-control selectpicker" ng-model="product.units" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select</option>
                                    <option value="Wholesale">Wholesale Price</option>
                                    <option value="Retail">Retail Price</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Enter Product Base Price</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input type="number" name="price" id="price" class="form-control" ng-model="product.price" pattern="[+-]?([0-9]*[.])?[0-9]+"/ required="required" style="width: 15em;">
                            </div>
                        </div>
                    </div>
                            <!--div class="form-group">
                                <label class="col-md-4 control-label">Enter Units In Stock</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                                <input type="number" name="units_in_stock" id="units_in_stock" class="form-control" ng-model="product.units_in_stock" pattern="[+-]?([0-9]*[.])?[0-9]+" required="required" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Enter Units On Order</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                                <input type="number" name="units_on_order" id="units_on_order" class="form-control" ng-model="product.units_on_order" pattern="[+-]?([0-9]*[.])?[0-9]+" required="required" style="width: 15em;"/>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Enter Quantity Per Unit</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <input type="text" name="quantity" id="quantity" class="form-control" pattern="[+-]?([0-9]*[.])?[0-9]+" ng-model="product.quantity_per_unit" required="required"style="width: 10em;"/> 
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="product_measures" class="form-control selectpicker" ng-model="product.product_measures" style="width: 5em;height: 2.5em;">
                                            <option value="">Select Unit</option>
                                            <option value="Bags">Bags</option>
                                            <option value="Bottles">Bottles</option>
                                            <option value="Box">Box</option>
                                            <option value="Bunch">Bunch</option>
                                            <option value="Tonnes">Tonnes</option>
                                            <option value="Grams">Grams</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Inch">Inch</option>
                                            <option value="Liters">Liters</option>
                                            <option value="Packets">Packet</option>
                                            <option value="Trays">Tray</option>
                                            <option value="Pounds">Pounds</option>
                                            <option value="Pieces">Pieces</option>
                                            <option value="Number">Number</option>
                                            <option value="Sack">Sack</option>
                                        </select>
                                    </div>
                                </div>
                            </div-->
                            
                            
                            <!--div>
                                <h2>Uploaded Images</h2>
                                <?php
                                //Get images from the database
                                //$query = $db->query("SELECT * FROM product ORDER BY created_date DESC");
                                //if($query->num_rows > 0){
                                  //  while ($row = $query->fetch_assoc()) {
                                       // $imageURL = 'uploads/'.$row['productimg'];
                                        ?>
                                       <img src="<?php //echo $imageURL; ?> "/>
                                        <?php
                                    //}
                               // } else {
                                    ?>
                                    <p>No image(s) found ...</p>
                                    <?php
                               // }
                                ?>
                            </div->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Select Product Status</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                        <select name="text" id="product_status" class="form-control selectpicker" ng-model="product.product_status" required="required" style="width: 15em;height: 2.5em;">
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="supplier_name">Select Your Intention</label>
                                <div class="col-md-4 selectContainer">
                                   <div class="input-group">
                                    <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                    <select id="product_intention" name="text" class="form-control selectpicker" ng-model="product.product_intention" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select Intention</option>
                                    <option value="Buying">Buying</option>
                                    <option value="Selling">Selling</option>
                                    </select>
                                </div>
                            </div>
                            </div-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Created Date </label>
                                <input type="date" name="create_date" id="creat_date" class="form-control" ng-model="product.created_date" required="required" style="width: 15em;" />
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Entered By</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="entered_by" id="entered_by" class="form-control" ng-model="product.entered_by" required="required" style="width: 15em;"/>
                            </div>
                            </div>
                         </div>
                         <div class="form-group" ng-app="fileUpload" id="container" ng-controller="upload" enctype="multipart/form-data">
                                <label class="col-md-4 control-label">Select Product Images</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                <input type="file" name="product_image[]" multiple id="productimg" accept="image/*" fileinput="file" filepreview="filepreview" class="file-upload" ng-model="product.productimg"/>                             
                                <img ng-src="{{filepreview}}" class="img-responsive" ng-show="filepreview"/>
                                <input type='submit' value='Upload' name='submit' class="btn btn-success" />
                            </div>
                        </div>
                    </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="code" id="code" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="productdetailsModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Commodity Details</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="product_details"></Div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
