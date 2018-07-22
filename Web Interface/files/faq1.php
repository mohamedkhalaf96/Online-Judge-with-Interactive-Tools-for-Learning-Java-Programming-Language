<head>
    <style>
        div{
            cursor: pointer;
        } 
        .howtophoto{
            width:45%;
            height:300px;
            margin:10px;
        }
    </style>
</head>
<?php
if ($judge['value'] != "Lockdown" || (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin')) {
    
?>
 	<div class="row">
<div>
  <div class="panel-group" id="accordion">
<!---------------------------------------------------- tutorial---------------------------------------------------------------->
   <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Add/Update Tutorial</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse ">
        <div class="panel-body">
            <strong>In order to add/update tutorial,You should go to "Admin" -> "Tutorial Settings" -> "Add New Tutorial" or "Edit".</strong><br>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/tutorial_settings.png"/><br>
          <strong>Name : </strong>assign the topic name which the tutorial talk about.<br>
          <strong>Code : </strong>Unique code assigend when add new Tutorial<br>
          <strong>Tutorial Content : </strong>Fill the textarea with the content of the tutorial,you can <br>style the text using the editor,photos can be added in the editor by drag and drop it into the editor in the prefered place.<br>
          <strong>Image File:</strong>You can upload photo,then must specify its position by inserting <br>the (custom) "<image />"placing tag somewhere in your text.
          </div>
    </div></div>
<!----------------------------------------------------add/update text problem----------------------------------------------------->
      <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Add/Update Text Problem</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
          <strong>In order to add/update text problem,You should go to "Admin" -> "Problem Setting" -> "Add New Text Problem" or "Edit".</strong><br>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/add_update_text_problem.png"/>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/add_text_problem.png"/>
            <br>
          <strong>Name : </strong>Name of the problem.<br>
          <strong>Code : </strong>Unique code.<br>
          <strong>Score : </strong>used in the score system.<br>
          <strong>Type : </strong>type of the problems like(Math, ad-hoc).<br>
          <strong>Group : </strong>the category of the problem,if it is a contest problem then its group is same as contest code. <br>
          <strong>Problem Statement : </strong>Text statement of the problem<br>
          <strong>Contest type : </strong>Choose the problem added to be practice or contest mode<br>
          <strong>Image File:</strong>You can upload photo,then must specify its position by inserting <br>the (custom) "<image />"placing tag somewhere in your text.<br>
          <strong>Sample Input/Outut File  : </strong>You may upload two text files (must be .txt) contain test cases to help student
          understand the problem correctly. <br>
          <strong>Solution Code : </strong>java file contain a correct code solution to the problem, used to generate correct output.<br>
          <strong>Input File : </strong>RAR file contains a group of text files (must be .txt) each text file contains an input test cases then each input testcase will be run on the correct solution you uploaded to generate the correct output for each test cases.<br>
          <strong>Time Limit : </strong>Maximum time the problem should take to produce the output.<br>
          <strong>Status : </strong>Can be <br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Disabled: </strong> Problem are completed hidden from Students.<br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Inactive: </strong> The students can access the problem statement but doesn't have the permission to submit a solution.<br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Active: </strong>the student can access the problem statement and submit a solution.<br>
          <strong>Maximum File Size : </strong>Maximum Size of the user's solution should be.<br>
          <strong>Display IO : </strong>Choosing if the user have access to see the test cases of the problem after solve it or not.<br>
         </div>
      </div>
    </div>     
<!-------------------------------------------------add/update Expect output problem----------------------------------------------->
       <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Add/Update Expect Output Problem</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
          <strong>In order to add/update Expect Output Problem",You should go to "Admin" -> "Problem Setting" -> "Adding Expect Output Problem" or "Edit".</strong><br>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/add_update_Expect_output.png"/><br>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/add_expect_output_problem.png"/><br>
          <strong>Name : </strong>Name of the problem.<br>
          <strong>Code : </strong>Unique code.<br>
          <strong>Score : </strong>used in the score system.<br>
          <strong>Type : </strong>type of the problems like(Math, ad-hoc).<br>
          <strong>Group : </strong>the category of the problem,if it is a contest problem then its group is same as contest code. <br>
          <strong>Contest type : </strong>Choose the problem added to be practice or contest mode<br>
          <strong>Status : </strong>Can be <br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Disabled: </strong> Problem are completed hidden from Students.<br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Inactive: </strong> The students can access the problem statement but doesn't have the permission to submit a solution.<br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Active: </strong>the student can access the problem statement and submit a solution.<br> 
          <strong>Problem Statement : </strong>Code of program should the student expect their output<br>
          <strong>Expect Output : </strong>The solution or the correct output should the program produce,<strong>Note:</strong> New line is considered (e.g) System.out.<strong>println</strong>("hello"); ,the output should be "hello" followed by new line "enter"<br>
      </div>
    </div></div>   
<!-------------------------------------------------add/updateSyntax error problem------------------------------------------------->
       <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Add/Update Syntax Error Problem</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
          <strong>In order to add/update Syntax Error Problem,You should go to "Admin" -> "Problem Setting" -> "Adding Syntax Error Problem" or "Edit".</strong><br>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/add_syntax_error_problem.png"/><br>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/add_update_syntax_error.png"/><br>
          <strong>Name : </strong>Name of the problem.<br>
          <strong>Code : </strong>Unique code.<br>
          <strong>Score : </strong>used in the score system.<br>
          <strong>Type : </strong>type of the problems like(Math, ad-hoc).<br>
          <strong>Group : </strong>the category of the problem,if it is a contest problem then its group is same as contest code. <br>
          <strong>Problem Statement : </strong>Code of program should the student expect their output<br>
          <strong>Contest type : </strong>Choose the problem added to be practice or contest mode<br>
          <strong>Status : </strong>Can be <br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Disabled: </strong> Problem are completed hidden from Students.<br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Inactive: </strong> The students can access the problem statement but doesn't have the permission to submit a solution.<br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Active: </strong>the student can access the problem statement and submit a solution.<br> 
          <strong>Problem Statement : </strong>Fill the area with a code contains Syntax Errors, then should mark the places that where the error exists by make the text in this position <strong>Bold</strong>.<br>
          <strong>Correct Syntax : </strong>It contains the correct syntax should the code will be, each line contains the correction of each related error exist in the problem statement,in same order of there appearance.<br>
          <strong>Note:</strong> Number of line of the Correct Syntax text area should equal the number of the syntax errors exist in the code<br>
        </div>
      </div>
    </div> 
<!-------------------------------------------------add/update Blockly problem----------------------------------------------------->
       <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Add/Update Blockly Problem</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
          <strong>In order to add/update Blockly Problem,You should go to "Admin" -> "Problem Setting" -> "Adding Blockly Problem" or "Edit".</strong><br>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/add_new_blockly_problem.png"/>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/add_blockly_problem.png"/><br>
          <strong>Name : </strong>Name of the problem.<br>
          <strong>Code : </strong>Unique code.<br>
          <strong>Score : </strong>used in the score system.<br>
          <strong>Type : </strong>type of the problems like(Math, ad-hoc).<br>
          <strong>Group : </strong>the category of the problem,if it is a contest problem then its group is same as contest code. <br>
          <strong>Problem Statement : </strong>Text statement of the problem<br>
          <strong>Blocks : </strong>You should choose the blocks can be used to solve the problem<br>
          <strong>Contest type : </strong>Choose the problem added to be practice or contest mode<br>
          <strong>Image File:</strong>You can upload photo,then must specify its position by inserting <br>the (custom) "<image />"placing tag somewhere in your text.<br>
          <strong>Sample Input/Outut File  : </strong>You may upload two text files (must be .txt) contain test cases to help student
          understand the problem correctly. <br>
          <strong>Solution Code : </strong>java file contain a correct code solution to the problem, used to generate correct output.<br>
          <strong>Input File : </strong>RAR file contains a group of text files (must be .txt) each text file contains an input test cases then each input testcase will be run on the correct solution you uploaded to generate the correct output for each test cases.<br>
          <strong>Time Limit : </strong>Maximum time the problem should take to produce the output.<br>
          <strong>Status : </strong>Can be <br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Disabled: </strong> Problem are completed hidden from Students.<br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Inactive: </strong> The students can access the problem statement but doesn't have the permission to submit a solution.<br>
          &nbsp;&nbsp;&nbsp;&nbsp;<strong>Active: </strong>the student can access the problem statement and submit a solution.<br>
          <strong>Maximum File Size : </strong>Maximum Size of the user's solution should be.<br>
          <strong>Display IO : </strong>Choosing if the user have access to see the test cases of the problem after solve it or not.<br>
        </div>
      </div>
    </div>
<!-------------------------------------------------Create Contest-------------------------------------------------------->
       <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Create Contest</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">
            <strong>In order to add/update Contest, You sould go to "Admin" -> "Contest Settings"<br></strong>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/create_contest.png"/><br>      
            <strong>1. </strong>Go to Contest settings page add the new contest.<br>
            <strong>2. </strong>Go to Problem Settings and set the status of all past contest problems that arent part of this competition to 'Inactive' (instead of deleting them). This will disable them from further accepting submissions.<br>
            <strong>3. </strong>Add new problems and be sure to set their pgroup to contest code. By default the problems will be added in disabled mode and in practice section. This will make problems visible only to admins and thus only admin can submit and check the problems. After all the testing is done, simply update the contest field to 'contest' and status to 'Active'. This will make problems visible and available for submission as soon as contest starts.<br>
            <strong>4. </strong>On the sand-boxed judge which will judge the solutions, ensure that the judge is online.<br>
            <strong>5. </strong>You may now submit your 'correct' solutions to the 'Active' problems and test them to ensure that the system is working properly.
            <strong>6. </strong>Go back to the Judge Settings page and set the status to 'Active'. If you do not specify the 'End Time', a default value of 3 hours will be assumed. student can now login, view problems and submit solutions.<br>
            <strong>7. </strong>When the timer expires, Judge mode will be automatically changed to 'Disabled', and submissions are no longer allowed. It may take a bit longer than that for the judgement of all submissions to take place.<br>
            <strong>8. </strong>If you wish, you may open the submission page of all problems and make certain accepted solutions 'Public' thereby allowing everyone to see the code and can even set the Display IO field in problem settings page to 'Yes' (this will allow Normal users to see their mistakes.<br/>
             <strong>Note:</strong>You can send a broadcast message during a contest only,you should go to "Admin" -> "Broadcast".<br> 
        </div>
      </div>
    </div>
<!-------------------------------------------------Clarifications-------------------------------------------------------->
       <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Clarifications</a>
        </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse">
        <div class="panel-body">
            <strong>In order to reply on questions, you sould go to "Admin" -> "Clarifications"</strong><br>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/clarifications.png"/><br>
          You can reply on a problem's question or general (contact us) question asked by student, you can make the question have private or public access or delete it.<br>

        </div>
      </div>
    </div>
<!-------------------------------------------------Group Settings-------------------------------------------------------->
       <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Group Settings</a>
        </h4>
      </div>
      <div id="collapse9" class="panel-collapse collapse">
        <div class="panel-body">
            <strong>In order to edit group settings, you sould go to "Admin" -> "Group Settings"</strong><br>
          <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/group_settings.png"/><br>
            In this page you can add/update/delete group, you can also add/delete user from specific group.<br>
        </div>
      </div>
    </div>
<!-------------------------------------------------Text problem-------------------------------------------------------->
       <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">Text problem</a>
        </h4>
      </div>
      <div id="collapse10" class="panel-collapse collapse">
        <div class="panel-body">
            <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/text_problem.png"/><br>
            Problem Statement displayed as text, you should read it and try to find the idea of the solution then solve it by writing your java code to solve this problem and submit your solution and the judge take this code and run it, then it returns the result to it which can be Accepted ,Wrong Answer ,Time Limit Exceed..,etc..<br>
        </div>
      </div>
    </div>
<!-------------------------------------------------Blockly problem-------------------------------------------------------->
       <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">Blockly problem</a>
        </h4>
      </div>
      <div id="collapse11" class="panel-collapse collapse">
        <div class="panel-body">
            <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/blockly_problem.png"/><br>
            Problem as a text statement, you should read it and try to find the idea of the solution then solve it by pick up Java blockly blocks and link it together while seeing the translation of your blocks as an executable Java code, finally you should submit your solution and the judge take this code and run it, then it returns the result to it which can be Accepted ,Wrong Answer ,Time Limit Exceed..,etc.<br/>
        </div>
      </div>
    </div>
<!-------------------------------------------------Expect The Output Problem-------------------------------------------------------->
       <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">Expect The Output Problem</a>
        </h4>
      </div>
      <div id="collapse12" class="panel-collapse collapse">
        <div class="panel-body">
            <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/expect_output.png"/><br>
            In this problem,you will have a correct code and should trace it and expect the output the code produce,then write your solution.
            <strong>Note:</strong> New line is considered (e.g) System.out.<strong>println</strong>("hello"); ,the output should be "hello" followed by new line "enter"<br>
            <br>
          </div>
      </div>
    </div>
<!-------------------------------------------------Find the Error Problem-------------------------------------------------------->
       <div class="panel2 panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse13">Find the Error Problem</a>
        </h4>
      </div>
      <div id="collapse13" class="panel-collapse collapse">
        <div class="panel-body">
            <img class="howtophoto" src="<?php echo SITE_URL; ?>/img/howto/syntax_error.png"/><br>
            In this Problem you should identifying the syntax errors in the code by click in the error's position.
            <br>
          </div>
      </div>
    </div>
      
      
  </div> 
 </div>
</div>
<div id="dialog">
    <img id="dialogimg" />
</div>
<script>
$( function() {
    var dialog;
    dialog = $( "#dialog" ).dialog({
      autoOpen: false,
      height: 650,
      width: 1300,
      modal: true,
      close: function() {
           $("#dialog").dialog('close');
      }
    });
        
     $( ".howtophoto" ).click(function(event) { 
         document.getElementById("dialogimg").src=event.target.src;
         $("#dialog").dialog('open');
        });         
    });
                                     
</script>

<?php } ?>