<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>

<body>

   <!-- Header
   ================================================== -->
   <header id="home">

      <nav id="nav-wrap">

         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
         <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
            <li><a class="smoothscroll" href="#about">About</a></li>
            <li><a class="smoothscroll" href="#resume">Resume</a></li>
            <li><a class="smoothscroll" href="#portfolio">Works</a></li>
            <li><a class="smoothscroll" href="#testimonials">Testimonials</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->
      <?php
      $u_qry = $conn->query("SELECT * FROM users where id = 1");
      foreach ($u_qry->fetch_array() as $k => $v) {
         if (!is_numeric($k)) {
            $user[$k] = $v;
         }
      }
      $c_qry = $conn->query("SELECT * FROM contacts");
      while ($row = $c_qry->fetch_assoc()) {
         $contact[$row['meta_field']] = $row['meta_value'];
      }
      // var_dump($contact['facebook']);
      ?>
      <div class="row banner">
         <div class="banner-text">
            <h1 class="responsive-headline">I'm
               <?php echo isset($user) ? ucwords($user['firstname'] . ' ' . $user['lastname']) : ""; ?>.
            </h1>
            <h3>
               <?php echo stripslashes($_settings->info('welcome_message')) ?>
            </h3>
            <hr />
            <ul class="social">
               <li><a target="_blank" href="<?php echo $contact['facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
               <li><a target="_blank" href="<?php echo $contact['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
               <li><a target="_blank" href="mailto:<?php echo $contact['email'] ?>"><i
                        class="fa fa-google-plus"></i></a></li>
               <li><a target="_blank" href="<?php echo $contact['linkin'] ?>"><i class="fa fa-linkedin"></i></a></li>
            </ul>
         </div>
      </div>

      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>

   </header> <!-- Header End -->


   <!-- About Section
   ================================================== -->
   <section id="about">

      <div class="row">

         <div class="three columns">

            <img class="profile-pic" src="<?php echo validate_image("avatar") ?>" alt="" />

         </div>

         <div class="nine columns main-col">

            <h2>About Me</h2>
            <style>
               #about_me * {
                  color: #7A7A7A !important;
               }
            </style>
            <div id="about_me">
               <?php include "about.html"; ?>
            </div>

            <div class="row">

               <div class="columns contact-details">

                  <h2>Contact Details</h2>
                  <p class="address">
                     <span>
                        <?php echo $contact['address'] ?>
                     </span><br>
                     <span>
                        <?php echo $contact['mobile'] ?>
                     </span><br>
                     <span>
                        <?php echo $contact['email'] ?>
                     </span>
                  </p>

               </div>

               <div class="columns download">
                  <p>
                     <a href="https://doc-0c-98-docs.googleusercontent.com/docs/securesc/8c1pblrnmrc032c33an1035a17h46tl8/58ijq2jr5d0ovbmoimra8ahd752e764n/1675177125000/00965557704723554339/00965557704723554339/1gl1naMVvpxgn9TMqhyBSu0hCeIUsT8tG?e=download&ax=AB85Z1B9Bsm3OGgx0MOl2MSJVgviJgRcPuhnscsoK6Dv_3xYmAV9aKj7PMtPGEtL2F1yVUKO1JaVZMJa8iTTvBtq2xMsvICoayZ6SDCiw08N-7pI8ZtN6h9EtnSjNUVkA4WmztoKVx_x4PcyrFz7RbXkGf054WTFRiNP5Nyr8xuhfXxDKVidoqJMYacDR2J3Xa_Y6bUG4JSjJ0zhrsqDeFoKYSe10xgIl3NzCfAXjJiZbXtuMAOguiiVBOyahoHatEfM7kVXNin-p-8XC2agqaFxxKQNYdsYC9vBGX0C4lcl93m1u-Uq0ekaBd9t-ooLudoSCRlNT2KGLhCvIGhe_srzBQ_MjGGuhPpcKrmcnCa13FywtVraqYkKe82S73C630XCNKRLSYpruVulR9o0keB1Ahjd3_4Oz6TCL-jCJjguzgYXqnGILNm0YozHtWiuK1k8XSCdLb6k7y5w7a8v0fDYkMHSHad4rjQnTZWDmQiLKZSKeXB-QUdo8gIZIlqmWp2edI9NyLZxxX9mSTK2RgWjrvdgcdiWr8N0jlWX2x3ClAdQO-H99yzDAlbBeBd9zw57jqvh5oANY7WTID2uU4isVUv73wpvMbVE9RF9Wkjfvg7f8ONHkRaL6RJvDoxB3GbW2NfWw10EqVkYWkozJsElTqvHDfu_fvtmG0kXdvyOKNdkLQx82uo0m7koKuItyJah86c0O7ftbjFWUOf1IWdHkcoJCdZNuBRpxE3oYnQ1xfKFBl2VYaR12CryLcb0E2j6eTtHovMaU_sZKfiZ8_T_TE1rhOmzW78QYXQ_gici1IsWga-U16DuPemCh-S3OA4BwqGdiWh7mpXFgZPIKz57r-IjkXxolNmuZcXf3qltBpcV9X6YIBfrotAXwbuy_nw&uuid=03333dba-582f-4386-a3c6-8bb0eb4a9f0b&authuser=0&nonce=aau4duk3oupk8&user=00965557704723554339&hash=ev0pvjmsmqjp1s0uif5252u0mggivccc" 
                     class="button"><i class="fa fa-download"></i>Download Resume</a>
                  </p>
               </div>

            </div> <!-- end row -->

         </div> <!-- end .main-col -->

      </div>

   </section> <!-- About Section End-->


   <!-- Resume Section
   ================================================== -->
   <section id="resume">

      <!-- Education
      ----------------------------------------------- -->
      <div class="row education">

         <div class="three columns header-col">
            <h1><span>Education</span></h1>
         </div>

         <div class="nine columns main-col">
            <?php
            $e_qry = $conn->query("SELECT * FROM education order by year desc, month desc");
            while ($row = $e_qry->fetch_assoc()):
               ?>
               <div class="row item">

                  <div class="twelve columns">

                     <h3>
                        <?php echo $row['school'] ?>
                     </h3>
                     <p class="info">
                        <?php echo $row['degree'] ?> <span>&bull;</span> <em class="date">
                           <?php echo $row['month'] . ' ' . $row['year'] ?>
                        </em>
                     </p>

                     <p>
                        <?php echo stripslashes(html_entity_decode($row['description'])) ?>
                     </p>

                  </div>

               </div> <!-- item end -->
            <?php endwhile; ?>


         </div> <!-- main-col end -->

      </div> <!-- End Education -->


      <!-- Work
      ----------------------------------------------- -->
      <div class="row work">

         <div class="three columns header-col">
            <h1><span>Work</span></h1>
         </div>

         <div class="nine columns main-col">
            <?php
            $w_qry = $conn->query("SELECT * FROM work ");
            while ($row = $w_qry->fetch_assoc()):
               ?>
               <div class="row item">

                  <div class="twelve columns">

                     <h3>
                        <?php echo $row['company'] ?>
                     </h3>
                     <p class="info">
                        <?php echo $row['position'] ?> <span>&bull;</span> <em class="date">
                           <?php echo str_replace("_", " ", $row['started']) ?> -
                           <?php echo str_replace("_", " ", $row['ended']) ?>
                        </em>
                     </p>


                     <p>
                        <?php echo stripslashes(html_entity_decode($row['description'])) ?>
                     </p>

                  </div>

               </div> <!-- item end -->
            <?php endwhile; ?>
         </div> <!-- main-col end -->

      </div> <!-- End Work -->


      <!-- Skills
      ----------------------------------------------- -->
      <div class="row skill">

         <div class="three columns header-col">
            <h1><span>Skills</span></h1>
         </div>

         <div class="nine columns main-col">

            <p>I have pationate and interested more about programming languages so that I can learned more about it. Showing below the 
               programming language I've already known and more interesting to enhance and improved my skills. 
            </p>

            <div class="bars">

               <ul class="skills">
                  <li><span class="bar-expand photoshop"></span><em>C#</em></li>
                  <li><span class="bar-expand illustrator"></span><em>VB</em></li>
                  <li><span class="bar-expand wordpress"></span><em>PHP</em></li>
                  <li><span class="bar-expand wordpress"></span><em>MySQL</em></li>
               </ul>

            </div>

         </div>

      </div>

   </section>


   <!-- Portfolio Section
   ================================================== -->
   <section id="portfolio">

      <div class="row">

         <div class="twelve columns collapsed">

            <h1>Check Out Some of My Works.</h1>

            <!-- portfolio-wrapper -->
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
               <?php
               $p_qry = $conn->query("SELECT * FROM project ");
               while ($row = $p_qry->fetch_assoc()):
                  ?>
                  <div class="columns portfolio-item">
                     <div class="item-wrap">

                        <a href="#modal-<?php echo $row['id'] ?>" title="">
                           <img alt="" src="<?php echo validate_image($row['banner']) ?>">
                           <div class="overlay">
                              <div class="portfolio-item-meta">
                                 <h5 class="truncate-1">
                                    <?php echo $row['name'] ?>
                                 </h5>
                                 <!-- <p>Illustrration</p> -->
                              </div>
                           </div>
                           <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>
                     </div>
                  </div> <!-- item end -->

               <?php endwhile; ?>

            </div> <!-- portfolio-wrapper end -->

         </div> <!-- twelve columns end -->


         <?php
         $p_qry = $conn->query("SELECT * FROM project ");
         while ($row = $p_qry->fetch_assoc()):
            ?>

            <!-- Modal Popup
           --------------------------------------------------------------- -->

            <div id="modal-<?php echo $row['id'] ?>" class="popup-modal mfp-hide">

               <img class="scale-with-grid" src="<?php echo validate_image($row['banner']) ?>" alt="" />

               <div class="description-box">
                  <h4>
                     <?php echo $row['name'] ?>
                  </h4>
                  <p>
                     <?php echo stripslashes(html_entity_decode($row['description'])) ?>
                  </p>
                  <span class="categories"><i class="fa fa-tag"></i>
                     <?php echo $row['client'] ?>
                  </span>
               </div>

               <div class="link-box">
                  <!-- <a href="http://srikrishnacommunication.com/Giridesigns.html" target="_blank">Details</a> -->
                  <a class="popup-modal-dismiss">Close</a>
               </div>

            </div><!-- modal-01 End -->

         <?php endwhile; ?>


      </div> <!-- row End -->

   </section> <!-- Portfolio Section End-->




   <!-- Testimonials Section
   ================================================== -->
   <section id="testimonials">

      <div class="text-container">

         <div class="row">

            <div class="two columns header-col">

               <h1><span>Client Testimonials</span></h1>

            </div>

            <div class="ten columns flex-container">

               <div class="flexslider">

                  <ul class="slides">

                     <li>
                        <blockquote>
                           <p>Your work is going to fill a large part of your life, and the only way to be truly
                              satisfied is
                              to do what you believe is great work. And the only way to do great work is to love what
                              you do.
                              If you haven't found it yet, keep looking. Don't settle. As with all matters of the heart,
                              you'll know.
                           </p>
                           <cite>Steve Jobs</cite>
                        </blockquote>
                     </li> <!-- slide ends -->

                     <li>
                        <blockquote>
                           <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
                              Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis
                              sem
                              nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
                           </p>
                           <cite>Mr. Adobe</cite>
                        </blockquote>
                     </li> <!-- slide ends -->

                  </ul>

               </div> <!-- div.flexslider ends -->

            </div> <!-- div.flex-container ends -->

         </div> <!-- row ends -->

      </div> <!-- text-container ends -->

   </section> <!-- Testimonials Section End-->



   <!-- /.content-wrapper -->
   <?php require_once('inc/footer.php') ?>
</body>

</html>