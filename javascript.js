/*
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

          File:           javascript.js
*/

$(function(){

   function getProducts(){

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){

		if(xhttp.readyState == 4 && xhttp.status == 200)
			loadProducts(xhttp);
  	};

	xhttp.open("GET", "resources/xml/products.xml", true);
	xhttp.send();
   }

   function loadProducts(xml){

	var x = xml.responseXML;

	x = x.getElementsByTagName("product");


	for (i = 0; i < x.length; i++){


		var title_val = x[i].getElementsByTagName("title")[0]
		                    .childNodes[0].nodeValue;

		var title = $("<div></div>").addClass("title")
		                            .text(title_val);


		var id_val = x[i].getElementsByTagName("id")[0]
		                 .childNodes[0].nodeValue;

		var id = $("<div></div>").addClass("id")
	                                 .text("Product ID: ")
		                         .append(id_val);


		img_path = "resources/img/branch/" + id_val + ".png";

		var img = $("<img />").attr("src", img_path)
		                      .attr("alt", title_val);


		var description_val = x[i].getElementsByTagName("description")[0]
		                          .childNodes[0].nodeValue;

		var description = $("<div></div>").addClass("description")
		                                  .text(description_val);


		var addcart = $("<button></button>").val("Add to Cart")
		                                    .text("Add to Cart");


		var qnty = $("<input />").addClass("qnty")
		                         .attr("type","text")
		                         .val("1");


		var stock_val = x[i].getElementsByTagName("stock")[0]
		                    .childNodes[0].nodeValue;

		var stock = $("<span></span>").addClass("stock");

		if(stock_val > 0)
			stock.append(stock_val + " in Stock");
		else{

			stock.append("Out of Stock");

			addcart.attr("disabled", "disabled");

			qnty.attr("disabled", "disabled")
			    .val(0);

		}


		var price_val = x[i].getElementsByTagName("price")[0]
		                    .childNodes[0].nodeValue;

		var price = $("<div></div>").addClass("price")
		                            .text("$").append(price_val)
		                            .append("<br />");

		price.append(stock);


		var products = $("#products").find(".container");

		products.append($("<div></div>").addClass("product")
		                                .append(img, title, id, description,
	        	                                addcart, qnty, price));
	}
   }


   getProducts();


   var guest = false;

   $("#guestyes").click(function(){

	guest = !guest;


   	if(guest){

		$("#passw").attr("disabled", "disabled")
		           .parent().children("span").css("opacity", "0.5");

		$("#passwrep").attr("disabled", "disabled")
		              .parent().children("span").css("opacity", "0.5");

   	} else{

		$("#passw").removeAttr("disabled")
		           .parent().children("span").css("opacity", "1.0");

		$("#passwrep").removeAttr("disabled")
		              .parent().children("span").css("opacity", "1.0");
	}
   });

   if($("#guestyes").attr("checked") == "checked"){

	guest = true;


	$("#passw").attr("disabled", "disabled")
		   .parent().children("span").css("opacity", "0.5");

	$("#passwrep").attr("disabled", "disabled")
		      .parent().children("span").css("opacity", "0.5");
   }


   var credit_radio = $("#visa, #mc, #amex");
   var paypal_radio = $("#paypal");

   credit_radio.click(function(){

	$("#ccnum").css("display", "inline-block");

	$("#ccname").css("display", "inline-block");

	$("#pp").css("display", "none");
   });

   paypal_radio.click(function(){

	$("#ccnum").css("display", "none");

	$("#ccname").css("display", "none");

	$("#pp").css("display", "inline-block");
   });

   if(paypal_radio.attr("checked") == "checked"){

	$("#ccnum").css("display", "none");

	$("#ccname").css("display", "none");

	$("#pp").css("display", "inline-block");
   }


   $("#receipt").children(".close").click(function(){

	window.scrollTo(0,0);

	$(".modal").css("display", "none");

   });

});
