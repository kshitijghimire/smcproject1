<?php session_start(); ?>
<?php include 'includes/header.php'; ?>

<div class="flex justify-center items-center my-10">
    <form action="" method="POST"  class="bg-gray-100 p-10 rounded shadow">
        <h1 class="text-center font-bold text-4xl my-10">Login</h1>
        <input type="text" name="email" class="w-full p-2 my-5 border-2 border-gray-300" placeholder="Username">
        <input type="password" name="password" class="w-full p-2 my-5 border-2 border-gray-300" placeholder="Password">
        <button type="submit" name="login" class="w-full p-2 my-5 bg-orange-500 text-white font-bold">Login</button>
    </form>
</div>


<?php include 'includes/footer.php'; ?>
<?php
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $qry = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    include 'includes/dbconnection.php';
    $result = mysqli_query($conn, $qry);
    include 'includes/closeconnection.php';
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION ['username'] =$row['fullname'];
        $_SESSION ['islogin'] = 'yes';
        header('location: admin/dashboard.php');
    }
    else
    {
        echo "<script>alert('Invalid Email or Password')</script>";
    }
}