<div ng-controller="registerController" class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="registerModalLabel">Registration Form</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
                <div class="container-fluid registration">
                  <form name="registerForm">


                    <div class="row">
                      <div class="col-md-8">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-user"></i></div>
                          <input type="text" 
                                  class="form-control" 
                                  id="inlineFormInputGroupFullName" 
                                  name="fullName"
                                  ng-model="fullName"
                                  placeholder="Full Name"
                                  required>
                          </div>
  
                      </div>
                      <div class="col-md-4">
                        <span style="color:red" ng-show="registerForm.fullName.$dirty && registerForm.fullName.$invalid">
                        <span ng-show="registerForm.fullName.$error.required">* required.</span>
                        </span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
                          <input type="email" 
                                  class="form-control" 
                                  id="inlineCustomerEmail" 
                                  name="customerEmail"
                                  ng-model="customerEmail"
                                  placeholder="Email"
                                  required>
                          </div>
  
                      </div>
                      <div class="col-md-4">
                        <span style="color:red" ng-show="registerForm.customerEmail.$dirty && registerForm.customerEmail.$invalid">
                        <span ng-show="registerForm.customerEmail.$error.required">* required.</span>
                        <span ng-show="registerForm.customerEmail.$error.email">* Invalid Format.</span>
                        </span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-lock"></i></div>
                          <input type="password" 
                                  class="form-control" 
                                  id="inlineFormPassword" 
                                  name="customerPassword"
                                  ng-model="customerPassword"
                                  ng-minlength="6"
                                  ng-maxlength="20"
                                  placeholder="Password"
                                  required>
                          </div>
  
                      </div>
                      <div class="col-md-4">
                        <span style="color:red" ng-show="registerForm.customerPassword.$dirty && registerForm.customerPassword.$invalid">
                        <span ng-show="registerForm.customerPassword.$error.required">* required.</span>
                        <span ng-show="registerForm.customerPassword.$error">* length between 6 - 20.</span>
                        </span>
                      </div>
                    </div>
					
                    <!-- <div class="row">
                      <div class="col-md-8">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-phone"></i>
                        </div>
                          <input type="number" 
                                  class="form-control" 
                                  id="phone" 
                                  name="phone"
                                  placeholder="Phone"
                                  required>
                          </div>
  
                    </div> -->
                    
                    <div class="row">
                      <div class="col-md-8">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-map-marked-alt"></i></div>
                          <input type="text" 
                                  class="form-control" 
                                  id="inlineFormCustomerAddress" 
                                  name="address"
                                  ng-minlength="6"
                                  ng-maxlength="150"
                                  ng-model="address"
                                  placeholder="Address"
                                  required>
                          </div>
  
                      </div>
                      <div class="col-md-4">
                        <span style="color:red" ng-show="registerForm.address.$dirty && registerForm.address.$invalid">
                        <span ng-show="registerForm.address.$error.required">* required.</span>
                        <span ng-show="registerForm.address.$error">* min length 6.</span>
                        </span>
                      </div>
                    </div>
                  </form>

           
                 
                </div>
              </div>
              
            <div class="modal-footer">
              <button type="button" id="register-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" ng-click="registerCustomer()" class="btn btn-primary">Register</button>
            </div>
          </div>
        </div>
      </div>
