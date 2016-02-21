<style type="text/css">
	/*.form-control{


		margin-top: 10px;
	}*/


   .form-control{
        margin-top: -50px;
        float: right;
    }


</style>

<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
    <fieldset>
		<div class="input-group">
			<input type="text" name="s" id="search" placeholder="<?php _e("Procurar","wpbootstrap"); ?>" value="<?php the_search_query(); ?>" class="form-control" />
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search form-control-feedback" style="float:left;  "></i></button>
			</span>
		</div>
    </fieldset>
</form>