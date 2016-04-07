-----------------------------------------------------------------
            _          _                         _      __   __ 
           /_\   _____(_)__ _ _ _  _ __  ___ _ _| |_   /  \ / / 
          / _ \ (_-<_-< / _` | ' \| '  \/ -_) ' \  _| | () / _ \
         /_/ \_\/__/__/_\__, |_||_|_|_|_\___|_||_\__|  \__/\___/
                        |___/                                   

-----------------------------------------------------------------
Author: 	Matt W. Martin, 4374851
		kaethis@tasmantis.net

Project:	CS3990, Assignment 06
		PHP & JavaScript

Date Issued:	14-Mar-2016
Date Archived:	XX-XXX-2016

File:		README.txt

Repository:	https://github.com/kaethis/CS3990_Assign06

Notes:		- Products are featured on their own page, namely
		  "products.php".  The content of this page is
		  generated from an XML file, "products.xml",
		  using AJAX.  I still need a mechanism for adding
		  these products to the cart, which will be accom-
		  plished using a session.  I'll be implementing
		  this fully in my final project.  Sorry.

		- Server-side validation works nicely, but I still
		  need to test fields against regular expressions
		  (again, something like this will be in my final
		  project).  That said, if a field contains a
		  string containing whitespace when the form is
		  submit w/ other fields empty or invalid, these
		  these fields will be populated again upon re-
		  loading the page with the existing input (as
		  specified in the assignment), but the string
		  will be cut-off at the first occurrance of
		  whitepace.  I'm still in the midst of fixing
		  this issue.  Again, sorry about this.

		- The "submit" button must be contained within
		  the form element it belongs to.  That said, I
		  wanted my "PLACE ORDER" button located outside
		  of that area, so I used absolute positioning to
		  place it outside of those bounds.  The space
		  normally occupied by that element still remains,
		  so I had to force its container to be smaller
		  than otherwise in order to hide that space (if
		  you inspect the elements on the page and hover
		  over the form, you'll see what I mean).  This is
		  a bit of a hassle, as different browsers render
		  this container slightly different (sometimes
		  it's too tall, other times too short).  I'm
		  still figuring out a happy medium for this.

		- I struggled with a design decision for a long
		  time which I only just came to terms with.
		  Whenever I'd hover over a button, I'd have its
		  colour be slightly lighter than its resting
		  state.  As I was finalizing the project, some-
		  thing irked me: hovered-over buttons appeared to
		  be disabled by virtue of them becoming lighter.
		  I think this is worth noting, as having them
		  become darker when hovered-over now conveys
		  exactly what I wanted them to.
