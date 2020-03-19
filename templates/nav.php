
<header style="background-color: rgba(0,0,0,0)">
    <style>
        .navbar ul li button{
            border: none;
            background-color: rgba(50,145,230,.3);
            color:rgba(220,81,60,.8);
            border-radius: 20px;
            outline: 0!important;
        }
        .navbar ul li button:hover{
            background-color: rgba(0,0,0,.7);
            color: wheat;
        }
        i {
            border: solid rgba(220,81,60,.8);
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 3px;
        }
        .back{
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
        }
        #logoutLink:hover{
            font-size: 200%;
            text-decoration: none;
            color:red;
            transition: font-size 300ms ease-in;
        }

    </style>

    <div class="navbar">
        <ul class="nav navbar-nav" style="width: 100%">
            <li style="width: 50%"><div style="background-color: rgba(125,40,0,.05); height: 3.5%"><a href="index.php?action=home" class="previous">
                        <button ><b>&nbsp <i class="back"> </i>&nbsp  back home &nbsp</b></button></a></div></li>
            <li style="width: 50%"><div style="text-align: right; background-color: rgba(125,40,0,.05); height: 3.5%"><b>you are logged in as: &nbsp
                        <font style="color: rgba(80,140,15,.7)"><?="$nickName"?></font>&nbsp</b> <p><a href="index.php?action=logout" id="logoutLink">logout  </a>&nbsp</p></div></li>
        </ul>
    </div>
</header>


