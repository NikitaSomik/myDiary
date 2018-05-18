<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php //echo (isset($data['title']))?$data['title']:BRAND ?></title> <!-- константна BRAND -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><?php echo $navbar_brand = isset($_SESSION['name']) ? 'Hi, '.$_SESSION['name'] : 'Diary'; ?> </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL ?>/diary">Diary</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""></a>
      </li> 
    </ul>
     <ul class="navbar-nav ">

<?php  

  if (isset($_SESSION['name'])): ?>
    
        <!-- <li><a href="#">Hello, <?= $_SESSION['name']; ?></a></li> -->
        <!-- <li><a href="<?php //echo URL ?>/user/edit">Edit my profile</a></li> -->
        <li><a class="nav-link" href="<?php echo URL ?>/logout"><span class="glyphicon glyphicon-log-out"></span>Exit</a></li>
<?php endif ?>
      </ul>
  </div> 
</nav>
