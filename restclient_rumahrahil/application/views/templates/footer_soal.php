<section>
    <div class="footer-copyright text-light text-center py-3 bg-primary fixed-bottom">
        <span>copyright &copy; <script>
                document.write(new Date().getFullYear());
            </script> - developed by
            <b><a>Private Coding</a></b>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="assets/js/fontawesome.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "500px";
        document.getElementById("main").style.marginRight = "500px";
    }

    /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
    }

    $(document).ready(function() {
        let counter = $('#counter').val();
        console.log(counter);
        $('#soal1').show();
        $('#btnback1').hide();
        for (let i = 2; i <= counter; i++) {
            $(`#soal${i}`).hide();
        }
        //script button next
        for (let hal = 1; hal <= counter; hal++) {
            $(`#btnnext${hal}`).on('click', function() {
                for (let i = 1; i <= counter; i++) {
                    $(`#soal${i}`).hide();
                    if (i == hal + 1) {
                        $(`#soal${hal+1}`).show();
                    }
                }
            });
        }
        //script button back
        for (let hil = counter; hil >= 1; hil--) {
            $(`#btnback${hil}`).on('click', function() {
                for (let a = counter; a >= 1; a--) {
                    $(`#soal${a}`).hide();
                    if (a == hil - 1) {
                        $(`#soal${hil-1}`).show();
                    }
                }
            });
        }
        for (let ind = 1; ind <= counter; ind++) {
            if (ind == counter) {
                console.log(ind);
                $(`#btnsubmit${ind}`).show();
                $(`#btnnext${ind}`).hide();
            } else {
                $(`#btnsubmit${ind}`).hide();
            }
        }
    });
</script>
</body>

</html>