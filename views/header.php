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

      <?php if ($_SESSION['role'] == 'Mother'): ?>
        
      
      <li class="nav-item">
        <!-- <a class="nav-link" href=""></a> -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add task</button>
      </li> 
    <?php endif; ?>
    </ul>
     <ul class="navbar-nav ">

<?php if (isset($_SESSION['name'])): ?>
    
        <li><a class="nav-link" href="<?php echo URL ?>/logout"><span class="glyphicon glyphicon-log-out"></span>Exit</a></li>
<?php endif ?>
      </ul>
  </div> 
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formAddTask" action="" method="POST" class="form-horizontal" role="form">
      <div class="modal-body">
        
                <div class="form-group">
                  <label for="task" class="col-sm-2 control-label sr-only"></label>
                  <div class="col-sm-10">
                      <input type="text" name="task" class="form-control task" id="task" placeholder="Add new task">
                  </div>
                  <span class="text-muted"></span>
                </div>
                <div class="form-group">
                  <label for="describe" class="col-sm-2 control-label sr-only"></label>
                  <div class="col-sm-10">
                      <textarea name="describe" id="describe" class="form-control" cols="30" rows="5" placeholder="Describe task"></textarea>
                  </div>
                  <span class="text-muted"></span>
                  </div>
                 
               <div class="form-group">
            <label for="date" class="col-sm-2 control-label labelBirth">Last time</span></label>
            <div class="col-sm-2">
              <input type="datetime-local" name="ltime" id="date" class="ltime">
          </div>
          <span class="text-muted"></span>
        </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addTask" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>