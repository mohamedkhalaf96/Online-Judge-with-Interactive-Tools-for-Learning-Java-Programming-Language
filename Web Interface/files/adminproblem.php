<script type="text/javascript" src="<?php echo JS_URL; ?>/tinymce/tinymce.min.js?v=<?php echo microtime();?>"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>/js/jquery-1.11.3.min.js"></script>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['team']['status'] == 'Admin') {
    if (isset($_GET['code'])) {
        $_GET['code'] = addslashes($_GET['code']);
        $query = "select * from problems where code = '$_GET[code]'";
        $res = DB::findOneFromQuery($query);
        if($res["pcat"]!="game"){
        ?>
    <a class='btn btn-default pull-right' style='margin-top: 10px;' href='<?php echo SITE_URL . "/problems/" . $_GET['code'];?>'> View problem</a>
    <!-------------------------------------------updata problem text mena ------------------------------------------------------>
    <div class="text-center page-header">
        <h1>Problem Settings -
            <?php echo "$_GET[code]" ?>
        </h1>
    </div>
    <?php 
        }
            if($res["pcat"]=="game"){
                echo "<h2>Sorry,You Can't Update Any Game Problem</h2>"    ;
            }
            if($res["pcat"]=="Text"){
                ?>

    <input type="hidden" value="Text" name="pcat" />
    <form class='form-horizontal' role='form' method='post' onsubmit="return CheckRequiredupdatetext();" action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
        <input type='hidden' name='pid' value='<?php echo $res['pid']; ?>' />
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='name'>Names</label>
                <div class='col-lg-8'>
                    <input class='form-control' type='text' name='name' id='name' value='<?php echo $res['name']; ?>' required/>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='pgroup'>Problem Group</label>
                <div class='col-lg-8'>
                    <input class='form-control' type='text' name='pgroup' id='pgroup' value='<?php echo $res['pgroup']; ?>' required/>
                    <small>If it is a contest question then its group is same as contest code.</small>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='score'>Score</label>
                <div class='col-lg-8'>
                    <input class='form-control' type='text' name='score' id='score' value='<?php echo $res['score']; ?>' required/>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='type'>Type</label>
                <div class='col-lg-8'>
                    <input class='form-control' type='text' name='type' id='type' value='<?php echo $res['type']; ?>' />
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='timelimit'>Time Limit</label>
                <div class='col-lg-8'>
                    <input class='form-control' type='text' name='timelimit' id='timelimit' value='<?php echo $res['timelimit']; ?>' required/>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='contest'>Contest type</label>
                <div class='col-lg-8'>
                    <select class='form-control' name='contest' id='contest'>
                            <option value='contest' <?php if ($res['contest'] == "contest") echo "selected='selected'"; ?> >Contest</option>
                            <option value='practice' <?php if ($res['contest'] == "practice") echo "selected='selected'"; ?>>Practice</option>
                        </select>
                </div>
            </div>
        </div>
      <div class='col-md-6'>
            <div class='form-group'>
                <label class="control-label col-lg-4" for='input'>Code Solution</label>
                <div class='col-lg-8'>
                    <input style='width:100%; padding: 6px 12px;' type='file' accept=".java" name='CodeSolution' id='CodeSolution' />
                    <span id="compilation"></span>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='maxfilesize'>Max File size</label>
                <div class='col-lg-8'>
                    <input class='form-control' type='text' name='maxfilesize' id='maxfilesize' value='<?php echo $res['maxfilesize']; ?>'/>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='col-lg-4 control-label' for='displayio'>Display IO</label>
                <div class='col-lg-8'>
                    <select class='form-control' name='displayio' id='displayio'>
                            <option value='1' <?php if ($res['displayio'] == "1") echo "selected='selected'"; ?>>Yes</option>
                            <option value='0' <?php if ($res['displayio'] == "0") echo "selected='selected'"; ?>>No</option>
                        </select>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='image'>Image File</label>
                <div class='col-lg-8'>
                    <input type='file' name='image' id='image' />
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='status'>Status</label>
                <div class='col-lg-8'>
                    <select class='form-control' name='status' id='status'>
                            <option value='Active' <?php if ($res['status'] == "Active") echo "selected='selected'"; ?> >Active</option>
                            <option value='Inactive' <?php if ($res['status'] == "Inactive") echo "selected='selected'"; ?>>Inactive</option>
                            <option value='Deleted' <?php if ($res['status'] == "Deleted") echo "selected='selected'"; ?>>Disabled</option>
                        </select>
                </div>
            </div>
        </div>
        <input type='hidden' name='languages' value='Java' id='languages'>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='input'>Input File</label>
                <div class='col-lg-8'>
                    <input type='file' name='input' id='input' />
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='name'>Test Cases</label>
                <div class='col-lg-8'>
                    <button id="showTestCases" type="button">View</button>
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='sampleinput'>Sample Input File</label>
                <div class='col-lg-8'>
                    <input type='file' name='sampleinput' id='sampleinput' />
                </div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4' for='sampleoutput'>Sample Output File</label>
                <div class='col-lg-8'>
                    <input type='file' name='sampleoutput' id='sampleoutput' />
                </div>
            </div>
            <br/>
        </div>

        <div class='col-md-2'>
            <div class='form-group'>
                <label class='control-label col-lg-12' for='statement'>Problem Statement</label>
            </div>
        </div>
        <div class='col-md-10'>
            <div class='form-group'>
                <textarea class='form-control' name='statement' id="tinytext" style='width: 99%; height: 500px;'><?php echo $res['statement']; ?></textarea>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <label class='control-label col-lg-4'></label>
                <div class='col-lg-8'>
                    <input type='submit' class='btn btn-default btn-block' value='Save' name='updateproblem' /><br>
                </div>
            </div>
        </div>
    </form>

    <?php
                }
   
//-----------------------------------updata find error problem  mena  --------------------------------------------------->
            if($res["pcat"]=="Find"){
                ?>
        <form class='form-horizontal' role='form' method='post' onsubmit="return CheckRequiredupdatefind();" action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
            <input type='hidden' name='pid' value='<?php echo $res['pid']; ?>' />
            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4' for='name'>Names</label>
                    <div class='col-lg-8'>
                        <input class='form-control' type='text' name='name' value='<?php echo $res['name']; ?>' required/>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4' for='pgroup'>Problem Group</label>
                    <div class='col-lg-8'>
                        <input class='form-control' type='text' name='pgroup' value='<?php echo $res['pgroup']; ?>' required/>
                        <small>If it is a contest question then its group is same as contest code.</small>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4' for='score'>Score</label>
                    <div class='col-lg-8'>
                        <input class='form-control' type='text' name='score' value='<?php echo $res['score']; ?>' required/>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4' for='type'>Type</label>
                    <div class='col-lg-8'>
                        <input class='form-control' type='text' name='type' value='<?php echo $res['type']; ?>' />
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4' for='contest'>Contest type</label>
                    <div class='col-lg-8'>
                        <select class='form-control' name='contest'>
                            <option value='contest' <?php if ($res['contest'] == "contest") echo "selected='selected'"; ?> >Contest</option>
                            <option value='practice' <?php if ($res['contest'] == "practice") echo "selected='selected'"; ?>>Practice</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4' for='status'>Status</label>
                    <div class='col-lg-8'>
                        <select class='form-control' name='status' id='status'>
                            <option value='Active' <?php if ($res['status'] == "Active") echo "selected='selected'"; ?> >Active</option>
                            <option value='Inactive' <?php if ($res['status'] == "Inactive") echo "selected='selected'"; ?>>Inactive</option>
                            <option value='Deleted' <?php if ($res['status'] == "Deleted") echo "selected='selected'"; ?>>Disabled</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class='col-md-2'>
                <div class='form-group'>
                    <label class='control-label col-lg-12' for='statement'>Problem Statement</label>
                </div>
            </div>
            <div class='col-md-10'>
                <div class='form-group'>
                    <textarea class='form-control' name='statement' id="tinyfind" style='width: 80%; height: 300px;'><pre><?php echo $res['statement']; ?></pre></textarea>
                </div>
            </div>

            <div class='col-md-2'>
                <div class='form-group'>
                    <label class='control-label col-lg-12' for='output'>Correct Syntax</label>
                </div>
            </div>
            <div class='col-md-10'>
                <div class='form-group'>
                    <textarea class='form-control' name='output' id="outputfind" style='width: 80%; height: 100px;'><?php echo $res['output']; ?></textarea>
                </div>
            </div>

            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4'></label>
                    <div class='col-lg-8'>
                        <input type='submit' class='btn btn-default btn-block' value='Save' name='updateFindError' />
                    </div>
                </div>
            </div>
        </form>

        <?php
                }
    ?>
            <!----------------------------------------update Expect output mena ----------------------------------------------->
            <?php 
            if($res["pcat"]=="Expect"){
                ?>
            <form class='form-horizontal' role='form' method='post' onsubmit="return CheckRequiredupdateexpect();" action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
                <input type='hidden' name='pid' value='<?php echo $res['pid']; ?>' />
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='control-label col-lg-4' for='name'>Names</label>
                        <div class='col-lg-8'>
                            <input class='form-control' type='text' name='name' id='name' value='<?php echo $res['name']; ?>' required/>
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='control-label col-lg-4' for='pgroup'>Problem Group</label>
                        <div class='col-lg-8'>
                            <input class='form-control' type='text' name='pgroup' id='pgroup' value='<?php echo $res['pgroup']; ?>' required/>
                            <small>If it is a contest question then its group is same as contest code.</small>

                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='control-label col-lg-4' for='score'>Score</label>
                        <div class='col-lg-8'>
                            <input class='form-control' type='text' name='score' id='score' value='<?php echo $res['score']; ?>' required/>
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='control-label col-lg-4' for='type'>Type</label>
                        <div class='col-lg-8'>
                            <input class='form-control' type='text' name='type' id='type' value='<?php echo $res['type']; ?>' />
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='control-label col-lg-4' for='contest'>Contest type</label>
                        <div class='col-lg-8'>
                            <select class='form-control' name='contest' id='contest'>
                            <option value='contest' <?php if ($res['contest'] == "contest") echo "selected='selected'"; ?> >Contest</option>
                            <option value='practice' <?php if ($res['contest'] == "practice") echo "selected='selected'"; ?>>Practice</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='control-label col-lg-4' for='status'>Status</label>
                        <div class='col-lg-8'>
                            <select class='form-control' name='status' id='status'>
                            <option value='Active' <?php if ($res['status'] == "Active") echo "selected='selected'"; ?> >Active</option>
                            <option value='Inactive' <?php if ($res['status'] == "Inactive") echo "selected='selected'"; ?>>Inactive</option>
                            <option value='Deleted' <?php if ($res['status'] == "Deleted") echo "selected='selected'"; ?>>Disabled</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class='col-md-2'>
                    <div class='form-group'>
                        <label class='control-label col-lg-12' for='statement'>Problem Statement</label>
                    </div>
                </div>
                <div class='col-md-10'>
                    <div class='form-group'>
                        <textarea class='form-control' name='statement' id="tiny" style='width: 80%; height: 300px;'><pre><?php echo $res['statement']; ?></pre></textarea>
                    </div>
                </div>
                <div class='col-md-2'>
                    <div class='form-group'>
                        <label class='control-label col-lg-12' for='output'>Expect Output</label>
                    </div>
                </div>
                <div class='col-md-10'>
                    <div class='form-group'>
                        <textarea class='form-control' name='output' id="outputexpect" style='width: 80%; height: 100px;'><?php echo $res['output']; ?></textarea>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='control-label col-lg-4'></label>
                        <div class='col-lg-8'>
                            <input type='submit' class='btn btn-default btn-block' value='Save' name='updateExpectoutput' />
                        </div>
                    </div>
                </div>
            </form>

            <?php
                }
    ?>
                <!----------------------------------------update blocly mena ----------------------------------------------->
                <!--<div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-lg-4' for='name'>Name</label>
                    <div class='col-lg-8'>
                        <button  id="btest" type="button" id="TestCase">TestCase</button>
                    </div>
                </div>
            </div>
            <input  type="hidden" name="blockly" id="xml" >-->
                <?php 
            
        
        if($res["pcat"]=="blockly"){
                ?>
                <form class='form-horizontal' role='form' method='post' onsubmit="return CheckRequiredupdatetext();" action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
                    <input type='hidden' name='pid' value='<?php echo $res['pid']; ?>' />
                    <input type="hidden" value="blockly" name="pcat" />
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='name'>Names</label>
                            <div class='col-lg-8'>
                                <input class='form-control' type='text' name='name' id='name' value='<?php echo $res['name']; ?>' required/>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='pgroup'>Problem Group</label>
                            <div class='col-lg-8'>
                                <input class='form-control' type='text' name='pgroup' id='pgroup' value='<?php echo $res['pgroup']; ?>' required/>
                                <small>If it is a contest question then its group is same as contest code.</small>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='score'>Score</label>
                            <div class='col-lg-8'>
                                <input class='form-control' type='text' name='score' id='score' value='<?php echo $res['score']; ?>' required/>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='name'>Blocks</label>
                            <div class='col-lg-8'>
                                <button id="btest" type="button" id="TestCase">Select</button>
                                <textarea style="display:none" name="blockly" id="xml"><?php echo $res['blocks']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='type'>Type</label>
                            <div class='col-lg-8'>
                                <input class='form-control' type='text' name='type' id='type' value='<?php echo $res['type']; ?>' />
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='timelimit'>Time Limit</label>
                            <div class='col-lg-8'>
                                <input class='form-control' type='text' name='timelimit' id='timelimit' value='<?php echo $res['timelimit']; ?>' required/>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='contest'>Contest type</label>
                            <div class='col-lg-8'>
                                <select class='form-control' name='contest' id='contest'>
                            <option value='contest' <?php if ($res['contest'] == "contest") echo "selected='selected'"; ?> >Contest</option>
                            <option value='practice' <?php if ($res['contest'] == "practice") echo "selected='selected'"; ?>>Practice</option>
                        </select>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class="control-label col-lg-4" for='input'>Code Solution</label>
                            <div class='col-lg-8'>
                                <input style='width:100%; padding: 6px 12px;' type='file' accept=".java" name='CodeSolution' id='CodeSolution' />
                                <span id="compilation"></span>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='maxfilesize'>Max File size</label>
                            <div class='col-lg-8'>
                                <input class='form-control' type='text' name='maxfilesize' id='maxfilesize' value='<?php echo $res['maxfilesize']; ?>'/>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='col-lg-4 control-label' for='displayio'>Display IO</label>
                            <div class='col-lg-8'>
                                <select class='form-control' name='displayio' id='displayio'>
                            <option value='1' <?php if ($res['displayio'] == "1") echo "selected='selected'"; ?>>Yes</option>
                            <option value='0' <?php if ($res['displayio'] == "0") echo "selected='selected'"; ?>>No</option>
                        </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='status'>Status</label>
                            <div class='col-lg-8'>
                                <select class='form-control' name='status' id='status'>
                            <option value='Active' <?php if ($res['status'] == "Active") echo "selected='selected'"; ?> >Active</option>
                            <option value='Inactive' <?php if ($res['status'] == "Inactive") echo "selected='selected'"; ?>>Inactive</option>
                            <option value='Deleted' <?php if ($res['status'] == "Deleted") echo "selected='selected'"; ?>>Disabled</option>
                        </select>
                            </div>
                        </div>
                    </div>
                    <input type='hidden' name='languages' value='Java' id='languages'>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='image'>Image File</label>
                            <div class='col-lg-8'>
                                <input type='file' name='image' id='image' />
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='input'>Input File</label>
                            <div class='col-lg-8'>
                                <input type='file' name='input' id='input' />
                            </div>
                        </div>
                    </div>

                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='name'>Test Cases</label>
                                    <div class='col-lg-8'>
                                        <button id="showTestCases" type="button">View</button>
                                    </div>
                                </div>
                            </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='sampleinput'>Sample Input File</label>
                            <div class='col-lg-8'>
                                <input type='file' name='sampleinput' id='sampleinput' />
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4' for='sampleoutput'>Sample Output File</label>
                            <div class='col-lg-8'>
                                <input type='file' name='sampleoutput' id='sampleoutput' />
                            </div>
                        </div>
                        <br/>
                    </div>

                    <div class='col-md-2'>
                        <div class='form-group'>
                            <label class='control-label col-lg-12' for='statement'>Problem Statement</label>
                        </div>
                    </div>
                    <div class='col-md-10'>
                        <div class='form-group'>
                            <textarea class='form-control' name='statement' id="tinytext" style='width: 99%; height: 500px;'><?php echo $res['statement']; ?></textarea>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-lg-4'></label>
                            <div class='col-lg-8'>
                                <input type='submit' class='btn btn-default btn-block' value='Save' name='updateproblem' /><br>
                            </div>
                        </div>
                    </div>
                </form>

                <?php } ?>

                <!------------------------------------------------------------------------------------------------------------->
                <br/>
                <script>
                    tinymce.init({
                        selector: '#tiny',
                        plugins: "link",
                        forced_root_block: false,
                    });
                    tinymce.init({
                        selector: '#tinyfind',
                        plugins: "link",
                        forced_root_block: false,
                    });
                    tinymce.init({
                        selector: '#tinytext',
                        plugins: "link",
                        forced_root_block: false,
                    });

                    function CheckRequiredupdatetext(event) {
                        if (tinymce.get("tinytext").getContent() == "") {
                            alert("Please,Fill The Empty Text Area");
                            return false;
                        }
                        return true;
                    }

                    function CheckRequiredupdateexpect(event) {
                        var output = document.getElementById("outputexpect").value;
                        if (tinymce.get("tiny").getContent() == "" || output == "") {
                            alert("Please,Fill The Empty Text Area");
                            return false;
                        }
                        return true;
                    }

                    function CheckRequiredupdatefind(event) {
                        var output = document.getElementById("outputfind").value;
                        if (tinymce.get("tinyfind").getContent() == "" || output == "") {
                            alert("Please,Fill The Empty Text Area");
                            return false;
                        }
                        return true;
                    }

                </script>
                <?php
    } else {
        $langopt = implode(',',array_keys($valtoname));
        ?>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#code1").blur(function() {
                                var x = document.getElementById("code1").value;
                                $.ajax({
                                    data: {
                                        checkcode: x
                                    },
                                    type: "POST",
                                    url: "<?php echo SITE_URL; ?>/process.php",
                                    success: function(result) {
                                        if (result == "found") {
                                            alert("This Code is used before");
                                            document.getElementById("code1").value = "";
                                        }
                                    }
                                });
                            });

                            $("#code2").blur(function() {
                                var x = document.getElementById("code2").value;
                                $.ajax({
                                    data: {
                                        checkcode: x
                                    },
                                    type: "POST",
                                    url: "<?php echo SITE_URL; ?>/process.php",
                                    success: function(result) {
                                        if (result == "found") {
                                            alert("This Code is used before");
                                            document.getElementById("code2").value = "";
                                        }
                                    }
                                });
                            });


                            $("#code3").blur(function() {
                                var x = document.getElementById("code3").value;
                                $.ajax({
                                    data: {
                                        checkcode: x
                                    },
                                    type: "POST",
                                    url: "<?php echo SITE_URL; ?>/process.php",
                                    success: function(result) {
                                        if (result == "found") {
                                            alert("This Code is used before");
                                            document.getElementById("code3").value = "";
                                        }
                                    }
                                });
                            });

                            $("#code4").blur(function() {
                                var x = document.getElementById("code4").value;
                                $.ajax({
                                    data: {
                                        checkcode: x
                                    },
                                    type: "POST",
                                    url: "<?php echo SITE_URL; ?>/process.php",
                                    success: function(result) {
                                        if (result == "found") {
                                            alert("This Code is used before");
                                            document.getElementById("code4").value = "";
                                        }
                                    }
                                });
                            });
                            $('.statusupdate').click(function(event) {
                                pid = event.target.id;
                                pid = pid.replace('prob_', '');
                                $(this).html('Processing...');
                                $.post("<?php echo SITE_URL; ?>/process.php", {
                                    "statusupdate": "",
                                    "pid": pid,
                                    "status": $('#status_' + pid).val()
                                }, function(result) {
                                    if (result === '1') {
                                        $('#prob_' + pid).html('Update');
                                    } else {
                                        $('#prob_' + pid).html(result);
                                    }
                                });
                            });
                            $('.statusdelete').click(function(event) {
                                pid = event.target.id;
                                pid = pid.replace('probd_', '');
                                $(this).html('Processing...');
                                $.post("<?php echo SITE_URL; ?>/process.php", {
                                    "statusdelete": "",
                                    "pid": pid,
                                }, function(result) {
                                    reload();
                                });
                            });
                        });

                        function reload() {
                            location.reload(true / false);
                        }

                        function update() {
                            str = '';
                            for (i = 0; i < this.options.length; i++)
                                if (this.options[i].selected)
                                    str += ((str != '') ? ',' : '') + this.options[i].value;
                            console.log($("#languages").val());
                            //document.getElementById('languages').value = str;
                        }

                        $("#SourceCode").change(function() {
                            var code = document.getElementById("SourceCode");
                            $.post("<?php echo SITE_URL; ?>/process.php", {
                                "CompilationCode": new FormData(code),
                                success: function(result) {
                                    document.getElementById("compilation").textContent = result;
                                }
                            })
                        });

                        tinymce.init({
                            selector: '#statementfind',
                            plugins: "link",
                            forced_root_block: false,
                        });
                        tinymce.init({
                            selector: '#statment',
                            plugins: "link",
                            forced_root_block: false,
                        });

                        function CheckRequired(event) {
                            var output = document.getElementById("outputexpect").value;
                            if (tinymce.get("statment").getContent() == "" || output == "") {
                                alert("Please,Fill The Empty Text Area");
                                return false;
                            }
                            return true;
                        }

                        function CheckRequiredfind(event) {
                            var outputfind = document.getElementById("outputfind").value;
                            if (tinymce.get("statementfind").getContent() == "" || outputfind == "") {
                                alert("Please,Fill The Empty Text Area");
                                return false;
                            }
                            return true;
                        }

                    </script>
                    <!---------------------------------------------------- add problem text ------------------------------------------------------->
                    <div class="text-center page-header">
                        <h1>Problem Settings</h1>
                    </div>
                    <div id='probadd' style='display:none;'>
                        <form class='form-horizontal' role='form' method='post' action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
                            <input type="hidden" value="Text" name="pcat" />
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='name'>Name</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='name' id='name' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='input'>Code Solution</label>
                                    <div class='col-lg-8'>
                                        <input style='width:100%; padding: 6px 12px;' type='file' accept=".java" name='CodeSolution' id='CodeSolution' required/>
                                        <span id="compilation"></span>
                                    </div>
                                </div>

                            </div>

                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='statement'>Problem Statement</label>
                                    <div class='col-lg-8'>
                                        <input style='width:100%; padding: 6px 12px;' type='file' name='statement' id='statement' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='code'>Code</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='code' id='code1' required/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='image'>Image File</label>
                                    <div class='col-lg-8'>
                                        <input style='width:100%; padding: 6px 12px;' type='file' name='image' id='image' />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='score'>Score</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='score' id='score' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='input'>Input File</label>
                                    <div class='col-lg-8'>
                                        <input style='width:100%; padding: 6px 12px;' type='file' name='input' id='input' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='type'>Type</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='type' id='type' />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='pgroup'>Problem Group</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='pgroup' id='pgroup' required/>
                                        <small>If it is a contest question then its group is same as contest code.</small>
                                    </div>
                                </div>
                            </div>

                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='sampleinput'>Sample Input File</label>
                                    <div class='col-lg-8'>
                                        <input type='file' name='sampleinput' id='sampleinput' />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='sampleoutput'>Sample Output File</label>
                                    <div class='col-lg-8'>
                                        <input type='file' name='sampleoutput' id='sampleoutput' />
                                    </div>
                                </div>
                                <br/>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='contest'>Contest type</label>
                                    <div class='col-lg-8'>
                                        <select class='form-control' name='contest' id='contest'>
                                <option value='contest'>Contest</option>
                                <option selected='selected' value='practice'>Practice</option>
                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='timelimit'>Time Limit</label>
                                    <div class='col-lg-8'>
                                        <input class='form-control' type='text' name='timelimit' id='timelimit' required/>
                                    </div>
                                </div>
                            </div>
                            <input type='hidden' name='languages' value='Java' id='languages'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='status'>Status</label>
                                    <div class='col-lg-8'>
                                        <select class='form-control' name='status' id='status'>
                                <option value='Active'>Active</option>
                                <option value='Inactive'>Inactive</option>
                                <option value='Deleted' selected='selected'>Disabled</option>
                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='maxfilesize'>Max File size</label>
                                    <div class='col-lg-8'>
                                        <input class='form-control' type='text' name='maxfilesize' id='maxfilesize' value='50000' />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-2' for='displayio'>Display IO</label>
                                    <div class='col-lg-4'>
                                        <select class='form-control' name='displayio' id='displayio'>
                                <option value='1'>Yes</option>
                                <option value='0' selected='selected'>No</option>
                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='form-group'>
                                    <input type='submit' class='btn btn-default btn-block' value='Add Problem' name='addproblem' />
                                </div>
                            </div>
                        </form>
                        <div style="padding:40px;">
                            <p>The values of all text fields must be a combination of upto 30 characters (single and double quotes are not allowed).</p>
                            <p>Please do not put the name of the problem in the Problem Statement File. You may use the following HTML tags in the Statement File: &lt;b&gt;, &lt;i&gt;, &lt;u&gt;, &lt;ol&gt;, &lt;ul&gt;, &lt;li&gt; & &lt;code&gt; (all others will be deactivated). &lt;br&gt tags will be inserted at line breaks automatically (replacing '\n').</p>
                            <p>If you have uploaded an image (only one jpeg/gif/png, max 3MB, allowed per problem), you must specify its position by inserting the (custom) "&lt;image /&gt;" tag somewhere in your code. It will be replaced by the (proper) &lt;img&gt; tag with the src attribute set appropriately. </p>
                            <p>The Problem Statement, Input, Output, Sample Input and Sample Output Files must be of text format and can have a maximum size of 3MB.</p>
                        </div>
                        <br />
                        <div class="text-center"><a class='btn btn-default' onclick="$('#probadd').slideUp();
                            $('#list').slideDown();">Display List of Problems</a></div><br/>
                    </div>
                    <!---------------------------------------------- add find error mena ----------------------------------------------------------->
                    <div id='probadd1' style='display:none;'>
                        <form class='form-horizontal' role='form' onsubmit="return CheckRequiredfind()" method='post' action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='name'>Name</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='name' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='code'>Code</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='code' id='code2' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='score'>Score</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='score' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='type'>Type</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='type' />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='pgroup'>Problem Group</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='pgroup' required/>
                                        <small>If it is a contest question then its group is same as contest code.</small>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='contest'>Contest type</label>
                                    <div class='col-lg-8'>
                                        <select class='form-control' name='contest' id='contest'>
                                <option value='contest'>Contest</option>
                                <option selected='selected' value='practice'>Practice</option>
                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='status'>Status</label>
                                    <div class='col-lg-8'>
                                        <select class='form-control' name='status' id='status'>
                                <option value='Active'>Active</option>
                                <option value='Inactive'>Inactive</option>
                                <option value='Deleted' selected='selected'>Disabled</option>
                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-12' for='statement'>Problem Statement</label>
                                </div>
                            </div>
                            <div class='col-md-10'>
                                <div class='form-group'>
                                    <textarea class='form-control' name='statement' id='statementfind' style='width: 80%; height: 300px;'></textarea>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-12' for='outputfind'>Correct syntax</label>
                                </div>
                            </div>
                            <div class='col-md-10'>
                                <div class='form-group'>
                                    <textarea class='form-control' name='output' id='outputfind' style='width: 100%; height: 100px;'></textarea>
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='form-group'>
                                    <input type='submit' class='btn btn-default btn-block' value='Add Problem' name='addFindError' />
                                </div>
                            </div>
                        </form>
                        <div style="padding:40px;">
                        <strong>Problem Statement : </strong>Fill the area with a code contains Syntax Errors, then should mark the places that where the error exists by make the text in this position <strong>Bold</strong>.<br>
                        <strong>Correct Syntax : </strong>It contains the correct syntax should the code will be, each line contains the correction of each related error exist in the problem statement,in same order of there appearance.<br>
                          <strong>Note:</strong> Number of line of the Correct Syntax text area should equal the number of the syntax errors exist in the code<br>
                        </div>
                        <br/>
                        <div class="text-center"><a class='btn btn-default' onclick="$('#probadd1').slideUp();
                            $('#list').slideDown();">Display List of Problems</a></div><br/>
                    </div><br/>

                    <!------------------------------------- add expect output mena ----------------------------------------------------------------->
                    <div id='probadd2' style='display:none;'>
                        <form class='form-horizontal' role='form' onsubmit="return CheckRequired();" method='post' action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='name'>Name</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='name' id='name' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='code'>Code</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='code' id='code3' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='score'>Score</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='score' id='score' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='type'>Type</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='type' id='type' />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='pgroup'>Problem Group</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='pgroup' id='pgroup' required/>
                                        <small>If it is a contest question then its group is same as contest code.</small>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='contest'>Contest type</label>
                                    <div class='col-lg-8'>
                                        <select class='form-control' name='contest' id='contest'>
                                <option value='contest'>Contest</option>
                                <option selected='selected' value='practice'>Practice</option>
                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='status'>Status</label>
                                    <div class='col-lg-8'>
                                        <select class='form-control' name='status' id='status'>
                                <option value='Active'>Active</option>
                                <option value='Inactive'>Inactive</option>
                                <option value='Deleted' selected='selected'>Disabled</option>
                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class='col-md-2'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-12' for='statement'>Problem Statement</label>
                                </div>
                            </div>
                            <div class='col-md-10'>
                                <div class='form-group'>
                                    <textarea class='form-control' id="statment" name='statement' style='width: 80%; height: 300px;'></textarea>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-12' for='output'>Expect Output</label>
                                </div>
                            </div>
                            <div class='col-md-10'>
                                <div class='form-group'>
                                    <textarea class='form-control' name='output' id='outputexpect' style='width: 100%; height: 100px;'></textarea>
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='form-group'>
                                    <input type='submit' class='btn btn-default btn-block' value='Add Problem' name='addExpectoutput' />
                                </div>
                            </div>
                        </form>
                        <div style="padding:40px;">
                            <strong>Problem Statement : </strong>Code of program should the student expect their output<br>
                            <strong>Expect Output : </strong>The solution or the correct output should the program produce,<strong>Note:</strong> New line is considered (e.g) System.out.<strong>println</strong>("hello"); ,the output should be "hello" followed by new line "enter"<br>
                        </div>
                        <br/>
                        <div class="text-center"><a class='btn btn-default' onclick="$('#probadd2').slideUp();
                        $('#list').slideDown();">Display List of Problems</a></div><br/>
                    </div>
                    <br/>
                    <!----------------------------------------------add new prblem blockly --------------------------------------------------------->
                    <div id='probadd3' style='display:none;'>
                        <form class='form-horizontal' role='form' method='post' action='<?php echo SITE_URL; ?>/process.php' enctype='multipart/form-data'>
                            <input type="hidden" value="blockly" name="pcat" />
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='name'>Name</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='name' id='name' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='input'>Code Solution</label>
                                    <div class='col-lg-8'>
                                        <input style='width:100%; padding: 6px 12px;' type='file' accept=".java" name='CodeSolution' id='CodeSolution' required/>
                                        <span id="compilation"></span>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='statement'>Problem Statement</label>
                                    <div class='col-lg-8'>
                                        <input style='width:100%; padding: 6px 12px;' type='file' name='statement' id='statement' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='code'>Code</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='code' id='code1' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='image'>Image File</label>
                                    <div class='col-lg-8'>
                                        <input style='width:100%; padding: 6px 12px;' type='file' name='image' id='image' />
                                    </div>
                                </div>
                            </div>

                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='score'>Score</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='score' id='score' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='input'>Input File</label>
                                    <div class='col-lg-8'>
                                        <input style='width:100%; padding: 6px 12px;' type='file' name='input' id='input' required/>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='name'>Blocks</label>
                                    <div class='col-lg-8'>
                                        <button id="btest" type="button" >Select</button>
                                        <textarea style="display:none" name="blockly" id="xml"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='type'>Type</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='type' id='type' />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class="control-label col-lg-4" for='pgroup'>Problem Group</label>
                                    <div class='col-lg-8'>
                                        <input class="form-control" type='text' name='pgroup' id='pgroup' required/>
                                        <small>If it is a contest question then its group is same as contest code.</small>
                                    </div>
                                </div>
                            </div>
                                                        
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='sampleinput'>Sample Input File</label>
                                    <div class='col-lg-8'>
                                        <input type='file' name='sampleinput' id='sampleinput' />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='sampleoutput'>Sample Output File</label>
                                    <div class='col-lg-8'>
                                        <input type='file' name='sampleoutput' id='sampleoutput' />
                                    </div>
                                </div>
                                <br/>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='contest'>Contest type</label>
                                    <div class='col-lg-8'>
                                        <select class='form-control' name='contest' id='contest'>
                                <option value='contest'>Contest</option>
                                <option selected='selected' value='practice'>Practice</option>
                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='timelimit'>Time Limit</label>
                                    <div class='col-lg-8'>
                                        <input class='form-control' type='text' name='timelimit' id='timelimit' required/>
                                    </div>
                                </div>
                            </div>
                            <input type='hidden' name='languages' value='Java' id='languages'>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='status'>Status</label>
                                    <div class='col-lg-8'>
                                        <select class='form-control' name='status' id='status'>
                                <option value='Active'>Active</option>
                                <option value='Inactive'>Inactive</option>
                                <option value='Deleted' selected='selected'>Disabled</option>
                            </select>
                                    </div>
                                </div>
                            </div>

                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-4' for='maxfilesize'>Max File size</label>
                                    <div class='col-lg-8'>
                                        <input class='form-control' type='text' name='maxfilesize' id='maxfilesize' value='50000' />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='form-group'>
                                    <label class='control-label col-lg-2' for='displayio'>Display IO</label>
                                    <div class='col-lg-4'>
                                        <select class='form-control' name='displayio' id='displayio'>
                                <option value='1'>Yes</option>
                                <option value='0' selected='selected'>No</option>
                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='form-group'>
                                    <input type='submit' class='btn btn-default btn-block' value='Add Problem' name='addproblem' />
                                </div>
                            </div>
                        </form>
                        <div style="padding:40px;">
                            <p>The values of all text fields must be a combination of upto 30 characters (single and double quotes are not allowed).</p>
                            <p>Please do not put the name of the problem in the Problem Statement File. You may use the following HTML tags in the Statement File: &lt;b&gt;, &lt;i&gt;, &lt;u&gt;, &lt;ol&gt;, &lt;ul&gt;, &lt;li&gt; & &lt;code&gt; (all others will be deactivated). &lt;br&gt tags will be inserted at line breaks automatically (replacing '\n').</p>
                            <p>If you have uploaded an image (only one jpeg/gif/png, max 3MB, allowed per problem), you must specify its position by inserting the (custom) "&lt;image /&gt;" tag somewhere in your code. It will be replaced by the (proper) &lt;img&gt; tag with the src attribute set appropriately. </p>
                            <p>The Problem Statement, Input, Output, Sample Input and Sample Output Files must be of text format and can have a maximum size of 3MB.</p>
                        </div>
                        <br />
                        <br />
                        <div class="text-center"><a class='btn btn-default' onclick="$('#probadd3').slideUp();
                            $('#list').slideDown();">Display List of Problems</a></div><br/>
                    </div>
                    <!------------------------------------------------------------------------------------------------------------------------------>

                    <?php
        $query = "select pid, name, score,pcat, code, status from problems order by pid desc";
        $res = DB::findAllFromQuery($query);
        echo "<div class='row' id='list'>
        <a class='btn btn-default' onclick=\"$('#probadd').slideDown(); $('#list').slideUp(); getcode();\">Add New Text Problem </a>
        <a class='btn btn-default' onclick=\"$('#probadd1').slideDown(); $('#list').slideUp();\">Add New Syntax Error Problem </a>
        <a class='btn btn-default' onclick=\"$('#probadd2').slideDown(); $('#list').slideUp();\">Add New Expect Output Problem </a>
        <a class='btn btn-default' onclick=\"$('#probadd3').slideDown(); $('#list').slideUp();\">Add New Blockly Problem </a>
        <h3><b>List of Problems</b></h3><table class='table table-hover'><thead><tr><th>ID</th><th>Name</th><th>Score</th><th>Code</th><th>Status</th><th>Options</th></tr></thead>";
        foreach ($res as $row) {
            $diffstatus = array('Active', 'Inactive', 'Deleted');
            $statusstr = "<div class='col-lg-8'><select class='form-control' id='status_$row[pid]'>";
            foreach ($diffstatus as $val) {
                $statusstr .="<option value='$val' " . (($row['status'] == $val) ? ("selected='selected'") : ("")) . " >$val</option>";
            }
            $statusstr .= "</select></div> <a href='#' class='btn btn-danger statusupdate' id='prob_$row[pid]'>Update</a>";
            echo "<tr><td>$row[pid]</td><td>$row[name]</td><td>$row[score]</td><td>$row[code]</td><td>$statusstr</td>";
            if($row['pcat']!='game')
	  	  echo "<td><a href='#' class='btn btn-danger statusdelete' id='probd_$row[pid]'>Delete</a></td>
<td><a class='btn btn-primary' href='" . SITE_URL . "/adminproblem/$row[code]'><i class='glyphicon glyphicon-edit'></i> Edit</a></td></tr>";
            else echo "<td></td><td></td>";
        }
        
        echo "</table></div>";
    }
} 
  else {
    $_SESSION['msg'] = "Access Denied: You need to be administrator to access that page.";
    redirectTo(SITE_URL);
}
?>
<style>
    #cats {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 20%;
        background-color: #f1f1f1;
        height: 100%;
        overflow: auto;
        float: left;
    }

    .blocksImages {
        list-style: none;
    }

    .blocksImages li {
        display: inline;
    }

    .blocksImages li img {
        border: 2px solid white;
        cursor: pointer;
    }

    .blocksImages li img:hover,
    .blocksImages li img.hover {
        border: 1px solid black;
    }

    .blocksImages li img.select {
        border: 3px solid green;
    }

    .galImages {
        height: 120px;
    }

    #cats {
        text-align: center;
    }

    .stylecats {
        margin: auto;
        padding: 10px;
        font-size: 20px;
    }

    .stylecats:hover {
        background-color: darkgray;
        color: white;
    }
