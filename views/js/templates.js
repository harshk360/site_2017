$(function () {
  // Grab the template script
  var theTemplateScript = $("#member-template").html();

  // Compile the template
  var theTemplate = Handlebars.compile(theTemplateScript);

  // This is the default context, which is passed to the template
  var context = {
  members:[
  {
    name: "Omar Joya",
    email: "joya2@illinois.edu",
    year: "Senior",
    major: "Electrical Engineering",
    title: "Director",
    about: "Omar is a senior in Electrical Engineering with a minor in Technology and Management and is looking forward to his third year in the SITE Committee! In addition to being involved with all things engineering, he also plays the alto saxophone for the Marching Illini where he cheers on Illini athletics. With a passion for high school outreach and a love for his school, he is excited to share what it’s like to be an engineer at Illinois through SITE!",
    image: "../views/images/committee/ojoya.jpg"
  },
  {
    name: "Ethan Northcutt",
    email: "ethanrn2@illinois.edu",
    year: "Freshman",
    major: "Chemical Engineering",
    title: "Reservations Chair",
    about: "Ethan is a freshman studying Chemical Engineering. Going on SITE last year, he is very excited to be on the committee this year! Ethan enjoys painting and binge watching YouTube but when not in class or doing homework, he can be found playing ping pong at ISR.",
    image: "../views/images/committee/enorthcutt.jpg"
  },
  {
    name: "Srinija Kakumanu",
    email: "srinija2@illinois.edu",
    year: "Freshman",
    major: "Computer Engineering",
    title: "Activities Co-Chair",
    about: "Sri is a freshman in Computer Engineering from New Jersey. This is her second year being involved with SITE. Last year, she ended up deciding to come to Illinois after attending SITE! Sri loves reading, trying new foods and the Golden State Warriors.",
    image: "../views/images/committee/skakumanu.jpg"
  },
  {
    name: "Jazmyn Jimenez",
    email: "jajimen2@illinois.edu",
    year: "Senior",
    major: "General Engineering",
    title: "Activities Co-Chair",
    about: "Jazmyn is very excited to be on the SITE committee for the first time! She is a Senior in General Engineering with a concentration in Business Systems Integration and Consulting. When she's not doing all of her engineering homework, she can be found online shopping or watching the Food Network.",
    image: "../views/images/committee/jjimenez.jpg"
  },
  {
    name: "Jenni Nugent",
    email: "jnugent2@illinois.edu",
    year: "Sophomore",
    major: "Civil Engineering",
    title: "Volunteers Co-Chair",
    about: "Jenni is a sophomore in Civil Engineering that is on 3 Engineering Council committees - SITE, E-WEEK,and EOH. She is also on the Engineers Without Borders Malawi project. She can be found on campus sleeping in libraries or climbing trees to avoid studying. This is Jenni's first year on the SITE committee, but she was a participant in SITE 2015 and hosted for SITE 2016.",
    image: "../views/images/committee/jnugent.jpg"
  },
  {
    name: "Mia Alvergue",
    email: "alvergu2@illinois.edu",
    year: "Sophomore",
    major: "Mechanical Engineering",
    title: "Volunteers Co-Chair",
    about: "Mia, a sophomore in Mechanical Engineering, was originally born and raised in Montreal, Canada and now lives in the Chicago suburbs. Although it is her first year on SITE committee, it is her second year involved with Engineering Council. Other than being on SITE, she is involved with the E-Week Committee and Engineers Without Borders!",
    image: "../views/images/committee/malvergue.jpg"
  },
  {
    name: "Owen Flasch",
    email: "oflasch2@illinois.edu",
    year: "Sophomore",
    major: "Mechanical Engineering",
    title: "Banquet Chair",
    about: "Owen is a sophomore in Mechanical Engineering. He’s involved in two EC committees, and on the exec boards of NOBE and the MechSE Advancement Student Committee. He likes to spend his time playing musical instruments, going on adventures with his girlfriend, and wearing eccentric socks.",
    image: "../views/images/committee/oflasch.jpg"
  },
  {
    name: "Pratik Ainapure",
    email: "painap2@illinois.edu",
    year: "Sophomore",
    major: "Electrical Engineering",
    title: "Tours Chair",
    about: "Known for his over the top and eccentric website biographies, Pratik is a sophomore in Electrical Engineering major with an interest in sustainability. Outside of his interests in academia, Pratik enjoys reading, binge-watching TV, the NBA, “meme-ing”, and procrastinating.",
    image: "../views/images/committee/painapure.jpg"
  },
  {
    name: "Harshit Kumar",
    email: "hkumar5@illinois.edu",
    year: "Junior",
    major: "Computer Science",
    title: "Webmaster",
    about: "Harshit is a junior studying Computer Science with a special interest in NLP. This is his second year on the SITE committee. He loves Overwatch, Netflix and dystopian fiction.",
    image: "../views/images/committee/hkumar.jpg"
  },
  {
    name: "Karolina Rys",
    email: "rys2@illinois.edu",
    year: "Senior",
    major: "Computer Science",
    title: "Design Competition Co-Chair",
    about: "Karolina is a senior studying Computer Science. She attended SITE in high school and is excited to bring the same awesome experience to a new set of students. Karolina is also a member of Women in Computer Science and a staff member for HackIllinois. Outside of school, she likes to travel, play piano, and bake desserts.",
    image: "../views/images/committee/krys.jpg"
  },
  {
    name: "Sam Kaufman",
    email: "sikaufm2@illinois.edu",
    year: "Senior",
    major: "Material Science and Engineering",
    title: "Design Competition Co-Chair",
    about: "Born and raised in the Chicago suburbs, Sam is an avid skateboarder, musician and hair icon. This is his second year on SITE but his third as a part of Engineering Council. Besides SITE, he serves as an Engineering Learning Assistant for ENG 100 and enjoys dancing.",
    image: "../views/images/committee/skaufman.jpg"
  },
  {
    name: "Mark Hafter",
    email: "hafter1@illinois.edu",
    year: "Senior",
    major: "Computer Engineering",
    title: "Society Interaction Chair",
    about: "Mark, originally from Chicago’s Northern suburbs, is a Senior studying Computer Engineering with a minor in the Hoeft Technology & Management Program. He came to the U of I after completing military service in Israel as a commander in a technology-related position. Mark works for the College of Engineering as the Head Engineering Learning Assistant. In his free time, Mark enjoys cooking, playing music, and spending time with friends.",
    image: "../views/images/committee/mhafter.jpg"
  }
  ]};

  // Pass our data to the template
  var theCompiledHtml = theTemplate(context);

  // Add the compiled html to the page
  $('#committee-members').html(theCompiledHtml);
});

