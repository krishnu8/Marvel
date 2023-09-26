<head>
    <style>
        .home1 {
            height: 35px;
            width: 150px;
            border-color: red;
            color: red;
            font-size: 20px;
            position: absolute;
            right: 100px;
            margin-top: 20px;
            background-color: transparent;
        }

        .home1:hover {
            background-color: red;
            color: white;
        }

        body {
            font-family: sans-serif;
            color: white;
            background-color: white;
            font-size: 18px;
        }

        .t {
            margin-top: 10px;
            font-size: 20px;
            font-weight: bold;

        }

        center {
            padding: 10px;
            font-weight: bold;
            font-size: 25px;
        }
    </style>
</head>
<div style="font-size: 20px;margin-left: 50%;"><a href="{{ URL::to('/') }}/After_home" class="he"><button class="home1">Go
            Back</button></a></div>
<div style="padding:20px;"><a href="/After_home"><img src="{{ URL::to('/') }}/pictures/hen.png" height="40px" width="100px"></a></div>
<div style="justify-content: center;display: flex;">
    <div
        style="height:fit-content;width: 35%;background-color: rgb(252, 45, 45);padding: 20px;border-radius: 10px;margin-top: 50px;">
        <center>Profile</center>
        <center>
            <div style="height:70%;width:70%;"><img style="height:100%;width:100%;" src="{{ URL::to('/') }}/pictures/{{ $data['Image'] }}"
                    alt=""></div>
        </center>
        <div>
            <div class="t">Character Name</div>{{ $data['Character_Name'] }}
        </div>
        <div>
            <div class="t">Superhero Name</div>{{ $data['Superhero_Name'] }}
        </div>
        <div>
            <div class="t">Actor Name</div>{{ $data['Actor_Name'] }}
        </div>
        <div>
            <div class="t">Favourate Name</div>{{ $data['Favourite_Weapon'] }}
        </div>
        <div>
            <div class="t">Discription</div>{{ $data['Description'] }}
        </div>
    </div>
</div>
