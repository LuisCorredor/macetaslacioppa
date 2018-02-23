<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.3.5/dist/sweetalert2.all.min.js"></script>
<script>
    $('.button-collapse').sideNav({
        menuWidth: 240, // Default is 240
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true // Choose whether you can drag to open on touch screens
    });

    $(document).ready(function() {
        $('select').material_select();
    });

    $(document).ready(function() {
        $('.slider').slider();
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
    });


    $(function() {

        $('a[href*=#]').click(function() {

            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname) {

                var $target = $(this.hash);

                $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');

                if ($target.length) {

                    var targetOffset = $target.offset().top;

                    $('html,body').animate({
                        scrollTop: targetOffset
                    }, 1000);

                    return false;

                }

            }

        });

    });
</script>

<?php 
    if (isset($_SESSION['flash'])) : 
?>
<script>
    swal({
        title: "<?php echo $_SESSION['flash']['title'] ?>",
        type: "<?php echo $_SESSION['flash']['type'] ?>",
        text: "<?php echo $_SESSION['flash']['text'] ?>",
        howConfirmButton: false
    })
</script>
<?php 
    $_SESSION['flash'] = null;
   endif; 
?>
