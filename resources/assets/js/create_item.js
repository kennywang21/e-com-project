$( document ).ready(function() {
  $("#picture").change(showImage);


});

function showImage(event) {
    var place = document.getElementsByClassName('place')[0];

    for (var i = 0; i < event.originalEvent.srcElement.files.length; i++) {
        var file = event.originalEvent.srcElement.files[i];
        var img = document.createElement("img");
        var reader = new FileReader();

        reader.onloadend = function() {
             img.src = reader.result;
        }

        reader.readAsDataURL(file);
        place.appendChild(img);
        img.style.width = '100%';
    }
}
