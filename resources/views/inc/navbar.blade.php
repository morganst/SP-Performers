<style>


    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 5px 10px;
        text-decoration: none;
        font-size: 26px;
        color: #818181;
        display: block;
        transition: 0.3s;
        text-align: left;
        font-size: 22px;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 5px;
        font-size: 40px;
    }
    .sm-text {
        font-size: 16pt;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
</style>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="/"><span class="sm-text fas fa-home"></span> Home</a> 
    @Auth
    <a href="/classes"><span class="sm-text fas fa-bell"></span> Classes</a> 
    <a href="/students"><span class="sm-text fas fa-users"></span> Students</a> 
    @if(Auth::user()->role==1)
    <a href="/instructors"><span class="sm-text fas fa-chalkboard-teacher"></span> Instructors</a> 
    @endif
    <a href="/logout"><span class="sm-text fas fa-sign-out-alt"></span> Logout</a>
    @endAuth
</div>
<span style="font-size:50px;cursor:pointer;margin-left:10px;" onclick="openNav()">&#9776;</span>

<script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0px";
    }
</script>