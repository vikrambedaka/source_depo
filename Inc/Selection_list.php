<?php
	//********************************************************************************************
	//						COPYRIGHT: VOICETECH SOLUTIONS PVT LTD,								**
	//								      BANGALORE												**
	//********************************************************************************************

	//*********** FILE NAME: Selection_list.php *************************************

	//*********************************** DESCRIPTION ********************************************
	//	Selection of AcademicYear Department Course Semester and Section.						**
	//								    														**
	//********************************************************************************************

	//********************************* HISTORY **************************************************

	// Header created by: SAVITA A on 14-03-2014 in release version: 2.0.0.21
	// Modified BY: GANESH on 28-03-2014 in release version: 2.0.0.22
	// Problem Fixed: Setting Custome Date is Removed from this because of select date option.
	//Passed Calender date in url on 22-04-2014 by savitha
		//Included AcademicYear Section Map
		//Formatted
	//MOdification By SANDESH AcademicYear variable name duplicate 	2.0.0.23 on 03-06-2014	
	// Header created by: SAVITA A on 6-06-2014 in release version: 2.0.0.23
		//made modification in timetable width
	// 09-06-2014, SHAILENDRA PK: 1. In marklist, exam name was displaying twice.
	// 12-06-2014, SHAILENDRA PK: 1. In final internal marks entry, template shown was not appropriate.
	// 14-06-2014, SHAILENDRA PK: 1. In marklist selection list, faculty-subject-map check was missing.
	// 16-06-2014, SHAILENDRA PK: 1. In marklist, subjects were not getting changed on change of section.
	//Last Modified by savita, Passed Menu as hidden value  16-10-2014 in release version: 2.0.0.23
	//******************************** END OF HEADER *********************************************	
	if($_GET[Department] !="")
	{
		$_SESSION['Department_Report'] = $_GET['Department'];
	}
	else
	{
		 $_GET['Department'] = $_SESSION['Department_Report'];	

	}
	if($_GET[Course] !="")
	{
		$_SESSION['Course_Report'] = $_GET['Course'];
	}
	else
	{
		$_GET['Course'] = $_SESSION['Course_Report'];
	}
	if($_GET[Semester] !="")
	{
		$_SESSION['Semester_Report'] = $_GET['Semester'];
	}
	else
	{
		$_GET['Semester'] = $_SESSION['Semester_Report'];
	}
	if($_GET[Section] !="")
	{
		$_SESSION['Section_Report'] = $_GET['Section'];
	}
	else
	{
		$_GET['Section'] = $_SESSION['Section_Report'];	
	}
	if($_GET[AcademicYear] !="")
	{
		$_SESSION['AcademicYear_Report'] = $_GET['AcademicYear'];
	}
	else
	{
		$_GET['AcademicYear'] = $_SESSION['AcademicYear_Report'];
	}
	$AcademicYear = $_GET['AcademicYear'];
	$Department = $_GET['Department'];
	$course = $_GET['Course'];
	$Semester= $_GET['Semester'];
	$SectionName = $_GET['Section'];
	$MODULE_ID=$_GET[MOD_ID];
	$FILE_NAME=$_GET[FILE_NAME];
