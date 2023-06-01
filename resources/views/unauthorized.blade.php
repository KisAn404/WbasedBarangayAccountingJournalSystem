<div id="unauthorized-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Unauthorized Access</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <p>You are not authorized to access this resource.</p>
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $(document).ajaxError(function(event, jqxhr, settings, exception) {
      if (jqxhr.status == 403) {
        $('#unauthorized-modal').modal('show');
      }
    });
  });
</script>
