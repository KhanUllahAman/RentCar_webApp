<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['submit'])) {
		$vehicletitle = $_POST['vehicletitle'];
		$brand = $_POST['brandname'];
		$vehicleoverview = $_POST['vehicalorcview'];
		$priceperday = $_POST['priceperday'];
		$fueltype = $_POST['fueltype'];
		$modelyear = $_POST['modelyear'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$airconditioner = $_POST['airconditioner'];
		$powerdoorlocks = $_POST['powerdoorlocks'];
		$antilockbrakingsys = $_POST['antilockbrakingsys'];
		$brakeassist = $_POST['brakeassist'];
		$powersteering = $_POST['powersteering'];
		$driverairbag = $_POST['driverairbag'];
		$passengerairbag = $_POST['passengerairbag'];
		$powerwindow = $_POST['powerwindow'];
		$cdplayer = $_POST['cdplayer'];
		$centrallocking = $_POST['centrallocking'];
		$crashcensor = $_POST['crashcensor'];
		$leatherseats = $_POST['leatherseats'];
		$id = intval($_GET['id']);
		// Check if the vehicle title already exists in the database
		$checkSql = "SELECT id FROM tblvehicles WHERE VehiclesTitle = :vehicletitle AND id != :id";
		$checkQuery = $dbh->prepare($checkSql);
		$checkQuery->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$checkQuery->bindParam(':id', $id, PDO::PARAM_INT);
		$checkQuery->execute();

		if ($checkQuery->rowCount() > 0) {
			$error = "Vehicle title already exists. Please choose a different title.";
		} else{

			$sql = "update tblvehicles set VehiclesTitle=:vehicletitle,VehiclesBrand=:brand,VehiclesOverview=:vehicleoverview,PricePerDay=:priceperday,FuelType=:fueltype,ModelYear=:modelyear,SeatingCapacity=:seatingcapacity,AirConditioner=:airconditioner,PowerDoorLocks=:powerdoorlocks,AntiLockBrakingSystem=:antilockbrakingsys,BrakeAssist=:brakeassist,PowerSteering=:powersteering,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,PowerWindows=:powerwindow,CDPlayer=:cdplayer,CentralLocking=:centrallocking,CrashSensor=:crashcensor,LeatherSeats=:leatherseats where id=:id ";
			$query = $dbh->prepare($sql);
			$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
			$query->bindParam(':brand', $brand, PDO::PARAM_STR);
			$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
			$query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
			$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
			$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
			$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
			$query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_STR);
			$query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
			$query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_STR);
			$query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
			$query->bindParam(':powersteering', $powersteering, PDO::PARAM_STR);
			$query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
			$query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
			$query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_STR);
			$query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_STR);
			$query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
			$query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
			$query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_STR);
			$query->bindParam(':id', $id, PDO::PARAM_STR);
			$query->execute();
	
			$msg = "Data updated successfully";
		}
	}


