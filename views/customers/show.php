<div class="main-panel">
  <div class="content-wrapper">
    <!-- @yield('content') -->
    
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">NAME</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">IMAGE</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><?= $r['id']; ?></th>
                    <td><?= $r['name']; ?></td>
                    <td><?= $r['phone']; ?></td>
                    <td><?= $r['address']; ?></td>
                    <td><img width="100" src="<?php echo ROOT_URL . $r['image']; ?>" alt=""></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        <a type="button" href="?controller=customer&action=index" class="btn btn-secondary">BACK</a>
      </div>
      <!-- END: @yield('content') -->
    </div>