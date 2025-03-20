<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description"
        content="This page has a form that allows a potential candidate to register their interest in the advertised position">
    <meta name="keywords" content="HTML, Form, Job application page">
    <meta name="quangdinh" content="hiii">
    <title>Job appication page</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/responsive.css">
</head>

<body>
    <?php
    include("menu.inc");
    ?>

    <!-- FORM BOX ----------------------------------------------------------------------------------------------------------------->
    <div class="grilloctopus-main-wrapper"> <!-- enable flexbox layout -->
        <div class="grilloctopus-form-wrapper"> <!-- edit form box size and add padding -->

            <form class="form-border" method="post" action="process_eoi.php" novalidate="novalidate">

                <!-- JOB REFERENCE NUMBER ------>
                <div class="grilledoctopus-mb-15"> <!-- make space, add 15 pixels of space below-->
                    <label for="job_number" class="grilledoctopus-form-label">Job reference number</label>
                    <!-- about the class grilledoctopus-form-label, its mainly edit font-size and color-->
                    <input type="text" id="job_number" name="job_reference" placeholder="FTD23 or AIE45"
                        pattern="^[a-zA-Z0-9]{5}$" required
                        class="grilledoctopus-form-input grilledoctopus-form-input-size-30">
                    <!-- use placeholder for better navigation -->
                    <!-- pattern = exactly 5 alphanumeric characters -->
                </div>

                <!-- FIRST NAME and LAST NAME ------->
                <div class="grilledoctopus-form-split grilledoctopus-mb-15">
                    <label for="first_name" class="grilledoctopus-form-label">Name</label>
                    <div>
                        <label for="first_name"> <!-- First name here -->
                            <input type="text" id="first_name" name="first_name" placeholder="First name"
                                pattern="^[a-zA-Z]{1,20}$" required class="grilledoctopus-form-input"> </label>
                        <!-- pattern = max 20 alpha characters -->

                        <label for="last_name"> <!-- Last name here -->
                            <input type="text" id="last_name" name="last_name" placeholder="Last name"
                                pattern="^[a-zA-Z]{1,20}$" required class="grilledoctopus-form-input"> </label>
                        <!-- pattern = max 20 alpha characters -->
                    </div>
                </div>

                <!-- DATE OF BIRTH ------->
                <div class="grilledoctopus-mb-15">
                    <label for="birthday" class="grilledoctopus-form-label">Date of Birth</label>
                    <input type="text" id="birthday" name="birthday" placeholder="dd/mm/yyyy" required class="grilledoctopus-form-input">
                </div>

                <!-- GENDER ------->
                <div>
                    <fieldset class="grilledoctopus-form-fieldset">
                        <!-- about the class, its maily edit border size and color, even make it a unique fieldset -->
                        <legend class="grilledoctopus-form-label">Gender</legend>
                        <div class="grilledoctopus-form-radio-container">
                            <!-- make a container for better use and manipulate in CSS -->
                            <label for="male">
                                <input type="radio" name="gender" id="male" value="male" required><span>Male</span>
                            </label>

                            <label for="female">
                                <input type="radio" name="gender" id="female" value="female"
                                    required><span>Female</span>
                            </label>

                            <label for="others">
                                <input type="radio" name="gender" id="others" value="others"
                                    required><span>Others</span>
                            </label>
                        </div>
                    </fieldset>
                </div>

                <br>

                <div class="grilledoctopus-form-split grilledoctopus-mb-15">
                    <label for="street_address" class="grilledoctopus-form-label">Address Info</label>
                    <div>
                        <!-- STREET ADDRESS ------->
                        <label for="street_address">
                            <input type="text" id="street_address" name="street_address" placeholder="Street address"
                                pattern="^.{1,40}$" required class="grilledoctopus-form-input"> </label>
                        <!-- pattern = max 40 characters -->

                        <!-- SUBURD/TOWN -->
                        <label for="suburb_or_town">
                            <input type="text" id="suburb_or_town" name="suburb_town" placeholder="Suburb / town"
                                pattern="^.{1,40}$" required class="grilledoctopus-form-input"> </label>
                        <!-- pattern = max 40 characters -->
                    </div>
                </div>

                <!-- STATE ------->
                <div class="grilledoctopus-form-split grilledoctopus-mb-15">
                    <div>
                        <label for="state" class="grilledoctopus-form-label">
                            <select id="state" name="state" required class="grilledoctopus-form-input">
                                <option value="">State</option>
                                <option value="VIC">VIC</option>
                                <option value="NSW">NSW</option>
                                <option value="QLD">QLD</option>
                                <option value="NT">NT</option>
                                <option value="WA">WA</option>
                                <option value="SA">SA</option>
                                <option value="TAS">TAS</option>
                                <option value="ACT">ACT</option>
                            </select></label>

                        <!-- POSTCODE ------->
                        <label for="postcode" class="grilledoctopus-form-label">
                            <input type="text" id="postcode" name="postcode" placeholder="Postcode" pattern="^\d{4}$"
                                required class="grilledoctopus-form-input grilledoctopus-form-input-size-30"></label>
                        <!-- pattern = exactly 4 digits-->
                    </div>
                </div>

                <div class="grilledoctopus-form-split grilledoctopus-mb-15">
                    <label for="email_address" class="grilledoctopus-form-label">Contact Info</label>
                    <div>
                        <!-- EMAIL ADDRESS ------->
                        <label for="email_address">
                            <input type="email" id="email_address" name="email_address" placeholder="Email address"
                                required class="grilledoctopus-form-input">
                        </label>

                        <!-- PHONE NUMBER ------->
                        <label for="phone_number">
                            <input type="text" id="phone_number" name="phone_number" placeholder="Phone number"
                                pattern="^[0-9](?:[0-9 ]{7,11})[0-9]$" required class="grilledoctopus-form-input">
                        </label>
                        <!-- pattern = 8 to 12 digits, or spaces -->
                    </div>
                </div>

                <!-- SKILLS LIST ------->
                <fieldset class="grilledoctopus-form-fieldset">
                    <legend class="grilledoctopus-form-label">Skills List</legend>
                    <label class="grilledoctopus-form-label">FTD23 Skills List (skip if you assign to AIE45)</label>

                    <label class="grilledoctopus-form-label">Technical Skills</label>

                    <label for="FTD23_skill1" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="FTD23_skill1" id="FTD23_skill1" value="FTD23 skill1">Proficiency
                        in JavaScript (ES6+), HTML5, and
                        CSS3.</label>
                    <label for="FTD23_skill2" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="FTD23_skill2" id="FTD23_skill2" value="FTD23 skill2">Experience
                        with modern frontend frameworks (React.js, Vue.js,
                        or Angular).</label>

                    <label for="FTD23_skill3" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="FTD23_skill3" id="FTD23_skill3" value="FTD23 skill3">Strong
                        understanding of CSS preprocessors (SASS/SCSS or
                        LESS).
                    </label>

                    <label for="FTD23_skill4" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="FTD23_skill4" id="FTD23_skill4" value="FTD23 skill4">Familiarity
                        with RESTful APIs, GraphQL, and AJAX for data
                        fetching.</label>

                    <label for="FTD23_skill5" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="FTD23_skill5" id="FTD23_skill5" value="FTD23 skill5">Knowledge of
                        version control systems (Git, GitHub, GitLab).
                    </label>

                    <label for="FTD23_skill6" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="FTD23_skill6" id="FTD23_skill6" value="FTD23 skill6">Experience in
                        frontend performance optimization
                        (minification, lazy loading, asset bundling).
                    </label> <br> <br>

                    <label class="grilledoctopus-form-label">Soft Skills</label>

                    <label for="FTD23_skill7" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="FTD23_skill7" id="FTD23_skill7" value="FTD23 skill7">Strong
                        analytical and problem-solving skills and critical thinking.
                    </label>
                    <label for="FTD23_skill8" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="FTD23_skill8" id="FTD23_skill8" value="FTD23 skill8">Excellent
                        communication and teamwork abilities.
                    </label>

                    <label for="FTD23_skill9" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="FTD23_skill9" id="FTD23_skill9" value="FTD23 skill9">Ability
                        to work in fast-paced environments and meet deadlines.
                    </label> <br> <br>
                    <hr>

                    <label class="grilledoctopus-form-label">AIE45 Skills List </label>

                    <label class="grilledoctopus-form-label">Technical Skills</label>

                    <label for="AIE45_skill1" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="AIE45_skill1" id="AIE45_skill1" value="AIE45 skill1">Strong
                        programming skills in languages such as Python, R, or Java.</label>
                    <label for="AIE45_skill2" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="AIE45_skill2" id="AIE45_skill2" value="AIE45 skill2">Experience
                        with machine learning frameworks and libraries (e.g.,
                        TensorFlow, PyTorch, scikit-learn).</label>

                    <label for="AIE45_skill3" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="AIE45_skill3" id="AIE45_skill3" value="AIE45 skill3">Proficiency
                        in data analysis and visualization tools.
                    </label>

                    <label for="AIE45_skill4" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="AIE45_skill4" id="AIE45_skill4" value="AIE45 skill4">Excellent
                        problem-solving abilities with a focus on delivering
                        practical AI solutions.</label>

                    <label for="AIE45_skill5" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="AIE45_skill5" id="AIE45_skill5" value="AIE45 skill5">Strong
                        understanding of statistical analysis and mathematical modeling.
                    </label> <br> <br>

                    <label class="grilledoctopus-form-label">Soft Skills</label>

                    <label for="AIE45_skill6" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="AIE45_skill6" id="AIE45_skill6" value="AIE45 skill6">Ability
                        to clearly articulate complex technical concepts to non-technical audiences.
                    </label>
                    <label for="AIE45_skill7" class="grilledoctopus-form-checkbox-container"> <br>
                        <input type="checkbox" name="AIE45_skill7" id="AIE45_skill7" value="AIE45 skill7">Strong
                        written and verbal communication skills.
                    </label>
                </fieldset>

                <br>
                <!--OTHER SKILLS -->
                <div class="grilledoctopus-mb-15">
                    <label class="grilledoctopus-form-label">Other skills</label>
                    <textarea class="textarea" name="other_skills"
                        placeholder="List and describe your other skills..."></textarea>
                </div>

                <!--SEND and RESET BUTTONS -->
                <input type="submit" id="submit_button" value="Send">
                <input type="reset" id="reset_button" value="Reset form">
            </form>
        </div>
    </div>
    <?php
    include("footer.inc");
    ?>
</body>

</html>
