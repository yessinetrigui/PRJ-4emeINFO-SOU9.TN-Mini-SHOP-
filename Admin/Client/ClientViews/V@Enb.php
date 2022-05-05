<!-- Modal -->
<div class="modal fade" id="EnbClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enable Client Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-inline" method="POST" action="../ClientController/operation.php?cmd=Enb">
        <div class="form-group mb-2">
            <label for="staticEmail2" class="sr-only">Client Id :</label>
            <input  name='idClient' type="text" class="form-control" id="inputEmail4" placeholder="..." required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary mb-2">Enable Client</button>
        </div>
      </form>
    </div>
  </div>
</div>
