# site
I. Folder List
-----------------
1. /admin          HTML and PHP scripts for admin view of database tables
2. /includes       PHP libraries, database credentials, and settings for the website
3. /scripts        PHP scripts for registration
4. /views          HTML/CSS and JS files for the web pages
  */fonts    Font files
  */css      CSS files, non-minified files are written by me
  */js       Libraries (minified) are here; the non-minified files are written by me
  */images   Committee head shots and background images
  */files    Permission slip and timetable (permission slip is attached to an auto-email to participants: see /scripts/participant-signup/php



II. Important Files
-------------------
1. /includes/settings.php      Controls registration status, dates and emails across the website 
2. /includes/js/templates.js   Essentially a bunch of JSON objects of committee members, timeline dates, and timetable dates
3. /views/header.php           CSS and templates are included in this file
4. /views/footer.php           JS files are included in here
5. /views/main.php             Main page holding all the program info


III. Registration
-------------------
Here is the basic rundown of registration:
1. Participant
  *User signs up. /views/js/form.js validates the form. /scripts/participant-signup.php validates again (particularly the captcha) and adds the user entry into the database. Upon success, it sends an automatic congratulations email (with dates and an attached permission slip) to the user and an email to the webmaster. You will be getting a lot of emails once registration opens. Luckily, Google sorts and groups it for you.
2. Volunteer
  *Volunteer registration acts in very much the same way. No attachments in the auto-email.