</style>
<div id="dialog" title="Pick Blocks">
    <form>
        <fieldset>
            <div id="container" style="display:none;">
                <div>
                    <div id="cats">
                        <div class="stylecats" id="cat0">Variables</div>
                        <div class="stylecats" id="cat1">Logic</div>
                        <div class="stylecats" id="cat2">Loops</div>
                        <div class="stylecats" id="cat3">Text</div>
                        <div class="stylecats" id="cat4">Math</div>
                        <div class="stylecats" id="cat5">Arrays</div>
                        <div class="stylecats" id="cat6">Methods</div>
                        <div class="stylecats" id="cat7">Imports</div>
                        <div class="stylecats" id="cat8">Objects</div>
                        <div class="stylecats" id="cat9">Classes</div>
                        <div class="stylecats" id="cat10">Others</div>
                    </div>
                </div>
                <div id="contents">
                    <!-----------------------Variables------------------------->
                    <div style="margin-left:25%;padding:1px 16px;height:400px; overflow-y:scroll; display:none;" id="cont0">
                        <ul class="blocksImages" id="Variables">
                            <li><img class='galImages' value="<block type='define_variable2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/define_variable2.png' /></li>
                            <li><img class='galImages' value="<block type='for_initialization_value'></block>" src='<?php echo SITE_URL; ?>/img/blockly/for_initialization_value.png' /></li>
                            <li><img class='galImages' value="<block type='set_number'></block>" src='<?php echo SITE_URL; ?>/img/blockly/set_number.png' /></li>
                            <li><img class='galImages' value="<block type='set_number2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/set_number2.png' /></li>
                            <li><img class='galImages' value="<block type='var'></block>" src='<?php echo SITE_URL; ?>/img/blockly/var.png' /></li>
                        </ul>
                    </div>
                    <!-----------------------Logic--------------------------->
                    <div style="margin-left:25%;padding:1px 16px;height:400px; overflow-y:scroll; display:none;" id="cont1">

                        <ul class="blocksImages" id="Logic">
                            <li><img class='galImages' value="<block type='break'></block>" src='<?php echo SITE_URL; ?>/img/blockly/break.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='condition_block'></block>" src='<?php echo SITE_URL; ?>/img/blockly/condition_block.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='condition_block2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/condition_block2.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='continue'></block>" src='<?php echo SITE_URL; ?>/img/blockly/continue.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='false'></block>" src='<?php echo SITE_URL; ?>/img/blockly/false.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='for_iteration'></block>" src='<?php echo SITE_URL; ?>/img/blockly/for_iteration.png' id="d5" /></li>
                            <li><img class='galImages' value="<block type='for_iteration2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/for_iteration2.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='if'></block>" src='<?php echo SITE_URL; ?>/img/blockly/if.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='not'></block>" src='<?php echo SITE_URL; ?>/img/blockly/not.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='switch_con'> <field name='variable'>variable</field> <statement name='NAME'>                 <block type='switch'></block></statement> </block>" src='<?php echo SITE_URL; ?>/img/blockly/switch_con.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='true'></block>" src='<?php echo SITE_URL; ?>/img/blockly/true.png' id="d6" /></li>
                        </ul>
                    </div>
                    <!-----------------------Loops---------------------->
                    <div style="margin-left:25%;padding:1px 16px;height:400px; display:none;" id="cont2">
                        <ul class="blocksImages" id="Loops">
                            <li><img class='galImages' value="<block type='do_while'></block>" src='<?php echo SITE_URL; ?>/img/blockly/do_while.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='for_loop'></block>" src='<?php echo SITE_URL; ?>/img/blockly/for_loop.png' id="d6" />
                            </li>

                            <li><img class='galImages' value="<block type='while_loop'></block>" src='<?php echo SITE_URL; ?>/img/blockly/while_loop.png' id="d6" />
                        </ul>
                    </div>
                    <!-----------------------Text---------------------->
                    <div style="margin-left:25%;padding:1px 16px;height:400px;  display:none;" id="cont3">
                        <ul class="blocksImages" id="Text">
                            <li><img class='galImages' value="<block type='print'></block>" src='<?php echo SITE_URL; ?>/img/blockly/print.png' id="d4" /></li>
                            <li><img class='galImages' value="<block type='string'></block>" src='<?php echo SITE_URL; ?>/img/blockly/string.png' id="d4" /></li>
                        </ul>
                    </div>
                    <!----------Math------------------>
                    <div style="margin-left:25%;padding:1px 16px;height:400px; display:none;" id="cont4">
                        <ul class="blocksImages" id="Math">
                            <li><img class='galImages' value="<block type='math_functions'></block>" src='<?php echo SITE_URL; ?>/img/blockly/math_functions.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='math_functions2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/math_functions2.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='num'></block>" src='<?php echo SITE_URL; ?>/img/blockly/num.png' id="d5" /></li>

                        </ul>
                    </div>
                    <!------------Array---------->
                    <div style="margin-left:25%;padding:1px 16px;height:400px; display:none;" id="cont5">
                        <ul class="blocksImages" id="Array">
                            <li><img class='galImages' value="<block type='arraylist_clear'></block>" src='<?php echo SITE_URL; ?>/img/blockly/arraylist_clear.png' id="d5" /></li>
                            <li><img class='galImages' value="<block type='arraylist_functions'></block>" src='<?php echo SITE_URL; ?>/img/blockly/arraylist_functions.png' id="d5" /></li>
                            <li><img class='galImages' value="<block type='arraylist_functions2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/arraylist_functions2.png' id="d5" /></li>
                            <li><img class='galImages' value="<block type='arraylist_functions3'></block>" src='<?php echo SITE_URL; ?>/img/blockly/arraylist_functions3.png' id="d6" /></li>

                            <li><img class='galImages' value="<block type='array_operation'></block>" src='<?php echo SITE_URL; ?>/img/blockly/array_operation.png' id="d5" /></li>
                            <li><img class='galImages' value="<block type='define_array2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/define_array2.png' id="d5" /></li>
                            <li><img class='galImages' value="<block type='set_array'></block>" src='<?php echo SITE_URL; ?>/img/blockly/set_array.png' id="d6" /></li>
                        </ul>
                    </div>
                    <!----------Methods-------->
                    <div style="margin-left:25%;padding:1px 16px;height:400px; display:none;" id="cont6">
                        <ul class="blocksImages" id="Methods">
                            <li><img class='galImages' value="<block type='call_method'></block>" src='<?php echo SITE_URL; ?>/img/blockly/call_method.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='call_method2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/call_method2.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='convert'></block>" src='<?php echo SITE_URL; ?>/img/blockly/convert.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='equals'></block>" src='<?php echo SITE_URL; ?>/img/blockly/equals.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='format'></block>" src='<?php echo SITE_URL; ?>/img/blockly/format.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='length'></block>" src='<?php echo SITE_URL; ?>/img/blockly/length.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='main_method'></block>" src='<?php echo SITE_URL; ?>/img/blockly/main_method.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='new_method'></block>" src='<?php echo SITE_URL; ?>/img/blockly/new_method.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='next'></block>" src='<?php echo SITE_URL; ?>/img/blockly/next.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='return'></block>" src='<?php echo SITE_URL; ?>/img/blockly/return.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='string_functions'></block>" src='<?php echo SITE_URL; ?>/img/blockly/string_functions.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='test_condition'></block>" src='<?php echo SITE_URL; ?>/img/blockly/test_condition.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='tokenizer_functions'></block>" src='<?php echo SITE_URL; ?>/img/blockly/tokenizer_functions.png' id="d6" /></li>
                        </ul>
                    </div>
                    <!-------------Imports---------->
                    <div style="margin-left:25%;padding:1px 16px;height:400px; display:none;" id="cont7">
                        <ul class="blocksImages" id="Imports">
                            <li><img class='galImages' value="<block type='define_arraylist'></block>" src='<?php echo SITE_URL; ?>/img/blockly/define_arraylist.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='define_decimalformat'></block>" src='<?php echo SITE_URL; ?>/img/blockly/define_decimalformat.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='define_math'></block>" src='<?php echo SITE_URL; ?>/img/blockly/define_math.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='define_random'></block>" src='<?php echo SITE_URL; ?>/img/blockly/define_random.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='define_scanner'></block>" src='<?php echo SITE_URL; ?>/img/blockly/define_scanner.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='define_stringtokenizer'></block>" src='<?php echo SITE_URL; ?>/img/blockly/define_stringtokenizer.png' id="d6" /></li>


                        </ul>
                    </div>
                    <!-----------Objects------->
                    <div style="margin-left:25%;padding:1px 16px;height:400px; display:none;" id="cont8">
                        <ul class="blocksImages" id="Objects">
                            <li><img class='galImages' value="<block type='arraylist_define'></block>" src='<?php echo SITE_URL; ?>/img/blockly/arraylist_define.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='arraylist_define2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/arraylist_define2.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='decimal_format'></block>" src='<?php echo SITE_URL; ?>/img/blockly/decimal_format.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='random_define'></block>" src='<?php echo SITE_URL; ?>/img/blockly/random_define.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='random_define2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/random_define2.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='scanner'></block>" src='<?php echo SITE_URL; ?>/img/blockly/scanner.png' id="d6" /></li>
                            <li><img class='galImages' value="<block type='tokenizer_define'></block>" src='<?php echo SITE_URL; ?>/img/blockly/tokenizer_define.png' id="d6" /></li>

                        </ul>
                    </div>
                    <!-----------Classes------->
                    <div style="margin-left:25%;padding:1px 16px;height:400px; display:none;" id="cont9">
                        <ul class="blocksImages" id="Classes">
                            <li><img class='galImages' value="<block type='main_class'></block>" src='<?php echo SITE_URL; ?>/img/blockly/main_class.png' id="d" /></li>
                        </ul>
                    </div>
                    <!-----------Others------->
                    <div style="margin-left:25%;padding:1px 16px;height:400px; display:none;" id="cont10">
                        <ul class="blocksImages" id="Others">
                            <li><img class='galImages' value="<block type='array'></block>" src='<?php echo SITE_URL; ?>/img/blockly/array.png' id="d" /></li>
                            <li><img class='galImages' value="<block type='multi1'></block>" src='<?php echo SITE_URL; ?>/img/blockly/multi1.png' id="d" /></li>
                            <li><img class='galImages' value="<block type='multi2'></block>" src='<?php echo SITE_URL; ?>/img/blockly/multi2.png' id="d" /></li>
                            <li><img class='galImages' value="<block type='multi3'></block>" src='<?php echo SITE_URL; ?>/img/blockly/multi3.png' id="d" /></li>
                            <li><img class='galImages' value="<block type='try_catch'></block>" src='<?php echo SITE_URL; ?>/img/blockly/try_catch.png' id="d" /></li>
                            <li><img class='galImages' value="<block type='try_catch_finally'></block>" src='<?php echo SITE_URL; ?>/img/blockly/try_catch_finally.png' id="d" /></li>
                            <li><img class='galImages' value="<block type='error_msg'></block>" src='<?php echo SITE_URL; ?>/img/blockly/error_msg.png' id="d" /></li>
                        </ul>
                    </div>
                </div>
            </div>
            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px" />
        </fieldset>
    </form>
