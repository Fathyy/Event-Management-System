<!-- include the validation library -->
<link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Holiday form</h3>
    </div>

    <form action="<?php echo WEB_ROOT;?>api/process.php?cmd=holiday" class="form-horizontal" method="post">
    <div class="box-body">
        <div class="form-group">
            <label for="Email" class="col-sm-4 control-label">Holiday Date</label>
            <div class="col-sm-8">
                <span id="sprytf_date">
                    <input type="text" class="form-control input-sm" name="date" placeholder="yyyy-mm-dd" id="Email">
                    <span class="textfieldRequiredMsg">Date is required.</span>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="Reason" class="col-sm-4 control-label">Holiday Reason</label>
            <div class="col-sm-8">
                <span id="sprytf_reason">
                    <input type="text" class="form-control input-sm" name="reason" placeholder="Holiday reason" id="Reason">
                    <span class="textfieldRequiredMsg">Reason is required.</span>
                    <span class="textfieldMinCharsMsg">Reason must specify at least 8 characters.</span>
                </span>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Add Holiday</button>
    </div>
    </form>
</div>

<script>
var sprytf_date = new Spry.Widget.ValidationTextField("sprytf_date", "date", {format:"yyyy-mm-dd", useCharacterMasking: true, validateOn:["blur", "change"]});
var sprytf_reason = new Spry.Widget.ValidationTextField("sprytf_reason", "none", {minChars:8, maxChars: 100, validateOn:["blur", "change"]});
</script>