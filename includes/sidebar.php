
<div class="panel panel-default sidebar-menu">
    <div class="panel-heading"> <!--panel-heading start-->
        <h3 class="panel-title">Product Categories</h3>
    </div><!--panel-heading end-->
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            <?php       
            getPCats();
            ?>
        </ul>
    </div>
</div>

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading"> <!--panel-heading start-->
        <h3 class="panel-title">Categories</h3>
    </div><!--panel-heading end-->
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            <?php 
             getCat(); 
            ?>
        </ul>
    </div>
</div>