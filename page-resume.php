<?php get_header(); ?>

<main class="resume-page page" id="main" role="main">
  <h1 class="visually-hidden">Resume</h1>

  <div class="controls">
    <div class="column">
      <fieldset class="version">
        <legend>Version</legend>

        <div class="options">
          <input type="radio" id="full" class="visually-hidden" name="version" value="full" checked>
          <label for="full">Full</label>

          <input type="radio" id="web" class="visually-hidden" name="version" value="web">
          <label for="web">Web only</label>
        </div>
      </fieldset>
    </div>

    <div class="column">
      <a href="/wp-content/themes/minimal-for-jasonwebbio/resumes/Jason-Webb-resume.pdf" class="download button is-link">
        <span class="icon">
          <span class="fa fa-file-pdf-o"></span>
        </span>

        <span>Download resume as PDF</span>
      </a>
    </div>
  </div>

  <section id="mission" aria-label="Mission statement">
    <h2>Mission</h2>

    <p class="is-web-only is-hidden">Front-end and UI developer with a passion for design, armed with a background in computer
      science and the arts. Seeking to work at the intersection of technical and creative perspectives to realize
      meaningful and modern interfaces and experiences using state-of-the-art skills and tools.</p>

    <!-- TODO: toggle aria-hidden based on which is on screen -->
    <p class="is-non-web-only is-non-web" aria-hidden="true">Creative technologist, maker, open-source hardware engineer, community
      educator and lover of learning with a passion for the creative interplay between fine art, science and
      technology. With a background in both computer science and education, as well strong experience in the arts, I am
      keenly interested in working at the intersection of a diverse array of fields and helping others learn how to
      cross traditional borders and expand their skillsets.</p>
  </section>

  <section id="skills" aria-label="Skills">
    <h2>Skills</h2>

    <div class="columns is-gapless is-multiline">
      <div class="column is-half">
        <div class="skill-group">
          <h3 class="has-text-centered">Web</h3>

          <ul>
            <li>HTML <progress class="progress is-info is-pulled-right" value="10" max="10">10/10</progress></li>
            <li>CSS
              <ul>
                <li>Preprocessors <small>(Sass + LESS)</small> <progress class="progress is-info is-pulled-right" value="8" max="10">8/10</progress></li>
                <li>Frameworks <small>(Bootstrap, Bulma, more)</small> <progress class="progress is-info is-pulled-right" value="10" max="10">10/10</progress></li>
                <li>Patterns <small>(ITCSS, SMACSS, BEM, more)</small> <progress class="progress is-info is-pulled-right" value="8" max="10">8/10</progress></li>
              </ul>
            </li>
            <li>JavaScript
              <ul>
                <li>Vanilla ES5 <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress></li>
                <li>ES6 syntax <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress></li>
                <li>Backbone <progress class="progress is-info is-pulled-right" value="5" max="10">5/10</progress></li>
                <li>React <progress class="progress is-info is-pulled-right" value="4" max="10">4/10</progress></li>
                <li>Angular <progress class="progress is-info is-pulled-right" value="2" max="10">2/10</progress></li>
                <li>Vue <progress class="progress is-info is-pulled-right" value="2" max="10">2/10</progress></li>
                <li>jQuery <progress class="progress is-info is-pulled-right" value="10" max="10">10/10</progress></li>
              </ul>
            </li>

            <li>Accessibility <small>(Section 508, WCAG, ARIA)</small> <progress class="progress is-info is-pulled-right" value="9" max="10">9/10</progress></li>
            <li>Responsive techniques <progress class="progress is-info is-pulled-right" value="9" max="10">9/10</progress></li>
            <li>Build systems <small>(Gulp, Grunt, Webpack)</small> <progress class="progress is-info is-pulled-right" value="8" max="10">8/10</progress></li>
          </ul>

          <ul>
            <li>Wordpress <progress class="progress is-info is-pulled-right" value="7" max="10">7/10</progress></li>
            <li>PHP <small>(incl. Laravel + CodeIgniter)</small> <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress></li>
            <li>MySQL <progress class="progress is-info is-pulled-right" value="3" max="10">3/10</progress></li>
            <li>C# ASP.NET MVC <progress class="progress is-info is-pulled-right" value="2" max="10">2/10</progress></li>
          </ul>
        </div>

        <div class="skill-group is-non-web">
          <h3 class="has-text-centered">Fabrication</h3>

          <ul>
            <li>Woodworking <progress class="progress is-info is-pulled-right" value="3" max="10">3/10</progress></li>
            <li>Welding <small>(MIG)</small> <progress class="progress is-info is-pulled-right" value="2" max="10">2/10</progress></li>
            <li>CNC routing + milling <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress></li>
            <li>3D printing <progress class="progress is-info is-pulled-right" value="9" max="10">9/10</progress></li>
            <li>Laser cutting <progress class="progress is-info is-pulled-right" value="8" max="10">8/10</progress></li>
          </ul>
        </div>
      </div>

      <div class="column is-half">
        <div class="skill-group">
          <h3 class="has-text-centered">Design</h3>

          <ul>
            <li>2D
              <ul>
                <li>Wireframing <small>(Zeplin, Axure)</small> <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress></li>
                <li>Photoshop <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress>
                <li>Illustrator <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress>
                <li>Inkscape <progress class="progress is-info is-pulled-right" value="5" max="10">5/10</progress>
              </ul>
            </li>

            <li class="is-non-web">3D
              <ul>
                <li>Fusion 360 <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress>
                <li>OpenSCAD <progress class="progress is-info is-pulled-right" value="7" max="10">7/10</progress>
              </ul>
            </li>
          </ul>
        </div>

        <div class="skill-group is-non-web">
          <h3 class="has-text-centered">Code</h3>

          <ul>
            <li>Processing <progress class="progress is-info is-pulled-right" value="9" max="10">9/10</progress></li>
            <li>p5.js <progress class="progress is-info is-pulled-right" value="8" max="10">8/10</progress></li>
            <li>openFrameworks <progress class="progress is-info is-pulled-right" value="5" max="10">5/10</progress></li>
            <li>Git <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress></li>
          </ul>
        </div>

        <div class="skill-group is-non-web">
          <h3 class="has-text-centered">Hardware</h3>

          <ul>
            <li>Eagle <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress></li>
            <li>Arduino <progress class="progress is-info is-pulled-right" value="9" max="10">9/10</progress></li>
            <li>Raspberry Pi <progress class="progress is-info is-pulled-right" value="5" max="10">5/10</progress></li>
            <li>Circuit board (PCB) ...
              <ul>
                <li>Design <progress class="progress is-info is-pulled-right" value="4" max="10">4/10</progress></li>
                <li>Fabrication <progress class="progress is-info is-pulled-right" value="6" max="10">6/10</progress></li>
                <li>Assembly <small>(incl. SMD)</small> <progress class="progress is-info is-pulled-right" value="7" max="10">7/10</progress></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="exhibitions" class="is-non-web" aria-label="Exhibitions">
    <h2>Exhibitions</h2>

    <ul class="year-list">
      <li><span class="year">2017</span> 'Obscuron', <em>light</em>, KANEKO, Omaha, NE (group exhibition).</li>
      <li><span class="year">2015</span> 'Real life Minecraft interface', <em>PLAY</em>, KANEKO, Omaha, NE (group exhibition).</li>
      <li><span class="year">2012</span> <em>Artist-in-Residence</em>, University of Nebraska at Kearney, Kearney, NE (two-person exhibition).</li>
    </ul>
  </section>

  <section id="collaborations" class="is-non-web" aria-label="Collaborations">
    <h2>Collaborations</h2>

    <ul class="year-list">
      <li><span class="year">2015</span> <em>Circus of the Senses</em>, Bemis Center for Contemporary Arts, Omaha, NE (collaboration with Emilie Baltz).</li>
      <li><span class="year">2015</span> <em>Circuit of the Senses</em>, Bemis Center for Contemporary Arts, Omaha, NE (collaboration with Emilie Baltz).</li>
      <li><span class="year">2015</span> <em>Human Harp</em>, Bemis Center for Contemporary Arts, Omaha, NE (collaboration with Di Maintsone).</li>
    </ul>
  </section>

  <section id="teaching" class="is-non-web" aria-label="Teaching experience">
    <h2>Teaching</h2>

    <ul class="year-list">
      <li><span class="year">2016</span> DIY synthesizer build workshop at SOUNDRY at KANEKO</li>
      <li><span class="year">2015</span> How to Make Almost Anything at MCC FabLab</li>
      <li><span class="year">2015</span> Circuit bending worskshop at SOUNDRY at KANEKO</li>
      <li><span class="year">2014</span> Maker Corps Mentor at Omaha Children's Museum</li>
      <li><span class="year">2012</span> STEAM microworkshop for Girl Scouts at UNK</li>
      <li><span class="year">2011</span> Interactive and Generative Art at UNK.</li>
    </ul>
  </section>

  <section id="education" aria-label="Education">
    <h2>Education</h2>

    <div class="degree">
      <h3 class="title">Master of Science in Education (M.S. Ed.) in Instructional Technology</h3>
      <div class="details">University of Nebraska at Kearney &mdash; August 2011 to May 2014</div>
      <ul class="highlights">
        <li>Pursued self-directed, project-based courses and research focused on the integration of advanced and
          emerging technologies into studio art curriculum in close collaboration with arts faculty.</li>
        <li>Collaborated with Arts faculty to expand their existing undergraduate curriculum with hands-on,
          project-based exercises centered on STEAM concepts and emerging technologies like Arduino, 3D printing and
          projection mapping.</li>
      </ul>
    </div>

    <div class="degree">
      <h3 class="title">Bachelor of Science (B.Sc.) in Computer Science</h3>
      <div class="details">University of Nebraska at Kearney &mdash; August 2005 to May 2011</div>
      <ul class="highlights">
        <li>Designed and taught a full semester-long course to a group of fellow undergraduates entitled “Interactive
          and Generative Art”, culminating in a public exhibition.</li>
        <li>Facilitated acquisition and execution of a $20,000 grant with Computer Science and Art &amp; Art History
          departments.</li>
      </ul>
    </div>
  </section>

  <section id="experience" aria-label="Work experience">
    <h2>Experience</h2>

    <div class="job">
      <h3 class="title">UI Developer (consultant) at Concord</h3>
      <div class="details">Minneapolis, MN &mdash; July 2017 to present</div>
      <ul class="highlights">
        <li>Provide on-going client coaching and support regarding modern CSS architecture and technologies (Sass/SCSS, ITCSS, BEM, etc), software design patterns, source control practices (Gitflow model), and accessibility (Section 508c and WCAG AA).</li>
        <li>Work closely with client designers and downstream developers to evaluate and refine design mockups based on feasibility within existing tooling, project timelines, accessibility and usability implications, and more.</li>
        <li>Perform deep-dive analysis of CSS, JavaScript, and markup currently in use and provide actionable insight to leadership to inform key decision-making and planning.</li>
        <li>Helping client to transition to a more cross-functional Agile workflow using the SAFe 4.0 framework by serving as the UI development lead for one of two core feature development scrum teams.</li>
        <li>Architected, built, and delivered a custom Bootstrap-based design framework for a client in close collaboration with designers. Deliverables included sample templates, documentation, and source code making use of Bootstrap v4, Sass, Gulp, and modern HTML/CSS.</li>
      </ul>
    </div>

    <div class="job">
      <h3 class="title">Front End Developer (contractor) at Connexions Loyalty</h3>
      <div class="details">Minneapolis, MN &mdash; February 2017 to May 2017 (4 months)</div>
      <ul class="highlights">
        <li>Developed new features using company's custom Javascript (ES5) front-end framework, based loosely on
          Backbone.</li>
        <li>Built and delivered pixel-perfect CSS (via Sass) themes for clients informed by high-level style guides and
          close collaboration with UX personnel. All themes were delivered ahead of schedule.</li>
        <li>Took initiative to optimize and fully document the Grunt-based build system used throughout the company,
          significantly improving compilation times and enabling more rapid UI feature development.</li>
      </ul>
    </div>

    <div class="job">
      <h3 class="title">Web Designer/Developer at Securities America, Inc.</h3>
      <div class="details">Omaha, NE &mdash; October 2015 to July 2016 (9 months)</div>
      <ul class="highlights">
        <li>Designed, wireframed and prototyped web applications in collaboration with developers and business owners
          using Axure, Photoshop, HTML, CSS, and Javascript.</li>
        <li>Established and advocated for the use of the company’s first style guide (custom built in .NET MVC 5) and
          design framework (built on top of Bootstrap 3 using LESS, Gulp, and Javascript).</li>
        <li>Worked closely with .NET developers to build web applications using .NET MVC 5, Bootstrap 3, KendoUI,
          jQuery, custom Javascript (ES5) and modern responsive HTML/CSS, often interfacing with .NET web services.</li>
      </ul>
    </div>

    <div class="job is-non-web">
      <h3 class="title">Adjunct Professor at Metropolitan Community College</h3>
      <div class="details">Omaha, NE &mdash; August 2015 to November 2015 (3 months)</div>
      <ul class="highlights">
        <li>Designed and taught an intensive 11-week, hands-on, project-based course titled “How to Build Almost
          Anything” covering topics including Maker culture, 3D printing/scanning, laser cutting, CNC milling, vinyl
          cutting, hand and power tools and more.</li>
        <li>Duties also include collaborating with on-campus instructional designers to generate actionable course
          materials for students to use to engage in relevant content more fully both within and beyond the course.</li>
      </ul>
    </div>

    <div class="job">
      <h3 class="title">Freelance Creative Technology Consultant</h3>
      <div class="details">Omaha, NE &mdash; June 2014 to present</div>
      <ul class="highlights">
        <li>Provide custom design-build and consulting services to local and international fine artists and
          institutions, specializing in physical computing, creative coding and digital fabrication using tools and
          skills such as Arduino, circuit board design and fabrication, Processing (Java), CAD, CNC routing/milling, 3D
          printing and laser cutting.</li>
      </ul>
    </div>

    <div class="job">
      <h3 class="title">Web Developer (contractor) at Creighton University</h3>
      <div class="details">Omaha, NE &mdash; March 2015 to June 2015 (4 months)</div>
      <ul class="highlights">
        <li>Contract full-stack web development of a custom internal content management system for faculty activity.</li>
        <li>Responsibilities included designing, architecting and developing a custom solution using PHP, MySQL,
          CodeIgniter, modern HTML/CSS, Bootstrap 3 and custom Javascript with jQuery.</li>
      </ul>
    </div>

    <div class="job">
      <h3 class="title">Graduate Assistant at University of Nebraska at Kearney</h3>
      <div class="details">Kearney, NE &mdash; August 2011 to May 2014 (2 years 10 months)</div>
      <ul class="highlights">
        <li>Digitized educational videos for online distribution using Adobe Premiere.</li>
        <li>Assisted faculty in updating and maintaining online curriculum through Blackboard LMS.</li>
      </ul>
    </div>

    <div class="job">
      <h3 class="title">Undergraduate Researcher at University of Nebraska at Kearney</h3>
      <div class="details">Kearney, NE &mdash; May 2010 to May 2011 (1 year 1 month)</div>
      <ul class="highlights">
        <li>Designed and taught a full semester-long course to a group of fellow undergraduates entitled “Interactive
          and Generative Art”, culminating in a public exhibition.</li>
      </ul>
    </div>

    <div class="job">
      <h3 class="title">Web Programmer at Kearney Hub</h3>
      <div class="details">Kearney, NE &mdash; November 2008 to June 2010 (1 year 8 months)</div>
      <ul class="highlights">
        <li>Redesigned entire website in collaboration with business owners and marketing personnel using Photoshop,
          physical processes, and HTML/CSS/Javascript for iterative mockups and prototyping. Included the use of user
          surveys and basic analytics for UX insights.</li>
        <li>Developed new website features within proprietary industry-specific CMS using PHP, HTML, CSS and
          Javascript.</li>
        <li>Designed and developed microblogs for reporters using WordPress.</li>
        <li>Interacted with external small-business contract clients to build and maintain their websites using PHP,
          MySQL, HTML, CSS and Javascript.</li>
        <li>Created interactive and animated web advertisements using Adobe Flash and Actionscript (2 and 3).</li>
      </ul>
    </div>
  </section>
</main>

<?php get_footer(); ?>