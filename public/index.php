<?php
  
require_once '../includes/helpers.php';
require_once '../includes/MenuTree.php';

?>

<?php include('../includes/header.php'); ?>

    <div class="row">
      <div id="categories_container" class="col-md-4 col-lg-4" 
        style="background-color: #fff; height: 400px;">
         <!-- sidebar post category list -->
        <?php
          $menuObject = new MenuTree();
          echo $menuObject->getMenuTree(0);
        ?>
      </div>
      <div class="col-md-8 col-lg-8">
        <!-- posts loop -->
      </div>
    </div>

<?php include('../includes/footer.php'); ?>

<script>
  
  $(document).ready(function () 
  {
    
  });

</script>

</body>
</html>