?>
	<script type="text/javascript">
		function Get_Course(Academic_year)
		{
			if(document.DataSelection.Department.options.length>0)
			{
				for(i=document.DataSelection.Department.options.length-1;i>=0;i--)
				{
					document.DataSelection.Department.options.remove(i);
				}
			}
<?php
			if($MODULE_ID != MODULE_ID_ADMIN)
			{
?>                   
				if(document.DataSelection.Section.options.length>0)
				{
					for(i=document.DataSelection.Section.options.length-1;i>=0;i--)
					{
						document.DataSelection.Section.options.remove(i);
					}
				}
<?php 
			}
			if($MODULE_ID == MODULE_ID_MARKLIST)
			{
?>
				if(document.DataSelection.Subject.options.length>0)
				{
					for(i=document.DataSelection.Subject.options.length-1;i>=0;i--)
					{
						document.DataSelection.Subject.options.remove(i);
					}
				}
				document.getElementById("Template_Id").value = "";
<?php 
				if($FILE_NAME =='SUB_INT')
				{
?>					if(document.DataSelection.ExamName.options.length>0)
					{
						
						for(i=document.DataSelection.ExamName.options.length-1;i>=0;i--)
						{
							document.DataSelection.ExamName.options.remove(i);
						}
					}
<?php
				}
			}
?>
			if(document.DataSelection.Semester.options.length>0)
			{
				for(i=document.DataSelection.Semester.options.length-1;i>=0;i--)
				{
					document.DataSelection.Semester.options.remove(i);
				}
			}		
			if(document.DataSelection.Course.options.length>0)
			{
				for(i=document.DataSelection.Course.options.length-1;i>=0;i--)
				{
					document.DataSelection.Course.options.remove(i);
				}
			}
<?php
			$depts="Select distinct c.AcademicYear as AcademicYear,c.DepartmentId as Deptid,D.DepartmentName as DeptName from course_section_semester_map as c,department as D where c.courseId=c.CourseId and D.DepartmentId=c.DepartmentId ;"; 
			$deptsResultset=VTS_Resultset_Array($conn,$depts,$Db_Type);
			$deptsRows=$Num_Rows($deptsResultset);
			$deptsRow=$Fetch_Row($deptsResultset);
			$DeptName= VTS_Resultset($conn,$deptsResultset,0,"DeptName",$Db_Type);
			$AcademicYeargot= VTS_Resultset($conn,$deptsResultset,0,"AcademicYear",$Db_Type);
			$InceptionYear= VTS_Resultset($conn,$deptsResultset,0,"InceptionYear",$Db_Type);
?>
			var Select_Department_Id = document.getElementById("Department_Id");
			var option_Department_Id = document.createElement("option");					 
			option_Department_Id.text = "SELECT";
			option_Department_Id.value = "SELECT";
			try
			{
				Select_Department_Id.add(option_Department_Id, null); 
			}
			catch(error)
			{
				Select_Department_Id.add(option_Department_Id); 
			}
<?php
			for($i=1;$i<=$deptsRows;$i++)
			{
?>			
				if(Academic_year == '<?php echo $AcademicYeargot; ?>' )
				{
					var Select_Department_Id = document.getElementById("Department_Id");
					var option_Department_Id = document.createElement("option");					 
					option_Department_Id.text = "<?php echo $DeptName; ?>";
					option_Department_Id.value = "<?php echo $DeptName; ?>";
					try 
					{
						Select_Department_Id.add(option_Department_Id, null); 
					}
					catch(error)
					{
						Select_Department_Id.add(option_Department_Id); 
					}
				}
<?php
				$deptsRow=$Fetch_Row($deptsResultset);
				$DeptName= VTS_Resultset($conn,$deptsResultset,$i,"DeptName",$Db_Type);
				$AcademicYeargot= VTS_Resultset($conn,$deptsResultset,$i,"AcademicYear",$Db_Type);
				$InceptionYear= VTS_Resultset($conn,$deptsResultset,$i,"InceptionYear",$Db_Type);
			}  
?>
		}
			
	</script>
	<script type="text/javascript">
		function Get_Course_Sem_Sec(Expression)
		{
		   switch(Expression)
		   {
				case  "GET_COURSE":
				if(document.DataSelection.Course.options.length>0)
				{
					for(i=document.DataSelection.Course.options.length-1;i>=0;i--)
					{
						document.DataSelection.Course.options.remove(i);
					}
				}
				var Select_Course_Id = document.getElementById("Course_Id");
				var option_Course_Id = document.createElement("option");
				option_Course_Id.text = "SELECT";
				option_Course_Id.value = "SELECT";
				try 
				{
					Select_Course_Id.add(option_Course_Id, null); 
				}
				catch(error) 
				{
					Select_Course_Id.add(option_Course_Id); 
				}
				var Department = document.getElementById("Department_Id").value;
				var AcademicYeargot = document.getElementById("AcademicYear_Id").value;
<?php
				$SQLQuery_Get_Course="select distinct cssm.AcademicYear,d.DepartmentName,c.CourseName from course_section_semester_map as cssm ,department as d,course as c where cssm.DepartmentId=d.DepartmentId and cssm.CourseId=c.CourseId;";
				$Resultset_Get_Course=VTS_Resultset_Array($conn,$SQLQuery_Get_Course,$Db_Type);
				$Totalrows_Get_Course=$Num_Rows($Resultset_Get_Course);				
				for($i=1;$i<=$Totalrows_Get_Course;$i++)
				{
					$DepartmentName= VTS_Resultset($conn,$Resultset_Get_Course,$i-1,"DepartmentName",$Db_Type);
					$AcademicYearRS= VTS_Resultset($conn,$Resultset_Get_Course,$i-1,"AcademicYear",$Db_Type);
					$CourseName= VTS_Resultset($conn,$Resultset_Get_Course,$i-1,"CourseName",$Db_Type);
?>
					if(Department == '<?php echo  $DepartmentName;?>' && AcademicYeargot == '<?php echo  $AcademicYearRS;?>')
					{
						var Select_Course_Id = document.getElementById("Course_Id");
						var option_Course_Id = document.createElement("option");
						option_Course_Id.text = "<?php echo  $CourseName;?>";
						option_Course_Id.value = "<?php echo  $CourseName;?>";
						try 
						{
							Select_Course_Id.add(option_Course_Id, null); 
						}
						catch(error) 
						{
							Select_Course_Id.add(option_Course_Id); 
						}
					}
<?php
				}
 ?>
				break;
				case "GET_SEMESTER":
				if(document.DataSelection.Semester.options.length>0)
				{
					for(i=document.DataSelection.Semester.options.length-1;i>=0;i--)
					{
						document.DataSelection.Semester.options.remove(i);
					}
				}
<?php
				if($MODULE_ID != MODULE_ID_ADMIN)
				{
?>                   
					if(document.DataSelection.Section.options.length>0)
					{
						for(i=document.DataSelection.Section.options.length-1;i>=0;i--)
						{
							document.DataSelection.Section.options.remove(i);
						}
					}
<?php 
				}
?>				var Select_Semester = document.getElementById("Semester");
				var option_Semester = document.createElement("option");
				option_Semester.text ="SELECT";
				option_Semester.value = "SELECT";
				try
				{
					Select_Semester.add(option_Semester, null); 
				}
				catch(error) 
				{
					Select_Semester.add(option_Semester); 
				}
				var Coursegot = document.getElementById("Course_Id").value;
				var AcademicYeargot = document.getElementById("AcademicYear_Id").value;
<?php
				$SQLQuery_Get_Semester="select distinct cssm.AcademicYear,cssm.CourseId,c.CourseName,cssm.Semester from course_section_semester_map as cssm ,course as c where cssm.CourseId=c.CourseId order by cssm.CourseId,cssm.Semester asc;";
				$Resultset_Get_Semester=VTS_Resultset_Array($conn,$SQLQuery_Get_Semester,$Db_Type);
				$Totalrows_Get_Semester=$Num_Rows($Resultset_Get_Semester);
				for($i=1;$i<=$Totalrows_Get_Semester;$i++)
				{
					$CourseName= VTS_Resultset($conn,$Resultset_Get_Semester,$i-1,"CourseName",$Db_Type);
					$AcademicYearRS= VTS_Resultset($conn,$Resultset_Get_Semester,$i-1,"AcademicYear",$Db_Type);					
					$Semester= VTS_Resultset($conn,$Resultset_Get_Semester,$i-1,"Semester",$Db_Type);
					$CourseId= VTS_Resultset($conn,$Resultset_Get_Semester,$i-1,"CourseId",$Db_Type);
?>
					if(Coursegot == '<?php echo  $CourseName;?>' && AcademicYeargot == '<?php echo  $AcademicYearRS;?>')
					{
						var Select_Semester = document.getElementById("Semester");
						var option_Semester = document.createElement("option");
						option_Semester.text ="<?php echo  $Semester;?>";
						option_Semester.value = "<?php echo  $Semester;?>";
						try
						{
							Select_Semester.add(option_Semester, null); 
						}
						catch(error) 
						{
							Select_Semester.add(option_Semester); 
						}
					}
<?php
				}
?>
				break;
				case "GET_SECTION":
				if(document.DataSelection.Section.options.length>0)
				{
					for(i=document.DataSelection.Section.options.length-1;i>=0;i--)
					{
					document.DataSelection.Section.options.remove(i);
					}
				}
				var Coursegot = document.getElementById("Course_Id").value;
				var Semestergot = document.getElementById("Semester").value;
				var AcademicYeargot = document.getElementById("AcademicYear_Id").value;
<?php
				$SQLQuery_Get_Semester="select distinct cssm.AcademicYear,cssm.CourseId,c.CourseName,cssm.Semester,s.SectionName from course_section_semester_map as cssm ,section as s,course as c where cssm.SectionId=s.SectionId and cssm.CourseId=c.CourseId order by cssm.CourseId,cssm.Semester,s.SectionName asc;";
				$Resultset_Get_Semester=VTS_Resultset_Array($conn,$SQLQuery_Get_Semester,$Db_Type);
				$Totalrows_Get_Semester=$Num_Rows($Resultset_Get_Semester);
				for($i=1;$i<=$Totalrows_Get_Semester;$i++)
				{
					$CourseName= VTS_Resultset($conn,$Resultset_Get_Semester,$i-1,"CourseName",$Db_Type);
					$AcademicYearRS= VTS_Resultset($conn,$Resultset_Get_Semester,$i-1,"AcademicYear",$Db_Type);
					$SectionName= VTS_Resultset($conn,$Resultset_Get_Semester,$i-1,"SectionName",$Db_Type);
					$Semester= VTS_Resultset($conn,$Resultset_Get_Semester,$i-1,"Semester",$Db_Type);
					$CourseId= VTS_Resultset($conn,$Resultset_Get_Semester,$i-1,"CourseId",$Db_Type);
?>
					if(Coursegot == '<?php echo  $CourseName;?>' && Semestergot == '<?php echo  $Semester;?>' && AcademicYeargot == '<?php echo  $AcademicYearRS;?>')
					{
						var Select_Section_Id = document.getElementById("Section_Id");
						var option_Section_Id = document.createElement("option");
						option_Section_Id.text = "<?php echo  $SectionName;?>";
						option_Section_Id.value = "<?php echo  $SectionName;?>";
						try 
						{
							Select_Section_Id.add(option_Section_Id, null); 
						}
						catch(error) 
						{
							Select_Section_Id.add(option_Section_Id); 
						}
					}
<?php
				}
				if($MODULE_ID == MODULE_ID_MARKLIST)
				{
?>
					Populate_Subjects(Semestergot);
<?php
				}
?>
			}
		}
		function Populate_Subjects(semvalue)
		{
<?php
			if($_SESSION['SessionUserTypeId'] == USER_TYPE_ADMIN || $_SESSION['SessionUserTypeId'] == USER_TYPE_ADMIN_MARKLIST) 
			{
?>
				Populate_Subjects_Admin(semvalue);
<?php
			}
?>
		}
		function Populate_Subjects_Admin(semvalue)
		{
			if(semvalue == "SectionChanged")
			{
				var semvalue = document.getElementById('Semester').value;
			}
			
			if(document.DataSelection.Subject.options.length>0)
			{
				for(i=document.DataSelection.Subject.options.length-1;i>=0;i--)
				{
					document.DataSelection.Subject.options.remove(i);
				}
			}
			document.getElementById("Template_Id").value="";
			var coursename = document.getElementById("Course_Id").value;
			var Aca_Year = document.getElementById("AcademicYear_Id").value;
			var DepartmentName = document.getElementById("Department_Id").value;
<?php
			$Get_Subjects = "select * from subject as s, course as c , department as d where s.CourseId=c.CourseId and c.DepartmentId=d.DepartmentId and SubjectFinalized='YES';";
			$Res_Get_Subjects=VTS_Resultset_Array($conn,$Get_Subjects,$Db_Type);
			$Num_Rows_Subjects = $Num_Rows($Res_Get_Subjects);
			$Fetch_Row_Subjects = $Fetch_Row($Res_Get_Subjects);

			$SubjectId_DB= VTS_Resultset($conn,$Res_Get_Subjects,0,"SubjectId",$Db_Type);
			$SubjectName_DB= VTS_Resultset($conn,$Res_Get_Subjects,0,"SubjectName",$Db_Type);
			$AcademicYear_DB= VTS_Resultset($conn,$Res_Get_Subjects,0,"AcademicYear",$Db_Type);
			$CourseId_DB= VTS_Resultset($conn,$Res_Get_Subjects,0,"CourseId",$Db_Type);
			$Semester_DB= VTS_Resultset($conn,$Res_Get_Subjects,0,"Semester",$Db_Type);
			$CourseName_DB= VTS_Resultset($conn,$Res_Get_Subjects,0,"CourseName",$Db_Type);
			$DepartmentName_DB= VTS_Resultset($conn,$Res_Get_Subjects,0,"DepartmentName",$Db_Type);

			for($r=1;$r<=$Num_Rows_Subjects;$r++)
			{
?>
				if(coursename == "<?php echo $CourseName_DB; ?>" && Aca_Year=="<?php echo $AcademicYear_DB; ?>" && DepartmentName =="<?php echo $DepartmentName_DB; ?>" && semvalue=="<?php echo $Semester_DB; ?>")
				{
					var combo20 = document.getElementById("SubjectId");
					var option20 = document.createElement("option");					 
					option20.text = "<?php echo $SubjectName_DB; ?>";
					option20.value = "<?php echo $SubjectId_DB; ?>";
					try
					{
						combo20.add(option20, null); 
					}
					catch(error)
					{
						combo20.add(option20); 
					}
				}
<?php
				$Fetch_Row_Subjects = $Fetch_Row($Res_Get_Subjects);
				$SubjectId_DB= VTS_Resultset($conn,$Res_Get_Subjects,$r,"SubjectId",$Db_Type);
				$SubjectName_DB= VTS_Resultset($conn,$Res_Get_Subjects,$r,"SubjectName",$Db_Type);
				$AcademicYear_DB= VTS_Resultset($conn,$Res_Get_Subjects,$r,"AcademicYear",$Db_Type);
				$CourseId_DB= VTS_Resultset($conn,$Res_Get_Subjects,$r,"CourseId",$Db_Type);
				$Semester_DB= VTS_Resultset($conn,$Res_Get_Subjects,$r,"Semester",$Db_Type);
				$CourseName_DB= VTS_Resultset($conn,$Res_Get_Subjects,$r,"CourseName",$Db_Type);
				$DepartmentName_DB= VTS_Resultset($conn,$Res_Get_Subjects,$r,"DepartmentName",$Db_Type);
			}
?>
			var Subject_On = document.getElementById("SubjectId").value;
			Get_Template_Name(Subject_On);
		}
		function Get_Template_Name(subjectvalue)
		{
<?php
			if($MODULE_ID == MODULE_ID_MARKLIST && $FILE_NAME =='SUB_INT')
			{
?>
				Populate_TemplateName(subjectvalue);
<?php
			}
			elseif($MODULE_ID == MODULE_ID_MARKLIST && ($FILE_NAME =='FINAL_INT' || $FILE_NAME == 'FINAL_EXT'))
			{
?>
				Populate_TemplateName_Final_IntExt(subjectvalue);
<?php
			}
?>
		}
		function Populate_TemplateName_Final_IntExt(subjectvalue)
		{
			document.getElementById("Template_Id").value="";
			var coursename = document.getElementById("Course_Id").value;
			var Aca_Year = document.getElementById("AcademicYear_Id").value;
			var DepartmentName = document.getElementById("Department_Id").value;
			var SubjectName = document.getElementById("SubjectId").value;
			var Section_Id_check = document.getElementById("Section_Id").value;
<?php
			$Get_Template = "select * from faculty_sub_map as ftm,course as c, department as d, section as sec where ftm.CourseId=c.CourseId and c.DepartmentId=d.DepartmentId and ftm.SectionId = sec.SectionId ;";
			$Res_Get_Template=VTS_Resultset_Array($conn,$Get_Template,$Db_Type);
			$Num_Rows_Template = $Num_Rows($Res_Get_Template);
			
			for($r=1;$r<=$Num_Rows_Template;$r++)
			{
				$SubjectId_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"SubjectId",$Db_Type);
				$SubjectName_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"SubjectName",$Db_Type);
				$AcademicYear_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"AcademicYear",$Db_Type);
				$CourseId_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"CourseId",$Db_Type);
				$Semester_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"Semester",$Db_Type);
				$CourseName_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"CourseName",$Db_Type);
				$DepartmentName_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"DepartmentName",$Db_Type);
				$SectionName_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"SectionName",$Db_Type);
