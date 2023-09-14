<?php
session_start();
error_reporting(0);
include('includes/config.php');
function checkIfTitleExists($title)
{
    global $dbh;
    $sql = "SELECT COUNT(*) FROM tblvehicles WHERE VehiclesTitle = :title";
    $query = $dbh->prepare($sql);
    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->execute();
    $count = $query->fetchColumn();
    return $count > 0;
}
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
        $vimage1 = $_FILES["img1"]["name"];
        $vimage2 = $_FILES["img2"]["name"];
        $vimage3 = $_FILES["img3"]["name"];
        $vimage4 = $_FILES["img4"]["name"];
        $vimage5 = $_FILES["img5"]["name"];
        $airconditioner = isset($_POST['airconditioner']) ? $_POST['airconditioner'] : 0;
        $powerdoorlocks = isset($_POST['powerdoorlocks']) ? $_POST['powerdoorlocks'] : 0;
        $antilockbrakingsys = isset($_POST['antilockbrakingsys']) ? $_POST['antilockbrakingsys'] : 0;
        $brakeassist = isset($_POST['brakeassist']) ? $_POST['brakeassist'] : 0;
        $powersteering = isset($_POST['powersteering']) ? $_POST['powersteering'] : 0;
        $driverairbag = isset($_POST['driverairbag']) ? $_POST['driverairbag'] : 0;
        $passengerairbag = isset($_POST['passengerairbag']) ? $_POST['passengerairbag'] : 0;
        $powerwindow = isset($_POST['powerwindow']) ? $_POST['powerwindow'] : 0;
        $cdplayer = isset($_POST['cdplayer']) ? $_POST['cdplayer'] : 0;
        $centrallocking = isset($_POST['centrallocking']) ? $_POST['centrallocking'] : 0;
        $crashcensor = isset($_POST['crashcensor']) ? $_POST['crashcensor'] : 0;
        $leatherseats = isset($_POST['leatherseats']) ? $_POST['leatherseats'] : 0;
        // Check if the vehicle title already exists
        $titleExists = checkIfTitleExists($vehicletitle);
        // Server-side validation
        if (empty($vehicletitle) || empty($brand) || empty($vehicleoverview) || empty($priceperday) || empty($fueltype) || empty($modelyear) || empty($seatingcapacity) || empty($vimage1) || empty($vimage2) || empty($vimage3) || empty($vimage4) || empty($vimage5)) {
            $error = "Please fill out all inputs. includes Images";
        }elseif ($titleExists) {
        $error = "Vehicle title already exists. Please choose a different title.";
    }
         else {
            move_uploaded_file($_FILES["img1"]["tmp_name"], "img/vehicleimages/" . $_FILES["img1"]["name"]);
            move_uploaded_file($_FILES["img2"]["tmp_name"], "img/vehicleimages/" . $_FILES["img2"]["name"]);
            move_uploaded_file($_FILES["img3"]["tmp_name"], "img/vehicleimages/" . $_FILES["img3"]["name"]);
            move_uploaded_file($_FILES["img4"]["tmp_name"], "img/vehicleimages/" . $_FILES["img4"]["name"]);
            move_uploaded_file($_FILES["img5"]["tmp_name"], "img/vehicleimages/" . $_FILES["img5"]["name"]);

            $sql = "INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,AirConditioner,PowerDoorLocks,AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,PowerWindows,CDPlayer,CentralLocking,CrashSensor,LeatherSeats) VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:airconditioner,:powerdoorlocks,:antilockbrakingsys,:brakeassist,:powersteering,:driverairbag,:passengerairbag,:powerwindow,:cdplayer,:centrallocking,:crashcensor,:leatherseats)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
            $query->bindParam(':brand', $brand, PDO::PARAM_STR);
            $query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
            $query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
            $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
            $query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
            $query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
            $query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
            $query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
            $query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
            $query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
            $query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
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
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                $msg = "Vehicle posted successfully";
            } else {
                $error = "Something went wrong. Please try again";
            }
        }
    }
