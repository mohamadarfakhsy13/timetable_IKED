<?php
	session_start();
	$path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/timetable/class.database.php";
    include_once($path);
	
if(@$_SESSION['user_id']){	
	// if edit button is clicked on the dashboard it passes semester, course, branch in url and accordingly the correct tablesheet is loaded. 
	if (isset($_GET['view'])) {
		$semester = $_GET['semester'];
		$course_code = $_GET['coursecode'];
		$course_full_name = $_GET['coursefullname'];
		$year = $_GET['year'];
		$timetable_id = $_GET['id'];
		$user_id= $_SESSION['user_id'];
		
		$db_connection = new dbConnection();
		$link = $db_connection->connect(); 
				
		$query = $link->query("SELECT * FROM tablesheet WHERE timetable_id='$timetable_id'");
		$query->setFetchMode(PDO::FETCH_ASSOC);  
		
		$i=0;
		$cell = array();
		$cellid = array();
		while($result = $query->fetch()){
		   $cell[$i] = $result['data'];
		   $cellid[$i] = $result['cell'];
		   $i++;
		}	
	}
		// Fetch timting from the database
		$query = $link->query("SELECT * FROM timing");
		$query->setFetchMode(PDO::FETCH_ASSOC);  
		
		while($result = $query->fetch()){
		   $first = $result['first'];
		   $second= $result['second'];
		   $third= $result['third'];
		   $fourth= $result['fourth'];
		   $fifth= $result['fifth'];
		   $sixth= $result['sixth'];
		   $seventh= $result['seventh'];
		   $eight= $result['eight'];
		   $nine= $result['nine'];
		   $ten= $result['ten'];
		   $eleven= $result['eleven'];
		   $twelve= $result['twelve'];
		   $thirteen= $result['thirteen'];
		   $fourteen= $result['fourteen'];		   
		}

		// Fetch University Name
		$query = $link->query("SELECT * FROM users WHERE user_id='$user_id'");
		$query->setFetchMode(PDO::FETCH_ASSOC);  
		
		while($result = $query->fetch()){
		   $uname = $result['uname'];   
		}
}
else
{
	echo "You are not logged in. Please go back and log in again";
}	
		
   	
    

?>
<?php include_once 'header.php'; ?>
<body>

