$(document).ready(function(){

     // constructs the suggestion engine
    var states = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // `states` is an array of state names defined in "The Basics"
      local: ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
      'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
      'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
      'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
      'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
      'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
      'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
      'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
      'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming']
    });

    $('#bloodhound-state .typeahead').typeahead({
      hint: false,
      highlight: true,
      minLength: 1
    },
    {
      name: 'states',
      source: states
    });


     // constructs the suggestion engine
    var countries = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // `states` is an array of state names defined in "The Basics"
      local: ["Andorra","United Arab Emirates","Afghanistan","Antigua and Barbuda","Anguilla","Albania","Armenia","Angola","Antarctica","Argentina","American Samoa","Austria","Australia","Aruba","Åland","Azerbaijan","Bosnia and Herzegovina","Barbados","Bangladesh","Belgium","Burkina Faso","Bulgaria","Bahrain","Burundi","Benin","Saint Barthélemy","Bermuda","Brunei","Bolivia","Bonaire","Brazil","Bahamas","Bhutan","Bouvet Island","Botswana","Belarus","Belize","Canada","Cocos [Keeling] Islands","Congo","Central African Republic","Republic of the Congo","Switzerland","Ivory Coast","Cook Islands","Chile","Cameroon","China","Colombia","Costa Rica","Cuba","Cape Verde","Curacao","Christmas Island","Cyprus","Czechia","Germany","Djibouti","Denmark","Dominica","Dominican Republic","Algeria","Ecuador","Estonia","Egypt","Western Sahara","Eritrea","Spain","Ethiopia","Finland","Fiji","Falkland Islands","Micronesia","Faroe Islands","France","Gabon","United Kingdom","Grenada","Georgia","French Guiana","Guernsey","Ghana","Gibraltar","Greenland","Gambia","Guinea","Guadeloupe","Equatorial Guinea","Greece","South Georgia and the South Sandwich Islands","Guatemala","Guam","Guinea-Bissau","Guyana","Hong Kong","Heard Island and McDonald Islands","Honduras","Croatia","Haiti","Hungary","Indonesia","Ireland","Israel","Isle of Man","India","British Indian Ocean Territory","Iraq","Iran","Iceland","Italy","Jersey","Jamaica","Jordan","Japan","Kenya","Kyrgyzstan","Cambodia","Kiribati","Comoros","Saint Kitts and Nevis","North Korea","South Korea","Kuwait","Cayman Islands","Kazakhstan","Laos","Lebanon","Saint Lucia","Liechtenstein","Sri Lanka","Liberia","Lesotho","Lithuania","Luxembourg","Latvia","Libya","Morocco","Monaco","Moldova","Montenegro","Saint Martin","Madagascar","Marshall Islands","Macedonia","Mali","Myanmar [Burma]","Mongolia","Macao","Northern Mariana Islands","Martinique","Mauritania","Montserrat","Malta","Mauritius","Maldives","Malawi","Mexico","Malaysia","Mozambique","Namibia","New Caledonia","Niger","Norfolk Island","Nigeria","Nicaragua","Netherlands","Norway","Nepal","Nauru","Niue","New Zealand","Oman","Panama","Peru","French Polynesia","Papua New Guinea","Philippines","Pakistan","Poland","Saint Pierre and Miquelon","Pitcairn Islands","Puerto Rico","Palestine","Portugal","Palau","Paraguay","Qatar","Réunion","Romania","Serbia","Russia","Rwanda","Saudi Arabia","Solomon Islands","Seychelles","Sudan","Sweden","Singapore","Saint Helena","Slovenia","Svalbard and Jan Mayen","Slovakia","Sierra Leone","San Marino","Senegal","Somalia","Suriname","South Sudan","São Tomé and Príncipe","El Salvador","Sint Maarten","Syria","Swaziland","Turks and Caicos Islands","Chad","French Southern Territories","Togo","Thailand","Tajikistan","Tokelau","East Timor","Turkmenistan","Tunisia","Tonga","Turkey","Trinidad and Tobago","Tuvalu","Taiwan","Tanzania","Ukraine","Uganda","U.S. Minor Outlying Islands","United States","Uruguay","Uzbekistan","Vatican City","Saint Vincent and the Grenadines","Venezuela","British Virgin Islands","U.S. Virgin Islands","Vietnam","Vanuatu","Wallis and Futuna","Samoa","Kosovo","Yemen","Mayotte","South Africa","Zambia","Zimbabwe"]
    });

    $('#bloodhound-country .typeahead').typeahead({
      hint: false,
      highlight: true,
      minLength: 1
    },
    {
      name: 'countries',
      source: countries,
      limit: 10
    });



    // constructs the societies suggestion engine
    var minors = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: [
        "Adult Development",
        "African Studies",
        "African-American Studies",
        "Aging",
        "Agricultural Safety and Health",
        "American Indian Studies",
        "Animal Sciences",
        "Anthropology",
        "Arabic Studies",
        "Architectural Studies",
        "Art + Design",
        "Art History",
        "Asian American Studies",
        "Astronomy",
        "Atmospheric Sciences",
        "Bioengineering",
        "Biomolecular Engineering",
        "Business for Non-Business Majors",
        "Chemistry",
        "Cinema Studies",
        "Civic Leadership",
        "Classical Archaeology",
        "Classical Civilization",
        "Communication",
        "Community-Based Art Education",
        "Computational Science and Engineering",
        "Computer Science",
        "Crop and Soil Management",
        "Earth, Society, and Environment",
        "East Asian Languages and Cultures",
        "Ecology and Conservation Biology",
        "Electrical and Computer Engineering",
        "English",
        "English as a Second Language",
        "English as a Second Language, Teacher Education",
        "Environmental Economics and Law",
        "Environmental Fellows Program",
        "Food and Agribusiness Management",
        "Food and Environmental Systems",
        "Food Science",
        "French",
        "Gender and Women's Studies",
        "Geography and GIS",
        "Geology",
        "German",
        "Global Studies",
        "Global Labor Studies",
        "Greek",
        "Hindi Studies",
        "History",
        "Horticulture",
        "Informatics",
        "Integrative Biology",
        "International Development Economics",
        "International Minor in ACES",
        "International Minor in Engineering",
        "Islamic World, Study of the",
        "Italian",
        "Jewish Culture and Society",
        "Landscape Studies",
        "Latin",
        "Latin American Studies",
        "Latina/Latino Studies",
        "Leadership Studies",
        "LGBT/Queer Studies",
        "Linguistics",
        "Materials Science and Engineering",
        "Mathematics",
        "Mathematics: Grades 6-8, Teacher Education",
        "Mathematics: Grades 9-12, Teacher Education",
        "Medieval Studies",
        "Molecular and Cellular Biology",
        "Music",
        "Natural Resource Conservation",
        "Nutrition",
        "Philosophy",
        "Physics",
        "Political Science",
        "Political and Civic Leadership",
        "Polymer Science and Engineering",
        "Portuguese",
        "Religious Studies",
        "Russian, East European and Eurasian Studies",
        "Russian Language and Literature",
        "Scandinavian Studies",
        "Science and Technology in Society",
        "Slavic Language, Literature and Culture",
        "Social Work",
        "Sociology",
        "South Asian Studies",
        "Spanish",
        "Spatial and Quantitative Methods in Natural Resources and Environmental Sciences",
        "Speech and Hearing Science",
        "Statistics",
        "Sub-Saharan African Languages",
        "Teacher Education Minor in Secondary School Teaching",
        "Technical Systems Management",
        "Technology and Management",
        "Theatre",
        "Urban Planning",
        "World Literature"
      ]
    });

    $('#bloodhound-minor .typeahead').typeahead({
      hint: false,
      highlight: true,
      minLength: 1
    },
    {
      name: 'minors',
      source: minors
    });



