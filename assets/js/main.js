$(function () {
  var prevCaption = $("#navCaption").text(),
    currentSection = 0;
  $("#regForm > nav > a").click(function () {
    var getAttr = $(this).attr("for"),
      navCaption;
    $("#regForm > nav > a").removeClass("active");
    $(this).addClass("active");

    if (getAttr == "login") {
      $("#signupSection")
        .attr("class", "animated fadeOut")
        .hide();
      navCaption = prevCaption;
    } else if (getAttr == "signup") {
      $("#loginSection")
        .attr("class", "animated fadeOut")
        .hide();
      navCaption = "Create an Account";
    }
    $(`#${getAttr}Section`)
      .attr("class", "animated fadeIn")
      .show();
    $("#navCaption").text(navCaption);
  });

  $("input[for='nexprv']").click(function () {
    var val = $(this).val(),
      sections = $(".section");
    if (val == "Next") {
      currentSection += 1;
    } else {
      currentSection -= 1;
    }
    sections.removeClass("active");
    sections.eq(currentSection).addClass("active");
  });

  $("input[for='signup']").click(function () {
    $(".fb_alert").remove();
    var sect = $("#signupSection");
    var formData = sect.serializeArray();

    // feedback displayed to user
    var feedback = function (text, color = "danger") {
      return `<div class="alert alert-${color} h6 show fb_alert" role="alert">
    <small>${text}</small>
  </div>`;
    };

    // clear input field values
    var clearfield = function () {
      sect.find(":reset").trigger("click");
    };

    // check for empty input fields
    formData.forEach(data => {
      let elem = sect.find($(`input[name='${data.name}']`)).siblings("label"),
        text = elem.children("label").attr("for");
      elem.children(".err").remove();
      if (data.value == "") {
        elem.append(
          `<small class="float-right text-danger err">${text} is required</small>`
        );
      }
    });

    // get input field values
    let em, p1, p2;
    sect.find(":input").each(function () {
      let $this = $(this),
        attr = $this.attr("name");
      if (attr == "p1") {
        p1 = $this.val();
      }

      if (attr == "p2") {
        p2 = $this.val();
      }

      if (attr == "email") {
        em = $this.val();
      }
    });

    // validate input values
    var validate = (function (p1, p2, em, sect, fb) {
      let status = false;

      if ((em && p1 && p2) != "") {
        status = true;
      }

      if (em !== "") {
        if (!(em.match(/([@])/) && em.match(/([.])/))) {
          sect.prepend(fb("Please enter a valid email"));
          status = false;
        }
      }

      if (p1 !== "" && p2 !== "") {
        if (
          (p1.length > 0 && p1.length < 4) ||
          (p2.length > 0 && p2.length < 4)
        ) {
          status = false;
          sect.prepend(fb("Password should be minimum 4 characters"));
        } else {
          if (p1 !== p2) {
            sect.prepend(fb("Passwords does not match"));
            status = false;
          }
        }
      }

      // send form data
      if (status == true) {
        var ajxdata = sect.serialize();
        $(".pgbar").slideDown();
        $.post("signup", { obj: ajxdata, title: "signup" }, function (res) {
          $(".fb_alert").remove();
          let resp = JSON.parse(res);
          $(".pgbar").slideUp();
          if (resp.status == false) {
            sect.prepend(fb(resp.msg, "danger"));
          } else {
            sect.prepend(fb(resp.msg, "success"));
            clearfield();
            setTimeout(function () {
              $(".fb_alert")
                .animate({ opacity: "0" }, "slow")
                .slideUp();
            }, 60000);
          }
        });
      }
    })(p1, p2, em, sect, feedback);
  });


  $(".togglebtn").click(function () {
    $("#db_sidebar").toggleClass("active");
  })

  // end of file
});
