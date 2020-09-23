<!-- toggle sidebar -->
<script>
    function toggleHide() {
        var a = document.getElementById("sideMnu");
        if (a.style.width === "230px") {
            document.getElementById("sideMnu").style = "width: 0px;";
            document.getElementById("appcontnt").style = "margin-left: 0px;";
        } else {
            document.getElementById("sideMnu").style = "width: 230px;";
            document.getElementById("appcontnt").style = "margin-left: 0px;";
        }
    }
</script>

<!-- required js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
