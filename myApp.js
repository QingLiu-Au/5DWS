var app = angular.module("myApp", []);

app.controller(
  "loginController",
  function ($timeout, $scope, $http, profileService) {
    $scope.loginCustomer = function (email, password) {
      var data = {
        email: email,
        password: password,
      };

      //Call the services to login customer
      $http
        .post("./control/customer/logincustomer.php", JSON.stringify(data))
        .then(
          function (response) {
            if (response.data.hasValue) {
              $timeout(function () {
                // disable login form
                document.getElementById("buttonLogin").click();

                // set response data to profile
                profileService.SetProfile(response.data);

                // set returned customer data to local storage
                localStorage.setItem("customer", JSON.stringify(response.data));
              }, 0);
              // window.location.replace('./index.php')
            }
          },
          // catch response error
          function (error) {
            console.log(error);
          }
        );
    };
  }
);

app.controller(
  "profileController",
  function ($scope, $http, $rootScope, profileService) {
    const emptyCustomer = function () {
      $scope.customerName = "";
      $scope.customerEmail = "";
      $scope.password = "";
      $scope.address = "";
      $scope.hasValue = false;
    };

    const valuedCustomer = function (customer) {
      $scope.customerName = customer.customerName;
      $scope.customerEmail = customer.customerEmail;
      $scope.password = customer.password;
      $scope.address = customer.address;
      $scope.hasValue = customer.hasValue;
    };

    var localCustomer = JSON.parse(localStorage.getItem("customer"));

    if (localCustomer != null && localCustomer.hasValue) {
      valuedCustomer(localCustomer);
    } else {
      emptyCustomer();
    }

    $scope.updateCustomer = function () {
      $http
        .put("./control/customer/updatecustomer.php", {
          customerName: $scope.customerName,
          customerEmail: $scope.customerEmail,
          password: $scope.password,
          address: $scope.address,
        })
        .then(
          function (response) {
            if (response.data.hasValue) {
              profileService.SetProfile(response.data);
              localStorage.setItem("customer", JSON.stringify(response.data));
              alert("Update Succeed");
            } else {
              alert("Update NOT Succeed, Please Retry");
            }
          },
          function (error) {
            console.debug(error.data);
          }
        )
        .final(console.log("update customer"));
    };

    $scope.signout = function () {
      emptyCustomer();
      localStorage.setItem(
        "customer",
        '{"customerName":"","customerEmail":"","password":"","address":"","hasValue":false}'
      );
    };

    // listen on profile event updating value
    $rootScope.$on("profileEvent", function () {
      let customer = profileService.GetProfile();
      valuedCustomer(customer);
    });
  }
);

app.controller("detailController", function ($scope, $http) {
  $scope.product = "";
  $scope.shop = "";

  $scope.GetProductById = function (id) {
    $http.get(`./control/product/getProductById.php?id=${id}`).then(
      function (response) {
        $scope.product = response.data;
        $scope.GetShopById($scope.product.shopId);
      },
      function (error) {
        console.log(error.data);
      }
    );
  };

  $scope.GetShopById = function (id) {
    console.log(`shop id is ${id}`);
    $http.get(`./control/shop/getShopById.php?id=${id}`).then(
      function (response) {
        $scope.shop = response.data;
        $scope.MyMap();
      },
      function (error) {
        console.log(error.data);
      }
    );
  };

  $scope.MyMap = function () {
    var mapProp = {
      center: new google.maps.LatLng(
        $scope.shop.latitude,
        $scope.shop.longitude
      ),
      zoom: 18,
    };
    var map = new google.maps.Map(
      document.getElementById("googleMap"),
      mapProp
    );
  };
});

app.controller(
  "registerController",
  function ($timeout, $scope, $http, profileService) {
    $scope.fullName = "";
    $scope.customerEmail = "";
    $scope.customerPassword = "";
    $scope.address = "";

    // call service to register customer with post method
    $scope.registerCustomer = function () {
      $http
        .post("./control/customer/registerCustomer.php", {
          customerName: $scope.fullName,
          customerEmail: $scope.customerEmail,
          password: $scope.customerPassword,
          address: $scope.address,
        })
        .then(
          // handle correct response
          function (response) {
            // set response customer data to local storage
            localStorage.setItem("customer", JSON.stringify(response.data));

            $timeout(function () {
              // disable login button
              document.getElementById("buttonLogin").click();

              // profile service -> set profile data
              profileService.SetProfile(response.data);

              //disable register modal
              document.getElementById("register-close").click();

              // enable profile modal
              document.getElementById("profile-trigger").click();
            }, 0);
          },
          // handle error response
          function (error) {
            console.log(error);
          }
        );
    };
  }
);

app.service("profileService", function ($rootScope) {
  // initial customer profile
  this.profile = "";

  // set new customer profile to this local profile
  this.SetProfile = function (profile) {
    this.profile = profile;

    // trigger profile emitter to update listener controller
    $rootScope.$emit("profileEvent");
  };

  // return this local profile
  this.GetProfile = function () {
    return this.profile;
  };
});
