<!DOCTYPE html>

<!--
        -----------------------------------------------------------------
                    _          _                         _      __   __
                   /_\   _____(_)__ _ _ _  _ __  ___ _ _| |_   /  \ / /
                  / _ \ (_-<_-< / _` | ' \| '  \/ -_) ' \  _| | () / _ \
                 /_/ \_\/__/__/_\__, |_||_|_|_|_\___|_||_\__|  \__/\___/
                                |___/

        -----------------------------------------------------------------
          Author:         Matt W. Martin, 4374851
                          kaethis@tasmantis.net

          Project:        CS3990, Assignment 06
                          PHP & JavaScript

          Date Issued:    14-Mar-2016
          Date Archived:  XX-XXX-2016

          File:           cart.php
-->

<html>

   <head>

      <script
         src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
      </script>

      <script src="javascript.js" type="text/javascript"></script>

      <link rel="stylesheet" href="stylesheet.css" />

      <title>Tree Branches Unlimited | Order</title>

   </head>

   <body>

      <header>

         <a href="index.php">

            <img id="logoB" src="resources/logoB.png"
                 alt="Tree Branches Unlimited"
                 title="More branches than you can shake a stick at!" />

         </a>

      </header>

      <ul class="navbar">

         <li><a href="index.php">Home</a></li>

         <li><a href="products.php">Products</a></li>

         <li><a href="index.php">Contact Us</a></li> 

         <li id="cart">

            <a href="cart.php">

               <img src="resources/icons/cart.png" alt="Cart" />
               Cart

            </a>

         </li>

      </ul>

      <?php

         $firstname_err = $lastname_err = "&nbsp";
         $email_err = $emailrep_err = "&nbsp";
         $passw_err = $passwrep_err = "&nbsp";
         $subscribe_err = "&nbsp";
         $phone_err = $postal_err = "&nbsp";
         $address_err = $city_err = "&nbsp";
         $payment_err = $cc_err = $ccname_err = $paypal_err = "&nbsp";

         $valid = false;

         if($_SERVER["REQUEST_METHOD"] == "POST"){

            $valid = true;

            if(empty($_POST["firstname"])){

               $firstname_err = "Please provide first name.";
               $valid = false;

            } else{

               $firstname = filter_var($_POST["firstname"],
                                       FILTER_SANITIZE_STRING);
            }

            if(empty($_POST["lastname"])){

               $lastname_err = "Please provide last name.";
               $valid = false;

            } else{

               $lastname = filter_var($_POST["lastname"],
                                      FILTER_SANITIZE_STRING);
            }

            if(empty($_POST["email"])){

               $email_err = "Please provide e-mail address.";
               $valid = false;

            } else{
 
               $email = filter_var($_POST["email"],
                                   FILTER_SANITIZE_STRING);
            }

            if(empty($_POST["emailrep"])){

               $emailrep_err = "Please repeat e-mail address.";
               $valid = false;

            } else{

               $emailrep = filter_var($_POST["emailrep"],
                                      FILTER_SANITIZE_STRING);
            }

            if((!empty($_POST["email"])) &&
               (!empty($_POST["emailrep"]))){

               if(!($_POST["email"] == $_POST["emailrep"])){

                  $emailrep_err = "E-mail addresses do not match.";
                  $valid = false;
               }
            }

            if((isset($_POST["subyes"])) &&
               (isset($_POST["subno"]))){

               $subscribe_err = "Please provide only one answer.";
               $valid = false;

            }

            if(!isset($_POST["subyes"]) && !isset($_POST["subno"])){

               $subscribe_err = "Please provide an answer.";
               $valid = false;

            } 

            if(!isset($_POST["guestyes"])){

               if(empty($_POST["passw"])){

                  $passw_err = "Please provide password.";
                  $valid = false;

               } else{

                  $passw = filter_var($_POST["passw"],
                                      FILTER_SANITIZE_STRING);
               }

               if(empty($_POST["passwrep"])){

                  $passwrep_err = "Please repeat password.";
                  $valid = false;

               } else{

                  $passwrep = filter_var($_POST["passwrep"],
                                         FILTER_SANITIZE_STRING);
               }

               if((!empty($_POST["passw"])) &&
                  (!empty($_POST["passwrep"]))){

                  if(!($_POST["passw"] == $_POST["passwrep"])){

                     $passwrep_err = "Passwords do not match.";
                     $valid = false;
                  }
               }
            }

            if(empty($_POST["phone"])){

               $phone_err = "Please provide phone number.";
               $valid = false;

            } else{

               $phone = filter_var($_POST["phone"],
                                   FILTER_SANITIZE_STRING);
            }

            if(empty($_POST["postal"])){

               $postal_err = "Please provide postal code.";
               $valid = false;

            } else{

               $postal = filter_var($_POST["postal"],
                                    FILTER_SANITIZE_STRING);
            }

            if(empty($_POST["address"])){

               $address_err = "Please provide home address.";
               $valid = false;

            } else{

               $address = filter_var($_POST["address"],
                                     FILTER_SANITIZE_STRING);
            }

            if(empty($_POST["city"])){

               $city_err = "Please provide city and province.";
               $valid = false;

            } else{

               $city = filter_var($_POST["city"],
                                  FILTER_SANITIZE_STRING);

               $province = filter_var($_POST["provinces"],
                                      FILTER_SANITIZE_STRING);
            }

            if(!isset($_POST["payment"])){

               $payment_err = "Please make a selection.";
               $valid = false;

            } else{

               if(($_POST["payment"] == "Visa") ||
                  ($_POST["payment"] == "MasterCard") ||
                  ($_POST["payment"] == "Amex")){

                  if((empty($_POST["ccnum"])) &&
                     (!empty($_POST["ccsc"]))){

                     $cc_err = "Please provide credit card number.";
                     $valid = false;

                  } else if((!empty($_POST["ccnum"])) &&
                            (empty($_POST["ccsc"]))){

                     $cc_err = "Please provide security code.";
                     $valid = false;

                  } else if((empty($_POST["ccnum"])) &&
                            (empty($_POST["ccsc"]))){

                     $cc_err = "Please provide card num & CCSC.";
                     $valid = false;

                  } else{

                     $ccnum = filter_var($_POST["ccnum"],
                                         FILTER_SANITIZE_STRING);

                     $ccsc = filter_var($_POST["ccsc"],
                                        FILTER_SANITIZE_STRING);
                  }

                  if(empty($_POST["ccname"])){

                     $ccname_err = "Please provide name of cardholder.";
                     $valid = false;

                  } else{

                     $ccname = filter_var($_POST["ccname"],
                                          FILTER_SANITIZE_STRING);

                  }

               } else if($_POST["payment"] == "PayPal"){

                  if(empty($_POST["ppname"])){

                     $paypal_err = "Please provide PayPal account.";
                     $valid = false;

                  } else{

                     $ppname = filter_var($_POST["ppname"],
                                          FILTER_SANITIZE_STRING);
                  }
               }
            }
         }

      ?>

      <?php

         if($valid){

            echo '<div class="modal">';

            echo '<div class="container" id="receiptcon">';

            echo '<div class="section" id="receipt">';

            echo '<span class="close">×</span>';

            echo '<h1>Receipt</h1>';

            echo '<div class="container">';

            echo '<h1>Contact</h1>';

            echo '<span>'.$firstname.' '.$lastname.'</span><br />';

            echo '<span>'.$email.'</span><br />';

            echo '<span>'.$phone.'</span><br />';

            echo '<span>'.$address.', '.$postal.'</span><br />';

            echo '<span>'.$city.', '.$province.'</span><br />';

            echo '</div>';

            echo '<div class="container">';

            echo '<h1>Payment</h1>';

            echo '<span>'.$_POST["payment"].'</span><br />';

            if(($_POST["payment"] == "Visa") ||
               ($_POST["payment"] == "MasterCard") ||
               ($_POST["payment"] == "Amex")){

               echo '<span>'.$ccname.'</span><br />';

               echo '<span>'.$ccnum.' '.$ccsc.'</span>';

            } else if($_POST["payment"] == "PayPal"){

               echo '<span>'.$ppname.'</span><br />';
            }

            echo '</div>';

            echo '<div class="container">';

            echo '<h1>Purchases</h1>';

            echo '<span>Cart information goes here.</span>';

            echo '</div>';

            echo '</div>';

            echo '</div>';

            echo '</div>';
         }

      ?>
 
      <div class="container">

        <div class="section" id="checkout">

            <h1>Checkout</h1>

            <form id="signup" method="post"
                  action="<?php echo $_SERVER["PHP_SELF"]; ?>" />

               <div class="section">

                  <div class="container">

                     <span class="text">First</span><br />

                     <input type="text" id="firstname" name="firstname"

                        <?php 

                           if(!empty($_POST["firstname"]))
                              echo 'value='.$_POST["firstname"];
                        ?>

                     /><br />

                     <span class="error"><?= $firstname_err ?></span>

                  </div>

                  <div class="container">

                     <span class="text">E-mail</span><br />

                     <input type="text" id="email" name="email"

                        <?php 

                           if(!empty($_POST["email"]))
                              echo 'value='.$_POST["email"];
                        ?>

                     /><br />

                     <span class="error"><?= $email_err ?></span>

                  </div><br />

                  <div class="container">

                     <span class="text">Last</span><br />

                     <input type="text" id="lastname" name="lastname"

                        <?php 

                           if(!empty($_POST["lastname"]))
                              echo 'value='.$_POST["lastname"];
                        ?>

                     /><br />

                     <span class="error"><?= $lastname_err ?></span>

                  </div>

                  <div class="container">

                     <span class="text">E-mail</span>

                     <span class="subtext">Repeat</span><br />

                     <input type="text" id="email" name="emailrep"

                        <?php 

                           if(!empty($_POST["emailrep"]))
                              echo 'value='.$_POST["emailrep"];
                        ?>

                     /><br />

                     <span class="error"><?= $emailrep_err ?></span>

                  </div><br />

                  <div class="container">

                     <span class="text">Subscribe to newsletter?</span>

                     <span class="subtext">Yes</span>

                     <input type="checkbox" id="subyes" name="subyes"/>

                     <span class="subtext">No</span>

                     <input type="checkbox" id="subno" name="subno" checked /><br />

                     <span class="error"><?= $subscribe_err ?></span>

                  </div><br />

                  <div class="container">

                     <span class="subtext">Checkout as Guest</span>

                     <input type="checkbox" id="guestyes" name="guestyes"
                        <?php 

                           if(isset($_POST["guestyes"]))
                              echo 'checked';
                        ?>
                     />

                  </div><br />

                  <div class="container">

                     <span class="text">Password</span><br />

                     <input type="password" id="passw" name="passw" /><br />

                     <span class="error"><?= $passw_err ?></span>

                  </div>

                  <div class="container">

                     <span class="text">Password</span>

                     <span class="subtext">Repeat</span><br/>

                     <input type="password" id="passwrep" name="passwrep" /><br />

                     <span class="error"><?= $passwrep_err ?></span>

                  </div><br />

                  <div class="container">

                     <span class="text">Phone</span><br />

                     <input type="text" id="phone" name="phone"

                        <?php 

                           if(!empty($_POST["phone"]))
                              echo 'value='.$_POST["phone"];
                        ?>

                     /><br />

                     <span class="error"><?= $phone_err ?></span>

                  </div>

                  <div class="container">

                     <span class="text">Postal Code</span><br />

                     <input type="text" id="postal" name="postal"

                        <?php 

                           if(!empty($_POST["postal"]))
                              echo 'value='.$_POST["postal"];
                        ?>

                     /><br />

                     <span class="error"><?= $postal_err ?></span>

                  </div><br />

                  <div class="container">

                     <span class="text">Address</span><br />

                     <input type="text" id="address" name="address"

                        <?php 

                           if(!empty($_POST["address"]))
                              echo 'value='.$_POST["address"];
                        ?>

                     /><br />

                     <span class="error"><?= $address_err ?></span>

                  </div>

                  <div class="container">

                     <span class="text">City</span><br />

                     <input type="text" id="city" name="city"

                        <?php 

                           if(!empty($_POST["city"]))
                              echo 'value='.$_POST["city"];
                        ?>

                     />

                     <select id="provinces" name="provinces" >

                        <?php

                           $file = file_get_contents('resources/provinces.txt');

                           $provinces = explode(",", $file);

                           foreach($provinces as $province){

                              echo '<option value="'.$province.'">'.$province;
                              echo '</option>';
                           }
                        ?>

                     </select><br />

                     <span class="error"><?= $city_err ?></span>

                  </div>

                </div><br />

                <div class="section">

                  <div class="container">

                     <span class="text">Payment Type</span><br />

                     <input type="radio" id="visa" name="payment" value="Visa"
                        <?php 

                           if((isset($_POST["payment"])) &&
                              ($_POST["payment"] == "Visa"))
                              echo 'checked';
                        ?>
                     />

                     <img src="resources/icons/visa.png" alt="Visa"
                          align="middle" />

                     <input type="radio" id="mc" name="payment" value="MasterCard"
                        <?php 

                           if((isset($_POST["payment"])) &&
                              ($_POST["payment"] == "MasterCard"))
                              echo 'checked';
                        ?>
                     />

                     <img src="resources/icons/mastercard.png" alt="MasterCard"
                          align="middle" />

                     <input type="radio" id="amex" name="payment" value="Amex"
                        <?php 

                           if((isset($_POST["payment"])) &&
                              ($_POST["payment"] == "Amex"))
                              echo 'checked';
                        ?>
                     />

                     <img src="resources/icons/amex.png" alt="Amex"
                          align="middle" />

                     <input type="radio" id="paypal" name="payment" value="PayPal"
                        <?php 

                           if((isset($_POST["payment"])) &&
                              ($_POST["payment"] == "PayPal"))
                              echo 'checked';
                        ?>
                     />

                     <img src="resources/icons/paypal.png" alt="PayPal"
                          align="middle" /><br />

                     <span class="error"><?= $payment_err ?></span>

                  </div><br />

                  <div class="container" id="ccnum">

		     <span class="text">Credit Card # and CSC</span><br />

                     <input id="ccnum" type="text" name="ccnum"

                        <?php 

                           if(!empty($_POST["ccnum"]))
                              echo 'value='.$_POST["ccnum"];
                        ?>

                     />

                     <input id="ccsc" type="text" name="ccsc"

                        <?php 

                           if(!empty($_POST["ccsc"]))
                              echo 'value='.$_POST["ccsc"];
                        ?>

                     /><br />

                     <span class="error"><?= $cc_err ?></span>

                  </div>

                  <div class="container" id="ccname">

                     <span class="text">Name on Card</span><br />

                     <input id="ccname" type=text name="ccname"

                        <?php 

                           if(!empty($_POST["ccname"]))
                              echo 'value='.$_POST["ccname"];
                        ?>

                     /><br />

                     <span class="error"><?= $ccname_err ?></span>

                  </div>

                  <div class="container" id="pp">

                     <span class="text">PayPal Account</span><br />

                     <input type=text id="ppname" name="ppname"

                        <?php 

                           if(!empty($_POST["ppname"]))
                              echo 'value='.$_POST["ppname"];
                        ?>

                     /><br />

                     <span class="error"><?= $paypal_err ?></span>

                  </div>

               </div>

               <input type="submit" id="order" class="submit" value="" />

            </form>

            <form id="signin">

               <div class="section">

                  <h1>Returning Customer?</h1>

                  <div class="container">

                     <span class="text">E-mail</span><br />

                     <input type=text id="email" name="email" /><br />

                  </div><br />

                  <div class="container">

                     <span class="text">Password</span><br />

                     <input type=password id="password" name="password" /><br />

                  </div>

                  <div class="container">

                     <span class="subtext">Keep me logged in.</span>

                     <input type="checkbox" id="remember" name="remember"/>

                  </div><br />

                  <input type="submit" id="login" class="submit" value="Sign In" />

               </div>

            </form>

         </div>

      </div>

      <footer>

         Copyright &#169 TASMANTIS.NET<br />
         <em>This website is for demonstrational purposes only.</em>

      </footer>

   </body>

</html>
