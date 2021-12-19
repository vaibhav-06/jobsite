<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="temp/stylef.css">
    <style>
      #ques{
                min-height:433px;
            }
    </style>
    <title>Home</title>
  </head>
  <body>
    <?php
    session_start();
    include 'temp/_dbconnect.php'; 

    if(isset($_GET['app']) && $_GET['app'] == "true"){
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You have applied for the Job.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

    if(isset($_GET['app']) && $_GET['app'] == "false"){
      echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>Alert!</strong> You have all ready applied for this Job.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

    include 'temp/_navbar.php';

    /*echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="categories.php?catg=Engineering">Engineering</a></li>
              <li><a class="dropdown-item" href="categories.php?catg=Education">Education</a></li>
              <li><a class="dropdown-item" href="categories.php?catg=Sales">Sales</a></li>
              <li><a class="dropdown-item" href="categories.php?catg=Art & Culture">Art & Culture</a></li>
              <li><a class="dropdown-item" href="categories.php?catg=Medical">Medical</a></li>
              <li><a class="dropdown-item" href="categories.php?catg=Fashion">Fashion</a></li>
              <li><a class="dropdown-item" href="categories.php?catg=Designig">Designing</a></li>
              <li><a class="dropdown-item" href="categories.php?catg=Banking">Banking</a></li>
              <li><a class="dropdown-item" href="categories.php?catg=Data entry">Data entry</a></li>
              <li><a class="dropdown-item" href="categories.php?catg=Hospitality">Hospitality</a></li>
              <li><a class="dropdown-item" href="categories.php?catg=Cooking">Cooking</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profileemployee.php">Profile</a>
          </li>
        </ul>';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '<div id="gap"><form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
          <p class="text-dark my-0"> Welcome '.$_SESSION['email'].' </P>
          <a href="logout.php" class="btn btn-success"  data-bs-target="#loginmodal">Logout</a></form>
        </form></div>';
        }
        echo '
      </div>
    </div>
  </nav>';*/

    ?>

<div class="container my-3" id="ques">
        <h2 class="text-center my-3">Browse jobs</h2>
        <div class="row my-3">
            <?php
        $sql = "SELECT * FROM `jobs`";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          $jname = $row['jname'];
          $jdesc = $row['jdesc'];
          $jid = $row['jid'];
          echo '<div class="col-md-4 my-2">
          <div class="card" style="width: 18rem;">
          <img src="https://source.unsplash.com/400x300/?'.$jname.',jobs" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><a href="temp/jobpage.php?jobid='.$jid.'">'.$jname.'</a></h5>
            <p class="card-text">'.substr($jdesc,0,90).'......</p>
            <a href="temp/jobpage.php?jobid='.$jid.'" class="btn btn-primary">View</a>
            </div>
          </div>
        </div>';
        }
        ?>
        </div>
    </div>
    
    <div class="footer">
    <?php include 'temp/_footer.php'; ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>