?>



    <?php
    include "includes/header.php"
    ?>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
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
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-floating mb-3 col-9">
                                    <input type="text" class="form-control valid1" id="floatingInput1" placeholder="Enter Vehicle Title" name="vehicletitle">
                                    <div class="error-message" id="fullname-error" style="color: red;"></div>
                                    <label for="floatingInput1">Vehicle Title</label>
                                </div>
                                <div class="form-floating mb-3 col-3">
                                    <select class="form-select valid2" id="floatingSelect" name="brandname">
                                        <option value="" disabled selected>Select Brand</option>
                                        <?php $ret = "select id,BrandName from tblbrands";
                                        $query = $dbh->prepare($ret);
                                        //$query->bindParam(':id',$id, PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {
                                        ?>
                                                <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?></option>
                                        <?php }
                                        } ?>

                                    </select>
                                    <div class="error-message" id="brandname-error" style="color: red;"></div>
                                </div>
                                <div class="form-floating mb-3 col-12">
                                    <input type="text" class="form-control valid3" id="floatingInput1" placeholder="Enter Vehicle Overview" name="vehicalorcview" style="height: 100px;">
                                    <div class="error-message" id="vehicleoverview-error" style="color: red;"></div>
                                    <label for="floatingInput1">Vehicle Over View</label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <input type="text" class="form-control valid4" id="floatingInput1" placeholder="Enter Vehicle Price" name="priceperday">
                                    <div class="error-message" id="price-error" style="color: red;"></div>

                                    <label for="floatingInput1">Price per Day(in USD)</label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <select class="form-select valid5" id="floatingSelect" name="fueltype">
                                        <option value="" disabled selected>Select Fuel Type</option>
                                        <option value="Petrol">Petrol</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="CNG">CNG</option>
                                    </select>
                                    <div class="error-message" id="fuel-error" style="color: red;"></div>
                                </div>
                                <div class="form-floating mb-3 col-9">
                                    <input type="text" class="form-control valid6" id="floatingInput1" placeholder="Enter Modal/Year" name="modelyear">
                                    <div class="error-message" id="modelyear-error" style="color: red;"></div>
                                    <label for="floatingInput1">Modal Year</label>
                                </div>
                                <div class="form-floating mb-3 col-3">
                                    <input type="text" class="form-control valid7" id="floatingInput1" placeholder="Enter seating capacity" name="seatingcapacity">
                                    <div class="error-message" id="capacity-error" style="color: red;"></div>
                                    <label for="floatingInput1">Seating Capacity*</label>
                                </div>
                            </div>
                            <br><br><br>
                            <h4 class="text-light font-weight-bold">Upload Images</h4>
                            <div class="row">
                                <div class="form-floating mb-3 col-4">
                                    <input type="file" class="form-control image1" id="floatingInput1" name="img1">
                                    <div class="error-message" id="image1-error" style="color: red;"></div>
                                    <label for="floatingInput1">Image 1</label>
                                </div>
                                <div class="form-floating mb-3 col-4">
                                    <input type="file" class="form-control image2" id="floatingInput1" name="img2">
                                    <div class="error-message" id="image2-error" style="color: red;"></div>

                                    <label for="floatingInput1">Image 2</label>
                                </div>
                                <div class="form-floating mb-3 col-4">
                                    <input type="file" class="form-control image3" id="floatingInput1" name="img3">
                                    <div class="error-message" id="image3-error" style="color: red;"></div>

                                    <label for="floatingInput1">Image 3</label>
                                </div>
                                <div class="form-floating mb-3 col-4">
                                    <input type="file" class="form-control image4" id="floatingInput1" name="img4">
                                    <div class="error-message" id="image4-error" style="color: red;"></div>

                                    <label for="floatingInput1">Image 4</label>
                                </div>
                                <div class="form-floating mb-3 col-4">
                                    <input type="file" class="form-control image5" id="floatingInput1" name="img5">
                                    <div class="error-message" id="image5-error" style="color: red;"></div>

                                    <label for="floatingInput1">Image 5</label>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row">
                                <h4 class="text-light font-weight-bold">Accessories</h4>
                                <div class="col-12 mb-3">
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="airconditioner" name="airconditioner" value="1">
                                        <label class="form-check-label text-light" for="airconditioner">Air Conditioner</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
                                        <label class="form-check-label text-light" for="powerdoorlocks">Power Door Locks</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
                                        <label class="form-check-label text-light" for="antilockbrakingsys">AntiLock Braking</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="brakeassist" name="brakeassist" value="1">
                                        <label class="form-check-label text-light" for="brakeassist">Brake Assist</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="powersteering" name="powersteering" value="1">
                                        <label class="form-check-label text-light" for="powersteering">Power Steering</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="driverairbag" name="driverairbag" value="1">
                                        <label class="form-check-label text-light" for="accessory3">Driver Airbag</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
                                        <label class="form-check-label text-light" for="passengerairbag">Passenger Airbag</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="powerwindow" name="powerwindow" value="1">
                                        <label class="form-check-label text-light" for="powerwindow">Power Windows</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="cdplayer" name="cdplayer" value="1">
                                        <label class="form-check-label text-light" for="cdplayer">CD Player</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="centrallocking" name="centrallocking" value="1">
                                        <label class="form-check-label text-light" for="centrallocking">Central Locking</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="crashcensor" name="crashcensor" value="1">
                                        <label class="form-check-label text-light" for="crashcensor">Crash Sensor</label>
                                    </div>
                                    <div class="form-check form-check-inline col-2">
                                        <input class="form-check-input" type="checkbox" id="leatherseats" name="leatherseats" value="1">
                                        <label class="form-check-label text-light" for="leatherseats">Leather Seats</label>
                                    </div>
                                    <!-- Add more checkboxes as needed -->
                                </div>
                            </div>

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