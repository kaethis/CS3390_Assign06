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

          File:           products.php
-->

<html>

   <head>

      <script
         src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
      </script>

      <script src="javascript.js" type="text/javascript"></script>

      <link rel="stylesheet" href="stylesheet.css" />

      <title>Tree Branches Unlimited | Products</title>

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

         <li id="selected"><a href="products.php">Products</a></li>

         <li><a href="index.php">Contact Us</a></li>

         <li id="cart">

            <a href="cart.php">

               <img src="resources/icons/cart.png" alt="Cart" />
               Cart

            </a>

         </li>

      </ul>

      <div class="container">

         <div class="section" id="products">

            <ul class="selectbar">

               <li id="selected">Branches</li>

               <li>Twigs</li>

            </ul>

            <div class="container">

               <!-- Products are loaded here in JavaScript. -->

            </div>

         </div>

      </div>


      <footer>

         Copyright &#169 TASMANTIS.NET<br />
         <em>This website is for demonstrational purposes only.</em>

      </footer>

   </body>

</html>
