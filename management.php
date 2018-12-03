<?php
  include('config.php');
  include('functions.php');
  include('dashboard.php');

  $userID = $_SESSION['userID'];
  $_SESSION['add-requested'] = false;

  $liveContents = getLiveTextContents($database);
  $printableContent = array();
  foreach($liveContents as $liveContent) {
    array_push($printableContent, $liveContent['text_content']);
  }
  $contentIDs = array();
  foreach($liveContents as $liveContent) {
    array_push($contentIDs, $liveContent['text_content_id']);
  }



  if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if($_GET['action'] == 'edit') {
      if(isset($_POST['new-content'])) {
        removeUserContent($_SESSION['userID'], $_SESSION['current-textid'], $database);
        $text_content = getUserContent($_SESSION['userID'], $_SESSION['current-textid'], $database);
        $content = $text_content['text_content'];
        $textContent = new TextContent($content);
        $liveContents = getLiveTextContents($database);
        $printableContent = array();
        foreach($liveContents as $liveContent) {
          array_push($printableContent, $liveContent['text_content']);
        }
        $contentIDs = array();
        foreach($liveContents as $liveContent) {
          array_push($contentIDs, $liveContent['text_content_id']);
        }
      }
    }
    elseif($_GET['action'] == 'add') {
      $_SESSION['add-requested']  = true;
      if(isset($_POST['new-content'])) {
        // removeUserContent($_SESSION['userID'], $_SESSION['current-textid'], $database);
        // $text_content = getUserContent($_SESSION['userID'], $_SESSION['current-textid'], $database);
        // $content = $text_content['text_content'];
        // $textContent = new TextContent($content);
        // $liveContents = getLiveTextContents($database);
        // $printableContent = array();
        // foreach($liveContents as $liveContent) {
        //   array_push($printableContent, $liveContent['text_content']);
        // }
        // $contentIDs = array();
        // foreach($liveContents as $liveContent) {
        //   array_push($contentIDs, $liveContent['text_content_id']);
        // }
      }
    }
  }

?>

