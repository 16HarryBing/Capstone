<?php
    // Start session
    session_start();

    // Array to store validation errors
    $errmsg_arr = array();

    // Validation error flag
    $errflag = false;

    // Connect to mysqli server
    $link = mysqli_connect('localhost', 'root', "");
    if (!$link) {
        die('Failed to connect to server: ' . mysqli_error());
    }

    // Select database
    $db = mysqli_select_db($link, 'sales');
    if (!$db) {
        die("Unable to select database");
    }

    // Function to sanitize values received from the form. Prevents SQL injection
    function clean($str)
    {
        global $link;
        $str = trim($str);
        $str = stripslashes($str);
        return mysqli_real_escape_string($link, $str);
    }

    // Sanitize the POST values
    $login = clean($_POST['username']);
    $password = md5(clean($_POST['password']));

    // Input Validations
    if ($login == '') {
        $errmsg_arr[] = 'Username missing';
        $errflag = true;
    }
    if ($password == '') {
        $errmsg_arr[] = 'Password missing';
        $errflag = true;
    }

    // If there are input validations, redirect back to the login form
    if ($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        header("location: index.php");
        exit();
    }

    // Create query
    $qry = "SELECT * FROM user WHERE username='$login' AND password='$password'";
    $result = mysqli_query($link, $qry);

    // Check whether the query was successful or not
    if (mysqli_num_rows($result) > 0) {
        // Check if the user's account is inactive
        $row = mysqli_fetch_assoc($result);
        if ($row['status'] == 0) {
            $_SESSION['error'] = "Account is inactive";
            header("location: index.php");
            exit();
        }
        // Login successful
        session_regenerate_id();
        $_SESSION['SESS_MEMBER_ID'] = $row['id'];
        $_SESSION['SESS_FIRST_NAME'] = $row['name'];
        $_SESSION['SESS_LAST_NAME'] = $row['position'];
        session_write_close();
        ?>
    
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js'></script>
        <script src="../sweetalert2/jquery-3.4.1.min.js"></script>
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
     <script src="../sweetalert2/bootstrap.bundle.min.js"></script>
      <script src="../sweetalert2/bootstrap.min.js"></script>
      <script src="../sweetalert2/bootstrap.js"></script>
        <script>
        window.onload = function() {
        Swal.fire({
            icon: 'success',
            title: 'Login successful',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'main/index.php';
        });
        }
</script>
    <?php 
    } else {
        // Login failed
        $_SESSION['error'] = "Username or Password Is Invalid";
        header("location: index.php");
    }
?>
