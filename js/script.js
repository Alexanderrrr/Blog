function commentForm () {
  var formName = document.forms["firstForm"]["fname"].value;
  var formComment = document.forms["firstForm"]["comment"].value;
  if (formComment === "" || formName === "") {
      alert("All Fields Required");
      return false;
    }

}

function hidingComments () {
    var btn = document.getElementById('b');
    var btnComments = document.getElementById("postComments");

    if (btnComments.style.display === "none") {
        btnComments.style.display = "block";
        btn.innerText = "Hide Comments";

    } else {

        btnComments.style.display = "none";
        btn.innerText="Show Comments";

      }


}

function promptMsg () {

    var answer = prompt("Do you really want to delete this post? Y/N");
    if (answer === "n" || answer === "N") {
      return false;
    } else if (answer === "y" || answer === "Y") {
        return true;

      }
      else {
        alert("Please enter Y or N");
        return false;
      }
}
