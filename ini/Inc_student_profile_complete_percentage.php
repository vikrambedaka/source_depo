<?php
	//********************************************************************************************
	//						COPYRIGHT: VOICETECH SOLUTIONS PVT LTD,								**
	//								      BANGALORE												**
	//********************************************************************************************

	//*********** FILE NAME: Inc_student_profile_complete_percentage.php *************************************

	//*********************************** DESCRIPTION ********************************************
	//Displays Student Profile Progress Percentage						**
	//								    														**
	//********************************************************************************************

	//********************************* HISTORY **************************************************
	// Header created and code formated by: Savita on 03-05-2014 in release version: 2.0.0.22

	//******************************** END OF HEADER *********************************************
	$Emptyfields_student_master=0;
	$Emptyfields_student_familyinformation=0;
	$Emptyfields_student_academicinformation=0;
	$Emptyfields_student_curricular=0;
		$count_column_student_curricular=0;
		$percent=0;
	$TotalFields=0;
	if($_GET['ApplicationNo'] != "")
	{
		$_SESSION['ADMIN_SELECTED_STUDENT'] = $_GET['ApplicationNo'];
	}
	if($_SESSION['SessionUserTypeId'] == USER_TYPE_ADMIN || $_SESSION['SessionUserTypeId'] == USER_TYPE_ADMISSION_COORDINATOR)
	{
	if($_GET['MOD_ID'] == MODULE_ID_ADMISSION)
	{
		$StudentQuery=" select * from student_master where ApplicationNo='$Application_No';";
		$Res_StudentQuery = VTS_Resultset_Array($conn, $StudentQuery, $Db_Type);
		$ApplicationNo=VTS_Resultset($conn, $Res_StudentQuery, 0, "ApplicationNo", $Db_Type);
	}
	else
	{
		$StudentQuery=" select * from student_master where ApplicationNo='$_SESSION[ADMIN_SELECTED_STUDENT]';";
		$Res_StudentQuery = VTS_Resultset_Array($conn, $StudentQuery, $Db_Type);
		$ApplicationNo=VTS_Resultset($conn, $Res_StudentQuery, 0, "ApplicationNo", $Db_Type);
	}
	}
	else
	{
		$StudentQuery=" select * from student_master where Reserved='$_SESSION[StudentTempId]';";
		$Res_StudentQuery = VTS_Resultset_Array($conn, $StudentQuery, $Db_Type);
		$ApplicationNo=VTS_Resultset($conn, $Res_StudentQuery, 0, "ApplicationNo", $Db_Type);
		$_GET['ApplicationNo'] = $ApplicationNo;
	}
	$EmptyfieldsQuery_student_master=" select
	sum(EnrollNo IS  NULL OR EnrollNo='') +( ApplicationNo IS  NULL OR ApplicationNo='')+(Title IS NULL OR Title='') +(StudentFirstName IS NULL OR StudentFirstName='')+(StudentMiddleName IS NULL OR StudentMiddleName='')+(StudentLastName IS NULL OR StudentLastName='')+(FathersFirstName IS NULL OR FathersFirstName ='' )+(FathersMiddleName IS NULL OR FathersMiddleName ='' )+(FathersLastName IS NULL OR FathersLastName ='' )+(MothersFirstName IS NULL OR MothersFirstName ='' )+(MothersMiddleName IS NULL OR MothersMiddleName ='' )+(MothersLastName IS NULL OR MothersLastName ='' )+(GuardianFirstName IS NULL OR GuardianFirstName ='' )+(GuardianMiddleName IS NULL OR GuardianMiddleName ='' )+(GuardianLastName IS NULL OR GuardianLastName ='' )+(DOB IS NULL OR DOB ='' )+(BloodGroup IS NULL OR BloodGroup ='' )+(EnrollYear IS NULL OR EnrollYear ='' )+(QuotaId IS NULL OR QuotaId ='' )+(Current_AcademicYear IS NULL OR Current_AcademicYear ='' )+(TotalSemester IS NULL OR TotalSemester ='' )+(Gender IS NULL OR Gender ='' )+(Caste IS NULL OR Caste ='' )+(CurrentSemester IS NULL OR CurrentSemester ='' )+(DepartmentId IS NULL OR DepartmentId ='' )+(CourseId IS NULL OR CourseId ='' )+(Bus IS NULL OR Bus ='' )+(Hostel IS NULL OR Hostel ='' )+(DateOfJoining IS NULL OR DateOfJoining ='' )+(SectionId IS NULL OR SectionId ='' )+(Religion IS NULL OR Religion ='' )+(ImagePath IS NULL OR ImagePath ='' )+(StudentType IS NULL OR StudentType ='' )+(StudentStatus IS NULL OR StudentStatus ='' )+(Graduation IS NULL OR Graduation ='' )+(PhyChallenged IS NULL OR PhyChallenged ='' )+(MaritalStatus IS NULL OR MaritalStatus ='' )+(Reserved IS NULL OR Reserved ='' )+(Raddone IS NULL OR Raddone ='' )+(Raddtwo IS NULL OR Raddtwo ='' )+(Rcity IS NULL OR Rcity ='' )+(Rstate IS NULL OR Rstate ='' )+(Rcountry IS NULL OR Rcountry ='' )+(Rpin IS NULL OR Rpin ='' )+(Majorhealthproblem IS NULL OR Majorhealthproblem ='' )+(Library IS NULL OR Library ='' )+(FinancialAid IS NULL OR FinancialAid ='' )+(Languagesknown IS NULL OR Languagesknown ='' )+(ExtraSkills IS NULL OR ExtraSkills ='' )+(ExtraKnowledge IS NULL OR ExtraKnowledge ='' )+(Areaofinterest IS NULL OR Areaofinterest ='' )+(DOT IS NULL OR DOT ='' )+(Reason IS NULL OR Reason ='' )+(exitimagepath IS NULL OR exitimagepath ='' )+(Entrance_Exam IS NULL OR Entrance_Exam ='' )+(Entrance_RegisterNo IS NULL OR Entrance_RegisterNo ='' )+(EntExam_OrderNo IS NULL OR EntExam_OrderNo ='' )+(Rank IS NULL OR Rank ='' )+(Allotted_Date IS NULL OR Allotted_Date ='' )+(Allotted_Category IS NULL OR Allotted_Category ='' )+(Doc_Submission IS NULL OR Doc_Submission ='' )+(Sub_Caste IS NULL OR Sub_Caste ='' )+(Reside_Type IS NULL OR Reside_Type ='' )+(PCM_Marks IS NULL OR PCM_Marks ='' )+(PCM_Aggregate IS NULL OR PCM_Aggregate ='' )+(QE_ExamName IS NULL OR QE_ExamName ='' )+(QE_PassingYear IS NULL OR QE_PassingYear ='' )+(QE_Board IS NULL OR QE_Board ='' )+(QE_RegisterNo IS NULL OR QE_RegisterNo ='' )+(Height IS NULL OR Height ='')+(Weight IS NULL OR Weight ='')+(EyeSight IS NULL OR EyeSight ='')+(Sightpower IS NULL OR Sightpower ='')+(Contribution IS NULL OR Contribution ='') as TOTAL_STUDENT_MASTER_FIELDS from student_master where (ApplicationNo='$ApplicationNo' or ApplicationNo='$Application_No' );";
	$Res_Emptyfields_student_master = VTS_Resultset_Array($conn, $EmptyfieldsQuery_student_master, $Db_Type);
	$Emptyfields_Rows_student_master = $Num_Rows($Res_Emptyfields_student_master);
	$Emptyfields_student_master=VTS_Resultset($conn, $Res_Emptyfields_student_master, 0, "TOTAL_STUDENT_MASTER_FIELDS", $Db_Type);


	$EmptyfieldsQuery_student_familyinformation=" select
	sum(FatherQualification IS  NULL OR FatherQualification='') +( FatherOccupation IS  NULL OR FatherOccupation='')+(FatherAnnualIncome IS NULL OR FatherAnnualIncome='') +(MotherQualification IS NULL OR MotherQualification='')+(MotherOccupation IS NULL OR MotherOccupation='')+(MotherAnnualIncome IS NULL OR MotherAnnualIncome='')+(MotherAnnualIncome IS NULL OR MotherAnnualIncome ='')+(GuardianOccupation IS NULL OR GuardianOccupation ='' )+(GuardianQualification IS NULL OR GuardianQualification ='' )+(GuardianAnnualIncome IS NULL OR GuardianAnnualIncome ='')+(HomeAreaCode IS NULL OR HomeAreaCode ='' )+(HomeNo IS NULL OR HomeNo ='' )+(PriMobileNo IS NULL OR PriMobileNo ='' )+(AlternateMobileNo IS NULL OR AlternateMobileNo ='' )+(FathersEmailId IS NULL OR FathersEmailId ='' )+(EmailId IS NULL OR EmailId ='' ) as TOTAL_STUDENT_FAMILYINFORMATION_FIELDS from student_familyinformation where (ApplicationNo='$ApplicationNo' or ApplicationNo='$Application_No' );";
	$Res_Emptyfields_student_familyinformation = VTS_Resultset_Array($conn, $EmptyfieldsQuery_student_familyinformation, $Db_Type);
	$Emptyfields_Rows_student_familyinformation = $Num_Rows($Res_Emptyfields_student_familyinformation);
	$Emptyfields_student_familyinformation=VTS_Resultset($conn, $Res_Emptyfields_student_familyinformation, 0, "TOTAL_STUDENT_FAMILYINFORMATION_FIELDS", $Db_Type);
		
	
	$EmptyfieldsQuery_student_academicinformation=" select
	sum(ExaminationPassed IS  NULL OR ExaminationPassed='') +( Stream IS  NULL OR Stream='')+(UniversityName IS NULL OR UniversityName='') +(MaximumMarks IS NULL OR MaximumMarks='')+(MarksObtained IS NULL OR MarksObtained='')+(PassingYear IS NULL OR PassingYear='')+(Percentage IS NULL OR Percentage ='')+(Grade IS NULL OR Grade ='' )+(No_Of_Attempt IS NULL OR No_Of_Attempt ='' )+(State IS NULL OR State ='')+(RegisterNo IS NULL OR RegisterNo ='' ) as TOTAL_STUDENT_ACADEMICINFORMATION_FIELDS from student_academics where (ApplicationNo='$ApplicationNo' or ApplicationNo='$Application_No' ) and ExaminationPassed='SSLC' ;";
	
	$Res_Emptyfields_student_academicinformation = VTS_Resultset_Array($conn, $EmptyfieldsQuery_student_academicinformation, $Db_Type);
	$Emptyfields_Rows_student_academicinformation = $Num_Rows($Res_Emptyfields_student_academicinformation);
	$Emptyfields_student_academicinformation=VTS_Resultset($conn, $Res_Emptyfields_student_academicinformation, 0, "TOTAL_STUDENT_ACADEMICINFORMATION_FIELDS", $Db_Type);


	$Academictablequery="select count(*) as AcademicTableRows from student_academics WHERE ApplicationNo=('$ApplicationNo' or '$Application_No')";
	$Academictableresultset=VTS_Resultset_Array($conn,$Academictablequery,$Db_Type);
	$AcademicTableRows=VTS_Resultset($conn,$Academictableresultset,0,"AcademicTableRows",$Db_Type);
	
	$EmptyfieldsQuery_student_curricular=" select
	sum(CertifiedCourse IS  NULL OR CertifiedCourse='') +( Awards IS  NULL OR Awards='')+(PhysicalEducation IS NULL OR PhysicalEducation='') +(SpecialPerformance IS NULL OR SpecialPerformance='')+(TotalCertification IS NULL OR TotalCertification='') as TOTAL_STUDENT_CURRICULAR_FIELDS from student_curricular where (ApplicationNo='$ApplicationNo' or ApplicationNo='$Application_No' );";
	$Res_Emptyfields_student_curricular = VTS_Resultset_Array($conn, $EmptyfieldsQuery_student_curricular, $Db_Type);
	$Emptyfields_Rows_student_curricular = $Num_Rows($Res_Emptyfields_student_curricular);
	$Emptyfields_student_curricular=VTS_Resultset($conn, $Res_Emptyfields_student_curricular, 0, "TOTAL_STUDENT_CURRICULAR_FIELDS", $Db_Type);

	$student_academics_columns_Num="SELECT COUNT(*) as countcolumn FROM INFORMATION_SCHEMA.COLUMNS WHERE table_schema = '$database'  AND table_name in ('student_academics','student_master','student_familyinformation','student_curricular');";
	$Resstudent_academics_columns_Num = VTS_Resultset_Array($conn, $student_academics_columns_Num, $Db_Type);
	$count_column_student_curricular=VTS_Resultset($conn, $Resstudent_academics_columns_Num, 0, "countcolumn", $Db_Type);

	$TotalFields = ($Emptyfields_student_master+$Emptyfields_student_familyinformation+$Emptyfields_student_academicinformation + $Emptyfields_student_curricular);
	$percent = ($TotalFields /$count_column_student_curricular)*100;
	$scale = 1;
