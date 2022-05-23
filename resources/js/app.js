require('./bootstrap');

$(function () {

  $('.inner').hide();

  $('#user_click p').click(function () {
    $('.inner').slideToggle();
  });
});
