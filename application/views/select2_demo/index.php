<form class="form-horizontal" id="myForm" method="post" action="<?php echo base_url().'Select2/add_select'; ?>">
    <div class="form-group">
        <label class="control-label col-md-3">Department</label>
        <div class="col-md-4">
            <input class='form-control col-lg-5 itemSearch' name="Keywords" id="Keywords" type='text' placeholder='Select Keywords' />
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</form>