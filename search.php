<?php
session_start();
include 'temp/_dbconnect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="temp/stylef.css">
    <title>Search</title>
</head>

<body>

    <?php include 'temp/_navbar.php'; ?>



    <div class="container my-3">
        <h1>Search results for "<?php echo $_GET['search'] ?>"</h1>
        <?php
        $noresult = true;
        $query = $_GET["search"];
        $sql = "SELECT * FROM `jobs` WHERE match (jname) against ('$query')";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          $jname = $row['jname'];
          $jdesc = $row['jdesc'];
          $jid = $row['jid'];
          $noresult = false;

          echo '<div class="result">
          <div class="col-md-4 my-2">
          <div class="card" style="width: 18rem;">
          <img src="https://source.unsplash.com/400x300/?'.$jname.',jobs" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><a href="temp/jobpage.php?jobid='.$jid.'">'.$jname.'</a></h5>
            <p class="card-text">'.substr($jdesc,0,90).'......</p>
            <a href="temp/jobpage.php?jobid='.$jid.'" class="btn btn-primary">View</a>
            </div>
          </div>
        </div>
          </div>';
        }
        if($noresult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="cont">
            <p class="display-4">No results found</p>
            <p class="lead">enter specific words</p>
            </div>
            </div>';
        }
        ?>
    </div>

    <div class="footer">
        <?php include 'temp/_footer.php'; ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>