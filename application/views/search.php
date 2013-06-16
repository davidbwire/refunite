    <!DOCTYPE html>
    <html>
    <head>
    <title>Refunite Hack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
     <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css"/>
  
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/refunite.js"></script>
    </head>
    <body>
     <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="http://localhost/refunite/index.php/search">Intelligent Search</a>
          <div class="nav-collapse collapse">
         
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
      	<h3>Welcome to Group search</h3>
      	<p></p>
      	<form class="form-inline">
      		<div class="row">
      		<div class="span3">
      			<label>Country of origin</label>
      			 <input type="text" placeholder="">
      		      
      		</div>
      		<div class ="span3">
      			<label>Last  seen</label>
      			 <input type="text" placeholder="">
      		     
      		</div>
      		<div class="span3">
      			<label>Year lost</label>
      			 <input type="text" placeholder="">
      		      
      		</div>
      		   
	</div>
		</form
       
        <p><a href="http://localhost/refunite/index.php/search/getAll" class="btn btn-primary btn-large">Search &raquo;</a></p>
       
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span9">
        	<table class="table table-striped">
        	<?php	if(isset($user)){?>
        	<?php foreach ($user as $result) {?>
			    <tr><td><a href="http://localhost/refunite/index.php/search/getUser/<?php echo $result->id;  ?>"><?php echo $result->fname; ?></a></td><td><?php echo $result->lname; ?></td><td><?php echo $result->country_of_origin;?></td><td><?php echo $result->last_sighting;?></td>
			    	<td><?php echo $result->year_separated; ?></td>
			    	
			    </tr>
    		<?php }} ?>
    		</table>
        	
        	<table class="table table-striped">
        	<?php	if(isset($results)){?>
        	<?php foreach ($results as $result) {?>
			    <tr><td><a href="http://localhost/refunite/index.php/search/getUser/<?php echo $result->id;  ?>"><?php echo $result->fname; ?></a></td><td><?php echo $result->lname; ?></td><td><?php echo $result->country_of_origin;?></td><td><?php echo $result->last_sighting;?></td>
			    	<td><?php echo $result->year_separated; ?></td>
			    	
			    </tr>
    		<?php }} ?>
    		</table>
    		
    		<li id="more"><a href="#">Apply more Filters</a></li>
    		<div class="span9" id="filters">
    			<div class="row">
    				<form class="form-inline">
    				<div class="span2">
    					<label>name</label>
      			 <input type="text" placeholder="">
    					
    				</div>
    				<div class="span2">
    					<label>apperance</label>
      			 <input type="text" placeholder="">
    					
    				</div>
    				<div class="span2">
    					<label>age</label>
      			 <input type="text" placeholder="">
    					
    				</div>
    				
    				</div>
    				<div class="span2">
    				<p><a href="#" class="btn btn-primary btn-small">Search &raquo;</a></p>
    				</div>
    			
    			</div>
    			 
    			</form>
        </div>
        
        <div class="span3">
          <h2>Team up with</h2>
          <ul>
         <li class="team"><a href="#">Andrew kimani</a></li>
         <li class="team"><a href="#">John Doe</a></li>
         <li class="team"><a href="#">Mary denver</a></li>
         </ul>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div>
   
    </body>
    </html>