

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?= site_url('admin')?>">&lt;/ intranets &gt;</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?= site_url('admin/users/sign_out')?>"><i class="fa fa-users"></i> Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php
          foreach ($pages as $k=>$p) {
            ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/'.$k)?>">
              <span data-feather="file"></span>
              <?= $p['pages_path']?>
            </a>
          </li>
          <?php
        } ?>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <h2>Inside : <?= $page_info['pages_path']?></h2>
      <div class="card" style="width: 100%;">
        <form method="post">
          <div class="card-body">
            <h5 class="card-title">Add a new [script]</h5>
            <div class="card-text">
              <div class="form-group">
                <label>Script name</label>
                <select name="script_name" class="form-control" id="script_name">
                  <option value="" selected disabled>Choose a script</option>
                  <?php foreach ($functions as $fname=>$fpropreties) {
                    ?>
                    <option><?= $fname?></option>
                    <?php
                  } ?>
                </select>
              </div>
            </div>
            <button class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
          </div>
        </form>
      </div>
      <hr />
      <?php
      if(isset($page)){
        //$array = json_decode($page['pages_value'], true);
        //e($array);
        foreach ($page as $p) {
          ?>
          <div>
          <h4>[<?= $p['pages_process']?>]</h2>

         <div class="table-responsive">
           <table class="table table-striped table-sm">
             <tbody>
                 <?php
                 $propreties = json_decode($p['pages_value'], true);
                 foreach ($propreties as $key => $value) {
                   ?>
                   <tr>
                   <th><?= $key?> (<?= gettype($value)?>)</th>
                     <td><?= $value?></td>
                   </tr>
                   <?php
                 } ?>
             </tbody>
           </table>
         </div>
          </div>
          <?php
        }
       ?>
    <?php } ?>
    </main>
  </div>
</div>
