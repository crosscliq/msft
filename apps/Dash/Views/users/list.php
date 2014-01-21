<?php //echo \Dsc\Debug::dump( $state, false ); ?>
<?php //echo \Dsc\Debug::dump( $list ); ?>
<div class="toolbar">
<a class="btn btn-success pull-right" href="/user">Create User</a>
</div>
<br clear="both"><br clear="both">
<form id="list-form" action="" method="post">
<div class="widget-header"> <i class="icon-table"></i>
              <h3>Users</h3>
            </div>
<div class="widget-content">
    <div class="row">
        <div class="col-sm-2">
            <div class="row row-marginless">
                <?php if (!empty($list['subset'])) { ?>
                <div class="col-sm-4">
                    <?php echo $pagination->getLimitBox( $state->get('list.limit') ); ?>
                </div>
                <?php } ?>
				<?php if (!empty($list['count']) && $list['count'] > 1) { ?>                                
                <div class="col-sm-8">
                    <?php echo $pagination->serve(); ?>
                </div>
                <?php } ?>
            </div>
        </div>    
        <div class="col-sm-4  pull-right">
            <div class="input-group">
                <input class="form-control" type="text" name="filter[keyword]" placeholder="Keyword" maxlength="200" value="<?php echo $state->get('filter.keyword'); ?>"> 
                <span class="input-group-btn">
                    <input class="btn btn-primary" type="submit" onclick="this.form.submit();" value="Search" />
                </span>
            </div>
        </div>
    </div>
    
    <input type="hidden" name="list[order]" value="<?php echo $state->get('list.order'); ?>" />
    <input type="hidden" name="list[direction]" value="<?php echo $state->get('list.direction'); ?>" />

   <!-- <div class="row table-actions">
        <div class="col-md-6 col-lg-4 input-group">
            <select id="bulk-actions" name="bulk_action" class="form-control">
                <option value="null">-Bulk Actions-</option>
                <option value="delete" data-action="./admin/users/delete">Delete</option>
            </select>
            <span class="input-group-btn">
                <button class="btn btn-default bulk-actions" type="button" data-target="bulk-actions">Apply</button>
            </span>
        </div>
    </div>
    -->
    <div class="table-responsive datatable">
    
    <table class="table table-striped table-hover table-highlight table-checkable">
		<thead>
			<tr>
				<th class="checkbox-column"><input type="checkbox" class="icheck-input"></th>
                <th>First Name</th>
                <th data-sortable="last_name">Last Name</th>

                <th data-sortable="email">Email</th>
                <th></th>

            </tr>
			<tr class="filter-row">
		  <th></td>
                <th>
                    <input placeholder="First Name" name="filter[first_name-contains]" value="<?php echo $state->get('filter.first_name-contains'); ?>" type="text" class="form-control input-sm">
                </th>
                <th>
                    <input placeholder="Last Name" name="filter[last_name-contains]" value="<?php echo $state->get('filter.last_name-contains'); ?>" type="text" class="form-control input-sm">
                </th>	
                <th>
                    <input placeholder="Email" name="filter[email-contains]" value="<?php echo $state->get('filter.email-contains'); ?>" type="text" class="form-control input-sm">
                </th>
		  <th></th>
  
            </tr>
		</thead>
		<tbody>    
        
        <?php if (!empty($list['subset'])) { ?>
    
            <?php foreach ($list['subset'] as $item) { ?>
                <tr>
	                <td class="checkbox-column">
	                    <input type="checkbox" class="icheck-input" name="ids[]" value="<?php echo $item->id; ?>">
	                </td>  
                    <td class="">
                        <?php echo $item->first_name; ?>
                    </td>
                    <td class="">
                        <?php echo $item->last_name; ?>
                    </td>              
                    <td class="">
                        <?php echo $item->email; ?>
                    </td>

                    <td class="text-center">
                        <a class="btn btn-s btn-success" href="./admin/user/<?php echo $item->id; ?>/edit">
                            <i class="icon-edit"></i>
                        </a>
	                    &nbsp;
	                    <a class="btn btn-s btn-danger" data-bootbox="confirm" href="./admin/user/<?php echo $item->id; ?>/delete">
	                        <i class="icon-trash"></i>
	                    </a>
                    </td>
                </tr>
            <?php } ?>
        
        <?php } else { ?>
            <tr>
            <td colspan="100">
                <div class="">No items found.</div>
            </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
    
    </div>
    
    <div class="row datatable-footer">
        <?php if (!empty($list['count']) && $list['count'] > 1) { ?>
        <div class="col-sm-10">
            <?php echo (!empty($list['count']) && $list['count'] > 1) ? $pagination->serve() : null; ?>
        </div>
        <?php } ?>
        <div class="col-sm-2 pull-right">
            <div class="datatable-results-count pull-right">
            <?php echo $pagination ? $pagination->getResultsCounter() : null; ?>
            </div>
        </div>
    </div>    
    
</form>
</div>