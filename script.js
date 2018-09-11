function hidingComments () {
    var btn = document.getElementsByClassName('btn');

    var btnComments = document.getElementById("postComments");
    if (btnComments.style.display === "none") {
        btnComments.style.display = "block";

    } else {
        btnComments.style.display = "none";
      }

    }
