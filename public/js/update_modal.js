$(function () {

  $('.inner').hide();

  $('#user_click p').click(function () {
    $('.inner').slideToggle();
  });
});

$(function () {

  $('.js-modal-open').on('click', function () {
    var target = $(this).data('target');
    var modal = document.getElementById(target);
    $(modal).fadeIn();
    return false;
  });
});