<!doctype html>
<html>
  <head>
    <title>Edit Project935 Site</title>
    <!-- Bootstrap core CSS -->
    <link href='vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Custom fonts for this template -->
    <link href='https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i' rel='stylesheet'>
    <link href='vendor/fontawesome-free/css/all.min.css' rel='stylesheet'>

    <!-- Custom styles for this template -->
    <link href='css/style.css' rel='stylesheet'>
    <!-- ajax library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>


  <body>
    <?php if($_SESSION['add-requested']) : ?>
      <div class="jumbotron">
        <h1>
          <?php echo "Please contact web administrator"  ?>
        </h1>
      </div>
    <?php endif ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Project935</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid mx-auto mb-2" src="img/Logo.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger active" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#upcoming">Upcoming</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#outreach">Outreach</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#home-church">Home Church</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#middle-school-ministry">Middle School Ministry</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#pastor">Pastor</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h1 class="mb-0">Sitting down, Jesus called the Twelve and said,
            <br>
            <br>
            <span class="text-primary">Anyone who wants to be first must be the very last, and the servant of all.</span>
          </h1>
          <br>
          <br>
          <h2 class="" "mb-1"=""> Mark 9:35
          </h2>
          <div class="subheading mb-5" id="contact-information">Project935 · 2323 Dixie Highway · Ft. Mitchell, KY 41017 · (859) 331-2160 ·
            <a href="mailto:officeofthepastor@fuse.net">officeofthepastor@fuse.net</a>
          </div>
          <div class="social-icons">
            <a href="https://twitter.com/project_935">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.facebook.com/Project935-444473319407258/?modal=admin_todo_tour">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
        </div>
      </section>

      <hr class="m-0">
    <!-- closing div tag to be deleted
    </div> -->
    <br>
    <div id="container-fluid">
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="upcoming">
        <div class="my-auto">
          <h2 class="mb-5">Upcoming</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-4">
            <div class="resume-content mr-auto">
              <h3 id="a" class="mb-0 text-primary manageable-content" data-user"<?php echo $userID ?>" data-textid="<?php echo $contentIDs[0] ?>" data-location="1" data-manageability="manageable"><?php echo $printableContent[0] ?></h3>
              <div id="aa" class="subheading mb-2 manageable-content" data-user"<?php echo $userID ?>" data-textid="<?php echo $contentIDs[1] ?>" data-location="2" data-manageability="manageable"><?php echo $printableContent[1] ?></div>
              <p id="ab" class="manageable-content" data-user"<?php echo $userID ?>" data-textid="<?php echo $contentIDs[2] ?>" data-location="3" data-manageability="manageable"><?php echo $printableContent[2] ?></p>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row mb-4">
            <div class="resume-content mr-auto">
              <h3 id="b" class="mb-0 text-primary manageable-content" data-user"<?php echo $userID ?>" data-textid="<?php echo $contentIDs[3] ?>" data-location="4" data-manageability="manageable"><?php echo $printableContent[3] ?></h3>
              <div id="ba" class="subheading mb-2 manageable-content" data-user"<?php echo $userID ?>" data-textid="<?php echo $contentIDs[4] ?>" data-location="5" data-manageability="manageable"><?php echo $printableContent[4] ?></div>
              <p id="bb" class="manageable-content" data-user"<?php echo $userID ?>" data-textid="<?php echo $contentIDs[5] ?>" data-location="6" data-manageability="manageable"><?php echo $printableContent[5] ?></p>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row mb-4">
            <div class="resume-content mr-auto">
              <h3 id="c" class="mb-0 text-primary manageable-content" data-user"<?php echo $userID ?>" data-textid="<?php echo $contentIDs[6] ?>" data-location="7" data-manageability="manageable"><?php echo $printableContent[6] ?></h3>
              <div id="ca" class="subheading mb-2 manageable-content" data-user"<?php echo $userID ?>" data-textid="<?php echo $contentIDs[7] ?>" data-location="8" data-manageability="manageable"><?php echo $printableContent[7] ?></div>
              <p id="cb" class="manageable-content" data-user"<?php echo $userID ?>" data-textid="<?php echo $contentIDs[8] ?>" data-location="9" data-manageability="manageable"><?php echo $printableContent[8] ?></p>
            </div>
          </div>

        </div>

      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="outreach">
        <div class="my-auto">
          <h2 class="mb-5">Outreach</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0 text-primary">Isaiah House</h3>
              <div class="subheading mb-3">Last Saturday of every month</div>
              <div>Our mission is to provide the best possible addiction treatment care for our clients and families. Our holistic approach to treatment is resulting in hundreds of people being successful in long-term sobriety. We have been a state-licensed Alcohol and Other Drug Entity (AODE) since 2010 and a state-licensed Behavioral Health Service Organization (BHSO) since 2014. In 2015, IH became one of the few treatment centers in the state of Kentucky to achieve national accreditation by Joint Commission. We provide a gold standard of quality care to our clients.</div>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">August 2006 - May 2010</span>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0 text-primary">Moore’s Activity Center:</h3>
              <div class="subheading mb-3">Covington KY</div>
              <!-- 'Description' was taken off of their website, but could be changed to suit the needs of the Youth Pastor -->
              <p>The Moore Activity Center (MAC) is designed to show Love to inner-city individuals and families by developing the whole person (physical, mental, emotional, spiritual) through teaching, nurturing, mentoring, tutoring and lay counseling based on Christian values.</p>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">August 2002 - May 2006</span>
            </div>
          </div>

        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="home-church">
        <div class="my-auto">
          <h2 class="mb-5">Home Church</h2>

          <h3 class="mb-0 text-primary">Fort Mitchell Baptist Church</h3>
          <hr>
          <br>
          <a href="http://www.fortmitchellbaptist.com/" class="subheading mb-5">FMBC's Website</a>
          <br><br>
          <ul class="fa-ul mb-0">
            <li>
              <i class="fa-li fa fa-check"></i>
              Sunday Morning Worship</li>
            <li>
              <i class="fa-li fa fa-check"></i>
              Wednesday Men's Breakfast</li>
            <li>
              <i class="fa-li fa fa-check"></i>
              Outrach Opportunities</li>
            <li>
              <i class="fa-li fa fa-check"></i>
              Sunday Night Adult Bible Study</li>
          </ul>
        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="middle-school-ministry">
        <div class="my-auto">
          <h2 class="mb-5">Middle School Ministry</h2>
          <h3 class="mb-0 text-primary">Wednesday Nights 6:30 – 8:00</h3>
          <p>We provide a spiritual and emotional transition from Children’s Group to Youth Group. Students in 6th and 7th grade have a blast learning about Jesus in an age appropriate curriculum and subject matter.</p>
        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="pastor">
        <div class="my-auto">
          <h2 class="mb-5">Pastor</h2>
          <img class="img-fluid" src="img/youthPastorPortrait.jpg">
          <br><br><br>
          <h3 class="mb-0 text-primary">Kevin &nbsp; M. &nbsp; Wiehe</h3>
          <p>
            <br></p><hr>
            Not your typical Youth Pastor, Kevin gave his life to Christ in 2007 and was baptized right here at Fort Mitchell Baptist Church. Kevin’s love and growing relationship with Jesus called him to serve as a Deacon for six years. God then called Kevin to use his gift of connecting with young people as Youth Pastor, and was ordained in 2015.
            <br><br>
            Kevin has a BA from Thomas More College in which he played basketball and now enjoys coaching at the Middle School and High School levels. Kevin is passionate about teaching and sharing about Jesus with everyone. He loves doing life with his loving wife Kelly, fishing and hiking with his son Avery and granddaughter Jaelyn.
          <p></p>
        </div>
      </section>

    </div>
    </div>
  </body>
  <!-- outer script tag used solely for folding to make viewing htnl code easier -->
  <!-- Bootstrap core JavaScript -->
  <script src='js/replace-content-with-form.js'></script>
  <script src='vendor/jquery/jquery.min.js'></script>
  <script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

  <!-- Plugin JavaScript -->
  <script src='vendor/jquery-easing/jquery.easing.min.js'></script>

  <!-- Custom scripts for this template -->
  <script src='js/resume.min.js'></script>


</html>
