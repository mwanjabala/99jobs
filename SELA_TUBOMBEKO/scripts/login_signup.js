// code to switch between login and signup forms

$(document).ready(function(){
  //show login form / hide signup
  $("#show_login").click(function() {
    $("#show_login").addClass('cur_form');
    $("#show_signup").removeClass('cur_form');
    $("#login_form").removeClass("hidden");
    $("#signup_form").addClass("hidden");
  });

  $("#show_signup").click(function() {
    $("#show_login").removeClass('cur_form');
    $("#show_signup").addClass('cur_form');
    $("#signup_form").removeClass('hidden');
    $("#login_form").addClass('hidden');
  })


});
