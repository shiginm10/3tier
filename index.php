{"payload":{"allShortcutsEnabled":false,"fileTree":{"":{"items":[{"name":"Dockerfile","path":"Dockerfile","contentType":"file"},{"name":"README.md","path":"README.md","contentType":"file"},{"name":"index.php","path":"index.php","contentType":"file"},{"name":"simple_todo.sql","path":"simple_todo.sql","contentType":"file"}],"totalCount":4}},"fileTreeProcessingTime":2.3948139999999998,"foldersToFetch":[],"reducedMotionEnabled":null,"repo":{"id":620807117,"defaultBranch":"main","name":"3tier_todo_app","ownerLogin":"vikash-kumar01","currentUserCanPush":false,"isFork":false,"isEmpty":false,"createdAt":"2023-03-29T12:12:31.000Z","ownerAvatar":"https://avatars.githubusercontent.com/u/35370115?v=4","public":true,"private":false,"isOrgOwned":false},"symbolsExpanded":false,"treeExpanded":true,"refInfo":{"name":"main","listCacheKey":"v0:1680092125.919856","canEdit":false,"refType":"branch","currentOid":"77ef031627819a0f83b1bbbdf1e9fe1d70419419"},"path":"index.php","currentUser":null,"blob":{"rawLines":["<?php ","\t$connection = mysqli_connect('localhost','root','','simple_todo');","\t ","\t $id = '';","","\tif (isset($_POST['todo']) && empty($_POST['id']) ) {","\t\t\t$todo =\t$_POST['todo'];","\t\t\tif (!empty($todo)) {","\t\t\t\tif (insertTodo($todo,$connection) == true) {","\t\t\t\techo \"<script>alert('Todos Inserted');</script>\";","\t\t\t }","\t\t\t}else{","\t\t\t\techo \"<script>alert('Please Inserted Todo');</script>\";","\t\t\t}","\t\t\t","\t\t\t","\t}","","\tif (isset($_POST['todo']) && !empty($_POST['id']) ) {","\t\t$id  =  $_POST['id'];","\t  \t$todo = $_POST['todo'];","\t  \t if(UpdateTodo($id,$todo,$connection)){","\t\t\t   echo \"<script>alert('Todos Updated');</script>\";","\t\t   }","\t\t\t","\t}","","\tif (isset($_GET['delete_id'])) {","\t\t$id = $_GET['delete_id'];","\t\tif (DeleteTodo($id,$connection) == true) {","\t\t\techo \"<script>alert('Todos Deleted');</script>\";","\t\t}","\t\t","\t}","\tif (isset($_GET['marking_id'])) {","\t\t$id = $_GET['marking_id'];","\t\tif (CompleteTodo($id,$connection)== true) {","\t\t\techo \"<script>alert('Todos Complete Successfully');</script>\";","\t\t}","\t}","","\tfunction InsertTodo($todo,$connection)","\t{","\t\t","\t\t$query = \"INSERT INTO todos set todo = '$todo' \";","\t\t$result = mysqli_query($connection,$query);","\t\tif ($result == true) {","\t\t\treturn true;","\t\t}else{","\t\t\treturn false;","\t\t}","\t}","","\tfunction DeleteTodo($id,$connection)","\t{","\t\t$query = \"Delete from todos where id = '$id' \";","\t\t$result = mysqli_query($connection,$query);","\t\tif ($result == true) {","\t\t\treturn true;","\t\t}else{","\t\t\treturn false;","\t\t}","\t}","","","\tfunction CompleteTodo($id,$connection)","\t{","\t    $query = \"UPDATE todos set completed = 1 where id = '$id'\";","\t\t$result = mysqli_query($connection,$query);","\t\tif ($result == true) {","\t\t\treturn true;","\t\t}else{","\t\t\treturn false;","\t\t}","","\t}","\tif(isset($_POST['update'])){","\t\t$id = $_POST['update_id'];","\t\t$data = GetTodo($id,$connection);","\t}","\t\tfunction GetTodo($id,$connection)","\t{","\t\t$query = \"select * from todos where id = '$id' \";","\t\t$result = mysqli_query($connection,$query);","\t\tif ($result == true) {","\t\t\treturn\tmysqli_fetch_assoc($result);","\t\t}else{","\t\t\treturn false;","\t\t}","","\t}","\t\tfunction UpdateTodo($id,$todo,$connection)","\t{","\t\t$query = \"Update todos set todo = '$todo' where id = '$id' \";","\t\t$result = mysqli_query($connection,$query);","\t\tif (mysqli_error($connection)) {","\t\t\tdie(mysqli_error($connection));","\t\t}","\t}"," ?>"," ","","<!DOCTYPE html>","<html>","<head>","\t<title>A Basic Todo</title>","\t\t<style type=\"text/css\">","\t\tinput[type=\"text\"]{","\t\t\tpadding: 10px 20px 10px 20px;","\t\t\twidth: 400px;","\t\t\tmargin-top: 5px;","\t\t}","\t\t.wrapper{","\t\t\twidth:40%;","\t\t\tmargin: 0 auto;","\t\t\tborder-left: 2px solid #ddd;","\t\t\tborder-right: 2px solid #ddd;","\t\t\tborder-top: 2px solid #ddd;","\t\t\tbackground-color:#bebebe;","\t\t}","\t\t.form {","\t\t\tdisplay: inline-block;","\t\t}","\t\ta {","\t\t\ttext-decoration:none;","\t\t\tcolor: #3e3e3e;","\t\t}","\t\t.button{","\t\t\tbackground-color: #4CAF50; /* Green */","\t\t\tborder: none;","\t\t\tcolor: white;","\t\t\tpadding: 10px 16px;","\t\t\ttext-align: center;","\t\t\ttext-decoration: none;","\t\t\tdisplay: inline-block;","\t\t\tfont-size: 12px;","\t\t\tmargin: 4px 2px;","\t\t\tcursor: pointer;","\t\t}","\t\t","\t</style>","</head>","<body>","<div class=\"wrapper\">","\t<form method=\"post\" action=\"index.php\">","\t\t<div>","\t\t\t<center>","\t\t\t<input type=\"text\" name=\"todo\" placeholder=\"create new todo\" value=\"<?php if (isset($_POST['update_id'])) {echo $data['todo'];}  ?>\" required>","\t\t\t<input type=\"hidden\" name=\"id\" value=\"<?php if (isset($_POST['update_id'])) {echo $data['id'];}  ?>\" >","\t\t\t<input class=\"button\" type=\"submit\" value=\"Submit\">","\t\t\t</center>","\t\t</div>","\t</form>","\t<br><br>","","\t<?php ","\t$query = \"select * from todos order by id desc\";","\t$result = mysqli_query($connection,$query);","\t$row = mysqli_fetch_all($result, MYSQLI_ASSOC);","\tforeach ($row as $todos) { ?>","\t\t<center>","\t\t<?php echo $todos['todo'];  ?>","\t  \t\t<button><a href='index.php?delete_id=<?php echo $todos['id']; ?>'>Delete</a></button>","\t\t\t\t<form class=\"form\" method=\"post\" action=\"\">","\t\t\t\t\t<input type=\"hidden\" name=\"update_id\" value=\"<?php  echo $todos['id']; ?>\">","\t\t\t\t\t<input type=\"submit\" value=\"Update\" name=\"update\">","\t\t\t\t</form>","\t   <?php if ($todos['completed'] == 1) {","\t  \techo \"Completed\";","\t  }else{ ?>","\t  \t\t\t<button><a href='index.php?marking_id=<?php echo $todos['id']; ?>'>Mark complete</a></button>","\t <?php } ?>","\t\t<hr>","\t</center>","<?php } ?>","</div>","</body>","</html>"],"stylingDirectives":[[{"start":0,"end":5,"cssClass":"pl-ent"}],[{"start":1,"end":12,"cssClass":"pl-s1"},{"start":1,"end":2,"cssClass":"pl-c1"},{"start":30,"end":41,"cssClass":"pl-s"},{"start":42,"end":48,"cssClass":"pl-s"},{"start":49,"end":51,"cssClass":"pl-s"},{"start":52,"end":65,"cssClass":"pl-s"}],[],[{"start":2,"end":5,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":8,"end":10,"cssClass":"pl-s"}],[],[{"start":1,"end":3,"cssClass":"pl-k"},{"start":11,"end":17,"cssClass":"pl-s1"},{"start":11,"end":12,"cssClass":"pl-c1"},{"start":12,"end":17,"cssClass":"pl-c1"},{"start":18,"end":24,"cssClass":"pl-s"},{"start":36,"end":42,"cssClass":"pl-s1"},{"start":36,"end":37,"cssClass":"pl-c1"},{"start":37,"end":42,"cssClass":"pl-c1"},{"start":43,"end":47,"cssClass":"pl-s"}],[{"start":3,"end":8,"cssClass":"pl-s1"},{"start":3,"end":4,"cssClass":"pl-c1"},{"start":11,"end":17,"cssClass":"pl-s1"},{"start":11,"end":12,"cssClass":"pl-c1"},{"start":12,"end":17,"cssClass":"pl-c1"},{"start":18,"end":24,"cssClass":"pl-s"}],[{"start":3,"end":5,"cssClass":"pl-k"},{"start":14,"end":19,"cssClass":"pl-s1"},{"start":14,"end":15,"cssClass":"pl-c1"}],[{"start":4,"end":6,"cssClass":"pl-k"},{"start":19,"end":24,"cssClass":"pl-s1"},{"start":19,"end":20,"cssClass":"pl-c1"},{"start":25,"end":36,"cssClass":"pl-s1"},{"start":25,"end":26,"cssClass":"pl-c1"},{"start":41,"end":45,"cssClass":"pl-c1"}],[{"start":4,"end":8,"cssClass":"pl-k"},{"start":10,"end":51,"cssClass":"pl-s"}],[],[{"start":4,"end":8,"cssClass":"pl-k"}],[{"start":4,"end":8,"cssClass":"pl-k"},{"start":10,"end":57,"cssClass":"pl-s"}],[],[],[],[],[],[{"start":1,"end":3,"cssClass":"pl-k"},{"start":11,"end":17,"cssClass":"pl-s1"},{"start":11,"end":12,"cssClass":"pl-c1"},{"start":12,"end":17,"cssClass":"pl-c1"},{"start":18,"end":24,"cssClass":"pl-s"},{"start":37,"end":43,"cssClass":"pl-s1"},{"start":37,"end":38,"cssClass":"pl-c1"},{"start":38,"end":43,"cssClass":"pl-c1"},{"start":44,"end":48,"cssClass":"pl-s"}],[{"start":2,"end":5,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":10,"end":16,"cssClass":"pl-s1"},{"start":10,"end":11,"cssClass":"pl-c1"},{"start":11,"end":16,"cssClass":"pl-c1"},{"start":17,"end":21,"cssClass":"pl-s"}],[{"start":4,"end":9,"cssClass":"pl-s1"},{"start":4,"end":5,"cssClass":"pl-c1"},{"start":12,"end":18,"cssClass":"pl-s1"},{"start":12,"end":13,"cssClass":"pl-c1"},{"start":13,"end":18,"cssClass":"pl-c1"},{"start":19,"end":25,"cssClass":"pl-s"}],[{"start":5,"end":7,"cssClass":"pl-k"},{"start":8,"end":18,"cssClass":"pl-v"},{"start":19,"end":22,"cssClass":"pl-s1"},{"start":19,"end":20,"cssClass":"pl-c1"},{"start":23,"end":28,"cssClass":"pl-s1"},{"start":23,"end":24,"cssClass":"pl-c1"},{"start":29,"end":40,"cssClass":"pl-s1"},{"start":29,"end":30,"cssClass":"pl-c1"}],[{"start":6,"end":10,"cssClass":"pl-k"},{"start":12,"end":52,"cssClass":"pl-s"}],[],[],[],[],[{"start":1,"end":3,"cssClass":"pl-k"},{"start":11,"end":16,"cssClass":"pl-s1"},{"start":11,"end":12,"cssClass":"pl-c1"},{"start":12,"end":16,"cssClass":"pl-c1"},{"start":17,"end":28,"cssClass":"pl-s"}],[{"start":2,"end":5,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":8,"end":13,"cssClass":"pl-s1"},{"start":8,"end":9,"cssClass":"pl-c1"},{"start":9,"end":13,"cssClass":"pl-c1"},{"start":14,"end":25,"cssClass":"pl-s"}],[{"start":2,"end":4,"cssClass":"pl-k"},{"start":6,"end":16,"cssClass":"pl-v"},{"start":17,"end":20,"cssClass":"pl-s1"},{"start":17,"end":18,"cssClass":"pl-c1"},{"start":21,"end":32,"cssClass":"pl-s1"},{"start":21,"end":22,"cssClass":"pl-c1"},{"start":37,"end":41,"cssClass":"pl-c1"}],[{"start":3,"end":7,"cssClass":"pl-k"},{"start":9,"end":49,"cssClass":"pl-s"}],[],[],[],[{"start":1,"end":3,"cssClass":"pl-k"},{"start":11,"end":16,"cssClass":"pl-s1"},{"start":11,"end":12,"cssClass":"pl-c1"},{"start":12,"end":16,"cssClass":"pl-c1"},{"start":17,"end":29,"cssClass":"pl-s"}],[{"start":2,"end":5,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":8,"end":13,"cssClass":"pl-s1"},{"start":8,"end":9,"cssClass":"pl-c1"},{"start":9,"end":13,"cssClass":"pl-c1"},{"start":14,"end":26,"cssClass":"pl-s"}],[{"start":2,"end":4,"cssClass":"pl-k"},{"start":6,"end":18,"cssClass":"pl-v"},{"start":19,"end":22,"cssClass":"pl-s1"},{"start":19,"end":20,"cssClass":"pl-c1"},{"start":23,"end":34,"cssClass":"pl-s1"},{"start":23,"end":24,"cssClass":"pl-c1"},{"start":38,"end":42,"cssClass":"pl-c1"}],[{"start":3,"end":7,"cssClass":"pl-k"},{"start":9,"end":63,"cssClass":"pl-s"}],[],[],[],[{"start":1,"end":9,"cssClass":"pl-k"},{"start":10,"end":20,"cssClass":"pl-en"},{"start":21,"end":26,"cssClass":"pl-s1"},{"start":21,"end":22,"cssClass":"pl-c1"},{"start":27,"end":38,"cssClass":"pl-s1"},{"start":27,"end":28,"cssClass":"pl-c1"}],[],[],[{"start":2,"end":8,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":12,"end":42,"cssClass":"pl-s"},{"start":42,"end":47,"cssClass":"pl-s1"},{"start":42,"end":43,"cssClass":"pl-c1"},{"start":47,"end":49,"cssClass":"pl-s"}],[{"start":2,"end":9,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":25,"end":36,"cssClass":"pl-s1"},{"start":25,"end":26,"cssClass":"pl-c1"},{"start":37,"end":43,"cssClass":"pl-s1"},{"start":37,"end":38,"cssClass":"pl-c1"}],[{"start":2,"end":4,"cssClass":"pl-k"},{"start":6,"end":13,"cssClass":"pl-s1"},{"start":6,"end":7,"cssClass":"pl-c1"},{"start":17,"end":21,"cssClass":"pl-c1"}],[{"start":3,"end":9,"cssClass":"pl-k"},{"start":10,"end":14,"cssClass":"pl-c1"}],[{"start":3,"end":7,"cssClass":"pl-k"}],[{"start":3,"end":9,"cssClass":"pl-k"},{"start":10,"end":15,"cssClass":"pl-c1"}],[],[],[],[{"start":1,"end":9,"cssClass":"pl-k"},{"start":10,"end":20,"cssClass":"pl-en"},{"start":21,"end":24,"cssClass":"pl-s1"},{"start":21,"end":22,"cssClass":"pl-c1"},{"start":25,"end":36,"cssClass":"pl-s1"},{"start":25,"end":26,"cssClass":"pl-c1"}],[],[{"start":2,"end":8,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":12,"end":42,"cssClass":"pl-s"},{"start":42,"end":45,"cssClass":"pl-s1"},{"start":42,"end":43,"cssClass":"pl-c1"},{"start":45,"end":47,"cssClass":"pl-s"}],[{"start":2,"end":9,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":25,"end":36,"cssClass":"pl-s1"},{"start":25,"end":26,"cssClass":"pl-c1"},{"start":37,"end":43,"cssClass":"pl-s1"},{"start":37,"end":38,"cssClass":"pl-c1"}],[{"start":2,"end":4,"cssClass":"pl-k"},{"start":6,"end":13,"cssClass":"pl-s1"},{"start":6,"end":7,"cssClass":"pl-c1"},{"start":17,"end":21,"cssClass":"pl-c1"}],[{"start":3,"end":9,"cssClass":"pl-k"},{"start":10,"end":14,"cssClass":"pl-c1"}],[{"start":3,"end":7,"cssClass":"pl-k"}],[{"start":3,"end":9,"cssClass":"pl-k"},{"start":10,"end":15,"cssClass":"pl-c1"}],[],[],[],[],[{"start":1,"end":9,"cssClass":"pl-k"},{"start":10,"end":22,"cssClass":"pl-en"},{"start":23,"end":26,"cssClass":"pl-s1"},{"start":23,"end":24,"cssClass":"pl-c1"},{"start":27,"end":38,"cssClass":"pl-s1"},{"start":27,"end":28,"cssClass":"pl-c1"}],[],[{"start":5,"end":11,"cssClass":"pl-s1"},{"start":5,"end":6,"cssClass":"pl-c1"},{"start":15,"end":58,"cssClass":"pl-s"},{"start":58,"end":61,"cssClass":"pl-s1"},{"start":58,"end":59,"cssClass":"pl-c1"},{"start":61,"end":62,"cssClass":"pl-s"}],[{"start":2,"end":9,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":25,"end":36,"cssClass":"pl-s1"},{"start":25,"end":26,"cssClass":"pl-c1"},{"start":37,"end":43,"cssClass":"pl-s1"},{"start":37,"end":38,"cssClass":"pl-c1"}],[{"start":2,"end":4,"cssClass":"pl-k"},{"start":6,"end":13,"cssClass":"pl-s1"},{"start":6,"end":7,"cssClass":"pl-c1"},{"start":17,"end":21,"cssClass":"pl-c1"}],[{"start":3,"end":9,"cssClass":"pl-k"},{"start":10,"end":14,"cssClass":"pl-c1"}],[{"start":3,"end":7,"cssClass":"pl-k"}],[{"start":3,"end":9,"cssClass":"pl-k"},{"start":10,"end":15,"cssClass":"pl-c1"}],[],[],[],[{"start":1,"end":3,"cssClass":"pl-k"},{"start":10,"end":16,"cssClass":"pl-s1"},{"start":10,"end":11,"cssClass":"pl-c1"},{"start":11,"end":16,"cssClass":"pl-c1"},{"start":17,"end":25,"cssClass":"pl-s"}],[{"start":2,"end":5,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":8,"end":14,"cssClass":"pl-s1"},{"start":8,"end":9,"cssClass":"pl-c1"},{"start":9,"end":14,"cssClass":"pl-c1"},{"start":15,"end":26,"cssClass":"pl-s"}],[{"start":2,"end":7,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":10,"end":17,"cssClass":"pl-v"},{"start":18,"end":21,"cssClass":"pl-s1"},{"start":18,"end":19,"cssClass":"pl-c1"},{"start":22,"end":33,"cssClass":"pl-s1"},{"start":22,"end":23,"cssClass":"pl-c1"}],[],[{"start":2,"end":10,"cssClass":"pl-k"},{"start":11,"end":18,"cssClass":"pl-en"},{"start":19,"end":22,"cssClass":"pl-s1"},{"start":19,"end":20,"cssClass":"pl-c1"},{"start":23,"end":34,"cssClass":"pl-s1"},{"start":23,"end":24,"cssClass":"pl-c1"}],[],[{"start":2,"end":8,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":12,"end":44,"cssClass":"pl-s"},{"start":44,"end":47,"cssClass":"pl-s1"},{"start":44,"end":45,"cssClass":"pl-c1"},{"start":47,"end":49,"cssClass":"pl-s"}],[{"start":2,"end":9,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":25,"end":36,"cssClass":"pl-s1"},{"start":25,"end":26,"cssClass":"pl-c1"},{"start":37,"end":43,"cssClass":"pl-s1"},{"start":37,"end":38,"cssClass":"pl-c1"}],[{"start":2,"end":4,"cssClass":"pl-k"},{"start":6,"end":13,"cssClass":"pl-s1"},{"start":6,"end":7,"cssClass":"pl-c1"},{"start":17,"end":21,"cssClass":"pl-c1"}],[{"start":3,"end":9,"cssClass":"pl-k"},{"start":29,"end":36,"cssClass":"pl-s1"},{"start":29,"end":30,"cssClass":"pl-c1"}],[{"start":3,"end":7,"cssClass":"pl-k"}],[{"start":3,"end":9,"cssClass":"pl-k"},{"start":10,"end":15,"cssClass":"pl-c1"}],[],[],[],[{"start":2,"end":10,"cssClass":"pl-k"},{"start":11,"end":21,"cssClass":"pl-en"},{"start":22,"end":25,"cssClass":"pl-s1"},{"start":22,"end":23,"cssClass":"pl-c1"},{"start":26,"end":31,"cssClass":"pl-s1"},{"start":26,"end":27,"cssClass":"pl-c1"},{"start":32,"end":43,"cssClass":"pl-s1"},{"start":32,"end":33,"cssClass":"pl-c1"}],[],[{"start":2,"end":8,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":12,"end":37,"cssClass":"pl-s"},{"start":37,"end":42,"cssClass":"pl-s1"},{"start":37,"end":38,"cssClass":"pl-c1"},{"start":42,"end":56,"cssClass":"pl-s"},{"start":56,"end":59,"cssClass":"pl-s1"},{"start":56,"end":57,"cssClass":"pl-c1"},{"start":59,"end":61,"cssClass":"pl-s"}],[{"start":2,"end":9,"cssClass":"pl-s1"},{"start":2,"end":3,"cssClass":"pl-c1"},{"start":25,"end":36,"cssClass":"pl-s1"},{"start":25,"end":26,"cssClass":"pl-c1"},{"start":37,"end":43,"cssClass":"pl-s1"},{"start":37,"end":38,"cssClass":"pl-c1"}],[{"start":2,"end":4,"cssClass":"pl-k"},{"start":19,"end":30,"cssClass":"pl-s1"},{"start":19,"end":20,"cssClass":"pl-c1"}],[{"start":20,"end":31,"cssClass":"pl-s1"},{"start":20,"end":21,"cssClass":"pl-c1"}],[],[],[{"start":1,"end":3,"cssClass":"pl-ent"}],[],[],[{"start":0,"end":15,"cssClass":"pl-c1"},{"start":14,"end":15,"cssClass":"pl-kos"}],[{"start":0,"end":1,"cssClass":"pl-kos"},{"start":1,"end":5,"cssClass":"pl-ent"},{"start":5,"end":6,"cssClass":"pl-kos"}],[{"start":0,"end":1,"cssClass":"pl-kos"},{"start":1,"end":5,"cssClass":"pl-ent"},{"start":5,"end":6,"cssClass":"pl-kos"}],[{"start":1,"end":2,"cssClass":"pl-kos"},{"start":2,"end":7,"cssClass":"pl-ent"},{"start":7,"end":8,"cssClass":"pl-kos"},{"start":20,"end":22,"cssClass":"pl-kos"},{"start":22,"end":27,"cssClass":"pl-ent"},{"start":27,"end":28,"cssClass":"pl-kos"}],[{"start":2,"end":3,"cssClass":"pl-kos"},{"start":3,"end":8,"cssClass":"pl-ent"},{"start":9,"end":13,"cssClass":"pl-c1"},{"start":15,"end":23,"cssClass":"pl-s"},{"start":24,"end":25,"cssClass":"pl-kos"}],[{"start":2,"end":7,"cssClass":"pl-ent"},{"start":8,"end":12,"cssClass":"pl-c1"},{"start":12,"end":13,"cssClass":"pl-c1"},{"start":13,"end":19,"cssClass":"pl-s"}],[{"start":3,"end":10,"cssClass":"pl-c1"},{"start":10,"end":11,"cssClass":"pl-kos"},{"start":12,"end":16,"cssClass":"pl-c1"},{"start":14,"end":16,"cssClass":"pl-smi"},{"start":17,"end":21,"cssClass":"pl-c1"},{"start":19,"end":21,"cssClass":"pl-smi"},{"start":22,"end":26,"cssClass":"pl-c1"},{"start":24,"end":26,"cssClass":"pl-smi"},{"start":27,"end":31,"cssClass":"pl-c1"},{"start":29,"end":31,"cssClass":"pl-smi"}],[{"start":3,"end":8,"cssClass":"pl-c1"},{"start":8,"end":9,"cssClass":"pl-kos"},{"start":10,"end":15,"cssClass":"pl-c1"},{"start":13,"end":15,"cssClass":"pl-smi"}],[{"start":3,"end":13,"cssClass":"pl-c1"},{"start":13,"end":14,"cssClass":"pl-kos"},{"start":15,"end":18,"cssClass":"pl-c1"},{"start":16,"end":18,"cssClass":"pl-smi"}],[],[{"start":3,"end":10,"cssClass":"pl-c1"}],[{"start":3,"end":8,"cssClass":"pl-c1"},{"start":8,"end":9,"cssClass":"pl-kos"},{"start":9,"end":12,"cssClass":"pl-c1"},{"start":11,"end":12,"cssClass":"pl-smi"}],[{"start":3,"end":9,"cssClass":"pl-c1"},{"start":9,"end":10,"cssClass":"pl-kos"},{"start":11,"end":12,"cssClass":"pl-c1"}],[{"start":3,"end":14,"cssClass":"pl-c1"},{"start":14,"end":15,"cssClass":"pl-kos"},{"start":16,"end":19,"cssClass":"pl-c1"},{"start":17,"end":19,"cssClass":"pl-smi"},{"start":26,"end":30,"cssClass":"pl-pds"},{"start":26,"end":27,"cssClass":"pl-kos"}],[{"start":3,"end":15,"cssClass":"pl-c1"},{"start":15,"end":16,"cssClass":"pl-kos"},{"start":17,"end":20,"cssClass":"pl-c1"},{"start":18,"end":20,"cssClass":"pl-smi"},{"start":27,"end":31,"cssClass":"pl-pds"},{"start":27,"end":28,"cssClass":"pl-kos"}],[{"start":3,"end":13,"cssClass":"pl-c1"},{"start":13,"end":14,"cssClass":"pl-kos"},{"start":15,"end":18,"cssClass":"pl-c1"},{"start":16,"end":18,"cssClass":"pl-smi"},{"start":25,"end":29,"cssClass":"pl-pds"},{"start":25,"end":26,"cssClass":"pl-kos"}],[{"start":3,"end":19,"cssClass":"pl-c1"},{"start":19,"end":20,"cssClass":"pl-kos"},{"start":20,"end":27,"cssClass":"pl-pds"},{"start":20,"end":21,"cssClass":"pl-kos"}],[],[{"start":3,"end":7,"cssClass":"pl-c1"}],[{"start":3,"end":10,"cssClass":"pl-c1"},{"start":10,"end":11,"cssClass":"pl-kos"}],[],[{"start":2,"end":3,"cssClass":"pl-ent"}],[{"start":3,"end":18,"cssClass":"pl-c1"},{"start":18,"end":19,"cssClass":"pl-kos"}],[{"start":3,"end":8,"cssClass":"pl-c1"},{"start":8,"end":9,"cssClass":"pl-kos"},{"start":10,"end":17,"cssClass":"pl-pds"},{"start":10,"end":11,"cssClass":"pl-kos"}],[],[{"start":3,"end":9,"cssClass":"pl-c1"}],[{"start":3,"end":19,"cssClass":"pl-c1"},{"start":19,"end":20,"cssClass":"pl-kos"},{"start":21,"end":28,"cssClass":"pl-pds"},{"start":21,"end":22,"cssClass":"pl-kos"},{"start":30,"end":41,"cssClass":"pl-c"}],[{"start":3,"end":9,"cssClass":"pl-c1"},{"start":9,"end":10,"cssClass":"pl-kos"}],[{"start":3,"end":8,"cssClass":"pl-c1"},{"start":8,"end":9,"cssClass":"pl-kos"}],[{"start":3,"end":10,"cssClass":"pl-c1"},{"start":10,"end":11,"cssClass":"pl-kos"},{"start":12,"end":16,"cssClass":"pl-c1"},{"start":14,"end":16,"cssClass":"pl-smi"},{"start":17,"end":21,"cssClass":"pl-c1"},{"start":19,"end":21,"cssClass":"pl-smi"}],[{"start":3,"end":13,"cssClass":"pl-c1"},{"start":13,"end":14,"cssClass":"pl-kos"}],[{"start":3,"end":18,"cssClass":"pl-c1"},{"start":18,"end":19,"cssClass":"pl-kos"}],[{"start":3,"end":10,"cssClass":"pl-c1"},{"start":10,"end":11,"cssClass":"pl-kos"}],[{"start":3,"end":12,"cssClass":"pl-c1"},{"start":12,"end":13,"cssClass":"pl-kos"},{"start":14,"end":18,"cssClass":"pl-c1"},{"start":16,"end":18,"cssClass":"pl-smi"}],[{"start":3,"end":9,"cssClass":"pl-c1"},{"start":9,"end":10,"cssClass":"pl-kos"},{"start":11,"end":14,"cssClass":"pl-c1"},{"start":12,"end":14,"cssClass":"pl-smi"},{"start":15,"end":18,"cssClass":"pl-c1"},{"start":16,"end":18,"cssClass":"pl-smi"}],[{"start":3,"end":9,"cssClass":"pl-c1"},{"start":9,"end":10,"cssClass":"pl-kos"}],[],[],[{"start":1,"end":3,"cssClass":"pl-kos"},{"start":3,"end":8,"cssClass":"pl-ent"},{"start":8,"end":9,"cssClass":"pl-kos"}],[{"start":0,"end":2,"cssClass":"pl-kos"},{"start":2,"end":6,"cssClass":"pl-ent"},{"start":6,"end":7,"cssClass":"pl-kos"}],[{"start":0,"end":1,"cssClass":"pl-kos"},{"start":1,"end":5,"cssClass":"pl-ent"},{"start":5,"end":6,"cssClass":"pl-kos"}],[{"start":0,"end":1,"cssClass":"pl-kos"},{"start":1,"end":4,"cssClass":"pl-ent"},{"start":5,"end":10,"cssClass":"pl-c1"},{"start":12,"end":19,"cssClass":"pl-s"},{"start":20,"end":21,"cssClass":"pl-kos"}],[{"start":1,"end":2,"cssClass":"pl-kos"},{"start":2,"end":6,"cssClass":"pl-ent"},{"start":7,"end":13,"cssClass":"pl-c1"},{"start":15,"end":19,"cssClass":"pl-s"},{"start":21,"end":27,"cssClass":"pl-c1"},{"start":29,"end":38,"cssClass":"pl-s"},{"start":39,"end":40,"cssClass":"pl-kos"}],[{"start":2,"end":3,"cssClass":"pl-kos"},{"start":3,"end":6,"cssClass":"pl-ent"},{"start":6,"end":7,"cssClass":"pl-kos"}],[{"start":3,"end":4,"cssClass":"pl-kos"},{"start":4,"end":10,"cssClass":"pl-ent"},{"start":10,"end":11,"cssClass":"pl-kos"}],[{"start":3,"end":4,"cssClass":"pl-kos"},{"start":4,"end":9,"cssClass":"pl-ent"},{"start":10,"end":14,"cssClass":"pl-c1"},{"start":16,"end":20,"cssClass":"pl-s"},{"start":22,"end":26,"cssClass":"pl-c1"},{"start":28,"end":32,"cssClass":"pl-s"},{"start":34,"end":45,"cssClass":"pl-c1"},{"start":47,"end":62,"cssClass":"pl-s"},{"start":64,"end":69,"cssClass":"pl-c1"},{"start":71,"end":76,"cssClass":"pl-ent"},{"start":77,"end":79,"cssClass":"pl-k"},{"start":87,"end":93,"cssClass":"pl-s1"},{"start":87,"end":88,"cssClass":"pl-c1"},{"start":88,"end":93,"cssClass":"pl-c1"},{"start":94,"end":105,"cssClass":"pl-s"},{"start":110,"end":114,"cssClass":"pl-k"},{"start":115,"end":120,"cssClass":"pl-s1"},{"start":115,"end":116,"cssClass":"pl-c1"},{"start":121,"end":127,"cssClass":"pl-s"},{"start":132,"end":134,"cssClass":"pl-ent"},{"start":136,"end":144,"cssClass":"pl-c1"},{"start":144,"end":145,"cssClass":"pl-kos"}],[{"start":3,"end":4,"cssClass":"pl-kos"},{"start":4,"end":9,"cssClass":"pl-ent"},{"start":10,"end":14,"cssClass":"pl-c1"},{"start":16,"end":22,"cssClass":"pl-s"},{"start":24,"end":28,"cssClass":"pl-c1"},{"start":30,"end":32,"cssClass":"pl-s"},{"start":34,"end":39,"cssClass":"pl-c1"},{"start":41,"end":46,"cssClass":"pl-ent"},{"start":47,"end":49,"cssClass":"pl-k"},{"start":57,"end":63,"cssClass":"pl-s1"},{"start":57,"end":58,"cssClass":"pl-c1"},{"start":58,"end":63,"cssClass":"pl-c1"},{"start":64,"end":75,"cssClass":"pl-s"},{"start":80,"end":84,"cssClass":"pl-k"},{"start":85,"end":90,"cssClass":"pl-s1"},{"start":85,"end":86,"cssClass":"pl-c1"},{"start":91,"end":95,"cssClass":"pl-s"},{"start":100,"end":102,"cssClass":"pl-ent"},{"start":104,"end":105,"cssClass":"pl-kos"}],[{"start":3,"end":4,"cssClass":"pl-kos"},{"start":4,"end":9,"cssClass":"pl-ent"},{"start":10,"end":15,"cssClass":"pl-c1"},{"start":17,"end":23,"cssClass":"pl-s"},{"start":25,"end":29,"cssClass":"pl-c1"},{"start":31,"end":37,"cssClass":"pl-s"},{"start":39,"end":44,"cssClass":"pl-c1"},{"start":46,"end":52,"cssClass":"pl-s"},{"start":53,"end":54,"cssClass":"pl-kos"}],[{"start":3,"end":5,"cssClass":"pl-kos"},{"start":5,"end":11,"cssClass":"pl-ent"},{"start":11,"end":12,"cssClass":"pl-kos"}],[{"start":2,"end":4,"cssClass":"pl-kos"},{"start":4,"end":7,"cssClass":"pl-ent"},{"start":7,"end":8,"cssClass":"pl-kos"}],[{"start":1,"end":3,"cssClass":"pl-kos"},{"start":3,"end":7,"cssClass":"pl-ent"},{"start":7,"end":8,"cssClass":"pl-kos"}],[{"start":1,"end":2,"cssClass":"pl-kos"},{"start":2,"end":4,"cssClass":"pl-ent"},{"start":4,"end":5,"cssClass":"pl-kos"},{"start":5,"end":6,"cssClass":"pl-kos"},{"start":6,"end":8,"cssClass":"pl-ent"},{"start":8,"end":9,"cssClass":"pl-kos"}],[],[{"start":1,"end":6,"cssClass":"pl-ent"}],[{"start":1,"end":7,"cssClass":"pl-s1"},{"start":1,"end":2,"cssClass":"pl-c1"},{"start":11,"end":47,"cssClass":"pl-s"}],[{"start":1,"end":8,"cssClass":"pl-s1"},{"start":1,"end":2,"cssClass":"pl-c1"},{"start":24,"end":35,"cssClass":"pl-s1"},{"start":24,"end":25,"cssClass":"pl-c1"},{"start":36,"end":42,"cssClass":"pl-s1"},{"start":36,"end":37,"cssClass":"pl-c1"}],[{"start":1,"end":5,"cssClass":"pl-s1"},{"start":1,"end":2,"cssClass":"pl-c1"},{"start":25,"end":32,"cssClass":"pl-s1"},{"start":25,"end":26,"cssClass":"pl-c1"},{"start":34,"end":46,"cssClass":"pl-c1"}],[{"start":1,"end":8,"cssClass":"pl-k"},{"start":10,"end":14,"cssClass":"pl-s1"},{"start":10,"end":11,"cssClass":"pl-c1"},{"start":15,"end":17,"cssClass":"pl-k"},{"start":18,"end":24,"cssClass":"pl-s1"},{"start":18,"end":19,"cssClass":"pl-c1"},{"start":28,"end":30,"cssClass":"pl-ent"}],[{"start":2,"end":3,"cssClass":"pl-kos"},{"start":3,"end":9,"cssClass":"pl-ent"},{"start":9,"end":10,"cssClass":"pl-kos"}],[{"start":2,"end":7,"cssClass":"pl-ent"},{"start":8,"end":12,"cssClass":"pl-k"},{"start":13,"end":19,"cssClass":"pl-s1"},{"start":13,"end":14,"cssClass":"pl-c1"},{"start":20,"end":26,"cssClass":"pl-s"},{"start":30,"end":32,"cssClass":"pl-ent"}],[{"start":5,"end":6,"cssClass":"pl-kos"},{"start":6,"end":12,"cssClass":"pl-ent"},{"start":12,"end":13,"cssClass":"pl-kos"},{"start":13,"end":14,"cssClass":"pl-kos"},{"start":14,"end":15,"cssClass":"pl-ent"},{"start":16,"end":20,"cssClass":"pl-c1"},{"start":22,"end":42,"cssClass":"pl-s"},{"start":42,"end":47,"cssClass":"pl-ent"},{"start":48,"end":52,"cssClass":"pl-k"},{"start":53,"end":59,"cssClass":"pl-s1"},{"start":53,"end":54,"cssClass":"pl-c1"},{"start":60,"end":64,"cssClass":"pl-s"},{"start":67,"end":69,"cssClass":"pl-ent"},{"start":70,"end":71,"cssClass":"pl-kos"},{"start":77,"end":79,"cssClass":"pl-kos"},{"start":79,"end":80,"cssClass":"pl-ent"},{"start":80,"end":81,"cssClass":"pl-kos"},{"start":81,"end":83,"cssClass":"pl-kos"},{"start":83,"end":89,"cssClass":"pl-ent"},{"start":89,"end":90,"cssClass":"pl-kos"}],[{"start":4,"end":5,"cssClass":"pl-kos"},{"start":5,"end":9,"cssClass":"pl-ent"},{"start":10,"end":15,"cssClass":"pl-c1"},{"start":17,"end":21,"cssClass":"pl-s"},{"start":23,"end":29,"cssClass":"pl-c1"},{"start":31,"end":35,"cssClass":"pl-s"},{"start":37,"end":43,"cssClass":"pl-c1"},{"start":46,"end":47,"cssClass":"pl-kos"}],[{"start":5,"end":6,"cssClass":"pl-kos"},{"start":6,"end":11,"cssClass":"pl-ent"},{"start":12,"end":16,"cssClass":"pl-c1"},{"start":18,"end":24,"cssClass":"pl-s"},{"start":26,"end":30,"cssClass":"pl-c1"},{"start":32,"end":41,"cssClass":"pl-s"},{"start":43,"end":48,"cssClass":"pl-c1"},{"start":50,"end":55,"cssClass":"pl-ent"},{"start":57,"end":61,"cssClass":"pl-k"},{"start":62,"end":68,"cssClass":"pl-s1"},{"start":62,"end":63,"cssClass":"pl-c1"},{"start":69,"end":73,"cssClass":"pl-s"},{"start":76,"end":78,"cssClass":"pl-ent"},{"start":79,"end":80,"cssClass":"pl-kos"}],[{"start":5,"end":6,"cssClass":"pl-kos"},{"start":6,"end":11,"cssClass":"pl-ent"},{"start":12,"end":16,"cssClass":"pl-c1"},{"start":18,"end":24,"cssClass":"pl-s"},{"start":26,"end":31,"cssClass":"pl-c1"},{"start":33,"end":39,"cssClass":"pl-s"},{"start":41,"end":45,"cssClass":"pl-c1"},{"start":47,"end":53,"cssClass":"pl-s"},{"start":54,"end":55,"cssClass":"pl-kos"}],[{"start":4,"end":6,"cssClass":"pl-kos"},{"start":6,"end":10,"cssClass":"pl-ent"},{"start":10,"end":11,"cssClass":"pl-kos"}],[{"start":4,"end":9,"cssClass":"pl-ent"},{"start":10,"end":12,"cssClass":"pl-k"},{"start":14,"end":20,"cssClass":"pl-s1"},{"start":14,"end":15,"cssClass":"pl-c1"},{"start":21,"end":32,"cssClass":"pl-s"},{"start":37,"end":38,"cssClass":"pl-c1"}],[{"start":4,"end":8,"cssClass":"pl-k"},{"start":10,"end":19,"cssClass":"pl-s"}],[{"start":4,"end":8,"cssClass":"pl-k"},{"start":10,"end":12,"cssClass":"pl-ent"}],[{"start":6,"end":7,"cssClass":"pl-kos"},{"start":7,"end":13,"cssClass":"pl-ent"},{"start":13,"end":14,"cssClass":"pl-kos"},{"start":14,"end":15,"cssClass":"pl-kos"},{"start":15,"end":16,"cssClass":"pl-ent"},{"start":17,"end":21,"cssClass":"pl-c1"},{"start":23,"end":44,"cssClass":"pl-s"},{"start":44,"end":49,"cssClass":"pl-ent"},{"start":50,"end":54,"cssClass":"pl-k"},{"start":55,"end":61,"cssClass":"pl-s1"},{"start":55,"end":56,"cssClass":"pl-c1"},{"start":62,"end":66,"cssClass":"pl-s"},{"start":69,"end":71,"cssClass":"pl-ent"},{"start":72,"end":73,"cssClass":"pl-kos"},{"start":86,"end":88,"cssClass":"pl-kos"},{"start":88,"end":89,"cssClass":"pl-ent"},{"start":89,"end":90,"cssClass":"pl-kos"},{"start":90,"end":92,"cssClass":"pl-kos"},{"start":92,"end":98,"cssClass":"pl-ent"},{"start":98,"end":99,"cssClass":"pl-kos"}],[{"start":2,"end":7,"cssClass":"pl-ent"},{"start":10,"end":12,"cssClass":"pl-ent"}],[{"start":2,"end":3,"cssClass":"pl-kos"},{"start":3,"end":5,"cssClass":"pl-ent"},{"start":5,"end":6,"cssClass":"pl-kos"}],[{"start":1,"end":3,"cssClass":"pl-kos"},{"start":3,"end":9,"cssClass":"pl-ent"},{"start":9,"end":10,"cssClass":"pl-kos"}],[{"start":0,"end":5,"cssClass":"pl-ent"},{"start":8,"end":10,"cssClass":"pl-ent"}],[{"start":0,"end":2,"cssClass":"pl-kos"},{"start":2,"end":5,"cssClass":"pl-ent"},{"start":5,"end":6,"cssClass":"pl-kos"}],[{"start":0,"end":2,"cssClass":"pl-kos"},{"start":2,"end":6,"cssClass":"pl-ent"},{"start":6,"end":7,"cssClass":"pl-kos"}],[{"start":0,"end":2,"cssClass":"pl-kos"},{"start":2,"end":6,"cssClass":"pl-ent"},{"start":6,"end":7,"cssClass":"pl-kos"}]],"csv":null,"csvError":null,"dependabotInfo":{"showConfigurationBanner":false,"configFilePath":null,"networkDependabotPath":"/vikash-kumar01/3tier_todo_app/network/updates","dismissConfigurationNoticePath":"/settings/dismiss-notice/dependabot_configuration_notice","configurationNoticeDismissed":null,"repoAlertsPath":"/vikash-kumar01/3tier_todo_app/security/dependabot","repoSecurityAndAnalysisPath":"/vikash-kumar01/3tier_todo_app/settings/security_analysis","repoOwnerIsOrg":false,"currentUserCanAdminRepo":false},"displayName":"index.php","displayUrl":"https://github.com/vikash-kumar01/3tier_todo_app/blob/main/index.php?raw=true","headerInfo":{"blobSize":"4.02 KB","deleteInfo":{"deleteTooltip":"You must be signed in to make or propose changes"},"editInfo":{"editTooltip":"You must be signed in to make or propose changes"},"ghDesktopPath":"https://desktop.github.com","gitLfsPath":null,"onBranch":true,"shortPath":"b451186","siteNavLoginPath":"/login?return_to=https%3A%2F%2Fgithub.com%2Fvikash-kumar01%2F3tier_todo_app%2Fblob%2Fmain%2Findex.php","isCSV":false,"isRichtext":false,"toc":null,"lineInfo":{"truncatedLoc":"178","truncatedSloc":"159"},"mode":"file"},"image":false,"isCodeownersFile":null,"isPlain":false,"isValidLegacyIssueTemplate":false,"issueTemplateHelpUrl":"https://docs.github.com/articles/about-issue-and-pull-request-templates","issueTemplate":null,"discussionTemplate":null,"language":"PHP","languageID":272,"large":false,"loggedIn":false,"newDiscussionPath":"/vikash-kumar01/3tier_todo_app/discussions/new","newIssuePath":"/vikash-kumar01/3tier_todo_app/issues/new","planSupportInfo":{"repoIsFork":null,"repoOwnedByCurrentUser":null,"requestFullPath":"/vikash-kumar01/3tier_todo_app/blob/main/index.php","showFreeOrgGatedFeatureMessage":null,"showPlanSupportBanner":null,"upgradeDataAttributes":null,"upgradePath":null},"publishBannersInfo":{"dismissActionNoticePath":"/settings/dismiss-notice/publish_action_from_dockerfile","dismissStackNoticePath":"/settings/dismiss-notice/publish_stack_from_file","releasePath":"/vikash-kumar01/3tier_todo_app/releases/new?marketplace=true","showPublishActionBanner":false,"showPublishStackBanner":false},"rawBlobUrl":"https://github.com/vikash-kumar01/3tier_todo_app/raw/main/index.php","renderImageOrRaw":false,"richText":null,"renderedFileInfo":null,"shortPath":null,"tabSize":8,"topBannersInfo":{"overridingGlobalFundingFile":false,"globalPreferredFundingPath":null,"repoOwner":"vikash-kumar01","repoName":"3tier_todo_app","showInvalidCitationWarning":false,"citationHelpUrl":"https://docs.github.com/en/github/creating-cloning-and-archiving-repositories/creating-a-repository-on-github/about-citation-files","showDependabotConfigurationBanner":false,"actionsOnboardingTip":null},"truncated":false,"viewable":true,"workflowRedirectUrl":null,"symbols":{"timedOut":false,"notAnalyzed":false,"symbols":[{"name":"InsertTodo","kind":"function","identStart":976,"identEnd":986,"extentStart":967,"extentEnd":1183,"fullyQualifiedName":"InsertTodo","identUtf16":{"start":{"lineNumber":41,"utf16Col":10},"end":{"lineNumber":41,"utf16Col":20}},"extentUtf16":{"start":{"lineNumber":41,"utf16Col":1},"end":{"lineNumber":51,"utf16Col":2}}},{"name":"DeleteTodo","kind":"function","identStart":1195,"identEnd":1205,"extentStart":1186,"extentEnd":1395,"fullyQualifiedName":"DeleteTodo","identUtf16":{"start":{"lineNumber":53,"utf16Col":10},"end":{"lineNumber":53,"utf16Col":20}},"extentUtf16":{"start":{"lineNumber":53,"utf16Col":1},"end":{"lineNumber":62,"utf16Col":2}}},{"name":"CompleteTodo","kind":"function","identStart":1408,"identEnd":1420,"extentStart":1399,"extentEnd":1626,"fullyQualifiedName":"CompleteTodo","identUtf16":{"start":{"lineNumber":65,"utf16Col":10},"end":{"lineNumber":65,"utf16Col":22}},"extentUtf16":{"start":{"lineNumber":65,"utf16Col":1},"end":{"lineNumber":75,"utf16Col":2}}},{"name":"GetTodo","kind":"function","identStart":1736,"identEnd":1743,"extentStart":1727,"extentEnd":1959,"fullyQualifiedName":"GetTodo","identUtf16":{"start":{"lineNumber":80,"utf16Col":11},"end":{"lineNumber":80,"utf16Col":18}},"extentUtf16":{"start":{"lineNumber":80,"utf16Col":2},"end":{"lineNumber":90,"utf16Col":2}}},{"name":"UpdateTodo","kind":"function","identStart":1971,"identEnd":1981,"extentStart":1962,"extentEnd":2194,"fullyQualifiedName":"UpdateTodo","identUtf16":{"start":{"lineNumber":91,"utf16Col":11},"end":{"lineNumber":91,"utf16Col":21}},"extentUtf16":{"start":{"lineNumber":91,"utf16Col":2},"end":{"lineNumber":98,"utf16Col":2}}}]}},"copilotInfo":null,"copilotAccessAllowed":false,"csrf_tokens":{"/vikash-kumar01/3tier_todo_app/branches":{"post":"41x_lfeBoxYNl115uRjHaF472VTOE_215VZFLx9k4fzxw2Utpm7SMRVTV4F87X4X9otmDB-_J131yaY05pdEVQ"},"/repos/preferences":{"post":"8ohqNxOMJJ_nPskLKVI41DpgmguK6WoQDv2ZzXGEnMrYkxnkEukrsaNy6UItl3XTeiIzDkeRpbsupru89auSyA"}}},"title":"3tier_todo_app/index.php at main · vikash-kumar01/3tier_todo_app"}