</div>
<div id="showTest">
    <?php
        $sql="Select * from testcase where pid=".$res['pid'];
        $res = DB::findAllFromQuery($sql);
        $counter=0;
            if($res){
                echo "<div class=\"text-center\"><h3>Test Cases</h3></div>";
                echo '<div id="table_prob_tag">';
                echo "<table  class='table table-hover'>";
                echo "<thead><tr><th>NO.</th><th>Input</th><th>Output</th></tr></thead>";
            }
            foreach ($res as $row) {
                echo "<tr><td>$counter</td><td>$row[input]</td><td>$row[output]</td></tr>";
                $counter++;
            }
        if($res){
            echo "</table></div>";
        }
    ?>
</div>
<script>
    var catN = document.getElementById("cats").children.length;
    for (var i = 0; i < catN; i++)
        document.getElementById("cat" + i).style.cursor = "pointer";

    function Create2DArray(rows) {
        var arr = [];
        for (var i = 0; i < rows; i++) {
            arr[i] = [];
        }
        HTMLTableCaptionElement
        return arr;
    }
//---------------------------------------------------Blockly Tool------------------------------------
    $(function() {
        var dialog, form, array = [];
        catName = ["Variables", "Logic", "Loops", "Text", "Math", "Array", "Methods", "Imports", "Objects", "Classes", "Others"];
        catColour = ["#805BA5", "#5B6DA5", "#E65B6D", "#5BA55B", "#5B80A5", "#A5935B", "#5BA55B", "#5BA5A5", "#A55B8C", "#5BA5A5", "#745BA5"];

        function Select() {
            var cats = Create2DArray(catN);
            var imgs = $("img.select");
            for (var j = 0; j < catN; j++) {
                var k = 0;
                for (var i = 0; i < imgs.length; i++) {
                    if (imgs[i].parentNode.parentNode.id == catName[j]) {
                        cats[j][k++] = imgs[i].getAttribute('value');
                    }
                }

            }
            //  alert(cats);
            var blockxml = '<xml id="toolbox" style="display: none">';
            for (var i = 0; i < catN; i++) {
                if (cats[i].length > 0) {
                    blockxml += '<category colour="' + catColour[i] + '" name="' + catName[i] + '">';
                    for (var j = 0; j < cats[i].length; j++)
                        blockxml += cats[i][j];
                    blockxml += '</category>';
                }
            }
            blockxml += "</xml>";
            document.getElementById("xml").innerHTML = blockxml;
            dialog.dialog("close");
        }

        function AllCats() {
            for (var j = 0; j < catN; j++) {
                var children = document.getElementById("cont" + j).getElementsByClassName("galImages");
                for (var i = 0; i < children.length; i++)
                    children[i].classList.add("select");
            }
        }

        function ClearAll() {
            var ContentID;
            for (var i = 0; i < catN; i++)
                if (document.getElementById("cont" + i).style.display != "none")
                    ContentID = i;
            var children = document.getElementById("cont" + ContentID).getElementsByClassName("galImages");
            for (var i = 0; i < children.length; i++)
                children[i].classList.remove("select");
        }

        function SelectAll() {
            var ContentID;
            for (var i = 0; i < catN; i++)
                if (document.getElementById("cont" + i).style.display != "none")
                    ContentID = i;
            var children = document.getElementById("cont" + ContentID).getElementsByClassName("galImages");
            for (var i = 0; i < children.length; i++)
                children[i].classList.add("select");
        }
        dialog = $("#dialog").dialog({
            autoOpen: false,
            height: 600,
            width: 1200,
            modal: true,
            buttons: {
                "Save": Select,
                "Clear All": ClearAll,
                "Select All": SelectAll,
                "Select All Categories": AllCats,
            },
            close: function() {
                $("#dialog").dialog('close');
            },
           open: function(){
            jQuery('.ui-widget-overlay').bind('click',function(){
                jQuery('#dialog').dialog('close');
                })
            }
        });

        $("#btest").click(function() {
            $("#dialog").dialog('open');
            document.getElementById("container").style.display = "block";
            document.getElementById("cont0").style.display = "block";
        });
    });


    var cats = document.getElementById("cats").children;
    for (var i = 0; i < cats.length; i++) {
        cats[i].addEventListener("click", function(event) {
            var catId = event.target.id;
            var parentCat = document.getElementById("contents");
            var allContent = parentCat.children;
            for (var j = 0; j < allContent.length; j++)
                allContent[j].style.display = "none";
            document.getElementById(catId.replace("cat", "cont")).style.display = "block";
        });
    }
    $(document).ready(function() {
        $(".galImages").click(function() {
            $(this).toggleClass("select");
        });
    });
