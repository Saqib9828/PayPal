<?php
//Redirect to openId Login
// header("Location: /auth/loginn");
// exit;


/*
  Template Name: Pay
 */
get_header();
?>

<div id="content" class="clearfix">

    <div id="main" class="col col-lg-12 pad0 clearfix" role="main">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>
                         role="article"> <header> <?php
                $post_thumbnail_id = get_post_thumbnail_id();
                $featured_src = wp_get_attachment_image_src($post_thumbnail_id, 'full');
                if ($featured_src[0] != '') {
                    ?>
                            <div class="jumbotron" style="background-image: url('<?php echo $featured_src[0]; ?>'); background-repeat: no-repeat; background-position: 0 0;"></div>

                        <?php } else {
                            echo '<div class="ejumbotron">&nbsp;</div>';
                        } ?>

                    </header> <!-- end article header --> <section class="post_content srch">
                        <div class="container">
                            <div class="center-block col-sm-6 fltnon">
                                <div class="page-header">
                                    <h1 class="page-title" itemprop="headline">
                                        <br>
        <?php the_title(); ?><br>
                                    </h1>
                                </div>

                                <div class="panel-body pad0 fe-frm">
        <?php //the_content();  ?>
                                    <p class="error_message"> <?php echo $form_error_message; ?> </p>
                                    <div class="form-group"></div>
                                    <div class="divider"></div>
 
                                    <div class="lk_loginform">
                                        <form class="form-validate ng-pristine ng-invalid ng-invalid-required" name="signinForm" id="signinForm" method="post" action="../pay2">

                                            <h2 class="fnt22 text-muted book normal"><br>Pay for Membership<br></h2>
                                            <div class="form-group signin col-sm-12 pad0">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                      <label for="user_name" class="sr-only">Select Organization</label>
                                                       <select class="form-control" name="title" id="title">
                                                            <option value="">Select Organization</option>
                                                            <option value="Help-full">Help-full</option>
                                                            <option value="Linkages">Linkages</option>
                                                        </select>
                                                    </div>
                                                </div> <div class="row">
                                                    <div class="col-sm-12 form-group">
                                                    <label for="Amount" class="sr-only">Amount</label>
                                                        <input class="form-control" role="text" type="text" placeholder="Amount" name="amount" id="amount" aria-labelledby="amount" aria-required="true"/><span class="form-required">*</span>
                                                    </div>
                                                    <div class="col-sm-12 form-group">

                                                    </div>
                                                    
                                                    <div class="col-sm-12 form-group">
                                                        <button type="submit" role="button" class="btn mgn10_0 btn-primary fnt22">Pay Now</button>
                                                    </div>

                                                </div>
                                            </div>
                                            <label for="login_submit" class="sr-only">Submit</label>
                                            <input type="hidden" name="form_action" value="login_submit" id="login_submit"/>
                                        </form>
                                        <div class="form-group"></div>
                                    </div>

                                   

                                    <!-- <div class="form-group signin col-sm-12 pad0">
                                        <input type="hidden" name="login_attempt_count" id="login_attempt_count" value="0" />
                                        <p class="pt-lg text-center col-sm-12">Need to Signup?</p>

                                        <a class="btn mgn10_0 btn-primary fnt22" href="/register/" title="Register Now">Register Now</a>

                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </section> <!-- end article section --> <footer> </footer> <!-- end article footer -->
                </article>
                <!-- end article -->

            <?php endwhile; ?>

<?php endif; ?>

    </div>
    <!-- end #main -->

    <div class="search"></div>

</div>
<!-- end #content -->

<script type="text/javascript">
   
   
</script>

<?php get_footer(); ?>



<?php

if ( isset( $_POST['submit'] ) ){
    header("location: localhost:8080/wp-login.php");
    }
    ?>