?>
<?php
if($percent != "100")
{
?>
<style type="text/css">
	.percentbar { background:#999; border:1px solid #000; height:15px; border-radius:4px;}
	.percentbar div { background:#800000; height: 15px; border-radius:4px; color:#FFF; text-align:center;}	
</style>
<?php
}
else
{
?>
<style type="text/css">
	.percentbar { background:#999; border:1px solid #000; height:15px; border-radius:4px; }
	.percentbar div { background:green; height: 15px; border-radius:4px; color:#FFF; text-align:center; }	
</style>
<?php
}
?>
<?php if($_GET['MOD_ID'] == MODULE_ID_STUDENT)
{
	?>
    <div style="width:200px; margin-left:1000px; color:#900; height:10px; margin-top:15px;">
		Profile Percentage
		<div class="percentbar" style="width:<?php echo round($percent,2); ?>px;">
			<div style="width:<?php echo round($percent,2); ?>px;"><?php echo (100-round($percent,2)); ?>%</div>
		</div>
	</div>
	<?php
}
?>
<?php if($_GET['MOD_ID'] == MODULE_ID_ADMISSION)
{
	?>

	<div style="color:#900;  font-size:10px; width:50px;">
		<div class="percentbar" style="width:50px;">
			<div style="width:50px;"><?php echo (round($percent,2)); ?>%</div>
		</div>
	</div>
	<?php
}
?>
