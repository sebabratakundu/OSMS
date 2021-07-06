<?php

echo '<div class="container my-5">
<div class="modal fade" id="product-modal">
					    <div class="modal-dialog modal-dialog-centered">
					      <div class="modal-content">
					      
					        <!-- Modal Header -->
					        <div class="modal-header">
					          <h4 class="modal-title font-gothic">Update Product Details</h4>
					          <button type="button" class="close d-print-none" data-dismiss="modal">×</button>
					        </div>
					        
					        <!-- Modal body -->
					        <div class="modal-body p-4">
					        <form class="update-product-form mb-3">
					        	<div class="form-group">
									<label for="pro-id">Product ID</label>
									<input type="number" name="pro-id" id="pro-id" readonly class="form-control">
								</div>
								<div class="form-group">
									<label for="pname">Product Name</label>
									<input type="text" name="pname" id="pname" readonly class="form-control">
								</div>
								<div class="form-group">
									<label for="pdop">DOP</label>
									<input type="date" name="pdop" id="pdop" required="required" class="form-control">
								</div>
								<div class="form-group">
									<label for="pqty">Quantity</label>
									<input type="number" name="pqty" id="pqty" required="required" class="form-control">
								</div>
								<div class="form-group">
									<label for="ptotal">Total</label>
									<input type="number" name="ptotal" id="ptotal" required="required" class="form-control">
								</div>
								<div class="form-group">
									<label for="po-price">Original Price</label>
									<input type="number" name="po-price" id="po-price" required="required" class="form-control">
								</div>
								<div class="form-group">
									<label for="ps-price">Selling Price</label>
									<input type="number" name="ps-price" id="ps-price" required="required" class="form-control">
								</div>

								<button class="btn btn-danger update-btn" type="submit">Update</button>
					        </form>
					        <div class="update-product-notice d-none"></div>
					        </div>
					        </div>
					        </div>
					        </div>
					        <div class="modal fade" id="add-product-modal">
					    <div class="modal-dialog modal-dialog-centered">
					      <div class="modal-content">
					      
					        <!-- Modal Header -->
					        <div class="modal-header">
					          <h4 class="modal-title font-gothic">Add New Product</h4>
					          <button type="button" class="close d-print-none" data-dismiss="modal">×</button>
					        </div>
					        
					        <!-- Modal body -->
					        <div class="modal-body p-4">
					        <form class="add-product-form mb-3">
								<div class="form-group">
						<label for="name">Product Name</label>
						<input type="text" name="name" id="name" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="dop">DOP</label>
						<input type="date" name="dop" id="dop" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="qty">Quantity</label>
						<input type="number" name="qty" id="qty" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="total">Total</label>
						<input type="number" name="total" id="total" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="o-price">Original Price</label>
						<input type="number" name="o-price" id="o-price" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="s-price">Selling Price</label>
						<input type="number" name="s-price" id="s-price" required="required" class="form-control">
					</div>
					<button class="btn btn-outline-danger btn-block mt-5 py-2 font-weight-bold add-pro-btn" type="submit">ADD PRODUCT</button>
					        </form>
					        <div class="add-product-notice d-none"></div>
					        </div>
					        </div>
					        </div>
					        </div>

					        <div class="modal fade" id="sell-product-modal">
					    <div class="modal-dialog modal-dialog-centered">
					      <div class="modal-content">
					      
					        <!-- Modal Header -->
					        <div class="modal-header">
					          <h4 class="modal-title font-gothic">Sell Products</h4>
					          <button type="button" class="close d-print-none" data-dismiss="modal">×</button>
					        </div>
					        
					        <!-- Modal body -->
					        <div class="modal-body p-4">
					        <form class="sell-product-form mb-3">
					       	<div class="form-group">
									<label for="spro-id">Product ID</label>
									<input type="number" name="spro-id" id="spro-id" readonly class="form-control">
								</div>
					<div class="form-group">
						<label for="cus-name">Customer Name</label>
						<input type="text" name="cus-name" id="cus-name" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="cus-address">Customer Address</label>
						<input type="text" name="cus-address" id="cus-address" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="cus-email">Customer Email</label>
						<input type="email" name="cus-email" id="cus-email" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="cus-mobile">Customer Mobile</label>
						<input type="number" name="cus-mobile" id="cus-mobile" required="required" class="form-control">
					</div>
						<div class="form-group">
						<label for="sname">Product Name</label>
						<input type="text" name="sname" id="sname" readonly class="form-control">
					</div>
					<div class="form-group">
						<label for="sqty">Available</label>
						<input type="number" name="sqty" id="sqty" readonly class="form-control">
					</div>
					<div class="form-group">
						<label for="cqty">Quantity</label>
						<input type="number" name="cqty" id="cqty" required="required" class="form-control">
					</div>
					<div class="form-group">
						<label for="sprice">Selling Price</label>
						<input type="number" name="sprice" id="sprice" readonly class="form-control">
					</div>
					<div class="form-group">
						<label for="total-price">Total Price</label>
						<input type="number" name="total-price" id="total-price" readonly class="form-control">
					</div>
					<button class="btn btn-outline-danger btn-block mt-5 py-2 font-weight-bold sell-pro-btn" type="submit">SALE PRODUCT</button>
					        </form>
					        <div class="sell-product-notice d-none"></div>
					        </div>
					        </div>
					        </div>
					        </div>
					<div class="row">
						<div class="col-md-12">
							<p class="bg-dark p-2 text-center text-white">List of Products</p>
							<div class="table-responsive">
								<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Product ID</th>
										<th>Name</th>
										<th>DOP</th>
										<th>Available</th>
										<th>Total</th>
										<th>Original Price (each)</th>
										<th>Selling Price (each)</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="pro-tbody">';?>
									<?php
									class get_employee{
									private $query;
									private $db;
									private $result;
									private $user_data;
									function __construct(){
										require_once("../../assets/database.php");
										$this -> db = new db();
										$this -> db = $this -> db -> __construct();
										$this -> query = $this -> db -> prepare("SELECT * FROM assets_table");
										$this -> query -> execute();
										$this -> result = $this -> query -> get_result();
										$this -> query -> close();
										if($this -> result -> num_rows !=0){
											while($this -> user_data = $this -> result -> fetch_assoc()){
												echo "<tr><td>".$this -> user_data["id"]."</td><td>".$this -> user_data["name"]."</td><td>".$this -> user_data["dop"]."</td><td>".$this -> user_data["qty"]."</td><td>".$this -> user_data["total"]."</td><td>".$this -> user_data["original_price"]."</td><td>".$this -> user_data["sale_price"]."</td><td class='text-center'><button class='btn btn-info edit-product-btn mr-lg-1 mb-1 mb-lg-0' pro-id='".base64_encode($this -> user_data["id"])."' name='".base64_encode($this -> user_data["name"])." ' dop='".base64_encode($this -> user_data["dop"])." ' qty='".base64_encode($this -> user_data["qty"])." 'total='".base64_encode($this -> user_data["total"])."' org-price='".base64_encode($this -> user_data["original_price"])."' sell-price='".base64_encode($this -> user_data["sale_price"])."'><i class='fa fa-pencil'></i></button><button class='btn btn-dark delete-product-btn mx-lg-1 my-1 my-lg-0' pro-id='".base64_encode($this -> user_data["id"])."'><i class='fa fa-trash'></i></button><button class='btn btn-warning sell-product-btn ml-lg-1 mt-1 mt-lg-0' pro-id='".base64_encode($this -> user_data["id"])."' name='".base64_encode($this -> user_data["name"])."' qty='".base64_encode($this -> user_data["qty"])."' sell-price='".base64_encode($this -> user_data["sale_price"])."'><i class='fa fa-shopping-cart'></i></button></td></tr>";
											}
										}
										else{
											echo "<tr><td>0</td><td>null</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>";
										}
									}
									}
									new get_employee();
									?>
								<?php echo '</tbody>
							</table>
							</div>
						</div>
					</div>
					<i class="fa fa-plus-circle text-danger position-fixed add-product-btn" style="font-size:50px;bottom:50px;right:50px;cursor:pointer;" title="add product"></i>
				</div>';

?>