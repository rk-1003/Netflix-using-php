<?php
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "netflix";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["snoEdit"])) {
        // Update record
        $sno = $_POST["snoEdit"];
        $email = $_POST["EmailEdit"];
        $pass = $_POST["PassEdit"];

        $sql = "UPDATE `login_user1` SET `Email_Phone_no` = ?, `Password` = ? WHERE `Sr No.` = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            die("Failed to prepare statement: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ssi", $email, $pass, $sno);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            die("Execute failed: " . mysqli_stmt_error($stmt));
        }
    } elseif (isset($_POST["snoDelete"])) {
        // Delete record
        $sno = $_POST["snoDelete"];

        $sql = "DELETE FROM `login_user1` WHERE `Sr No.` = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            die("Failed to prepare statement: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $sno);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            die("Execute failed: " . mysqli_stmt_error($stmt));
        }
    } else {
        // Insert new record
        
        $email = $_POST['Email'];
        $password = $_POST['Password']; 
        $sql = "INSERT INTO `login_user1` (`Email_Phone_no`, `Password`) VALUES ('$email', '$password');";
        $stmt = mysqli_query($conn, $sql);

  
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
  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="userm.php" method="post">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="mb-3">
              <label for="EmailEdit" class="form-label">Email</label>
              <input type="text" class="form-control" id="EmailEdit" name="EmailEdit">
            </div>
            <div class="mb-3">
              <label for="PassEdit" class="form-label">Password</label>
              <textarea class="form-control" id="PassEdit" name="PassEdit" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" >Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <li class="nav-item">
            <a class="nav-link" href="userm.php"><a href="userm.php">User Management</a>
          </li>
          <br><br>&nbsp;&nbsp;&nbsp;
          <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1"><a href="cus-req.php">Customer Request</a>
          </li>
          <br><br>&nbsp;&nbsp;&nbsp;
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

  <!-- Add Note Form -->
  <div class="container my-4">
    <h3>User Management</h3>
    <form action="userm.php" method="post">
      
      <div class="mb-3">
        <label for="Email" class="form-label">Email/Phone No </label>
        <input type="text" class="form-control" id="Email" name="Email">
      </div>
      <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <div class="input-group">
        <input type="password" class="form-control" id="Password" name="Password">
        <button type="button" class="btn btn-outline-primary" id="togglePassword">
            <i class="fa fa-eye"></i>
        </button>
    </div>
</div>
      <button type="submit" class="btn btn-primary">Add User</button>
    </form>
  </div>

 
<table class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Email/Phone</th>
            <th scope="col">Password</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM `login_user1`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                     <td>" . $row['Sr No.'] . "</td> 
                    <td>" . $row['Email_Phone_no'] . "</td>
                    <td>" . $row['Password'] . "</td>
                    <td>
                        <button class='edit btn btn-sm btn-primary' id='" . $row['Sr No.'] . "'>Edit</button>
                        <form method='POST' action='userm.php' style='display:inline-block;' onsubmit='return confirmDelete();'>
                            <input type='hidden' name='snoDelete' value='" . $row['Sr No.'] . "'>
                            <button type='submit' class='delete btn btn-sm btn-danger'>Delete</button>
                        </form>
                    </td>
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

    // Edit button click event
    var edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach(function (element) {
      element.addEventListener("click", function (e) {
        var tr = e.target.parentNode.parentNode;
        var title = tr.getElementsByTagName("td")[1].innerText;
        var description = tr.getElementsByTagName("td")[2].innerText;
        document.getElementById("EmailEdit").value = title;
        document.getElementById("PassEdit").value = description;
        document.getElementById("snoEdit").value = e.target.id;
        $('#editModal').modal('toggle');
      });
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

