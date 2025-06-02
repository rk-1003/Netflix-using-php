<?php
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "netflix";
$conn = mysqli_connect($servername, $username, $password, $database);
if (isset($_POST["snoDelete"])) {
  $sno = $_POST["snoDelete"];
$sql = "DELETE FROM `feedback` WHERE `Sr No.` = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $sno);
$result = mysqli_stmt_execute($stmt);
if ($stmt === false) {
    die("Failed to prepare statement: " . mysqli_error($conn));
}
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="soft-ui-dashboard-main/">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <li class="nav-item">
            <a class="nav-link" href="userm.php">User Management</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1">Customer Request</a>
          </li>

          <br><br>
        <!-- Experiment-->

        <li class="nav-item">
            <a class="nav-link" href="userm.php"><a href="feebacks_user.php">Feedbacks</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Success Alert -->
  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> User Added Successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
  }
  ?>

<table class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Overall</th>
            <th scope="col">Expectations</th>
            <th scope="col">Quality</th>
            <th scope="col">Content</th>
            <th scope="col">Safety</th>
            
            
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM `feedback`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                     <td>" . $row['Sr No.'] . "</td> 
                    <td>" . $row['overall'] . "</td>
                    <td>" . $row['expectations'] . "</td>
                    <td>" . $row['quality'] . "</td>
                    <td>" . $row['Content'] . "</td>
                    <td>" . $row['safety'] . "</td>
                           
                </tr>";
        }
        ?>
    </tbody>
</table>

<!-- JavaScript -->
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this user?");
    }
</script>


  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });

   
  </script>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('Password');
        const passwordFieldType = passwordField.getAttribute('type');
        const icon = this.querySelector('i');

        if (passwordFieldType === 'password') {
            passwordField.setAttribute('type', 'text');
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            passwordField.setAttribute('type', 'password');
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    });
</script>

</body>

</html>

