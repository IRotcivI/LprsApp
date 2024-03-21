$(document).ready(function() {
    $("select.jklm").change(function() {
        let selectedItem = $(this).children("option:selected").val();
        alert("You have selected the name - " + selectedItem);
        var img = document.createElement('img')
        img.src = selectedItem;
        document.getElementById('piece').appendChild(img);
    });
});