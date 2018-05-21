<div class="container">
 	<div class="row">
 		<div class="col-md-12">
<?php Session::showMessage();?>
 		</div>
 	</div>
 	<div class="row justify-content-center"> 
<?php 	

foreach ($data['allTasks'] as $key => $value) { ?>

 		<div style="border:1px solid gray" class="col-md-10 viewTask">
 			<h4 style="margin-top: 15px;" class="text-center"><?php echo $value[1]; ?></h4>
 			<p><?php echo $value[2]; ?></p>
 			<div class="row">
 				<div class="col-md-4">
 					<span><b>Created at:</b> <?php echo $value[5]; ?></span>
 					<p><b>End:</b> <?php echo $value[6]; ?></p>
 				</div>
 				<div class="col-md-4 text-center">
 					<p><b>Who will do it?</b></p>
 					<?php
 					foreach ($data['allUsers'] as $k => $usersName) {

 					if ($usersName[0] == $value[3] ){ ?>
 						<p style="color: brown; font-weight: 500;"><?php echo $usersName[1]; ?></p>
 					<?php 
 					}
 					}
 					if ($_SESSION['role'] == 'Father' &&  $value[3] == 0) { ?>
 						<form method='POST'>
                            <select name='assignedUser'>	
                        <?php 	foreach ($data['allUsers'] as $usersName) { ?>
                                <option value="<?php echo $usersName[1]; ?>"><?php echo $usersName[1]; ?></option>
                            <?php } ?>
                            </select>
                            <input type='hidden' name='idTask' value="<?= $value['0'] ?>">
                            <button type='submit' name="btnAssignedUser">ok</button>
                        </form>
 				<?php	 } ?>
 				</div>
 				<div class="col-md-4 text-center">
 					<span><b>Status:</b></span>
 					<?php if ($value[4] == 1){
                            echo "<span style='color: #3cd627;'>done</span>";
                        }	else {
                            echo "<span style='color: #d82213;'>not done</span>";
                        }
                    	if ($value[4] == 0 && $value[3] == $data['searchUserId']){ ?> 
                    		<form method="POST">
 								<div class="form-check text-center">
  								<label class="form-check-label">
   									<input type="checkbox" name="checkboxVal" class="form-check-input" value="1" >Check
  								</label>
  								<input type="hidden" name="taskId" value="<?= $value['0'] ?>">
  								<button type="submit" name="btnStatus" class="btnStatus">send</button>
								</div>
							</form>
					<?php  } ?>
 				</div>
 			</div>	
 		</div>
<?php   
}
?>
 	</div>
 </div>