//----------------------------------Auto Compile---------------------------------------------------
    $("#CodeSolution").change(function() {
                var code = new FormData();
                code.append("compilation", "Ask");
                code.append('file', $('#CodeSolution')[0].files[0]); code.append("CompilationCode",document.getElementById("CodeSolution"));
                $.ajax({ url: "<?php echo SITE_URL; ?>/process.php", type:"POST", data: code, processData: false, contentType: false, success: function(result) { var elem = document.getElementById("compilation"); elem.innerHTML = result; elem.style.fontWeight = "900"; if (result == "Compiled") { elem.style.color = "green"; } else { elem.style.color = "red"; document.getElementById("CodeSolution").value = ""; } }, error: function(data) { alert("error in sending request"); }, }) }); 
            /*    $("#input").change(function() { var code = new FormData(); code.append("InputTestCases", "Ask");
                code.append('file', $('#input')[0].files[0]); 
                code.append("CompilationCode",document.getElementById("SourceCode")); $.ajax({ url: "< ?php echo SITE_URL; ?>/process.php", type: "POST", data: code, processData: false, contentType: false, success: function(result) { document.getElementById("compilation").innerHTML = result; }, error: function(data) { alert("error in sending request"); }, }) });
                */
    
//-----------------------------------------------------------ShowTestCases------------------------------
$( function() {
    var testcases;
    testcases = $( "#showTest" ).dialog({
      autoOpen: false,
      height: 600,
      width: 1200,
      modal: true,
      close: function() {
           $("#showTest").dialog('close');
      },
      open: function(){
            jQuery('.ui-widget-overlay').bind('click',function(){
                jQuery('#showTest').dialog('close');
            })
        }
    });
        
     $( "#showTestCases" ).click(function(event) { 
         $("#showTest").dialog('open');
        });     
    
    testcases.bind('clickoutside',function(){
        testcases.dialog('close');
    });
    
    });
</script>
