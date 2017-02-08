                    <li>
                        <a href="/?id=home">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#participant">Sign Up</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#participant-faq">FAQ</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?

    $participants_query = mysqli_query($connect_site, "SELECT * FROM participants")
                    or die("Can not query the TABLE! " . mysqli_error($connect_site));

?>


    <!-- Participant Register Section -->
    <section id="participant">
        <div class="container">
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
                <div class="col-lg-12 text-center">
<?  if ($PARTICIPANT_SIGNUPS_OPEN==true) {
        if($participants_query->num_rows < $MAX_PARTICIPANTS) {
?>
                    <h2>Participant <span class="highlight">Sign Up</span></h2>
                    <hr>
                    <h3>Space is limited and will fill quickly!</h3>
<?      }
        else { ?>
                    <h2>Participant <span class="highlight">Waiting List</span></h2>
                    <hr>
                    <h4>Demand is high. Fill out your information and we will notify you when space becomes available.</h4>
<?      }?>
                </div>
            </div>
            <div class="row">
                <form id="participantForm" method="post" action="#">
                <fieldset>
                <legend>Student Participant</legend>
                <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="text" class="form-control" name="firstName" id="firstName" value="" placeholder="First name">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="text" class="form-control" name="lastName" id="lastName" value="" placeholder="Last name">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="text" class="form-control" name="nickName" id="nickName" value="" placeholder="Nick name (optional)">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="email" class="form-control" name="email" id="email" value="" placeholder="Email address">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone number (e.g. 555.555.5555)">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-group-lg">
                    <div class="btn-group" data-toggle="buttons">
                    <label id="label-female" class="btn btn-radio-toggle"><input type="radio" class="form-control" name="gender" id="female" checked value="female">Female</label>
                    <label id="label-male" class="btn btn-radio-toggle"><input type="radio" class="form-control" name="gender" id="male" value="male">Male</label>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-5">
                    <div class="form-group form-group-lg">
                    <select class="form-control" name="shirt" id="shirt" value="">
                        <option value="" selected disabled>Shirt Size</option>
                        <option value="S">Small</option>
                        <option value="M">Medium</option>
                        <option value="L">Large</option>
                        <option value="XL">X-Large</option>
                        <option value="XXL">XX-Large</option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group form-group-lg">
                        <select class="form-control" name="major" id="major" value="">
                            <option value="" selected disabled>Expected major</option>
                            <option value="AeroE">Aerospace Engineering</option>
                            <option value="Agricultural">Agricultural and Biological Engineering</option>
                            <option value="BioE">Bioengineering</option>
                            <option value="ChemE">Chemical and Biomolecular Engineering</option>
                            <option value="Civil">Civil and Environmental Engineering</option>
                            <option value="CompE">Computer Engineering</option>
                            <option value="CompSci">Computer Science</option>
                            <option value="Electrical">Electrical Engineering</option>
                            <option value="EngPhysics">Engineering Physics</option>
                            <option value="Undeclared">Engineering Undeclared</option>
                            <option value="General">General Engineering</option>
                            <option value="Industrial">Industrial Engineering</option>
                            <option value="MatSE">Material Science and Engineering</option>
                            <option value="MechE">Mechanical Engineering</option>
                            <option value="Nuclear">Nuclear, Plasma, and Radiological Engineering</option>
                        </select>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group form-group-lg">
                    <textarea class="form-control" name="health" id="health" value="" placeholder="Any health issues we should know about." rows="3"></textarea>
                    </div>
                </div>
                </div>
                </fieldset>
                <fieldset>
                <legend>Address</legend>
                <div class="row">
                <div class="col-sm-5">
                    <div class="form-group form-group-lg">
                    <input type="text" class="form-control" name="street" id="street" value="" placeholder="Street">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group form-group-lg">
                    <input type="text" class="form-control" name="street2" id="street2" value="" placeholder="Street (optional)">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="text" class="form-control" name="city" id="city" value="" placeholder="City">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-lg" id="bloodhound-state">
                    <input class="form-control typeahead" type="text" name="state" id="state" value="" placeholder="State">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="text" class="form-control" name="zip" id="zip" value="" placeholder="Postal Code">
                    </div>
                </div>
                </div>
                </fieldset>
                <fieldset>
                <legend>Emergency Contacts</legend>
                <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="text" class="form-control" name="parentName" id="parentName" value="" placeholder="Parent or guardian full name">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="tel" class="form-control" name="parentDayPhone" id="parentDayPhone" placeholder="Day phone number (e.g. 555.555.5555)">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="tel" class="form-control" name="parentNightPhone" id="parentNightPhone" placeholder="Evening phone number (e.g. 555.555.5555)">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="text" class="form-control" name="secondaryName" id="secondaryName" value="" placeholder="Secondary contact full name" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-lg">
                    <input type="tel" class="form-control" name="secondaryPhone" id="secondaryPhone" placeholder="Phone number (e.g. 555.555.5555)">
                    </div>
                </div>
                </div>
                </fieldset>
                <fieldset>
                <legend>Travel Plans</legend>
                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group form-group-lg">
                    <select class="form-control" name="arrival" id="arrival" value="">
                        <option value="" selected disabled>Arrival Transportation</option>
                        <option value="car">Car (drop off/pick up)</option>
                        <option value="car-parking">Car (will need parking space)</option>
                        <option value="train">Train</option>
                        <option value="bus">Bus</option>
                        <option value="plane">Airplane</option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-group-lg checkbox">
                    <input type="checkbox" class="form-control" id="departEarly" name="departEarly" value="yes">
                    <label for="departEarly">Need to leave early</label>
                    </div>
                </div>
                </div>
                </fieldset>
                <fieldset>
                <legend>Host Matching</legend>
                <div class="row">
                <div class="col-sm-5">
                    <div class="form-group form-group-lg">
                        <select class="form-control" name="tour1" id="tour1" value="">
                            <option value="" selected disabled>1st Department Tour Preference</option>
                            <option value="AeroE">Aerospace Engineering</option>
                            <option value="Agricultural">Agricultural and Biological Engineering</option>
                            <option value="BioE">Bioengineering</option>
                            <option value="ChemE">Chemical and Biomolecular Engineering</option>
                            <option value="Civil">Civil and Environmental Engineering</option>
                            <option value="CompE">Computer Engineering</option>
                            <option value="CompSci">Computer Science</option>
                            <option value="Electrical">Electrical Engineering</option>
                            <option value="EngPhysics">Engineering Physics</option>
                            <option value="General">General Engineering</option>
                            <option value="Industrial">Industrial Engineering</option>
                            <option value="MatSE">Material Science and Engineering</option>
                            <option value="MechE">Mechanical Engineering</option>
                            <option value="Nuclear">Nuclear, Plasma, and Radiological Engineering</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group form-group-lg">
                        <select class="form-control" name="tour2" id="tour2" value="">
                            <option value="" selected disabled>2nd Department Tour Preference</option>
                            <option value="AeroE">Aerospace Engineering</option>
                            <option value="Agricultural">Agricultural and Biological Engineering</option>
                            <option value="BioE">Bioengineering</option>
                            <option value="ChemE">Chemical and Biomolecular Engineering</option>
                            <option value="Civil">Civil and Environmental Engineering</option>
                            <option value="CompE">Computer Engineering</option>
                            <option value="CompSci">Computer Science</option>
                            <option value="Electrical">Electrical Engineering</option>
                            <option value="EngPhysics">Engineering Physics</option>
                            <option value="General">General Engineering</option>
                            <option value="Industrial">Industrial Engineering</option>
                            <option value="MatSE">Material Science and Engineering</option>
                            <option value="MechE">Mechanical Engineering</option>
                            <option value="Nuclear">Nuclear, Plasma, and Radiological Engineering</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group form-group-lg">
                        <select class="form-control" name="activity1" id="activity1" value="">
                            <option value="" selected disabled>1st Activity Preference</option>
                            <option value="Dessert">Walking through Campustown and grabbing dessert</option>
                            <option value="Spectate">Watching a sporting event</option>
                            <option value="Observatory">Visiting the observatory in the evening</option>
                            <option value="ArcSports">Playing sports at the ARC recreation center</option>
                            <option value="CrceSwimming">Going swimming in the CRCE recreation center</option>
                            <option value="StayingIn">Staying in, enjoying a movie or playing video/board games</option>
                            <option value="LiveShow">Seeing a live performance or live music</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group form-group-lg">
                        <select class="form-control" name="activity2" id="activity2" value="">
                            <option value="" selected disabled>1st Activity Preference</option>
                            <option value="Dessert">Walking through Campustown and grabbing dessert</option>
                            <option value="Spectate">Watching a sporting event</option>
                            <option value="Observatory">Visiting the observatory in the evening</option>
                            <option value="ArcSports">Playing sports at the ARC recreation center</option>
                            <option value="CrceSwimming">Going swimming in the CRCE recreation center</option>
                            <option value="StayingIn">Staying in, enjoying a movie or playing video/board games</option>
                            <option value="LiveShow">Seeing a live performance or live music</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group form-group-lg">
                       <textarea class="form-control" name="interests" id="interests" value="" placeholder="List your extracurriculars, hobbies, and anything else we should know about you." rows="6"></textarea>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group form-group-lg">
                       <textarea class="form-control" name="hopes" id="hopes" value="" placeholder="What do you hope to gain out of this program? Are there any specific questions you'd like to have answered?" rows="6"></textarea>
                    </div>
                </div>
                </div>
                </fieldset>
                <div class="row"><div class="g-recaptcha" data-sitekey="6LcTexgTAAAAAF3AmILtRDyRJ6HJR2HNi6qrL__k"></div></div>
                <div class="row"><div id="alert-participants-form" class="alert" role="alert"></div></div>
                <div class="row">
                    <div class="col-sm-3"><button type="submit" class="btn-block butt"><h4>Submit</h4></button></div>
                    <div class="col-sm-3"><button type="reset" class="btn-block butt alt"><h4>Reset</h4></button></div>
                </div>
                </form>
            </div>
<?  }
    else { ?>
                    <h2>Participant <span class="highlight">Sign Up</span></h2>
                    <hr>
                    <h3>Registration for SITE <?echo $SITE_YEAR; ?> is closed. Please visit <a href="http://eib.ec.illinois.edu/" target="_blank">Engineering Council's EIB</a> if you are still interested in visiting campus.</h3>
<?  }?>
        </div>
    </section>



    <!-- FAQ Section -->
    <section id="participant-faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Any <span class="highlight">Questions?</span></h1>
                    <hr>
                </div>
            </div>
            <div class="panel-group" id="participant-faq-questions" role="tablist">

                <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#participant-faq-questions" href="#particpantFaq1">When is SITE?</h4>
                </div>
                <div id="particpantFaq1" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body"><? echo $SITE_MONTH[0] . " " . $SITE_DAY[0] . "-" . $SITE_MONTH[1] . " " . $SITE_DAY[2]; ?>. More details on dates, times, and locations will follow in an email as SITE approaches.</div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#participant-faq-questions" href="#particpantFaq2">What does the fee cover?</h4>
                </div>
                <div id="particpantFaq2" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">The <? echo $SITE_FEE ;?> attendance fee covers food (Thursday evening banquet, Friday breakfast/lunch/dinner, and Saturday morning breakfast) as well as housing (hotel room and lodging with student hosts). Note that the fee does not cover lunch on Thursday nor travel to Urbana-Champaign. You will have to arrange transportation on your own.</div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#participant-faq-questions" href="#particpantFaq3">Are parents allowed?</h4>
                </div>
                <div id="particpantFaq3" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">"Mooooooom, you're embarrassing meeee." This program is designed specifically for students only. Parents are welcome to attend the opening and closing ceremony. Other than that, parents should make their own housing and meal arrangments. Information about local hotels, restaurants, and attractions can be found at <a href="http://www.visitchampaigncounty.org/" target="_blank">Visit Champaign County</a>. The must eat places are <a href="http://www.blackdogsmoke.com/" target="_blank">Black Dog</a>, <a href="http://www.maizemexicangrill.com/" target="_blank">Maize</a>, and <a href="http://goldenharbor.weebly.com/" target="_blank">Golden Harbor</a>.</div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#participant-faq-questions" href="#particpantFaq4">Do you provide 24-hour supervision?</h4>
                </div>
                <div id="particpantFaq4" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">No, we provide 24-hour assistance. While all committee members are on-call for the duration of the program, we treat students as we would any person who takes on the responsibility of atttending a four-year university.</div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#participant-faq-questions" href="#particpantFaq5">Can you provide transportation from the bus stop, train station, or Willard airport?</h4>
                </div>
                <div id="particpantFaq5" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">Yes, please send an email request to us at site@ec.illinois.edu as soon as possible.</div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#participant-faq-questions" href="#particpantFaq6">Will there be sleeping accommodations?</h4>
                </div>
                <div id="particpantFaq6" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">Yes, participants will spend the first night at the Illini Union hotel, located at 1401 W. Green St., Urbana, Illinois, or the TownePlace Suites, located at 603 S. 6th St, Champaign, IL 61820. Participants will stay 2 to a room. They will spend the second night with a volunteer host at either the dorms or their apartments. You will need a sleeping bag and pillow for that night!</div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#participant-faq-questions" href="#particpantFaq7">When will I be notified of selection?</h4>
                </div>
                <div id="particpantFaq7" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">If you registered online, an email is already sitting in your inbox, confirming whether or not you are a SITE participant. If you are on the waiting list, we will notify you as soon as space opens up.</div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#participant-faq-questions" href="#particpantFaq8">When is payment due and whom do I address it to?</h4>
                </div>
                <div id="particpantFaq8" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">Please send your check for <? echo $SITE_FEE ;?> payable to Engineering Council, along with the signed visitation permission slip, to the address '103C Engineering Hall, 1308 W. Green Street, Urbana, IL 61801'. Your payment and permission slip need to be received by <? echo $SITE_FEEDATE[0] . " " . $SITE_FEEDATE[1] ;?>.<br><br> If your payment is not received by this date, your space will be given to someone on the waiting list. If you were placed on the waiting list, please do not send any payment until we contact you again.</div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#participant-faq-questions" href="#particpantFaq9">I am flying in from out-of-state. How can I get to campus?</h4>
                </div>
                <div id="particpantFaq9" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">There are two airports to fly into: <b>Willard Airport</b> (which you can only fly into from Chicago O'Hare or from Dallas-Ft. Worth) and <b>Chicago O'Hare</b>.<br><br>From Willard, you will need to take a taxi or Uber to campus.<br><br>From O'Hare, you can take a bus. We recommend <a href="https://peoriacharter.com/schedule.php?tt=OW" target="_blank">Peoria Charter</a>. An alternative is <a href="http://suburbanexpress.com/indexuiuc.html" target="_blank">Suburban Express</a>, but as a fair warning, please be careful to follow their rules. Getting off at Panda Express or Altgeld will get you very close to the Union and Engineering Hall.<br><br>Amtrak is also a viable route, but they tend to be late and only stop at Union Station in Chicago and Illinois Terminal in Champaign.</div>
                </div>
                </div>

                <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#participant-faq-questions" href="#particpantFaq10">What if I no longer can't/don't want to attend?</h4>
                </div>
                <div id="particpantFaq10" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">That's okay! Please let us know as soon as possible via email. We have limited space and would like to extend this opportunity to as many students as possible. If you already paid the attendance fee, we unfortunately cannot refund it as all reservations for SITE are made in advance.</div>
                </div>
                </div>

            </div>
        </div>
    </section>
