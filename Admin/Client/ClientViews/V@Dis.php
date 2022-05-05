<!-- Modal -->
<div class="modal fade" id="DisClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Note Livreur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-inline" method="POST" action="../ClientController/operation.php?cmd=dis">
        <div class="form-group mb-2" >
            <label for="staticEmail2" class="sr-only">Client Id:</label>
            <input  name='idClient' type="text" class="form-control" id="inputEmail4" placeholder="..." required>
            <br>
            <label for="staticEmail2" class="sr-only">Reason:</label>

            <textarea name="Reason" class="form-control" id="validationTextarea" placeholder="Write Your Reason Here" required></textarea>

        </div>
    
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary mb-2">Disable Client</button>
      </div>
      </form>
    </div>
  </div>
</div>
