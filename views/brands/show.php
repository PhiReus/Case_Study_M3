
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
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><?= $r['id']; ?></th>
                  <td><?= $r['name']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
      <a type="button" href="?controller=brand&action=index" class="btn btn-secondary">BACK</a>
    </div>
    <!-- END: @yield('content') -->
  </div>