
// execute on document ready
$(function(){

  // hook into click event for navigation link elements
  $('.nav-link').click(function(e){

    // stops page from navigating away to linked page (ie default behavior)
    e.preventDefault();

    // save this to 'link' variable
    // ('this' in javascript is a bit quirky, can explain why on skype,
    // makes the code easier to read anyway)
    var link = $(this);

    // ajax get request to server, this.href equals the href in the link
    // clicking the home page link would mean -> $.get('localhost/', ...
    //                and the video page link -> $.get('localhost/videos', ...
    $.get(link.attr('href'), function(view){
      // this code is called once the server responds
      // (see the php controller code to see how it goes about building it's response)

      // view = the html spat out by the server

      $('.view').html(view); // put the view into our div we have allocated to hold our view

      // adds highlighting to the current link, removes it from all the others
      var li = link.parent();
      li.addClass('active');
      li.siblings().removeClass('active');
    });

  });

});