?>
				if(coursename == "<?php echo $CourseName_DB; ?>" && Aca_Year=="<?php echo $AcademicYear_DB; ?>" && DepartmentName =="<?php echo $DepartmentName_DB; ?>" && SubjectName=="<?php echo $SubjectId_DB; ?>" && Section_Id_check == "<?php echo $SectionName_DB; ?>")
				{
<?php
					$TemplateId_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"TemplateId",$Db_Type);
					$Get_Status_1 = "select count(*) as cnt  from master_template where TemplateId='$TemplateId_DB';";
					$Res_Get_Status_1=VTS_Resultset_Array($conn,$Get_Status_1,$Db_Type);
					$count_1= VTS_Resultset($conn,$Res_Get_Status_1,0,"cnt",$Db_Type);
					if($count_1 == "0")
					{
						$TableName_1="faculty_template_id";
					}
					else
					{
						$TableName_1="master_template"; 
					}
					$Get_ExamName_1 = "select * from $TableName_1 where TemplateId='$TemplateId_DB';";
					$Res_Get_ExamName_1=VTS_Resultset_Array($conn,$Get_ExamName_1,$Db_Type);
					$TemplateName_DB= VTS_Resultset($conn,$Res_Get_ExamName_1,0,"TemplateName",$Db_Type);
