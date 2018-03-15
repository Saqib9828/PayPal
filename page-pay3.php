<?php
//Redirect to openId Login
// header("Location: /auth/loginn");
// exit;


/*
  Template Name: Pay3
 */
  ?>
  <?php 
 
 use PayPal\Api\Payment;
 use PayPal\Api\PaymentExecution;
 
 require 'app/start.php';
 
 if (!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])){
     die();
 }
 if((bool)$_GET['success']===false){
     die();
 } 
 $paymentId=$_GET['paymentId'];
 $payerId=$_GET['PayerID'];
 $status=$_GET['success'];
 
 $payment=Payment::get($paymentId, $paypal);
 $execute = new PaymentExecution();
 $execute->setPayerId($payerId);
 
 try{
     $result=$payment->execute($execute, $paypal);
 } catch (Exception $e){
     die($e);
 }
 $datetimee=date("Y-m-d h:i:sa");
 $payment_amount=20;

    $con=mysql_connect(':/cloudsql/dlinkages-196710:asia-south1:dlinkages', 'root','root123');
    mysql_select_db('linkages_qa_app', $con);
    $query = "INSERT INTO  payments (txnid, payment_amount, payment_status, itemid, createdtime) values('$paymentId','$payment_amount','$status','112','$datetimee')";
                $data = mysql_query ($query)or die(mysql_error());
                    if($data)
                        {
                            
                            $msg= 'Data inserted successfully.';
                        }

                    else $msg= 'Data insertion error';
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
                                        <br><br>
        <?php the_title(); ?>
                                    </h1>
                                </div>

                                <div class="panel-body pad0 fe-frm">
        <?php //the_content();  ?>
                                    <p class="error_message"> <?php echo $form_error_message; ?> </p>
                                    <div class="form-group"></div>
                                    <div class="divider"></div>
 
                                    <div class="lk_loginform">
                                        <form class="form-validate ng-pristine ng-invalid ng-invalid-required" name="signinForm" id="signinForm" method="post" action="../pay2">

                                            <h2 class="fnt22 text-muted book normal"><br><br>Thank You for the Payment!<br>
                                                Congratulation, Now you are the paid member of linkAges.
                                                <?php echo $msg; ?>  <br><br><br><br></h2>
                                            <div class="form-group signin col-sm-12 pad0">
                                              
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



 