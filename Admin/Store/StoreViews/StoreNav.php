<div id="app">

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-16">
                        <div class="card">
                            <div class="card-header">STORE Manage</div>
                            <div class="card-body">
                            <div class="card">
                        </div>
                            </div>
                            <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card">
                                        <a href="V@add.php" type="button" class="btn btn-success" data-toggle="modal"   data-target="#AddModal">Add New item</a>
                                    </div>    
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <a href="V@delete.php" type="button" class="btn btn-danger" data-toggle="modal"   data-target="#RemvModal">Remove Item</a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-sm">
                                <div class="card">
                                <a href="StorePanel.php" type="button" class="btn btn-secondary">Show All items </a>
                                </div>    
                            </div>
                            <form action="V@modify.php" method="post">
                                <div class="row">
                                    
                                <div class="col-sm">
                                        <div class="card">
                                        <input name='idItem' type="text" class="form-control" id="inputEmail4" placeholder="Reference">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="card">
                                            <button type="submit" class="btn btn-warning" data-toggle="modal"   data-target="#SendNoteModal">Modify Item</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>