?>
					document.getElementById("Template_Id").value="<?php echo $TemplateName_DB; ?>";
					document.getElementById("templateid_send_id").value = "<?php echo $TemplateId_DB; ?>";
				}
<?php
			}
?>
		}
		function Populate_TemplateName(subjectvalue)
		{
			if(document.DataSelection.ExamName.options.length>0)
			{
				for(i=document.DataSelection.ExamName.options.length-1;i>=0;i--)
				{
					document.DataSelection.ExamName.options.remove(i);
				}
			}
			document.getElementById("Template_Id").value="";
			var coursename = document.getElementById("Course_Id").value;
			var Aca_Year = document.getElementById("AcademicYear_Id").value;
			var DepartmentName = document.getElementById("Department_Id").value;
			var SubjectName = document.getElementById("SubjectId").value;
			var Semester_Id_check = document.getElementById("Semester").value;
			var Section_Id_check = document.getElementById("Section_Id").value;
<?php
			$Get_Template = "select * from faculty_sub_map as ftm,course as c,department as d, section as sec where ftm.CourseId=c.CourseId and c.DepartmentId=d.DepartmentId and ftm.Status='TRUE' and ftm.SectionId = sec.SectionId;";
			$Res_Get_Template=VTS_Resultset_Array($conn,$Get_Template,$Db_Type);
			$Num_Rows_Template = $Num_Rows($Res_Get_Template);
			for($r=1;$r<=$Num_Rows_Template;$r++)
			{
				$SubjectId_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"SubjectId",$Db_Type);
				$AcademicYear_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"AcademicYear",$Db_Type);
				$CourseId_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"CourseId",$Db_Type);
				$Semester_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"Semester",$Db_Type);
				$CourseName_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"CourseName",$Db_Type);
				$DepartmentName_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"DepartmentName",$Db_Type);
				$SectionName_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"SectionName",$Db_Type);
