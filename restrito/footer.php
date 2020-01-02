    
    <?php include_once('menu.php'); ?>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../css/js/materialize.js"></script>

    <script>
        $(document).ready(function(){
            $('.modal').modal();
            
            // $('.fixed-action-btn').floatingActionButton({
            //     toolbarEnabled: true,
            //     direction: 'left',
            //     hoverEnabled: false,
            // });
            
            $('.tooltipped').tooltip();
        });
        // document.addEventListener('DOMContentLoaded', function () {
        //     var elems = document.querySelectorAll('.fixed-action-btn');
        //     var instances = Materialize.FloatingActionButton.init(elems, {
        //         direction: 'left',
        //         hoverEnabled: false,
        //         toolbarEnabled: true
        //     });
        //     var elems = document.querySelectorAll('.modal');
        //     var instances = Materialize.Modal.init(elems, options);
        // });
        // Or with jQuery


    </script>
</body>

</html>
