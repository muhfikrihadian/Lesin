$(document).ready(function() {
  $("input[name='roomName'], input[name='username']").keypress(function (e) {
    if (e.which === 32) {
      return false;
    }
  });
});