?>
				if(Aca_Year=="<?php echo $AcademicYear_DB; ?>" && DepartmentName =="<?php echo $DepartmentName_DB; ?>" && coursename == "<?php echo $CourseName_DB; ?>" && subjectvalue=="<?php echo $SubjectId_DB; ?>" && Semester_Id_check =="<?php echo $Semester_DB; ?>" && Section_Id_check =="<?php echo $SectionName_DB; ?>" )
				{
					if(document.DataSelection.ExamName.options.length>0)
					{
						for(i=document.DataSelection.ExamName.options.length-1;i>=0;i--)
						{
							document.DataSelection.ExamName.options.remove(i);
						}
					}
<?php
					$TemplateId_DB= VTS_Resultset($conn,$Res_Get_Template,$r-1,"TemplateId",$Db_Type);
					$Get_Status_1 = "select count(*) as cnt  from master_template where TemplateId='$TemplateId_DB';";
					$Res_Get_Status_1=VTS_Resultset_Array($conn,$Get_Status_1,$Db_Type);
					$count_1= VTS_Resultset($conn,$Res_Get_Status_1,0,"cnt",$Db_Type);
					if($count_1 == "0")
					{
					   $TableName_1="faculty_template_id";
					}
					else
					{
					  $TableName_1="master_template"; 
					}
					
					$Get_ExamName_1 = "select * from $TableName_1 where TemplateId='$TemplateId_DB';";
					$Res_Get_ExamName_1=VTS_Resultset_Array($conn,$Get_ExamName_1,$Db_Type);
					$TemplateName_DB= VTS_Resultset($conn,$Res_Get_ExamName_1,0,"TemplateName",$Db_Type);
?>
					document.getElementById("Template_Id").value="<?php echo $TemplateName_DB; ?>";
<?php
					$Get_Status = "select count(*) as cnt  from master_template_details where TemplateId='$TemplateId_DB';";
					$Res_Get_Status=VTS_Resultset_Array($conn,$Get_Status,$Db_Type);
					$count= VTS_Resultset($conn,$Res_Get_Status,0,"cnt",$Db_Type);
					if($count == "0")
					{
					   $TableName="faculty_templates";
					}
					else
					{
					  $TableName="master_template_details"; 
					}
					
					$Get_ExamName = "select * from $TableName where TemplateId='$TemplateId_DB';";
					$Res_Get_ExamName=VTS_Resultset_Array($conn,$Get_ExamName,$Db_Type);
					$Num_Rows_ExamName = $Num_Rows($Res_Get_ExamName);
					$Fetch_Row_ExamName = $Fetch_Row($Res_Get_ExamName);
					$ExamName_DB= VTS_Resultset($conn,$Res_Get_ExamName,0,"ExamName",$Db_Type);
					$ExamTypeId= VTS_Resultset($conn,$Res_Get_ExamName,0,"ExamTypeId",$Db_Type);
					$ExamId= VTS_Resultset($conn,$Res_Get_ExamName,0,"ExamId",$Db_Type);
					for($q=1;$q<=$Num_Rows_ExamName;$q++)
					{ 
?>	
						var combo23 = document.getElementById("Exam_Name_Id");
						var option23 = document.createElement("option");					 
						option23.text = "<?php echo $ExamName_DB; ?>";
						option23.value = "<?php echo $ExamId."_".$ExamTypeId; ?>";
						try
						{
							combo23.add(option23, null); 
						}
						catch(error)
						{
							combo23.add(option23); 
						}
<?php
						$Fetch_Row_ExamName = $Fetch_Row($Res_Get_ExamName);
						$ExamName_DB= VTS_Resultset($conn,$Res_Get_ExamName,$q,"ExamName",$Db_Type);
						$ExamTypeId= VTS_Resultset($conn,$Res_Get_ExamName,$q,"ExamTypeId",$Db_Type);
						$ExamId= VTS_Resultset($conn,$Res_Get_ExamName,$q,"ExamId",$Db_Type);
					}
?>
				}			
<?php
			}
?>
		}
		function Sendvalue()
		{
			var academicyear = document.getElementById('AcademicYear_Id').value;
			var department = document.getElementById('Department_Id').value;
			var course = document.getElementById('Course_Id').value;
			var semester = document.getElementById('Semester').value;
			if(academicyear == "SELECT")
			{
				alert("Please Select AcademicYear");
				return false;
			}
			if(department == "SELECT")
			{
				alert("Please Select Department");
				return false;
			}
			if(course == "SELECT")
			{
				alert("Please Select Course");
				return false;
			}
			if(semester == "SELECT")
			{
				alert("Please Select Semester");
				return false;
			}
<?php
			if($MODULE_ID == MODULE_ID_MARKLIST)
			{
?>	
				var templateName = document.getElementById('Template_Id').value;
				if(templateName == "")
				{
					alert("No faculty is mapped with the subject.");
					return false;
				}
				var examName = document.getElementById('Exam_Name_Id').value;
				var subject = document.getElementById('SubjectId').value;
				if(subject == "SELECT")
				{
<?php
					$sub = "select Subjecttype as ST from subject where SubjectId = '$Subject';";
					$deptsResultset_sub=VTS_Resultset_Array($conn,$sub,$Db_Type);
					$deptsRows1=$Num_Rows($deptsResultset_sub);
					$deptsRow1=$Fetch_Row($deptsResultset_sub);
					$SubjectSelectName= VTS_Resultset($conn,$deptsResultset_sub,0,"ST",$Db_Type);
?>			
				}
<?php
			}
			if($MODULE_ID == MODULE_ID_ATTENDENCE)
			{
?>
				var date = document.getElementById('att_date').value;
				if(date == "")
				{
					alert("Please Select Date");
					return false;
				}
				var Att_Date = date.split("-");
				var Att_day = Att_Date[2];
				var Att_month= Att_Date[1]-1;
				var Att_year = Att_Date[0];
				var currentDate = new Date();
				var cur_day= currentDate.getDate();
				var cur_month = currentDate.getMonth();
				var cur_year = currentDate.getFullYear();
				var Today = new Date(cur_year, cur_month, cur_day); 
				var Att_date = new Date(Att_year, Att_month, Att_day);
				var Academicyear = academicyear.split("-"); 
				var  Academic_max_year= Academicyear[1];
				var  Academic_min_year= Academicyear[0];
				if(!(Att_year==Academic_min_year || Att_year==Academic_max_year) )
				{
					alert ("Choose appropriate date from the academic year" + Academic_min_year+ "-" +Academic_max_year);
					return false;
				}
				if(Att_date > Today)
				{
					alert("Date Should not be Greater than Current Date");
					return false;	
				}	
<?php
			}
			if($MODULE_ID == MODULE_ID_TIMETABLE)
			{
?>	
				var Custom_Date = document.getElementById('Custom_Date').value;	
<?php
			}
?>
		}
	</script>
	<form name="DataSelection" method="GET" action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return Validate();">
