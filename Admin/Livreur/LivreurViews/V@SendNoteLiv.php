<!-- Modal -->
<div class="modal fade" id="SendNoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Note Livreur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-inline" method="POST" action="../LivreurController/CA@Livreur.php?cmd=sendNote">
        <div class="form-group mb-2">
            <label for="staticEmail2" class="sr-only">Id Livreur</label>
            <input  name='idLiv' type="text" class="form-control" id="inputEmail4" placeholder="id...">
            <br>
            <textarea name="note" class="form-control" id="validationTextarea" placeholder="Write Your Note Here" required></textarea>

        </div>
    
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary mb-2">Send Note</button>
      </div>
      </form>
    </div>
  </div>
</div>