<div class="Table">
    <div class="Title">
	<p> </p>
        <p><?php echo $uname;?> Time Table</p>
		<p><?php if($_SESSION['user_id']) echo $course_full_name." ".$course_code." ". $year; ?></p>
		<p>Semester - <?php if($_SESSION['user_id']) echo $semester; ?></P>
    </div>
    <div class="Heading">
        <div class="Cell">
            <p>Time/Day</p>
        </div>
        <div class="Cell">
            <p>  M o n d a y  </p>
        </div>
        <div class="Cell">
            <p>  T u e s d a y  </p>
        </div>
        <div class="Cell">
            <p>  W e d n e s d a y  </p>
        </div>
		<div class="Cell">
            <p>  T h r u s d a y  </p>
        </div>
        <div class="Cell">
            <p>  F  r  i  d  a  y  </p>
        </div>
        <div class="Cell">
            <p>  S a t u r d a y  </p>
        </div>
    </div>
  <div class="Row">
        <div class="Cell">
            <p><?php echo $first;?> </p>
        </div>
        <div class="Cell" id="00">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 1){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="01">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 2){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="02">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 3){echo @$cell[$i];} } ?></p>
        </div>
        <div class="Cell" id="03">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 4){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="04">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 5){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="05">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 6){echo @$cell[$i];}	}  ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
            <p><?php echo $second;?> </p>
        </div>
        <div class="Cell" id="10">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 7){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="11">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 8){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="12">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 9){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="13">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 10){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="14">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 11){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="15">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 12){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
           <p><?php echo $third;?></p>
        </div>
        <div class="Cell" id="20">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 13){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="21">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 14){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="22">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 15){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="23">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 16){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="24">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 17){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="25">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 18){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
           <p><?php echo $fourth;?> </p>
        </div>
        <div class="Cell" id="30">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 19){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="31">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 20){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="32">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 21){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="33">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 22){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="34">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 23){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="35">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 24){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
            <p><?php echo $fifth;?> </p>
        </div>
        <div class="Cell" id="40">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 25){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="41">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 26){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="42">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 27){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="43">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 28){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="44">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 29){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="45">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 30){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
            <p><?php echo $sixth;?> </p>
        </div>
        <div class="Cell" id="50">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 31){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="51">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 32){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="52">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 33){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="53">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 34){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="54">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 35){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="55">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 36){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
           <p><?php echo $seventh;?></p>
        </div>
        <div class="Cell" id="60">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 37){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="61">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 38){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="62">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 39){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="63">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 40){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="64">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 41){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="65">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 42){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
           <p><?php echo $eight;?> </p>
        </div>
        <div class="Cell" id="70">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 43){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="71">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 44){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="72">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 45){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="73">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 46){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="74">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 47){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="75">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 48){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
	<div class="Row">
        <div class="Cell">
            <p><?php echo $nine;?> </p>
        </div>
        <div class="Cell" id="00">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 48){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="01">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 49){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="02">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 50){echo @$cell[$i];} } ?></p>
        </div>
        <div class="Cell" id="03">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 51){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="04">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 52){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="05">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 53){echo @$cell[$i];}	}  ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
            <p><?php echo $ten;?> </p>
        </div>
        <div class="Cell" id="10">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 54){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="11">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 55){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="12">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 56){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="13">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 57){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="14">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 58){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="15">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 59){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
           <p><?php echo $eleven;?> </p>
        </div>
        <div class="Cell" id="20">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 60){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="21">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 61){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="22">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 62){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="23">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 63){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="24">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 64){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="25">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 65){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
           <p><?php echo $twelve;?> </p>
        </div>
        <div class="Cell" id="30">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 66){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="31">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 67){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="32">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] ==68){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="33">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 69){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="34">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 70){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="35">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 71){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
            <p><?php echo $thirteen;?> </p>
        </div>
        <div class="Cell" id="40">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 72){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="41">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 73){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="42">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 74){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="43">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 75){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="44">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 76){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="45">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 77){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
    <div class="Row">
        <div class="Cell">
            <p><?php echo $fourteen;?> </p>
        </div>
        <div class="Cell" id="50">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 78){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="51">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 79){echo @$cell[$i];}	} ?></p>
        </div>
		<div class="Cell" id="52">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 80){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="53">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 81){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="54">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 82){echo @$cell[$i];}	} ?></p>
        </div>
        <div class="Cell" id="55">
            <p><?php for($i=0; $i<=82; $i++){if(@$cellid[$i] == 83){echo @$cell[$i];}	} ?></p>
        </div>
    </div>
</div>


<?php 
   // It loads the subject dynamically on the table sheet by selecting faculty, subject and subject name..
		   if(@$_SESSION['user_id'])
			{
			   $query = $link->query("
					SELECT faculty_name, subject_code, subject_name
					FROM course c JOIN faculty f ON c.faculty_id = f.faculty_id JOIN subject s ON s.subject_id = c.subject_id WHERE course_name =  '$course_code' AND semester ='$semester'");
			   
			   $count = $query->rowCount();	
			   $query->setFetchMode(PDO::FETCH_ASSOC);				
				$i =0;				
				while($result = $query->fetch()){					
					if($i<$count){
						   echo 
								"<div class= 'Table'>".
								"<div class='Row'>".
									"<div>".$result['subject_code']."</div>".
									"<div class='sublist'>".$result['subject_name']." "."( ".$result['faculty_name']." )"."</div>".
								"</div></div>";																
					}
					$i++;
				}
			}

 ?>

<div id="success"></div>
<?php include_once 'footer.php'; ?>