<?php
		if($MODULE_ID == MODULE_ID_TIMETABLE )
		{
			$Width ="<div class='Layout width700' style='margin-left:10px;'>
					<table border = '1' align='center' width='700'>";		
		}
		if($MODULE_ID == MODULE_ID_ATTENDENCE)
		{
			$Width ="<div class='Layout width750'>
					<table border = '1' align='center' width='750'>";
		}
		if($MODULE_ID == MODULE_ID_MARKLIST)
		{
			$Width ="<div class='Layout width980'>
					<table border = '1' align='center' width='980'>";
		}
		if($MODULE_ID == MODULE_ID_FINE)
		{
			$Width ="<div class='Layout width980'>
					<table border = '1' align='center' width='980'>";
		}
		if($MODULE_ID == MODULE_ID_ADMIN)
		{
			$Width ="<div class='Layout width650'>
					<table border = '1' align='center' width='650'>";
		}
		if($_GET['TimetableDate'] == TimetableDate)
		{
			$Width ="<div class='Layout width800'>
					<table border = '1' align='center' width='800'>";
		}
		if($_GET['StudentReport'] == StudentReport)
		{
			$Width ="<div class='Layout width800'>
					<table border = '1' align='center' width='800'>";
		}
				if($_GET['SelectList'] == SelectList)
		{
			$Width ="<div class='Layout width800'>
					<table border = '1' align='center' width='800'>";
		}

?>
<?php
		echo $Width;
?>
			<thead>
				<tr>
					<th>AcademicYear*</th>
					<th>Department*</th>
					<th>Course*</th>
					<th>Semester*</th>
<?php
					if($MODULE_ID != MODULE_ID_ADMIN)
					{
?>                   

						<th>Section*</th>
<?php 
					}
?>
<?php
					if($MODULE_ID == MODULE_ID_FINE)
					{
?>
						<th>Date*</th>
						<th>Category*</th>
						<th>SubCategory*</th>
<?php 
					}
?>
<?php
					if($MODULE_ID == MODULE_ID_ATTENDENCE || $_GET['TimetableDate'] == TimetableDate)
					{
?>
						<th>Date*</th>
<?php
					}
?>
<?php
					if($MODULE_ID == MODULE_ID_TIMETABLE && $_GET['TimetableClass'] == Regular)
					{
?>
						<th>Date*</th>
<?php
					}
?>
<?php
					if($MODULE_ID == MODULE_ID_MARKLIST)
					{
?>
                        <th>Subjects</th>
<?php
						if($_GET[FILE_NAME] != "FINAL_EXT")
						{
?>
							<th>Template<br>Name</th>
<?php
						}
						if($MODULE_ID == MODULE_ID_MARKLIST && $FILE_NAME =='SUB_INT')
						{
?>
                       		 <th>Exam</th>
<?php
						}
					}
?>
					<th>Action*</th>
				</tr>
				<tr>
					<th> <label>
							<select name="AcademicYear" size="1" id="AcademicYear_Id" onChange="return  Get_Course(this.value);">
								<option>SELECT</option>
<?php
								$AcademicYearQuery="Select * from academic where AcademicYear='$AcaMax_Cur';";
								$AcademicYearResultset=VTS_Resultset_Array($conn,$AcademicYearQuery,$Db_Type);
								$AcademicYearRows=$Num_Rows($AcademicYearResultset);
								
									$AllAcademicYear=VTS_Resultset($conn,$AcademicYearResultset,0,"AcademicYear",$Db_Type);
?>
									<option value="<?php echo $AllAcademicYear; ?>"><?php echo $AllAcademicYear; ?></option>
							</select>
						</label>
					</th>
					<th>
						<label>
							<select name="Department" size="1" id="Department_Id" onChange="return  Get_Course_Sem_Sec('GET_COURSE');"></select>
						</label>
					</th>
					<th>
						<label>
							<select name="Course" size="1" id="Course_Id" onChange="return Get_Course_Sem_Sec('GET_SEMESTER');"></select>
						</label>
					</th>
					<th>
						<label>
							<select name="Semester" size="1" id="Semester" onChange="return Get_Course_Sem_Sec('GET_SECTION')"></select>
						</label>
					</th>
<?php
					if($MODULE_ID != MODULE_ID_ADMIN && $MODULE_ID != MODULE_ID_MARKLIST)
					{
?>                   
                        <th>
                            <label>
                          	  <select name="Section" size="1" id="Section_Id" ></select>
                            </label>
                        </th>
<?php 
					}
					 if($MODULE_ID == MODULE_ID_MARKLIST /*&& ($FILE_NAME =='SUB_INT' || $FILE_NAME =='FINAL_INT' || $FILE_NAME =='FINAL_EXT')*/)
					{
?>                   
                        <th>
                            <label>
                          	  <select name="Section" size="1" id="Section_Id" onChange="return Populate_Subjects('SectionChanged')"></select>
                            </label>
                        </th>
<?php 
					}
