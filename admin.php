<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <title>Skyline - Admin Dashboard</title>
    <link rel="icon" href="./assets/images/favicon.jpg">
    <link rel="stylesheet" href="./css/admin_dasboard.css">
    <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body style="background-color: #b9b4b4;">
<header class="header1">
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Admin Page</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="./admin_ui/admin_flights.php">Flights</a></li>
            <li><a href="./admin_ui/admin_contact.php">Contact</a></li>
            <li><a href="./admin_ui/admin_user.php">User</a></li>
            <?php
                   session_start();
                   // Start the session
                  if(isset($_SESSION['username'])) {
                      if ($_SESSION['username'] === 'Skylineairways@gmail.com') {
                      // If the user is logged in, display a welcome message which will serve as the dropdown button
                      echo '<div class="dropdown">';
                      echo '<button class="dropbtn">Hello, ' . $_SESSION['username'] . '</button>';
                      echo '<div class="dropdown-content">';
                      echo '<a href="logout.php" class="logout">Logout</a>';
                      echo '</div>';
                      echo '</div>';
                  } else {
                      header("Location: index.php");
                      exit();
                  }
              } else {
                  header("Location: login.php");
                  exit();
              }    
      
            ?> 
        </ul>  
    </nav>
</header> 

<main>

<div class="analytics">
    <img class="anal-logo" src="./assets/images/data-analytics.png" alt="">
    <h1 class="h1-anal">ANALYTICS</h1>
</div>
<div>
    <?php
    // Include the database configuration file
    include './config/database.php';

    $query = "SELECT SUM(total_price) AS total_amount FROM main_passengers";
    $result = mysqli_query($conn, $query);

    if ($result) {

        $row = mysqli_fetch_assoc($result);
        $total_amount = $row['total_amount'];
    } else {
        $total_amount = 0;
    }

    // Query to count the total number of users
    $query = "SELECT COUNT(reg_id) AS total_users FROM logindata";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total_users = $row['total_users'];
    } else {
        $total_users = 0;
    }

    $query = "SELECT COUNT(contact_id) AS total_comments FROM admin_reply";

        // Execute the query
        $result = mysqli_query($conn, $query);

        if ($result) {

            $row = mysqli_fetch_assoc($result);
            $total_comments = $row['total_comments'];
        } else {

            $total_comments = 0;
                }

?>

    <div class="flex-analy">
        <div class="analy1">
            <div class="in1">
                <img style="width: 100px; height: 100px;" src="./assets/images/profit.png" alt="">
            </div>
            <div class="amount">
                <p>TOTAL SALES</p>
                <h1><?php echo '₱' . number_format($total_amount, 0, '.', ','); ?></h1>
            </div>
        </div>
        <div class="analy2">
            <div class="in2">
                <img style="width: 100px; height: 100px;" src="./assets/images/multiple-users-silhouette.png" alt="">
            </div>
            <div class="total">
                <p>TOTAL USERS</p>
                <h1><?php echo number_format($total_users, 0, '.', ','); ?></h1>
            </div>
        </div>
        <div class="analy3">
            <div class="in3">
                <img style="width: 100px; height: 100px;" src="./assets/images/chat.png" alt="">
            </div>
            <div class="comments">
                <p>TOTAL MESSAGES</p>
                <h1><?php echo number_format( $total_comments, 0, '.', ',');?></h1>
            </div>
        </div>
    </div>
</div>