// constructs the societies suggestion engine
var societies = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: ['ACI - American Concrete Institute',
        'ACM - Association of Computing Machinery',
        'AE - Alpha Epsilon',
        'AIAA - American Institute of Aeronautics and Astronautics',
        'AIChE - American Institute of Chemical Engineers',
        'ALG - Illini Algae Club',
        'ANS - American Nuclear Society',
        'AOE - Alpha Omega Epsilon',
        'AREMA - American Railway Engineering and Maintenance-of-Way Association ',
        'ASABE - American Society of Agricultural and Biological Engineers',
        'ASCE - American Society of Civil Engineers',
        'ASEE - American Society for Engineering Education',
        'ASME - American Society of Mechanical Engineers',
        'AXE - Alpha Chi Sigma',
        'BAJA - Offroad Illini SAE Baja',
        'BMES - Biomedical Engineering Society',
        'BTC - Bridge to China',
        'CC - Civil China',
        'CMAA - Construction Management Association of America',
        'DBF - Design, Build, Fly',
        'DFA - Design for America',
        'DISE - Diversity in ISE',
        'EERI - Earthquake Engineering Research Institute',
        'EI - Engineering Initiatives',
        'EOS - Engineering Outreach Society',
        'ESAA - Engineering Student Alumni Ambassadors ',
        'EWB - Engineers Without Borders',
        'FEC - Financial Engineering Club',
        'Founders - Founders',
        'GE - Gamma Epsilon',
        'GESO - Geotechnical Engineering Student Organization',
        'HKN - Eta Kappa Nu',
        'IAC - Illini Automotive Club',
        'IBI - Illinois Biodiesel Initiative',
        'IEEE - Institute of Electrical and Electronic Engineers',
        'IFE - Illini Formula Electric',
        'IIE - Institute of Industrial Engineers',
        'IM - Illini Motorsports',
        'INFORMS -  Institute for Operations Research and Management Sciences',
        'InSPIRE - Institute for Solar Photovoltaic Innovation, Research, and Edu-training',
        'IRIS - Illinois Robotics in Space',
        'iRobotics - iRobotics',
        'ISC- Illini Solar Car',
        'ISGE - Illinois Society of General Engineers',
        'ISS - Illinois Space Society',
        'ITE - Institute of Transportation Engineers',
        'KERAMOS - Keramos',
        'MA - Material Advantage',
        'Makers - Makers UIUC',
        'NOBE - National Organization for Business and Engineering',
        'NSBE - National Society of Black Engineers',
        'oSTEM - Out in Science, Technology, Engineering, and Mathematics',
        'OXE - Omega Chi Epsilon',
        'PSR - Phi Sigma Rho',
        'PTS - Pi Tau Sigma-Mechanical Engineering Honor Society',
        'Pullers - Illini Pullers',
        'PULSE - ECE Pulse',
        'PURE - Promoting Undergraduate Research in Engineering',
        'Rube - Rube Goldberg Society',
        'SAB - Student Aircraft Builders',
        'SAEDS - South Asian Engineering Development Society',
        'SASE - Society of Asian Scientists and Engineers',
        'SatDev - The Satellite Development Organization',
        'SD - Solar Decathlon',
        'SEA - Structural Engineers Association',
        'SEM - Society of Experimental Mechanics',
        'SFPE - Society of Fire Protection Engineers',
        'SHPE - Society of Hispanic Professional Engineers',
        'SPD - Sigma Phi Delta',
        'SPS- Society of Physics Students',
        'SSS - Student Space Systems',
        'SWE - Society of Women Engineers',
        'SWIP - Society for Women in Physics',
        'TBP - Tau Beta Pi',
        'THETATAU - Theta Tau',
        'Triangle - Triangle Fraternity',
        'USGBC - U.S. Green Building Council',
        'WCS - Women in Computer Science',
        'WECE - Women in Electrical and Computer Engineering',
        'WEF/AWWA - Water Environment Federation/American Water Works Association ',
        'WIDE - Wide Impact Development Engineering',
        'XE - Chi Epsilon']
    });

    $('#bloodhound-society .typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    },
    {
        name: 'societies',
        source: societies,
        limit: 10
    });


});