?>
<?php
					if($MODULE_ID == MODULE_ID_FINE)
					{
?>
						<script language="JavaScript" type="text/javascript">
							function GetSubCategory()
							{
								CategoryId = document.getElementById('CategoryId').value;
								if(document.DataSelection.SubCategory.options.length>0)
								{
									for(i=document.DataSelection.SubCategory.options.length-1;i>=0;i--)
									{
										document.DataSelection.SubCategory.options.remove(i);
									}
								}
<?php
								$CategoryQuery="select * from fine_sub_category;";
								$res_CategoryQuery = VTS_Resultset_Array($conn,$CategoryQuery,$Db_Type);
								$num_rows= $Num_Rows($res_CategoryQuery);
								$CategoryId=VTS_Resultset($conn,$res_CategoryQuery,0,"CategoryId",$Db_Type);
								for($t = 1; $t <= $num_rows; $t++)
								{
									$CategoryId=VTS_Resultset($conn,$res_CategoryQuery,$t-1,"CategoryId",$Db_Type);
									$CategoryNameQuery="select * from fine_category where CategoryId='$CategoryId';";
									$res_CategoryNameQuery = VTS_Resultset_Array($conn,$CategoryNameQuery,$Db_Type);
									$CategoryName=VTS_Resultset($conn,$res_CategoryNameQuery,0,"CategoryName",$Db_Type);
									$SubCategoryQuery="select * from fine_sub_category;";
									$res_SubCategoryQuery = VTS_Resultset_Array($conn,$SubCategoryQuery,$Db_Type);
									$Subnum_rows= $Num_Rows($res_SubCategoryQuery);
									$SubCategoryId=VTS_Resultset($conn,$res_SubCategoryQuery,$t-1,"SubCategoryId",$Db_Type);
									$SubCategoryName=VTS_Resultset($conn,$res_SubCategoryQuery,$t-1,"SubCategoryName",$Db_Type);
?>
									if(CategoryId=="<?php echo $CategoryName;?>")
									{
										var SubCategory = document.getElementById("SubCategoryId");
										var option = document.createElement("option");
										option.text = "<?php echo $SubCategoryName;?>";
										option.value = "<?php echo $SubCategoryName;?>";
										try
										{
											SubCategory.add(option, null); 
										}
										catch(error)
										{
											SubCategory.add(option);
										}
									}
<?php
								}//for($t = 1; $t <= $num_rows; $t++)
?>
							}
						</script>
						<th align="center">
							<input size="10" id="FineDateSelect" name="FineDateSelect" value="<?php echo date("Y-m-d");?>" readonly="true"/><img height="15px" src="../Images/cal.bmp" id="f_btn1" />
							<script type="text/javascript">
								Calendar.setup
								({
									inputField : "FineDateSelect",
									trigger    : "f_btn1",
									onSelect   : function() { this.hide() },
									showTime   : 12,
									dateFormat : "%Y-%m-%d"
								});
							</script>
						</th>
						<td>
							<label>
								<select name="Category" size="1" id="CategoryId" style="width:100px;" onChange="return GetSubCategory(this.value);">
								<option>SELECT</option>
								<?php											
									$CategoryQuery = "select * from fine_category;";
									$res_CategoryQuery =VTS_Resultset_Array($conn,$CategoryQuery,$Db_Type);
									$total_rows_category = $Num_Rows($res_CategoryQuery);
									$fetch_row_category = $Fetch_Row($res_CategoryQuery);
									$CategoryName= VTS_Resultset($conn,$res_CategoryQuery,0,"CategoryName",$Db_Type);
									for ($y = 1; $y <= $total_rows_category; $y++)
									{
?>
										<option value="<?php echo $CategoryName; ?>"><?php echo $CategoryName; ?></option>
<?php
										$total_rows_category = $Num_Rows($res_CategoryQuery);
										$fetch_row_category = $Fetch_Row($res_CategoryQuery);
										$CategoryName= VTS_Resultset($conn,$res_CategoryQuery,$y,"CategoryName",$Db_Type);
									} //for ($y = 1; $y <= $total_rows_aca_Year; $y++)
?>
								</select>
							</label>
						</td>
						<td>
							<label>
								<select name="SubCategory" size="1" id="SubCategoryId" style="width:100px;" >
								<option>SELECT</option>
								</select>
							</label>
						</td>
<?php
					}
?>					
<?php
					if($MODULE_ID == MODULE_ID_ATTENDENCE || $_GET['TimetableDate'] == TimetableDate)
					{
?>
						 <th>
							<input size="10" id="att_date" name="Custom_Date"  /><img src="../Images/cal.bmp" id="f_btn1" />
							<script type="text/javascript">//<![CDATA[
								Calendar.setup
								(
									{
									inputField : "att_date",
									trigger    : "f_btn1",
									onSelect   : function() { this.hide() },
									showTime   : 12,
									dateFormat : "%Y-%m-%d"
									}
								);
							</script>
						</th>
<?php
					}
?>
<?php
					if($MODULE_ID == MODULE_ID_TIMETABLE && $_GET['TimetableClass'] == Regular)
					{
?>
						 <th>
							<input size="10" id="Custom_Date" name="Custom_Date" value="<?php echo date("Y-m-d"); ?>" style="width:80px;"/><img src="../Images/cal.bmp" id="f_btn1" /><br />
							<script type="text/javascript">//<![CDATA[
								Calendar.setup
								({
									inputField : "Custom_Date",
									trigger    : "f_btn1",
									onSelect   : function() { this.hide() },
									showTime   : 12,
									dateFormat : "%Y-%m-%d"
								});
							</script>
						</th>
<?php
					}