<div class="main-container">
    
    <?php
    include './config/database.php';

    // Retrieve main passenger data
    $stmt_get_main_passenger = $conn->prepare("SELECT * FROM main_passengers");
    $stmt_get_main_passenger->execute();
    $result_main_passenger = $stmt_get_main_passenger->get_result();

    // Collect all taken seats per flight in an array
    $takenSeatsPerFlight = [];
    while ($row = $result_main_passenger->fetch_assoc()) {
        $flightID = $row['Flight_ID'];
        $seatNumber = $row['Seat_Number'];
        if (!isset($takenSeatsPerFlight[$flightID])) {
            $takenSeatsPerFlight[$flightID] = [];
        }
        $takenSeatsPerFlight[$flightID][] = $seatNumber;
    }

    // Fetch taken seats from other_passenger table and add to $takenSeatsPerFlight array
    $stmt_get_other_passenger = $conn->prepare("SELECT Flight_ID, Seat_Number FROM other_passengers");
    $stmt_get_other_passenger->execute();
    $result_other_passenger = $stmt_get_other_passenger->get_result();
    while ($row = $result_other_passenger->fetch_assoc()) {
        $flightID = $row['Flight_ID'];
        $seatNumber = $row['Seat_Number'];
        if (!isset($takenSeatsPerFlight[$flightID])) {
            $takenSeatsPerFlight[$flightID] = [];
        }
        $takenSeatsPerFlight[$flightID][] = $seatNumber;
    }
    
    // Reset the result set pointer
    $result_main_passenger->data_seek(0);
    ?>
    
    <?php
    // Check if there are no main passengers
    if ($result_main_passenger->num_rows === 0) {
    ?>
        <p>No booked Customer</p>
    <?php
    } else {
    ?>
        <div class="card-header mt-4"><h2 class="mainpass">Main Passenger Data</h2></div>
        <div class="card-body">
            <table class="table table-bordered table-hover custom-table">
                <tr>
                    <th>Main Passenger ID</th>
                    <th>Flight Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Seat</th>
                    <th>Accommodation</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Seat#</th>
                    <th>Receipt</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($main_passenger_data = $result_main_passenger->fetch_assoc()) {
                    $flightID = $main_passenger_data['Flight_ID'];
                    $takenSeats = isset($takenSeatsPerFlight[$flightID]) ? $takenSeatsPerFlight[$flightID] : [];
                ?>
                    <tr>
                        <td><?= $main_passenger_data['MainPassenger'] ?></td>
                        <td><?= $main_passenger_data['Flight_ID'] ?></td>
                        <td><?= $main_passenger_data['first_name'] ?></td>
                        <td><?= $main_passenger_data['last_name'] ?></td>
                        <td><?= $main_passenger_data['email'] ?></td>
                        <td><?= $main_passenger_data['contact_number'] ?></td>
                        <td><?= $main_passenger_data['seat'] ?></td>
                        <td><?= $main_passenger_data['accommodation'] ?></td>
                        <td>₱ <?= $main_passenger_data['total_price'] ?></td>
                        <td><?= $main_passenger_data['Status'] ?></td>
                        <td><?= $main_passenger_data['Seat_Number'] ?></td>
                        <td class="receipt">
                            <a href="#" class="view-receipt" data-bs-toggle="modal" data-bs-target="#receiptModal<?= $main_passenger_data['MainPassenger'] ?>">
                                <img class="receipt-image" src="data:image/jpeg;base64,<?= base64_encode($main_passenger_data['prof']) ?>" />
                            </a>
                        </td>
                        <!-- Modal for displaying the zoomable receipt image -->
                        <div class="modal fade" id="receiptModal<?= $main_passenger_data['MainPassenger'] ?>" tabindex="-1" aria-labelledby="receiptModalLabel<?= $main_passenger_data['MainPassenger'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="receiptModalLabel<?= $main_passenger_data['MainPassenger'] ?>">View Receipt</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid" src="data:image/jpeg;base64,<?= base64_encode($main_passenger_data['prof']) ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <td class="btn-td">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#seatSelectionModal<?= $main_passenger_data['MainPassenger'] ?>">UPDATE</button>
                            <button class="btn btn-outline-primary view-btn"
        onclick="redirectToUserInfo('<?php echo $main_passenger_data['email']; ?>')">
    View
</button>


<form method="post" action="UpdateBooking.php">
    <div class="modal fade" id="seatSelectionModal<?= $main_passenger_data['MainPassenger'] ?>" tabindex="-1" aria-labelledby="seatSelectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="seatSelectionModalLabel">Select Your Seat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="seat-map-container">
                        <?php
                        $classes = [
                            'first-class' => ['columns' => 6, 'seats_per_column' => 4],
                            'business-class' => ['columns' => 6, 'seats_per_column' => 4],
                            'economy-class' => ['columns' => 6, 'seats_per_column' => 4]
                        ];

                        foreach ($classes as $class => $details) {
                            echo "<div class='seat-section $class'>";
                            echo "<h3>" . ucwords(str_replace('-', ' ', $class)) . "</h3>";
                            echo "<div class='d-flex justify-content-center'>";
                            for ($c = 0; $c < $details['columns']; $c++) {
                                echo "<div class='seat-column'>";
                                for ($s = 1; $s <= $details['seats_per_column']; $s++) {
                                    $seatId = strtoupper(substr($class, 0, 1)) . ($c * $details['seats_per_column'] + $s);
                                    $isOccupied = in_array($seatId, $takenSeats);
                                    $seatClass = $isOccupied ? 'occupied' : '';
                                    echo "<div class='seat $seatClass' id='$seatId' onclick=\"handleSeatSelection('main', '{$main_passenger_data['MainPassenger']}', '$seatId')\">$seatId</div>";
                                }
                                echo "</div>";
                                if (($c + 1) % 3 == 0 && $c != $details['columns'] - 1) {
                                    echo '<div class="aisle"></div>';
                                }
                            }
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="main_SeatSelect<?= $main_passenger_data['MainPassenger'] ?>" class="form-label">Select Seat Number</label>
                        <select class="form-select" id="main_SeatSelect<?= $main_passenger_data['MainPassenger'] ?>" name="SeatSelect">
                            <option value='' disabled selected>Select Seat</option>
                            <?php 
                            $sections = ['F', 'B', 'E'];
                            foreach ($sections as $section) {
                                for ($i = 1; $i <= 24; $i++) {
                                    $seatNumber = $section . $i;
                                    if (in_array($seatNumber, $takenSeats)) {
                                        echo "<option value='$seatNumber' disabled style='background-color: red;'>$seatNumber</option>";
                                    } else {
                                        echo "<option value='$seatNumber'>$seatNumber</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div id="passengerInfo<?= $main_passenger_data['MainPassenger'] ?>"></div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="main_passenger_id" value="<?= $main_passenger_data['MainPassenger'] ?>">
                    <button type="submit" class="btn btn-outline-success" name="main_confirm-btn">Confirm</button>
                    <button type="submit" class="btn btn-outline-danger" name="main_decline-btn">Decline</button>
                </div>
            </div>
        </div>
    </div>
</form>



                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
   
    <?php
    }

    // Retrieve and display other passengers' data
    $stmt_get_other_passengers = $conn->prepare("SELECT * FROM other_passengers");
    $stmt_get_other_passengers->execute();
    $result_other_passengers = $stmt_get_other_passengers->get_result();

    // Collect all taken seats by other passengers in the same array
    while ($row = $result_other_passengers->fetch_assoc()) {
        $flightID = $row['Flight_ID'];
        $seatNumber = $row['Seat_Number'];
        if (!isset($takenSeatsPerFlight[$flightID])) {
            $takenSeatsPerFlight[$flightID] = [];
        }
        $takenSeatsPerFlight[$flightID][] = $seatNumber;
    }

    // Reset the result set pointer
    $result_other_passengers->data_seek(0);
    ?>
    <?php
    // Check if there are no other passengers
    if ($result_other_passengers->num_rows === 0) {
    ?>
        <p>No booked Customer</p>
    <?php
    } else {
    ?>
    <div class="card-header"><h2 class="otherpass">Other Passenger Data</h2></div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <tr>
                <th>Other Passenger ID</th>
                <th>Main Passenger ID</th>
                <th>Flight Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Seat</th>
                <th>Accommodation</th>
                <th>Status</th>
                <th>Seat#</th>
                <th>Action</th>
            </tr>
            <?php
            while ($row = $result_other_passengers->fetch_assoc()) {
                $other_passengerId = $row['id'];
                $flightID = $row['Flight_ID'];
                $takenSeats = isset($takenSeatsPerFlight[$flightID]) ? $takenSeatsPerFlight[$flightID] : [];
            ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['MainPassenger'] ?></td>
                    <td><?= $row['Flight_ID'] ?></td>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['contact_number'] ?></td>
                    <td><?= $row['seat'] ?></td>
                    <td><?= $row['accommodation'] ?></td>
                    <td><?= $row['Status'] ?></td>
                    <td><?= $row['Seat_Number'] ?></td>
                    <td class="btn-td">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#OtherseatSelectionModal<?= $other_passengerId ?>">Update</button>
                        <button class="btn btn-outline-primary view-btn"
        onclick="redirectToOtherUserInfo('<?php echo $row['email']; ?>')">
    View
</button>
<form method="post" action="UpdateBooking.php">
    <div class="modal fade" id="OtherseatSelectionModal<?= $other_passengerId ?>" tabindex="-1" aria-labelledby="OtherseatSelectionModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="OtherseatSelectionModal">Select Your Seat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="seat-map-container">
                        <?php
                        $classes = [
                            'first-class' => ['columns' => 6, 'seats_per_column' => 4],
                            'business-class' => ['columns' => 6, 'seats_per_column' => 4],
                            'economy-class' => ['columns' => 6, 'seats_per_column' => 4]
                        ];

                        foreach ($classes as $class => $details) {
                            echo "<div class='seat-section $class'>";
                            echo "<h3>" . ucwords(str_replace('-', ' ', $class)) . "</h3>";
                            echo "<div class='d-flex justify-content-center'>";
                            for ($c = 0; $c < $details['columns']; $c++) {
                                echo "<div class='seat-column'>";
                                for ($s = 1; $s <= $details['seats_per_column']; $s++) {
                                    $seatId = strtoupper(substr($class, 0, 1)) . ($c * $details['seats_per_column'] + $s);
                                    $isOccupied = in_array($seatId, $takenSeats);
                                    $seatClass = $isOccupied ? 'occupied' : '';
                                    echo "<div class='seat $seatClass' id='$seatId' onclick=\"handleSeatSelection('other', '{$other_passengerId}', '$seatId')\">$seatId</div>";
                                }
                                echo "</div>";
                                if (($c + 1) % 3 == 0 && $c != $details['columns'] - 1) {
                                    echo '<div class="aisle"></div>';
                                }
                            }
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="other_SeatSelect<?= $other_passengerId ?>" class="form-label">Select Seat Number</label>
                        <select class="form-select" id="other_SeatSelect<?= $other_passengerId ?>" name="Other_SeatSelect">
                            <option value='' disabled selected>Select Seat</option>
                            <?php 
                            $sections = ['F', 'B', 'E'];
                            foreach ($sections as $section) {
                                for ($i = 1; $i <= 24; $i++) {
                                    $seatNumber = $section . $i;
                                    if (in_array($seatNumber, $takenSeats)) {
                                        echo "<option value='$seatNumber' disabled style='background-color: red;'>$seatNumber</option>";
                                    } else {
                                        echo "<option value='$seatNumber'>$seatNumber</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div id="otherPassengerInfo<?= $other_passengerId ?>"></div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="other_passenger_id" value="<?= $other_passengerId ?>">
                    <button type="submit" class="btn btn-outline-success" name="other_confirm-btn">Confirm</button>
                    <button type="submit" class="btn btn-outline-danger" name="other_decline-btn">Decline</button>
                </div>
            </div>
        </div>
    </div>
</form>




                        <!-- Modal for displaying passenger info -->
                        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel">Passenger Information</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="viewModalBody">
                                                <!-- Passenger information will be populated here -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="card-footer">
        <p >
            <center style="font-size: 20px; font-weight:bold; ">&copy; 2024 Skyline Airways PH. All rights reserved.</center>
        </p>
    </div>
    <?php
    }
    ?>
    <tbody id="result">
</tbody>
    </div>
</div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="./js/adminfunct.js"></script>
<script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
crossorigin="anonymous"></script>

</body>
</html>