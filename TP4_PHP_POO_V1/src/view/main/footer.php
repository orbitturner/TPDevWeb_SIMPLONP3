</div>
  <!-- ENDING CONTAINER GENERAL -->
      <?php
        // var_dump($_GET['page']);
        if ($_GET['page'] == 'newClient') {
          // echo '<script> alert("CLIENT")</script>';
          echo '<script src="public/js/addClientForm.js"></script>';
          
        }elseif ($_GET['page'] == 'newAccount') {
          echo '<script src="public/js/addAccountForm.js"></script>';
          // echo '<script> alert("COMPTE")</script>';
        }
      ?>
    <!-- Main JS -->
    <script src="public/js/global.js"></script>
    
</body>

</html>