?>
<?php
					if($MODULE_ID == MODULE_ID_MARKLIST)
					{
?>
						<th>
							<label>
							<select name="Subject"  size="1" id="SubjectId" onChange="return Get_Template_Name(this.value);">
								<option value="SELECT">SELECT</option>
							</select>
							</label>
						</th>
<?php
						if($_GET[FILE_NAME] != "FINAL_EXT")
						{
?>
							<th width="50">
								<input type="text"  size="10" name="TemplateName" id="Template_Id" readonly="true" style="width:90px;"/>
							</th>
<?php
						}
						else
						{
?>
								<input type="hidden"  size="10" name="TemplateName" id="Template_Id" readonly="true" style="width:90px;"/>
<?php							
						}
?>
						
<?php
						if($MODULE_ID == MODULE_ID_MARKLIST && $FILE_NAME =='SUB_INT')
						{
?>
							<th>
								<label>
									<select name="ExamName"  size="1" id="Exam_Name_Id">
										<option value="SELECT">SELECT</option>
									</select>
								</label>
								<input type="hidden" name="FILE_NAME"  value="<?php echo $_GET['FILE_NAME']; ?>"/>
							</th>
<?php
						}
?>
<?php
					}
?>
					<th align="center">
<?php
					if($MODULE_ID == MODULE_ID_TIMETABLE && $_GET['TimetableClass'] == Regular)
					{
?>
                        <input type="hidden" name="TimetableClass" value="Regular"/>
<?php
					}
?>
<?php
					if($MODULE_ID == MODULE_ID_TIMETABLE)
					{
?>
                        <input type="hidden" name="CombinationName" value="<?php echo $_GET['CombinationName']; ?>"/>
                        <input type="hidden" name="CombinationId" value="<?php echo $_GET['CombinationId']; ?>"/>
						<input type="hidden" value="<?php echo $totalPeriods;?>" name="Total_Periods" />
						<input type="hidden" value="<?php echo $daysperweek;?>" name="Total_Days" />
						<input type="hidden" value="<?php echo $_GET['SelectedSubject'];?>" name="SubjectId" />
						<input type="hidden" value="<?php echo $_GET['SelectedEmployeeNo'];?>" name="Employee" />
<?php
					}
?>
<?php
					if($MODULE_ID == MODULE_ID_MARKLIST &&( $FILE_NAME =='FINAL_INT' || $FILE_NAME =='FINAL_EXT'))
					{
?>
                        <input type="hidden" name="templateidsend"  id="templateid_send_id"/>
                        <input type="hidden" name="FILE_NAME"  value="<?php echo $_GET['FILE_NAME']; ?>"/>
<?php
					}
?>
<?php
					if($MODULE_ID == MODULE_ID_FINE)
					{
?>
						<input type="hidden" name="FineType" id="FineTypeId" value="<?php echo $_GET['FineType'];  ?>" />
<?php
					}
?>
                    <input type="hidden" name="MOD_ID" value="<?php echo $_GET['MOD_ID']; ?>"/>
					<input type="hidden" name="Menu" value="<?php echo $_GET['Menu']; ?>"/>
					<input type="hidden" name="Menu" value="<?php echo $_GET['Menu']; ?>"/>
                    <input type="hidden"  id="LogoId" name="Logo" value="<?php echo $_GET['Logo']; ?>"/>
                    <input type="hidden"  id="Path" name="Path" value="<?php echo $_GET['Path']; ?>"/>
                    <input type="hidden"  id="TimetableDate" name="TimetableDate" value="<?php echo $_GET['TimetableDate']; ?>"/>
					 <input type="hidden"  id="SelectList" name="SelectList" value="<?php echo $_GET['SelectList']; ?>"/>

					<input class="Action_button" type="Submit" name="Page" value="" onClick="return Sendvalue();"/>
					</th>
				</tr>
			</thead>
		</table>
	</div>
	</form>
<?php
	if ($_GET[AcademicYear]!="")
	{
?>
		<script  language="javascript" type="text/javascript">
			document.getElementById("AcademicYear_Id").value="<?php echo $_GET[AcademicYear];?>";
		</script>
<?php
	}
?>
<?php
	if ($_GET[Department]!="")
	{
?>
		<script  language="javascript" type="text/javascript">
			Get_Course('<?php echo $_GET[AcademicYear];?>');
			document.getElementById("Department_Id").value="<?php echo $_GET[Department];?>";
		</script>
<?php
	} 
?>
<?php
	if ($_GET[Course]!="")
	{
?>
		<script  language="javascript" type="text/javascript">
			Get_Course_Sem_Sec('GET_COURSE');
			document.getElementById("Course_Id").value="<?php echo $_GET[Course];?>";
		</script>
<?php
	} 
?>
<?php
		if ($_GET[Semester]!="")
		{
?>
			<script  language="javascript" type="text/javascript">
				Get_Course_Sem_Sec('GET_SEMESTER');
				document.getElementById("Semester").value="<?php echo $_GET[Semester];?>";
			</script>
<?php
		} 
?>
<?php
	if ($_GET[Section]!="")
	{
?>
		<script  language="javascript" type="text/javascript">
			Get_Course_Sem_Sec('GET_SECTION');
<?php
			if($MODULE_ID == MODULE_ID_MARKLIST)
			{
?>
				Populate_Subjects(<?php echo $_GET[Semester];?>);
<?php
			}
?>
			document.getElementById("Section_Id").value="<?php echo $_GET[Section];?>";
		</script>
<?php
	} 
?>

<?php 
	if ($_GET[Subject]!="")
	{
?>
		<script  language="javascript" type="text/javascript">
			Populate_Subjects_Admin("<?php echo $_GET[Semester];?>");
			document.getElementById("SubjectId").value="<?php echo $_GET[Subject];?>";
			Get_Template_Name("<?php echo $_GET[Subject];?>");
		</script>
<?php
	}
?>
<?php
	if ($_GET[TemplateName]!="")
	{
?>
		<script  language="javascript" type="text/javascript">
			document.getElementById("Template_Id").value="<?php echo $_GET[TemplateName];?>";
		</script>
<?php
	}
?>
<?php
	if ($_GET[ExamName]!="")
	{
?>
		<script  language="javascript" type="text/javascript">
			document.getElementById("Exam_Name_Id").value="<?php echo $_GET[ExamName];?>";
		</script>
<?php 
	}
?>