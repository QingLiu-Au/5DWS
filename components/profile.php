<div ng-controller="profileController" class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="profileModalLabel">Profile Form</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
                <div class="container-fluid registration">
                  <form name="profileForm">


                    <div class="row">
                      <div class="col-md-8">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-user"></i></div>
                          <input type="text" 
                                  class="form-control" 
                                  id="inlineFormInputGroupCustomerName" 
                                  name="customerName"
                                  ng-model="customerName"
                                  required>
                                </div>
  
                      </div>
                      <div class="col-md-4">
                        <span style="color:red" ng-show="profileForm.customerName.$dirty && profileForm.customerName.$invalid">
                        <span ng-show="profileForm.customerName.$error.required">* required.</span>
                        </span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
                          <input type="email" 
                                  class="form-control" 
                                  id="inlineFormInputGroupCustomerEmail" 
                                  name="customerEmail"
                                  ng-model="customerEmail"
                                  placeholder="Email"
                                  disabled>
                          </div>
  
                      </div>
                      <div class="col-md-4">
                        <span style="color:red" ng-show="profileForm.customerEmail.$dirty && profileForm.customerEmail.$invalid">
                        <span ng-show="profileForm.customerEmail.$error.required">* required.</span>
                        <span ng-show="profileForm.customerEmail.$error.email">* Invalid Format.</span>
                        </span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-lock"></i></div>
                          <input type="password" 
                                  class="form-control" 
                                  id="inlineFormInputGroupUserPassword" 
                                  name="password"
                                  ng-model="password"
                                  ng-minlength="6"
                                  ng-maxlength="20"
                                  placeholder="Password"
                                  required>
                          </div>
  
                      </div>
                      <div class="col-md-4">
                        <span style="color:red" ng-show="profileForm.password.$dirty && profileForm.password.$invalid">
                        <span ng-show="profileForm.password.$error.required">* required.</span>
                        <span ng-show="profileForm.password.$error">* length between 6 - 20.</span>
                        </span>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-8">
                        <div class="input-group">
                          <div class="input-group-text"><i class="fas fa-map-marked-alt"></i></div>
                          <input type="text" 
                                  class="form-control" 
                                  id="inlineFormInputGroupUserAddress" 
                                  name="address"
                                  ng-minlength="6"
                                  ng-maxlength="150"
                                  ng-model="address"
                                  placeholder="Address"
                                  required>
                          </div>
  
                      </div>
                      <div class="col-md-4">
                        <span style="color:red" ng-show="profileForm.address.$dirty && profileForm.address.$invalid">
                        <span ng-show="profileForm.address.$error.required">* required.</span>
                        <span ng-show="profileForm.address.$error">* min length 6.</span>
                        </span>
                      </div>
                    </div>
                  </form>

           
                 
                </div>
              </div>
              
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" ng-click="updateCustomer()" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>
