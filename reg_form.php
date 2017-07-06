
<?php include("header.html"); ?>

<?php include("top.html"); ?>

<!-- Main page starts here -->

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr>

<!-- Call right side menu -->

<?php include("r_menu.html"); ?>
<td width="100%" height="100%" valign="top">
<!-- Actual content goes here -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="100%" height="1376" valign="top"><p>&nbsp;</p>            
		  <p class="mainbodyheader">Online Registration Form</p>
		  <p class="mainbody">Please complete the form below to registration for 2004/2005
		    semester</p>


		  <table border="0" cellpadding="3" cellspacing="3">
              <tr>
                <td width="32%">Student's Name (Korean)</td>
                <td width="68%">
                  <input name="Korean_Name" size="35">
                </td>
              </tr>
              <tr>

                <td width="32%">Student's Name (English)</td>
                <td width="68%">
                  <input name="English_Name" size=35>
                </td>
              </tr>
              <tr>
                <td width="35%">Student's Age</td>
                <td width="65%">

                  <input name="Age" size=11>
                </td>
              </tr>
              <tr>
                <td width="35%">Student's Grad</td>
                <td width="65%"><input type="text" name="Grade" size="11">
                </td>
              </tr>

              <tr>
                <td width="35%"><font face="Arial" size="2">Place of Birth <br>
      (State, Country)</font></td>
                <td width="65%">
                  <input name="Birth_Place" size=35>
                </td>
              </tr>
              <tr>

                <td width="35%"><font face="Arial" size="2">Street Address</font></td>
                <td width="65%"><input type="text" name="Street" size="35">
                </td>
              </tr>
              <tr>
                <td width="35%"><font face="Arial" size="2">City, State, Zip
                    Code</font></td>
                <td width="65%"><input type="text" name="city_state_zip" size="35">
                </td>

              </tr>
              <tr>
                <td width="35%"><font face="Arial" size="2">Telephone</font></td>
                <td width="65%">
                  <input name="Phone" size=35>
                </td>
              </tr>
              <tr>

                <td width="35%"><font face="Arial" size="2">Email</font></td>
                <td width="65%">
                  <input name="Email" size=35>
                </td>
              </tr>
              <tr>
                <td width="35%"><font face="Arial" size="2">Parent's Name</font></td>
                <td width="65%">

                  <input name="Parent_Name" size=35>
                </td>
              </tr>
              <tr>
                <td width="35%"><font face="Arial" size="2">Emergency Contact
                    Information</font></td>
                <td width="65%">
                  <textarea name="Emergency" rows=5 cols=35></textarea>
                </td>

              </tr>
              <tr>
                <td width="35%"><font face="Arial" size="2">Special Request <br>
      (Dietary, Medical, etc.)</font></td>
                <td width="65%">
                  <textarea name="Special_Request" rows=5 cols=35></textarea>
                </td>
              </tr>

              <tr>
                <td width="35%"><font face="Arial" size="2">Comments</font></td>
                <td width="65%">
                  <textarea name="Comments" rows=5 cols=35></textarea>
                </td>
              </tr>
            </table>            <p class="mainbody" style="line-height: 150%">&nbsp;</p>
            <p class="mainbody" style="line-height: 150%">

              <INPUT name="SUBMIT" TYPE=SUBMIT VALUE="Submit Form">
              <INPUT name="RESET" TYPE=RESET VALUE="Reset Form">
              <b><font color="#0000FF"> </font></b></p>
          </td>
        </tr>
     </table>

</td>
</tr></table>

<?php include("bottom.html"); ?>


