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
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7"> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8"> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9"> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
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
            <h1 class="page-title">编辑订单</h1>
<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-save"></i> Save</button>
    <a href="#myModal" data-toggle="modal" class="btn">Delete</a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
      <li><a href="#profile" data-toggle="tab">Password</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <?php
          require_once "config.inc.php";
          if(is_array($_GET)&&count($_GET)>0)  //using the get must view the data
          { 
            $id=$_GET['id'];
            $query = "select client_names,machine_type,phone,prices,address,warranty_time from orders where id='$id'";
            $result = mysql_query($query,$hd);
            $values = mysql_fetch_array($result);
            $values[6] = "保存";
            $values[7] = "addorder.php?id=$id";
          }
          else
          {
            $values[0]="";
            $values[1]="";
            $values[2]="";
            $values[3]="";
            $values[4]="";
            $values[5]="";
            $values[6]="添加";
            $values[7]="addorder.php";
          }
          $selected = array("","莞城","南城","万江","东城","石碣","石龙","茶山","石排","企石","横沥","桥头","谢岗","东坑","常平","寮步","大朗","黄江","清溪","塘厦","凤岗","长安","虎门","厚街","沙田","道窖","洪梅","麻涌","中堂","高埗","樟木头","大岭山","望牛墩");
          echo  "<form METHOD=POST ACTION='$values[7]'>";
          echo  "<label>客户姓名</label>";
          echo  "<input type=\"text\" name=\"name\" value='$values[0]'class=\"input-xlarge\">";
          echo "<label>机器型号</label>";
          echo "<input type=\"text\" name=\"type\" value='$values[1]' class=\"input-xlarge\">";
          echo "<label>联系方式</label>";
          echo "<input type=\"text\" name=\"phone\" value='$values[2]' class=\"input-xlarge\">";
          echo "<label>出售价格</label>";
          echo "<input type=\"text\" name=\"price\" value='$values[3]' class=\"input-xlarge\">";
          echo "<label>地区</label>";
          echo "<select name=\"region\" id=\"DropDownTimezone\" class=\"input-xlarge\">";
          $i = 1;
          while ( $i <= 32) {
            # code...
            $temp = $selected[$i];
            echo "<option value=\"$i\">$temp</option>";
          }
          echo "  </select>";
          echo "<label>联系地址</label>";
          echo "<input type=\"text\" name=\"address\" value='$values[4]' class=\"input-xlarge\">";
          echo "<label>保修期（天）</label>";
          echo "<input type=\"text\" name=\"day\" value='$values[5]' class=\"input-xlarge\">";
          echo "<div>";
          echo "<input type=submit class='btn btn-primary center' name='login' value='$values[6]'>";
          echo "</div>";
          echo "</form>";
        ?>

      </div>
      <div class="tab-pane fade" id="profile">
    <form id="tab2">
        <label>New Password</label>
        <input type="password" class="input-xlarge">
        <div>
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>

        </div>
    </div>
    

    
    <footer>
        <hr>
        
        <p class="pull-right">Collect from <a href="http://www.17sucai.com/" title="网页模板" target="_blank">网页模板</a></p>
        
        
        <p>&copy; 2012 <a href="#">Portnine</a></p>
    </footer>
    

    

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    
    
    
    
    
    
    
    
    
    
    
    

  </body>
</html>


