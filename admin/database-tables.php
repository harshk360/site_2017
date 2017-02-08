<br>
<br>
<!-- Admin Participants Section  -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>SITE <span class="highlight">Database</span></h1>
                    <h2></h2>
                </div>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#tab-participantsTable"><h3>Participants</h3></a></li>
            <li><a data-toggle="tab" href="#tab-waitlistTable"><h3>Waitlist</h3></a></li>
            <li><a data-toggle="tab" href="#tab-volunteersTable"><h3>Volunteers</h3></a></li>
            </ul>

            <div class="row"><div id="alert-db-table" class="alert" role="alert"></div></div>

             <!-- Tab panes -->
            <div id="databaseTablePanes" class="tab-content">

            <div class="tab-pane fade in active" id="tab-participantsTable">
                <table id="participantsDataTable" class="table table-hover" style="width:100%">
                <thead><tr>
                <!--0--><th>Id</th>
                <!--1--><th>First Name</th>
                <!--2--><th>Last Name</th>
                <!--3--><th>Nick Name</th>
                <!--4--><th>Email</th>
                <!--5--><th>Phone</th>
                <!--6--><th>Street</th>
                <!--7--><th>Street 2</th>
                <!--8--><th>City</th>
                <!--9--><th>State</th>
                <!--10--><th>Zip</th>
                <!--11--><th>Parent/Guardian</th>
                <!--12--><th>Day Phone</th>
                <!--13--><th>Night Phone</th>
                <!--14--><th>Secondary</th>
                <!--15--><th>Secondary Phone</th>
                <!--16--><th>Health</th>
                <!--17--><th>Arrival</th>
                <!--18--><th>Depart Early</th>
                <!--19--><th>Shirt</th>
                <!--20--><th>Gender</th>
                <!--21--><th>Major</th>
                <!--22--><th>Tour 1</th>
                <!--23--><th>Tour 2</th>
                <!--22--><th>Activity 1</th>
                <!--23--><th>Activity 2</th>
                <!--24--><th>Interests</th>
                <!--25--><th>Want From SITE</th>
                </tr></thead>

                <tbody>
                <?
                // Iterate through all participants
                while($pRow=mysqli_fetch_array($participants_query)) {

                    // Display on screen
                    ?>
                    <tr>
                    <td><? echo $pRow['id']; ?></td>
                    <td><? echo $pRow['firstName']; ?></td>
                    <td><? echo $pRow['lastName']; ?></td>
                    <td><? echo $pRow['nickName']; ?></td>
                    <td><? echo $pRow['email']; ?></td>
                    <td><? echo $pRow['phone']; ?></td>
                    <td><? echo $pRow['street']; ?></td>
                    <td><? echo $pRow['street2']; ?></td>
                    <td><? echo $pRow['city']; ?></td>
                    <td><? echo $pRow['state']; ?></td>
                    <td><? echo $pRow['postalCode']; ?></td>
                    <td><? echo $pRow['parentName']; ?></td>
                    <td><? echo $pRow['parentDayPhone']; ?></td>
                    <td><? echo $pRow['parentNightPhone']; ?></td>
                    <td><? echo $pRow['secondaryName']; ?></td>
                    <td><? echo $pRow['secondaryPhone']; ?></td>
                    <td><? echo $pRow['healthIssues']; ?></td>
                    <td><? echo $pRow['arrival']; ?></td>
                    <td><? echo $pRow['departEarly']; ?></td>
                    <td><? echo $pRow['shirtSize']; ?></td>
                    <td><? echo $pRow['gender']; ?></td>
                    <td><? echo $pRow['major']; ?></td>
                    <td><? echo $pRow['tour1']; ?></td>
                    <td><? echo $pRow['tour2']; ?></td>
                    <td><? echo $pRow['activity1']; ?></td>
                    <td><? echo $pRow['activity2']; ?></td>
                    <td><? echo $pRow['interests']; ?></td>
                    <td><? echo $pRow['expectToGain']; ?></td>
                    </tr>

                <?} // end while loop
                ?>
                </tbody>
                </table>
            </div>

            <div class="tab-pane fade in" id="tab-waitlistTable">
                <table id="waitlistDataTable" class="table table-hover" style="width:100%">
                <thead><tr>
                <!--0--><th>Id</th>
                <!--1--><th>First Name</th>
                <!--2--><th>Last Name</th>
                <!--3--><th>Nick Name</th>
                <!--4--><th>Email</th>
                <!--5--><th>Phone</th>
                <!--6--><th>Street</th>
                <!--7--><th>Street 2</th>
                <!--8--><th>City</th>
                <!--9--><th>State</th>
                <!--10--><th>Zip</th>
                <!--11--><th>Parent/Guardian</th>
                <!--12--><th>Day Phone</th>
                <!--13--><th>Night Phone</th>
                <!--14--><th>Secondary</th>
                <!--15--><th>Secondary Phone</th>
                <!--16--><th>Health</th>
                <!--17--><th>Arrival</th>
                <!--18--><th>Depart Early</th>
                <!--19--><th>Shirt</th>
                <!--20--><th>Gender</th>
                <!--21--><th>Major</th>
                <!--22--><th>Tour 1</th>
                <!--23--><th>Tour 2</th>
                <!--22--><th>Activity 1</th>
                <!--23--><th>Activity 2</th>
                <!--24--><th>Interests</th>
                <!--25--><th>Want From SITE</th>
                <!--26--><th>Submitted</th>
                </tr></thead>

                <tbody>
                <?
                // Iterate through all waitlisted participants
                while($wRow=mysqli_fetch_array($waitlist_query)) {

                    // Display on screen
                    ?>
                    <tr>
                    <td><? echo $wRow['id']; ?></td>
                    <td><? echo $wRow['firstName']; ?></td>
                    <td><? echo $wRow['lastName']; ?></td>
                    <td><? echo $wRow['nickName']; ?></td>
                    <td><? echo $wRow['email']; ?></td>
                    <td><? echo $wRow['phone']; ?></td>
                    <td><? echo $wRow['street']; ?></td>
                    <td><? echo $wRow['street2']; ?></td>
                    <td><? echo $wRow['city']; ?></td>
                    <td><? echo $wRow['state']; ?></td>
                    <td><? echo $wRow['postalCode']; ?></td>
                    <td><? echo $wRow['parentName']; ?></td>
                    <td><? echo $wRow['parentDayPhone']; ?></td>
                    <td><? echo $wRow['parentNightPhone']; ?></td>
                    <td><? echo $wRow['secondaryName']; ?></td>
                    <td><? echo $wRow['secondaryPhone']; ?></td>
                    <td><? echo $wRow['healthIssues']; ?></td>
                    <td><? echo $wRow['arrival']; ?></td>
                    <td><? echo $wRow['departEarly']; ?></td>
                    <td><? echo $wRow['shirtSize']; ?></td>
                    <td><? echo $wRow['gender']; ?></td>
                    <td><? echo $wRow['major']; ?></td>
                    <td><? echo $wRow['tour1']; ?></td>
                    <td><? echo $wRow['tour2']; ?></td>
                    <td><? echo $wRow['activity1']; ?></td>
                    <td><? echo $wRow['activity2']; ?></td>
                    <td><? echo $wRow['interests']; ?></td>
                    <td><? echo $wRow['expectToGain']; ?></td>
                    <td><? echo $wRow['creationDate']; ?></td>
                    </tr>

                <?} // end while loop
                ?>
                </tbody>
                </table>
            </div>

            <div class="tab-pane fade in" id="tab-volunteersTable">
                <table id="volunteersDataTable" class="table table-hover" style="width:100%">
                <thead><tr>
                <!--0--><th>Id</th>
                <!--1--><th>First Name</th>
                <!--2--><th>Last Name</th>
                <!--3--><th>Netid</th>
                <!--4--><th>Phone</th>
                <!--5--><th>Gender</th>
                <!--6--><th>Home City</th>
                <!--7--><th>Home State</th>
                <!--8--><th>Home Country</th>
                <!--9--><th>Year</th>
                <!--10--><th>Major</th>
                <!--11--><th>Minor</th>
                <!--12--><th>Housing</th>
                <!--13--><th>Past Attendee</th>
                <!--14--><th>Multi-Host</th>
                <!--15--><th>Activity 1</th>
                <!--16--><th>Activity 2</th>
                <!--17--><th>EC Obligation</th>
                <!--18--><th>Interests</th>
                </tr></thead>

                <tbody>
                <?
                // Iterate through all volunteers
                while($vRow=mysqli_fetch_array($volunteers_query)) {

                    // Display on screen
                    ?>
                    <tr>
                    <td><? echo $vRow['id']; ?></td>
                    <td><? echo $vRow['firstName']; ?></td>
                    <td><? echo $vRow['lastName']; ?></td>
                    <td><? echo $vRow['netId']; ?></td>
                    <td><? echo $vRow['phone']; ?></td>
                    <td><? echo $vRow['gender']; ?></td>
                    <td><? echo $vRow['homeCity']; ?></td>
                    <td><? echo $vRow['homeState']; ?></td>
                    <td><? echo $vRow['homeCountry']; ?></td>
                    <td><? echo $vRow['year']; ?></td>
                    <td><? echo $vRow['major']; ?></td>
                    <td><? echo $vRow['minor']; ?></td>
                    <td><? echo $vRow['housing']; ?></td>
                    <td><? echo $vRow['pastAttendee']; ?></td>
                    <td><? echo $vRow['multiHost']; ?></td>
                    <td><? echo $vRow['activity1']; ?></td>
                    <td><? echo $vRow['activity2']; ?></td>
                    <td><? echo $vRow['engineeringSociety']; ?></td>
                    <td><? echo $vRow['interests']; ?></td>
                    </tr>

                <?} // end while loop
                ?>
                </tbody>
                </table>
            </div>


            </div>

        </div>
    </section>


    <section>
        <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <h2>How To Use</h2>
            <ul>
                <li class="h3">Column Sorting <p>Click on a column title to sort. Hold <b>SHIFT+CLICK</b> to sort by multiple columns.</p></li>
                <li class="h3">Column Reordering <p>Click, hold, and drag a column title. This will reset on a page refresh.</p></li>
                <li class="h3">Searching <p>Type in a keyword into the "Search" bar on the right hand side.</p></li>
                <li class="h3">Horizontal Scrolling <p>Drag the horizontal scroll bar at the bottom of the table or use the <b>LEFT/RIGHT</b> arrow keys to view the rest of the columns.</p></li>
                <li class="h3">Show X Entries <p>On the upper left hand side, click the dropdown to show the number of entries per page.</p></li>
                <li class="h3">Paging <p>On the upper or lower right hand side, click on the page number to view that page.</p></li>
                <li class="h3">Export to Excel <p>Buttons are on the upper left hand side. Click on "Excel" to export the entire table to a .xlsx file.</p></li>
                <li class="h3">Column Visibility <p>Buttons are on the upper left hand side. Click on "Column visibility" to hide specified columns from view.</p></li>
                <li class="h3">Get Email List <p>Buttons are on the upper left hand side. Click on "Get Email List" to retrieve a list of all emails from a table.</p></li>
                <li class="h3">Delete <p>Buttons are on the upper left hand side. Select a single row in the table, then click on "Delete" to remove an entry from the table. THIS REMOVES AN ENTRY FROM THE TABLE, SO MAKE SURE YOU SELECT THE CORRECT ROW.</p></li>
                <li class="h3">Accept <p>Buttons are on the upper left hand side. Select a single row in the table, then click on "Accept" to move an entry from the Waitlist table to the Participant table. THIS WILL SEND AN EMAIL TO THE PARTICIPANT, SO MAKE SURE YOU SELECT THE CORRECT ROW.</p></li>
            </ul>
        </div>
        </div>
        </div>
    </section>
