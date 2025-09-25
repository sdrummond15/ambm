jQuery(document).ready(function ($) {
  /*MENU RESPONSIVO*/
  $(".menuresp li.parent > a, .menuresp li.parent > span").append(
    ' <button type="button"><i class="fas fa-chevron-down"></i></button>'
  );

  $(".menuresp li.parent > span").click(function () {
    $(this).siblings("ul").slideToggle();
    $(this)
      .children("button")
      .find("i")
      .toggleClass("fa-chevron-up", "fa-chevron-down");
  });

  var nextDiv = $("#header_wrap").next();
  nextDiv.css("padding-top", $("#header").height() - 1);

  $(window)
    .on("resize", function () {
      $(".menuresp").css(
        "max-height",
        $(window).height() - $("#header").height()
      );

      var menuresp = $(".gotomenu");
      menuresp.each(function () {
        if (!$(this).is(":visible")) {
          $(".menuresp").hide();
          $("#nav-icon").removeClass("open");
        }
      });

      nextDiv.css("padding-top", $("#header").height() - 1);
      
    })
    .trigger("resize");

  $(".menuresp").hide();

  $("#gotomenu").click(function () {
    $(".menuresp").slideToggle();
  });
});
