<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>hello,sosence</title>
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<link href="css/item.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="#">美租</a> </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active hidden"><a href="houselist.php">主页</a></li>
          <li class="dropdown hidden"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">区域 <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="查找">
          </div>
          <button type="button" class="btn btn-default "> <span class="glyphicon glyphicon-search"></span> 查找 </button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="login.html">登陆</a></li>
          <li><a href="#">注册</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">帮助 <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
          <li>
            <button type="button" class="btn btn-info navbar-btn" onclick="window.open('upload.html')">发布房源</button>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container-fluid --> 
  </nav>
  <ul class="list-unstyled">
    <li>租金
      <button type="button" class="btn btn-link">1000以下</button>
      <button type="button" class="btn btn-link">1000-2000</button>
      <button type="button" class="btn btn-link">2000-3000</button>
    </li>
    <li>区域
      <button type="button" class="btn btn-link">闵行</button>
      <button type="button" class="btn btn-link">长宁</button>
      <button type="button" class="btn btn-link">浦东</button>
    </li>
    <li>房型
      <button type="button" class="btn btn-link">1室</button>
      <button type="button" class="btn btn-link">2室</button>
      <button type="button" class="btn btn-link">3室</button>
    </li>
    <li>方式
      <button type="button" class="btn btn-link">合租</button>
      <button type="button" class="btn btn-link">整租</button>
    </li>
  </ul>
  <table class="table">
    <tbody>
      <tr>
        <th></th>
      </tr>
    </tbody>
  </table>
 
  </li>
  </ul>
  <div class="row">
  
</div>

<?php
 require_once("conn.php");

  $SQL="SELECT * FROM houseimage";
  $query=mysql_query($SQL);
  while($row=mysql_fetch_array($query)){
?>
<div class="col-sm-6 col-md-4"> <img src="<?php echo $row['imageurl'];?>" alt="..." width=100%>
      <div class="caption">
        <h4><?php echo $row['description'];?></h4>
        <ul class="list-inline" >
          <li>1室1卫</li>
          <span>&bull</span>
          <li>35M²</li>
          <span>&bull</span>
          <li>南向</li>
          <span>&bull</span>
          <li>莘庄水清三村</li>
        </ul>
        <p></p>
        <p><a href="#" class="btn btn-primary col-xs-3" role="button">1300</a> </p>
      </div>
    </div>
<?
  }
  mysql_close ( $conn );
?>
  <div class="center">
    <ul class="pagination pagination-lg">
      <li><a href="#">&laquo;</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">&raquo;</a></li>
    </ul>
  </div>
  
</div>
</body>
</html>
