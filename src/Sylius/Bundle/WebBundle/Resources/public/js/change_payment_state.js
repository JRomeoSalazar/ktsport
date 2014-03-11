$(document).on("ready", function () {
  $("span.contrareembolso").hover(
    function() {
      $(this).removeClass("label-primary");
      $(this).addClass("label-success");
      $(this).html("Pagado C. Reembolso");
    },
    function() {
      $(this).removeClass("label-success");
      $(this).addClass("label-primary");
      $(this).html("Contra Reembolso");
    }
  );
  $("span.transferencia").hover(
    function() {
      $(this).removeClass("label-warning");
      $(this).addClass("label-success");
      $(this).html("Pagado Transferencia");
    },
    function() {
      $(this).removeClass("label-success");
      $(this).addClass("label-warning");
      $(this).html("Pendiente Transferencia");
    }
  );
});