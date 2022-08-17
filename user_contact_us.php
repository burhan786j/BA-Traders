<!doctype html>
<html lang="en">
<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');

//to get categories from database to main page navbar
$cat_res = mysqli_query($con, "select * from categories where status = 1 ORDER BY `categories`ASC");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row;
}
?>

<head>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="#">
    <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <script src="main.js" async></script> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>BA Traders | The Best Shopping Website</title>
</head>

<body> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#">
                <img src="img/Logo/BA.LOGO.png" alt="Logo" style="height: 45px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link active " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " aria-current="page" href="user_contact_us.php">Contact us</a>
                    </li>
                    <?php
                    foreach ($cat_arr as $list) {
                    ?>
                        <li class="nav-item ">
                            <a class="nav-link " href="users_categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="max-w-screen-xl mt-4  px-4 grid gap-8 grid-cols-1  md:px-8 lg:px-12 xl:px-26 py-16 mx-auto bg-gray-100 text-gray-900 rounded-lg shadow-lg">
        <div class="flex flex-col justify-between">
            <div>
                <h2 class="text-center text-3xl lg:text-5 xl font-bold leading-tight">Lets talk about everything!</h2>
                <img class="my-4 mx-auto py-2" src="img/Logo/BA.LOGO.png" alt="Logo">
                <h2 class="text-center text-xl lg:text-2xl font-medium leading-tight">Feel free to ask us anything!</h2>
                <h3 class="py-4 px-4 text-md lg:text-md leading-tight"> Have doubt or suggestion to make? Feel free to ask anything. If you have any suggestions, please let me know. Your suggestions are highly appreciated. I appreciate your time and try hard to reply to every single message posted here! Keep dropping your priceless opinions.</h3>
            </div>
        </div>

        <div>
            <frm>
                <div>
                    <span class="uppercase text-sm text-gray-600 font-bold">Full Name</span>
                    <input class="w-full bg-gray-300 text-gray-900 mt-2 p-1 rounded-lg focus:outline-none focus:shadow-outline" id="name" type="text" name="name" placeholder="">
                </div>
                <div class="mt-8">
                    <span class="uppercase text-sm text-gray-600 font-bold">Email</span>
                    <input class="w-full bg-gray-300 text-gray-900 mt-2 p-1 rounded-lg focus:outline-none focus:shadow-outline" type="email" id="email" name="email" value="">
                </div>
                <div class="mt-8">
                    <span class="uppercase text-sm text-gray-600 font-bold">Phone</span>
                    <input class="w-full bg-gray-300 text-gray-900 mt-2 p-1 rounded-lg focus:outline-none focus:shadow-outline" type="text" id="mobile" name="mobile" value="">
                </div>
                <div class="mt-8">
                    <span class="uppercase text-sm text-gray-600 font-bold">Message</span>
                    <textarea class="w-full bg-gray-300 text-gray-900 mt-2 p-1 rounded-lg focus:outline-none focus:shadow-outline" onkeyup='changeText2()' id="comment" name="comment"></textarea>
                </div>
                <div class="mt-8">
                    <button class="uppercase text-sm font-bold tracking-wide bg-purple-600 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline disabled:opacity-50 btn btn-primary" type="button" onclick="send_message()" name="register_submit">Send Message</button>
                </div>
                </form>
        </div>
        <!-- Main js file that contents all jQuery plugins activation. -->
        <script src="js/main.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>

</body>

</html>