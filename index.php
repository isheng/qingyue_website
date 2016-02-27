<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

<script src="lib/jquery-1.8.1.min.js" type="text/javascript"></script>

<!-- Demo page code -->

<style type="text/css">
#line-chart {
height:300px;
width:800px;
margin: 0px auto;
margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
            .brand .first {
                color: #ccc;
                font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="javascripts/html5.js"></script>
<![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="../assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body> 
<?php
if (isset($_COOKIE["user"]))
    $user=$_COOKIE["user"];
else
    echo"<meta http-equiv=\"Refresh\" content=\".1;URL=sign-in.html\">";
?>
<div class="navbar">
    <div class="navbar-inner">
    <div class="container-fluid">
    <ul class="nav pull-right">

    <li id="fat-menu" class="dropdown">
    <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
    <i class="icon-user"></i>
<?php
if (isset($_COOKIE["user"]))
    echo $user;
else
    echo "guess";
?>
<i class="icon-caret-down"></i
    </a>

    <ul class="dropdown-menu">
    <li><a tabindex="-1" href="reset-password.html">修改密码</a></li>
    <li class="divider"></li>
    <li><a tabindex="-1" href="logout.php">退出</a></li>
    </ul>
    </li>

    </ul>
    <a class="brand" href="index.php"><span class="first">沁</span> <span class="second">园</span></a>
    </div>
    </div>
    </div>


    <div class="container-fluid">

    <div class="row-fluid">
    <div class="span3">
    <div class="sidebar-nav">
    <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>主面板</div>
    <ul id="dashboard-menu" class="nav nav-list collapse in">
    <li><a href="index.php">主页</a></li>
    <li ><a href="orders.php">订单管理</a></li>
    <li ><a href="items.php">订单添加</a></li>
    <li ><a href="gallery.html">视图</a></li>
    <li ><a href="calendar.html">事件日历</a></li>
    <li ><a href="faq.html">售后</a></li>
    <li ><a href="help.html">帮助</a></li>
    </ul>
    <div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-briefcase"></i>用户<span class="label label-info">+10</span></div>
    <ul id="accounts-menu" class="nav nav-list collapse in">
    <li ><a href="logout.php">退出</a></li>
    <li ><a href="reset-password.html">修改密码</a></li>
    </ul>

    <div class="nav-header" data-toggle="collapse" data-target="#settings-menu"><i class="icon-exclamation-sign"></i>Error Pages</div>
    <ul id="settings-menu" class="nav nav-list collapse in">
    <li ><a href="403.html">403 page</a></li>
    <li ><a href="404.html">404 page</a></li>
    <li ><a href="500.html">500 page</a></li>
    <li ><a href="503.html">503 page</a></li>
    </ul>

    <div class="nav-header" data-toggle="collapse" data-target="#legal-menu"><i class="icon-legal"></i>Legal</div>
    <ul id="legal-menu" class="nav nav-list collapse in">
    <li ><a href="privacy-policy.html">Privacy Policy</a></li>
    <li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
    </ul>
    </div>
    </div>
    <div class="span9">
    <script type="text/javascript" src="lib/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" charset="utf-8" src="javascripts/graphDemo.js"></script>

<div class="stats">
    <p class="stat"><span class="number">53</span>tickets</p>
    <p class="stat"><span class="number">27</span>tasks</p>
    <p class="stat"><span class="number">15</span>waiting</p>
    </div>
    <h1 class="page-title">主面板</h1>

    <div class="row-fluid">
    <div class="block">
    <p class="block-heading" data-toggle="collapse" data-target="#chart-container">Performance Chart</p>
    <div id="chart-container" class="block-body collapse in">
    <div id="line-chart"></div>
    </div>
    </div>
    </div>

    <div class="row-fluid">
    <div class="block span6">
    <div class="block-heading" data-toggle="collapse" data-target="#tablewidget">订单</div>
    <div id="tablewidget" class="block-body collapse in">
    <table class="table">
    <thead>
    <tr>
    <th>客户</th>
    <th>订单时间</th>
    <th>型号</th>
    <th>保修期(天)</th>
    </tr>
    </thead>
    <tbody>
<?php
    require_once "config.inc.php";
    $query="select client_names,date,machine_type,warranty_time from orders";
    $result=mysql_query($query,$hd);

    $i = 0;
    while ($row=mysql_fetch_row($result)) {
        if ( $i > 5)
            break;
        $i++;
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td> $value </td>";
        }
        echo "</tr>";
    }
?>
</tbody>
    </table>
    <p><a href="orders.php">More...</a></p>
    </div>
    </div>
    <div class="block span6">
    <div class="block-heading" data-toggle="collapse" data-target="#widget1container">事件 </div>
    <div id="widget1container" class="block-body collapse in">
    <h2>近期需要维修</h2>
    <p>This template was developed with <a href="http://middlemanapp.com/" target="_blank">Middleman</a> and includes .erb layouts and views.</p>
    <p>All of the views you see here (sign in, sign up, users, etc) are already split up so you don't have to waste your time doing it yourself!</p>
    <p>The layout.erb file includes the header, footer, and side navigation and all of the views are broken out into their own files.</p>
    <p>If you aren't using Ruby, there is also a set of plain HTML files for each page, just like you would expect.</p>
    </div>
    </div>
    </div>
    <div class="copyrights">Collect from <a href="http://www.mycodes.net/" title="后台模板" target="_blank">后台模板</a></div>
    <div class="row-fluid">
    <div class="block span6">
    <div class="block-heading" data-toggle="collapse" data-target="#widget2container">History<span class="label label-warning">+10</span></div>
    <div id="widget2container" class="block-body collapse in">
    <table class="table">
    <tbody>
    <tr>
    <td>
    <p><i class="icon-user"></i> Mark Otto</p>
    </td>
    <td>
    <p>Amount: $1,247</p>
    </td>
    <td>
    <p>Date: 7/19/2012</p>
    <a href="#">View Transaction</a>
    </td>
    </tr>
    <tr>
    <td>
    <p><i class="icon-user"></i> Audrey Ann</p>
    </td>
    <td>
    <p>Amount: $2,793</p>
    </td>
    <td>
    <p>Date: 7/12/2012</p>
    <a href="#">View Transaction</a>
    </td>
    </tr>
    <tr>
    <td>
    <p><i class="icon-user"></i> Mark Tompson</p>
    </td>
    <td>
    <p>Amount: $2,349</p>
    </td>
    <td>
    <p>Date: 3/10/2012</p>
    <a href="#">View Transaction</a>
    </td>
    </tr>
    <tr>
    <td>
    <p><i class="icon-user"></i> Ashley Jacobs</p>
    </td>
    <td>
    <p>Amount: $1,192</p>
    </td>
    <td>
    <p>Date: 1/19/2012</p>
    <a href="#">View Transaction</a>
    </td>
    </tr>

    </tbody>
    </table>
    </div>
    </div>
    <div class="block span6">
    <p class="block-heading">Not Collapsible</p>
    <div class="block-body">
    <h2>Tip of the Day</h2>
    <p>Fava bean jícama seakale beetroot courgette shallot amaranth pea garbanzo carrot radicchio peanut leek pea sprouts arugula brussels sprout green bean. Spring onion broccoli chicory shallot winter purslane pumpkin gumbo cabbage squash beet greens lettuce celery. Gram zucchini swiss chard mustard burdock radish brussels sprout groundnut. Asparagus horseradish beet greens broccoli brussels sprout bitterleaf groundnut cress sweet pepper leek bok choy shallot celtuce scallion chickpea radish pea sprouts.</p>
    <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
    </div>
    </div>
    </div>

    </div>
    </div>



    <footer>
    <hr>

    <p class="pull-right">Collect from <a href="http://www.mycodes.net/" title="网页模板" target="_blank">网页模板</a> </p>


    <p>&copy; 2012 <a href="#">Portnine</a></p>
    </footer>




    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="lib/bootstrap/js/bootstrap.js"></script>


</body>
</html>