$(function () {
  // Grab the template script
  var theTemplateScript = $("#timeline-template").html();

  // Compile the template
  var theTemplate = Handlebars.compile(theTemplateScript);

  // This is the default context, which is passed to the template
  var context = {
  dates:[
  {
    title: "Regular admission decisions sent out",
    date: "February 3",
    bcolor: "blue",
    liClass: ""
  },
  {
    title: "SITE invitations sent out",
    date: "February 16",
    bcolor: "red",
    liClass: "timeline-inverted"
  },
  {
    title: "Registration opens",
    date: "February 20",
    bcolor: "blue",
    liClass: ""
  },
  {
    title: "Participant registration and waitlist closes",
    date: "March 11",
    bcolor: "red",
    liClass: "timeline-inverted"
  },
  {
    title: "Payment and permission slip due",
    date: "March 31",
    bcolor: "blue",
    liClass: ""
  },
  {
    title: "UIUC Spring Break",
    date: "March 18 - March 26",
    bcolor: "red",
    liClass: "timeline-inverted"
  },
  {
    title: "SITE", //(ﾉ^▽^)ﾉ
    date: "April 13 - April 15",
    bcolor: "blue",
    liClass: ""
  }
  ]};

  // Pass our data to the template
  var theCompiledHtml = theTemplate(context);

  // Add the compiled html to the page
  $('#timeline-list').html(theCompiledHtml);
});



$(function () {
  // Grab the template script
  var theTemplateScript = $("#timetable-template").html();

  // Compile the template
  var theTemplate = Handlebars.compile(theTemplateScript);

  // This is the default context, which is passed to the template
  var context = {
  days:[
  {
    id: "tab-day1",
    date: "Thursday, March 31",
    first: "yes",
    events: [
        {
          title: "Check-In",
          time: "10:00am-12:00pm",
          location: "Illini Union Room 406",
          icon: "fa-ticket"
        },
        {
          title: "Welcome Speaker",
          time: "12:00pm-1:00pm",
          location: "ARC Auditorium",
          icon: "fa-microphone"
        },
        {
          title: "Design Contest 1",
          time: "1:00pm-3:00pm",
          location: "ARC MP7 and Pool",
          icon: "fa-ship"
        },
        {
          title: "Hotel Check-In / Banquet Preparation / Free Time",
          time: "3:00pm-6:00pm",
          location: "Illini Union Hotel / TownePlace Suites",
          icon: "fa-clock-o"
        },
        {
          title: "Banquet & Speaker",
          time: "6:00pm-8:00pm",
          location: "ECEB Room 3002",
          icon: "fa-cutlery"
        },
        {
          title: "Bowling",
          time: "8:30pm-10:00pm",
          location: "Illini Union Rec Room",
          icon: "fa-hand-lizard-o"
        }
    ]
  },
  {
    id: "tab-day2",
    date: "Friday, April 1",
    events: [
        {
          title: "Breakfast / Hotel Check-Out",
          time: "6:30am-8:30am",
          location: "Illini Union Hotel / TownePlace Suites",
          icon: "fa-coffee"
        },
        {
          title: "Activities",
          time: "8:45am-10:00am",
          location: "ARC MP6",
          icon: "fa-users"
        },
        {
          title: "Panels / Leadership Activity",
          time: "10:00am-11:00am",
          location: "ARC MP6",
          icon: "fa-comments"
        },
        {
          title: "Lunch",
          time: "11:00am-12:00pm",
          location: "Ikenberry Dining Hall",
          icon: "fa-spoon"
        },
        {
          title: "Department Tours / Society Showcase / Free Time",
          time: "12:30pm-4:00pm",
          location: "Engineering Quad / DCL Basement",
          icon: "fa-map"
        },
        {
          title: "Design Contest 2",
          time: "4:00pm-6:00pm",
          location: "Kenney Gym",
          icon: "fa-cubes"
        },
        {
          title: "Dinner with Hosts / Check-Out with Hosts",
          time: "6:00pm-8:00pm",
          location: "1320 DCL",
          icon: "fa-moon-o"
        },
        {
          title: "Broomball",
          time: "10:00pm-12:00am",
          location: "Ice Arena",
          icon: "fa-trophy"
        }
    ]
  },
  {
    id: "tab-day3",
    date: "Saturday, April 2",
    events: [
        {
          title: "Breakfast",
          time: "10:00am-10:30pm",
          location: "100 MSEB",
          icon: "fa-coffee"
        },
        {
          title: "Slideshow / Awards / Closing",
          time: "10:30am-11:30am",
          location: "100 MSEB",
          icon: "fa-graduation-cap"
        }
    ]
  }
  ]};

  // Pass our data to the template
  var theCompiledHtml = theTemplate(context);

  // Add the compiled html to the page
  $('#timetablePanes').html(theCompiledHtml);
});
