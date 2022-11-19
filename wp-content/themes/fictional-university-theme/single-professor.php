<!-- creating single.php file automatically gets selected for rendering single posts -->

<?php
get_header();

while (have_posts()) {
    the_post(); 
    //This function comes from the functions.php, this function outputs the page banner.
    pageBanner();
    ?>
   
   <div class="container container--narrow page-section">
     
   

     <div class="generic-content">
        <div class="row group">

          <div class="one-third">
            <!-- the_post_thumbnail(); function creates and HTML Image Tag and pulls in the featured image -->
            <!-- Pass in the custom image size Name as an argument for loading puposes -->
            <?php the_post_thumbnail('professorLandscape');?>
          </div>

          <div class="two-thirds">
            <?php the_content();?>
          </div>

        </div>
     </div>

     <!-- Showing related fields on the frontend from ACF  -->
     <?php 
       $relatedPrograms = get_field('related_programs');
       // The print_r() function prints the information about a variable in a more human-readable way. Need to pass variable name as argument for output
       
      if ($relatedPrograms) {
        echo '<hr class="section-break">';
        echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';
        echo '<ul class="link-list min-list">';
        foreach($relatedPrograms as $program){ ?>
         <!-- the_title() function will not work in this case, it only works inside the main WordPress loop.
         
         Pass a specific post ID that you want to render or do the best pratise of passing POST Object as an argument.
         echo get_the_title($program); -->
          <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
         <?php
        }
        echo '</ul>';
      }
      
     ?>
   </div>
<?php
}

get_footer();
?>