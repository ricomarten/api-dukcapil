<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Cek NIK</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Cek NIK</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<style>
  .scroll {
    max-height: 500px;
    overflow-y: auto;
}
</style>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
      <div class="card scroll">
          <div class="card-header">
            <h3 class="card-title">Cek API</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <button class="btn btn-sm btn-info" onclick="stopProses()">Stop Proses</button>
            <br>
            <div id="proses">proses sedang berlangsung....</div>
            
          <div id="status"></div>
          </div>
      </div>
        
    </div>
    </div>
  </div>
</section>

