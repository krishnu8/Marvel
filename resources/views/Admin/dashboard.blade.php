<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style type="text/css">
    .pro_names {
      font-family: JetBrains;
      font-size: 20px;
    }

    .pro_names:hover {
      font-weight: bold;
      color: black;
    }

    .pro_link {
      font-family: Fira Code;
      color: #fff;
    }

    .pro_link:hover {
      font-weight: bold;
      color: #000;
    }
  </style>

</head>
<body>
  
@extends('master_view')
@section('content')
<main class="mt-5 pt-3">
  <div class="container-fluid">
    <!-- <div class="row">
        <div class="col-md-12">
          <h4>Dashboard</h4>
        </div>
      </div> -->
    <div class="row">

      <!-- Profile -->

      <div class="col-md-3 mb-3 col-sm-6">
        <div class="card bg-primary text-white h-100 homee hey">
          <div class="card-body py-5 m-auto">
            <font class="texttt">
              WELCOME!</font>
          </div>
          <div class="card-footer d-flex center">
            <span class="m-auto"></span>
            <font class="pro_name">
              Name:
            </font>
            <span class="m-auto"></span>
            <!-- <span class="m-auto"></span>
              Admin
              <span class="m-auto"></span> -->
          </div>
          <div class="card-footer d-flex">
            <span class="m-auto">
              <!-- <i class="bi bi-chevron-left"></i> -->
            </span>
            <a class="pro_link" href="{{ URL::to('/') }}/admin_profile">View Profile</a>
            <span class="m-auto">
              <!-- <i class="bi bi-chevron-right"></i> -->
            </span>
          </div>
        </div>
      </div>

      <!-- Admins -->

      <div class="col-md-3 mb-3 col-sm-6">
        <div class="card bg-primary text-white h-100">
          <div class="card-body py-5 m-auto">
            <h4 class="m-auto" style="font-size: 20px;">Total Admins</h4>
            1
          </div>
          <div class="card-footer d-flex center">
            <span class="m-auto"></span>
            <font class="pro_names">Admin Users</font>
            <span class="m-auto"></span>
          </div>
          <div class="card-footer d-flex">
            <span class="m-auto">

            </span>
            <a class="pro_link" href="{{ URL::to('/') }}/total_admins">See Admins</a>
            <span class="m-auto">
            </span>
          </div>
        </div>
      </div>

      <!-- Normal Users -->

      <div class="col-md-3 mb-3 col-sm-6">
        <div class="card bg-primary text-white h-100">
          <div class="card-body py-5 m-auto">
            <h4 class="m-auto" style="font-size: 20px;">Total Normal Users</h4>
            1
          </div>
          <div class="card-footer d-flex center">
            <span class="m-auto"></span>
            <font class="pro_names">Normal Users</font>
            <span class="m-auto"></span>
          </div>
          <div class="card-footer d-flex">
            <span class="m-auto">

            </span>
            <a class="pro_link" href="{{ URL::to('/') }}/normal_users">See Normal Users</a>
            <span class="m-auto">
            </span>
          </div>
        </div>
      </div>

      <!-- Total Users -->

      <div class="col-md-3 mb-3 col-sm-6">
        <div class="card bg-primary text-white h-100">
          <div class="card-body py-5 m-auto">
            <h4 class="m-auto" style="font-size: 20px;">Total Users</h4>
            1
          </div>
          <div class="card-footer d-flex center">
            <span class="m-auto"></span>
            <font class="pro_names">All Users</font>
            <span class="m-auto"></span>
          </div>
          <div class="card-footer d-flex">
            <span class="m-auto">

            </span>
            <a class="pro_link" href="{{ URL::to('/') }}/total_users">See Users</a>
            <span class="m-auto">
            </span>
          </div>
        </div>
      </div>

      <!-- Movies -->

      <div class="col-md-3 mb-3 col-sm-6">
        <div class="card bg-primary text-white h-100">
          <div class="card-body py-5 m-auto">
            <h4 class="m-auto" style="font-size: 20px;">Total Movies</h4>
            1
          </div>
          <div class="card-footer d-flex center">
            <span class="m-auto"></span>
            <font class="pro_names">All Movies</font>
            <span class="m-auto"></span>
          </div>
          <div class="card-footer d-flex">
            <span class="m-auto">

            </span>
            <a class="pro_link" href="{{ URL::to('/') }}/movies">See Movies</a>
            <span class="m-auto">
            </span>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3 col-sm-6">
        <div class="card bg-primary text-white h-100">
          <div class="card-body py-5 m-auto">
            <h4 class="m-auto" style="font-size: 20px;">Total Products</h4>
            1
          </div>
          <div class="card-footer d-flex center">
            <span class="m-auto"></span>
            <font class="pro_names">Products Added</font>
            <span class="m-auto"></span>
          </div>
          <div class="card-footer d-flex">
            <span class="m-auto">

            </span>
            <a class="pro_link" href="{{ URL::to('/') }}/products">See Products</a>
            <span class="m-auto">
            </span>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3 col-sm-6">
        <div class="card bg-primary text-white h-100">
          <div class="card-body py-5 m-auto">
            <h4 class="m-auto" style="font-size: 20px;">Total Orders</h4>
            1
          </div>
          <div class="card-footer d-flex center">
            <span class="m-auto"></span>
            <font class="pro_names">Orders</font>
            <span class="m-auto"></span>
          </div>
          <div class="card-footer d-flex">
            <span class="m-auto">

            </span>
            <a class="pro_link" href="{{ URL::to('/') }}/orders">See Orders</a>
            <span class="m-auto">
            </span>
          </div>
        </div>
      </div>

      <div class="col-md-3 mb-3 col-sm-6">
        <div class="card bg-primary text-white h-100">
          <div class="card-body py-5 m-auto">
            <h4 class="m-auto" style="font-size: 20px;">Total Messages</h4>
            1
          </div>
          <div class="card-footer d-flex center">
            <span class="m-auto"></span>
            <font class="pro_names">Messages</font>
            <span class="m-auto"></span>
          </div>
          <div class="card-footer d-flex">
            <span class="m-auto">

            </span>
            <a class="pro_link" href="{{ URL::to('/') }}/messages">See Messages</a>
            <span class="m-auto">
            </span>
          </div>
        </div>
      </div>



      <div class="col-md-3 mb-3 col-sm-6">
        <div class="card bg-primary text-white h-100">
          <div class="card-body py-5 m-auto">
            <h4 class="m-auto" style="font-size: 20px;">Total Deleted Users</h4>
            1
          </div>
          <div class="card-footer d-flex center">
            <span class="m-auto"></span>
            <font class="pro_names">Deleted Users</font>
            <span class="m-auto"></span>
          </div>
          <div class="card-footer d-flex">
            <span class="m-auto">

            </span>
            <a class="pro_link" href="{{ URL::to('/') }}/deleted_users">See Deleted Users</a>
            <span class="m-auto">
            </span>
          </div>
        </div>
      </div>


    </div>
  </div>
</main>
@endsection

</body>
</html>