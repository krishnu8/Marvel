@extends('layouts.after_login_master')
<style>
    a {
      text-decoration: none;
      color: rgb(234, 50, 50);
    }

    .text {
      color: red;
      font-size: 30px;
    }
    .jr{
      transition: 1s;
      margin-bottom: 20px;
    }
    .jr:hover{
      transform: scale(0.9);
    }
    .r{
    width: 100%;
    display:flex; justify-content:space-evenly;padding:40px;
}
    @media only screen and (max-width: 1000px) {
      html {
        font-size: 60%;
      }

      ul li {
        display: block;
      }

      font {
        font-size: 15px;
      }

    }
    .main{
      display: flex; flex-direction: column; align-items: center;background-color: #ffffff;width: 100%;
    }
  </style>
</head>
<body style="justify-content: center; ">
  @section('body')
  <section class="nav">
    <div class="main">
      <div class="text">
        <u>Gallery</u>
      </div>
      <div class="row r">
          @foreach ($data as $d)
          <div class="col-sm-8 col-md-6 col-lg-4 jr" >
            <img src="pictures/gallery/{{$d['Image']}}" class="img-fluid img1" />
          </div>
          @endforeach
      </div>
    </div>
  </section>
  @endsection