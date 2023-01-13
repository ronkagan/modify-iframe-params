//When embedding an iframe (child page) into another page (parent page), you will receive code that looks somewhat like this:
     <!-- Start of Embed Script -->
        <div class="iframe-container" data-src="https://example.com/example?embed=true"></div>
            <script type="text/javascript" src="https://static.example.net/example/ex/example.js"></script>
    <!-- End of Embed Script -->
/*To pass query string values from the parent page to the embedded iframe/child page. 
Two reasons to do this are:
 1. Pre-populating a form (e.g. I sent an email to someone to a page where they can book a meeting with me. It's silly to ask for the email of the person I already emailed. So, instead, I'm pre-populating the iframe/form widget with the email in the parent page UTM to pass through to the child page/iframe meeting widget).
 2. Capturing Source/Medium through UTMs upon form submission to help with attribution (e.g. I will know that the person booked a meeting with me because of the UTMs that would otherwise not be present)
Form fields must match query string parameters for auto-fill to work.
Modifying the embed code allows us to see if the parent page query string parameters to pass to the child. If so, they'll be added to the iframe src URL.*/
 <!-- Start of Embed Script -->
 <!-------REPLACE THE FOLLOWING URL WITH YOUR EMBED LINK------->   
 <div class="iframe-container" data-src="https://example.com/example?embed=true"></div>
 <!-------REPLACE WHERE IT SAYS EXAMPLE------->
 <script>
  (function(){
      var exampleDiv = document.querySelector('.iframe-container');
     var currentURLparams = document.location.search;
     if(currentURLparams){
         exampleDiv.setAttribute('data-src',exampleDiv.getAttribute('data-src')+"&"+currentURLparams.substring(1));
     }
  })();
 </script>
     <script type="text/javascript" src="https://static.example.net/example/ex/example.js"></script>
<!-- End of Embed Script -->