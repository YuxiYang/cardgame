<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>学生信息查询系统</title>
</head>
<body>
        <center>
    <?php 
      include "header.php";


     ?>
     <form action="index.php" method='get'>
        <input type="text" name='search' value='<?php echo @$_GET['search'] ?>'>
         <input type="submit" value='搜索'> 

     </form>
          <form action="index.php" method='get'>
     <input type="text" name='p' value=''>
     <input type="submit" value='go'> 
    </form>
         <?php           
      include "dbconfig.php";
      include "dbconnect.php";
      $where = "";
      $search ="";
      if(!empty($_GET['search'])){
        $where.=" where name like '%{$_GET['search']}%' "; 
        $search="&search={$_GET['search']}";
      }

      $pagesize=5;

      $sql1 = "select count(*) from stu {$where}";
      $r =mysql_query($sql1);

        $totalrow = mysql_result($r,0,0);

        $pagenum = ceil($totalrow/$pagesize) ;

        $page = empty($_GET['p'])?1:$_GET['p'];

        if($page <= 1){
          $page = 1;
        }

        if($page >= $pagenum){
          $page = $pagenum;
        }

        $limit = "limit ".(($page-1)*$pagesize).",".$pagesize;

      $sql = "select * from stu {$where} {$limit} ";

      $res = mysql_query($sql,$link);
      
         echo "<table border=1 width=800 align=center>";
                 echo "<tr><th>学号</th><th>姓名</th><th>年龄</th><th>身高</th><th>性别</th><th>班级号</th><th>操作</th></tr>";

      if($res && mysql_num_rows($res)>0){
        while ($row = mysql_fetch_assoc($res)) {
                
          echo "<tr>";
          echo "<td>{$row['id']}</td>";
          echo "<td>{$row['name']}</td>";
          echo "<td>{$row['age']}</td>";
          echo "<td>{$row['height']}</td>";
          $sex = $row['sex']=='w'?'女':'男';
          echo "<td>{$sex}</td>";
          echo "<td>{$row['classid']}</td>";
          echo "<td><a href='edit.php?id={$row['id']}'>修改</a> <a href='action.php?id={$row['id']}&a=del'>删除</a></td>";
          echo "</tr>";
        }
        echo "<tr align='right'>";
        echo "<td colspan='7'>";
        echo "当前页{$page}/{$pagenum}&nbsp;";
        echo "<a href='index.php?p=1{$search}'>首页</a>";

        echo "<a href='index.php?p=".($page-1)."{$search}'>上一页</a>";
        echo "<a href='index.php?p=".($page+1)."{$search}'>下一页</a>";
        echo "<a href='index.php?p={$pagenum}{$search}'>尾页</a>";
        echo "</td>";
        echo "</tr>";
      }else{
              echo "<tr><td colspan='6'>无查询数据</td></tr>";
      }
      echo "</table>";
      mysql_close($link);


          ?>
        </center>
</body>
</html>