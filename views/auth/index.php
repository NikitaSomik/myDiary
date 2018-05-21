<div class="container">
	<div class="row">
		<div class="col-md-12">

			<h2 class="title text-center">Family Diary</h2>
      <?php Session::showMessage() ?>
		  <ul id="tabsJustified" class="nav nav-tabs">
        <li class="nav-item"><a href="" data-target="#login" data-toggle="tab" class="nav-link small text-uppercase">Login</a></li>
        <li class="nav-item"><a href="" data-target="#register" data-toggle="tab" class="nav-link small text-uppercase active">Register</a></li>
      </ul>
      <br>
      <div id="tabsJustifiedContent" class="tab-content">
          <div id="login" class="tab-pane fade">
            <form id="formLog" action="" method="POST" class="form-horizontal" role="form">
                <div class="form-group">
                  <label for="nameLog" class="col-sm-2 control-label">Name <span style="color: red;">*</span></label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control name" id="nameLog" placeholder="Name" name="name">
                      <span class=""></span>
                    </div>
                    <div class=""></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pwdLog" class="col-sm-2 control-label">Password: <span style="color: red;">*</span></label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-lock" aria-hidden="true"></i>
                        </div>
                      </div>
                      <input type="password" id="pwdLog" class="form-control password" placeholder="Password" name="password">
                    <span></span>
                    </div>
                    <div class=""></div>
                  </div>
                  </div>
                 
                <div class="form-group">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="butLogin" id="butLog">Sign in</button>
                  </div>
                </div>
            </form>
          </div>
          <div id="register" class="tab-pane fade active show">
           <form id="formReg" action="" method="POST" class="form-horizontal" role="form">
                <div class="form-group">
                  <label for="nameReg" class="col-sm-2 control-label">Name <span style="color: red;">*</span></label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control name" id="nameReg" placeholder="Name" name="name">
                      <span class=""></span>
                    </div>
                    <div class=""></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pwdReg" class="col-sm-2 control-label">Password: <span style="color: red;">*</span></label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-lock" aria-hidden="true"></i>
                        </div>
                      </div>
                      <input type="password" id="pwdReg" class="form-control password" placeholder="Password" name="password">
                      <span></span>
                    </div>
                    <div class=""></div>
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="selectReg" class="col-sm-2 control-label">Choose role: <span style="color: red;">*</span></label>
                  <div class="col-sm-10">
                  <select name="selectRole" class="form-control selectReg" id="selectReg" required>
                    <option selected="true" disabled="disabled">Select</option>
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>
                    <option value="Child">Child</option>
                  </select>
                  <div class=""></div>
                </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-success" name="butReg" id="butReg">Sign up</button>
                  </div>
                </div>

            </form>
          </div>
      </div>
		</div>
	</div>
</div>


