<div ng-controller="loginController" >
    <div class="collapse" id="collapseLoginForm">
        <div
                class="row row-cols-lg-auto g-3 align-items-center"
                >
            <div class="col-12">
            <div class="input-group">
                <div class="input-group-text">@</div>
                <input type="email" 
                        class="form-control" 
                        id="inlineFormInputGroupUseremail" 
                        name="email"
                        ng-model="email"
                        placeholder="Username">
            </div>
            </div>
        
            <div class="col-12">
            <div class="input-group">
                <div class="input-group-text">*</div>
                <input type="password" 
                        class="form-control" 
                        id="inlineFormInputGrouPassword" 
                        name="password"
                        ng-model="password"
                        placeholder="Password">
            </div>
            </div>
        
            <div class="col-12">
            <button type="button" ng-click="loginCustomer(email, password)" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#registerModal">Register</button>
            </div>
        </div>

    </div>
</div>