?>

	<?php
	include "includes/header.php"
	?>
	<!-- End Navbar -->
	<div class="container-fluid py-4">
		<div class="row mt-4">
			<div class="col-lg-12 mb-lg-0 mb-4">
				<div class="card z-index-2 h-400" style="background-color: #1c2a57;">
					<?php if ($error) { ?>
						<div class="alert alert-dismissible fade show" role="alert" style="background-color: #f8d7da;">
							<strong style="color: #842029;">ERROR <?php echo htmlentities($error); ?></strong>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: #000 !important;"></button>
						</div><?php } else if ($msg) { ?>
						<div class="alert alert-dismissible fade show" role="alert" style="background-color: #d1e7dd;">
							<strong style="color: #0f5132;">SUCCESS <?php echo htmlentities($msg); ?></strong>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color: #000 !important;"></button>
						</div>
					<?php } ?>
					<div class="card-body p-5">
						<?php
						$id = intval($_GET['id']);
						$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:id";
						$query = $dbh->prepare($sql);
						$query->bindParam(':id', $id, PDO::PARAM_STR);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);
						$cnt = 1;
						if ($query->rowCount() > 0) {
							foreach ($results as $result) {	?>
								<form method="post" class="form-horizontal" enctype="multipart/form-data">
									<div class="row">
										<div class="form-floating mb-3 col-9">
											<input type="text" class="form-control valid1" id="floatingInput1" placeholder="Enter Vehicle Title" value="<?php echo htmlentities($result->VehiclesTitle) ?>" name="vehicletitle">
											<div class="error-message" id="fullname-error" style="color: red;"></div>
											<label for="floatingInput1">Vehicle Title</label>
										</div>
										<div class="form-floating mb-3 col-3">
											<select class="form-select valid2" id="floatingSelect" name="brandname">
												<option value="<?php echo htmlentities($result->bid); ?>"><?php echo htmlentities($bdname = $result->BrandName); ?> </option>
												<?php $ret = "select id,BrandName from tblbrands";
												$query = $dbh->prepare($ret);
												//$query->bindParam(':id',$id, PDO::PARAM_STR);
												$query->execute();
												$resultss = $query->fetchAll(PDO::FETCH_OBJ);
												if ($query->rowCount() > 0) {
													foreach ($resultss as $results) {
														if ($results->BrandName == $bdname) {
															continue;
														} else {
												?>
															<option value="<?php echo htmlentities($results->id); ?>"><?php echo htmlentities($results->BrandName); ?></option>
												<?php }
													}
												} ?>

											</select>
											<div class="error-message" id="brandname-error" style="color: red;"></div>

										</div>
										<div class="form-floating mb-3 col-12">
											<input type="text" class="form-control valid3" id="floatingInput1" placeholder="Enter Vehicle Overview" name="vehicalorcview" value="<?php echo htmlentities($result->VehiclesOverview); ?>" style="height: 100px;">
											<div class="error-message" id="vehicleoverview-error" style="color: red;"></div>
											<label for="floatingInput1">Vehicle Over View</label>
										</div>
										<div class="form-floating mb-3 col-6">
											<input type="text" class="form-control valid4" id="floatingInput1" placeholder="Enter Vehicle Price" value="<?php echo htmlentities($result->PricePerDay); ?>" name="priceperday">
											<div class="error-message" id="price-error" style="color: red;"></div>
											<label for="floatingInput1">Price per Day(in USD)</label>
										</div>
										<div class="form-floating mb-3 col-6">
											<select class="form-select valid5" id="floatingSelect" name="fueltype">
												<option value="<?php echo htmlentities($results->FuelType); ?>"> <?php echo htmlentities($result->FuelType); ?> </option>
												<option value="Petrol">Petrol</option>
												<option value="Diesel">Diesel</option>
												<option value="CNG">CNG</option>
											</select>
											<div class="error-message" id="fuel-error" style="color: red;"></div>
										</div>
										<div class="form-floating mb-3 col-9">
											<input type="text" class="form-control valid6" id="floatingInput1" placeholder="Enter Modal/Year" value="<?php echo htmlentities($result->ModelYear); ?>" name="modelyear">
											<div class="error-message" id="modelyear-error" style="color: red;"></div>
											<label for="floatingInput1">Modal Year</label>
										</div>
										<div class="form-floating mb-3 col-3">
											<input type="text" class="form-control valid7" id="floatingInput1" placeholder="Enter seating capacity" value="<?php echo htmlentities($result->SeatingCapacity); ?>" name="seatingcapacity">
											<div class="error-message" id="capacity-error" style="color: red;"></div>
											<label for="floatingInput1">Seating Capacity*</label>
										</div>
									</div>
									<br><br><br>
									<h4 class="text-light font-weight-bold">Upload Images</h4>
									<div class="row">
										<div class="col-sm-4" style="color: #FFFFFF;">
											Image 1 <img src="./assets/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" width="300" height="200" style="border:solid 1px #000">
											<a style="color: #FE5115;" href="changeimage1.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 1</a>
										</div>
										<div class="col-sm-4" style="color: #FFFFFF;">
											Image 2<img src="./assets/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" width="300" height="200" style="border:solid 1px #000">
											<a style="color: #FE5115;" href="changeimage2.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 2</a>
										</div>
										<div class="col-sm-4" style="color: #FFFFFF;">
											Image 3<img src="./assets/img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" width="300" height="200" style="border:solid 1px #000">
											<a style="color: #FE5115;" href="changeimage3.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 3</a>
										</div>
										<div class="col-sm-4" style="color: #FFFFFF;">
											Image 4<img src="./assets/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" width="300" height="200" style="border:solid 1px #000">
											<a style="color: #FE5115;" href="changeimage4.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 4</a>
										</div>
										<div class="col-sm-4" style="color: #FFFFFF;">
											Image 5
											<?php if ($result->Vimage5 == "") {
												echo htmlentities("File not available");
											} else { ?>
												<img src="./assets/img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" width="300" height="200" style="border:solid 1px #000">
												<a style="color: #FE5115;" href="changeimage5.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 5</a>
											<?php } ?>
										</div>
									</div>
									<br><br><br>
									<div class="row">
										<h4 class="text-light font-weight-bold">Accessories</h4>
										<div class="col-12 mb-3">
											<?php if ($result->AirConditioner == 1) { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="airconditioner" name="airconditioner" checked value="1">
													<label class="form-check-label text-light" for="airconditioner">Air Conditioner</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="airconditioner" name="airconditioner" value="1">
													<label class="form-check-label text-light" for="airconditioner">Air Conditioner</label>
												</div>
											<?php } ?>

											<?php if ($result->PowerDoorLocks == 1) { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="powerdoorlocks" name="powerdoorlocks" checked value="1">
													<label class="form-check-label text-light" for="powerdoorlocks">Power Door Locks</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
													<label class="form-check-label text-light" for="powerdoorlocks">Power Door Locks</label>
												</div>
											<?php } ?>

											<?php if ($result->AntiLockBrakingSystem == 1) { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" checked value="1">
													<label class="form-check-label text-light" for="antilockbrakingsys">AntiLock Braking</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
													<label class="form-check-label text-light" for="antilockbrakingsys">AntiLock Braking</label>
												</div>
											<?php } ?>

											<?php if ($result->BrakeAssist == 1) {
											?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="brakeassist" name="brakeassist" checked value="1">
													<label class="form-check-label text-light" for="brakeassist">Brake Assist</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="brakeassist" name="brakeassist" value="1">
													<label class="form-check-label text-light" for="brakeassist">Brake Assist</label>
												</div>
											<?php } ?>

											<?php if ($result->PowerSteering == 1) {
											?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="powersteering" name="powersteering" checked value="1">
													<label class="form-check-label text-light" for="powersteering">Power Steering</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="powersteering" name="powersteering" value="1">
													<label class="form-check-label text-light" for="powersteering">Power Steering</label>
												</div>
											<?php } ?>


											<?php if ($result->DriverAirbag == 1) {
											?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="driverairbag" name="driverairbag" checked value="1">
													<label class="form-check-label text-light" for="accessory3">Driver Airbag</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="driverairbag" name="driverairbag" value="1">
													<label class="form-check-label text-light" for="accessory3">Driver Airbag</label>
												</div>
											<?php } ?>


											<?php if ($result->DriverAirbag == 1) {
											?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="passengerairbag" name="passengerairbag" checked value="1">
													<label class="form-check-label text-light" for="passengerairbag">Passenger Airbag</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
													<label class="form-check-label text-light" for="passengerairbag">Passenger Airbag</label>
												</div>
											<?php } ?>

											<?php if ($result->PowerWindows == 1) {
											?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="powerwindow" name="powerwindow" checked value="1">
													<label class="form-check-label text-light" for="powerwindow">Power Windows</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="powerwindow" name="powerwindow" value="1">
													<label class="form-check-label text-light" for="powerwindow">Power Windows</label>
												</div>
											<?php } ?>

											<?php if ($result->CDPlayer == 1) {
											?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="cdplayer" name="cdplayer" checked value="1">
													<label class="form-check-label text-light" for="cdplayer">CD Player</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="cdplayer" name="cdplayer" value="1">
													<label class="form-check-label text-light" for="cdplayer">CD Player</label>
												</div>
											<?php } ?>

											<?php if ($result->CentralLocking == 1) {
											?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="centrallocking" name="centrallocking" checked value="1">
													<label class="form-check-label text-light" for="centrallocking">Central Locking</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="centrallocking" name="centrallocking" value="1">
													<label class="form-check-label text-light" for="centrallocking">Central Locking</label>
												</div>
											<?php } ?>

											<?php if ($result->CrashSensor == 1) {
											?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="crashcensor" name="crashcensor" checked value="1">
													<label class="form-check-label text-light" for="crashcensor">Crash Sensor</label>
												</div>
											<?php } else { ?>
												<div class="form-check form-check-inline col-2">
													<input class="form-check-input" type="checkbox" id="crashcensor" name="crashcensor" value="1">
													<label class="form-check-label text-light" for="crashcensor">Crash Sensor</label>
												</div>
											<?php } ?>
										</div>
									</div>
							<?php }
						} ?>
							<div class="d-grid">
								<button class="btn" type="submit" style="background-color: #FE5115; color: #FFF;" name="submit">Save Changes</button>
							</div>
								</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		include "includes/footer.php"
		?>
		<script>
			// for vehicle title//
			function validateVehicleTitle() {
				var vehicleInput = document.querySelector(".valid1");
				var vehicleError = document.getElementById("fullname-error");

				var vehicleTitle = vehicleInput.value.trim();

				if (vehicleTitle.length < 4 || vehicleTitle.length > 15) {
					vehicleError.textContent = "Vehicle Title must be between 4 and 15 characters.";
					vehicleInput.classList.remove("valid");
					vehicleInput.classList.add("invalid");
				} else {
					vehicleError.textContent = "";
					vehicleInput.classList.remove("invalid");
					vehicleInput.classList.add("valid");
				}
			}
			// for vehicle title//
			// for select brand//
			function validateBrandSelection() {
				var brandSelect = document.querySelector(".valid2");
				var brandError = document.getElementById("brandname-error");

				if (brandSelect.value === "") {
					brandError.textContent = "Please select a Brand.";
					brandSelect.classList.remove("valid");
					brandSelect.classList.add("invalid");
				} else {
					brandError.textContent = "";
					brandSelect.classList.remove("invalid");
					brandSelect.classList.add("valid");
				}
			}
			// for select brand//
			// for vehicle overview//
			function validateVehicleOverview() {
				var vehicleOverviewInput = document.querySelector(".valid3");
				var vehicleOverviewError = document.getElementById("vehicleoverview-error");

				var vehicleOverview = vehicleOverviewInput.value.trim();

				if (vehicleOverview.length < 50) {
					vehicleOverviewError.textContent = "Vehicle Overview must be at least 50 characters long.";
					vehicleOverviewInput.classList.remove("valid");
					vehicleOverviewInput.classList.add("invalid");
				} else {
					vehicleOverviewError.textContent = "";
					vehicleOverviewInput.classList.remove("invalid");
					vehicleOverviewInput.classList.add("valid");
				}
			}
			// for vehicle overview//
			// for vehicle Price//
			function validatePricePerDay() {
				var priceInput = document.querySelector(".valid4");
				var priceError = document.getElementById("price-error");

				var priceValue = priceInput.value.trim();

				// Use regex to check if the input contains only digits
				var regex = /^[0-9]+$/;

				if (!regex.test(priceValue)) {
					priceError.textContent = "Price must contain only numbers.";
					priceInput.classList.remove("valid");
					priceInput.classList.add("invalid");
				} else {
					priceError.textContent = "";
					priceInput.classList.remove("invalid");
					priceInput.classList.add("valid");
				}
			}
			// for vehicle Price//
			// for fuel type//
			function validateFuelType() {
				var fuelTypeSelect = document.querySelector(".valid5");
				var fuelTypeError = document.getElementById("fuel-error");

				if (fuelTypeSelect.value === "") {
					fuelTypeError.textContent = "Please select a Fuel Type.";
					fuelTypeSelect.classList.remove("valid");
					fuelTypeSelect.classList.add("invalid");
				} else {
					fuelTypeError.textContent = "";
					fuelTypeSelect.classList.remove("invalid");
					fuelTypeSelect.classList.add("valid");
				}
			}
			// for fuel type//
			// Validate Model Year
			function validateModelYear() {
				var modelYearInput = document.querySelector(".valid6");
				var modelYearError = document.getElementById("modelyear-error");

				var modelYearValue = modelYearInput.value.trim();

				// Use regex to check if the input contains exactly 4 digits
				var regex = /^\d{4}$/;

				if (!regex.test(modelYearValue)) {
					modelYearError.textContent = "Model Year must be a 4-digit number.";
					modelYearInput.classList.remove("valid");
					modelYearInput.classList.add("invalid");
				} else {
					modelYearError.textContent = "";
					modelYearInput.classList.remove("invalid");
					modelYearInput.classList.add("valid");
				}
			}
			// Validate Model Year
			// Validate sitting capacity
			function validateSittingCapacity() {
				var seatingCapacityInput = document.querySelector(".valid7");
				var seatingCapacityError = document.getElementById("capacity-error");

				var seatingCapacityValue = seatingCapacityInput.value.trim();

				// Use regex to check if the input contains only 2 or 4 digits
				var regex = /^(2|4)$/;

				if (!regex.test(seatingCapacityValue)) {
					seatingCapacityError.textContent = "Seating Capacity must be 2 or 4.";
					seatingCapacityInput.classList.remove("valid");
					seatingCapacityInput.classList.add("invalid");
				} else {
					seatingCapacityError.textContent = "";
					seatingCapacityInput.classList.remove("invalid");
					seatingCapacityInput.classList.add("valid");
				}
			}
			// Validate sitting capacity
			// Attach event listeners to trigger validation on blur and change events
			document.querySelector(".valid1").addEventListener("input", validateVehicleTitle);
			document.querySelector(".valid1").addEventListener("blur", validateVehicleTitle);

			document.querySelector(".valid2").addEventListener("blur", validateBrandSelection);

			document.querySelector(".valid3").addEventListener("input", validateVehicleOverview);
			document.querySelector(".valid3").addEventListener("blur", validateVehicleOverview);

			document.querySelector(".valid4").addEventListener("input", validatePricePerDay);
			document.querySelector(".valid4").addEventListener("blur", validatePricePerDay);

			document.querySelector(".valid5").addEventListener("blur", validateFuelType);

			document.querySelector(".valid6").addEventListener("input", validateModelYear);
			document.querySelector(".valid6").addEventListener("blur", validateModelYear);

			document.querySelector(".valid7").addEventListener("input", validateSittingCapacity);
			document.querySelector(".valid7").addEventListener("blur", validateSittingCapacity);


			function validateForm() {
				var isValid = true;

				// Call all validation functions here
				validateVehicleTitle();
				validateBrandSelection();
				validateVehicleOverview();
				validatePricePerDay();
				validateFuelType();
				validateModelYear();
				validateSittingCapacity();
				// Check if any field is invalid, and prevent form submission
				if (
					document.querySelectorAll('.form-control.invalid').length > 0 ||
					document.querySelectorAll('.error-message').some(error => error.textContent.trim() !== "")
				) {
					isValid = false;
				}

				// If all fields are valid, allow form submission
				return isValid;
			}
		</script>
	</div>
	</main>
<?php } ?>