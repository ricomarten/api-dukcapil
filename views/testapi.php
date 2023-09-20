<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Test API</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Test API</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Credential</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
              <form id="form" method="post">
                  <div class="form-group">
                    <label>Username</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username@domainemail">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-id-card"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-key"></span>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Individu</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="form" method="post">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>NIK (Nomer KTP)</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor KTP" data-inputmask='"mask": "999999-999999-9999"' data-mask>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-id-card"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-location-arrow"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir (dd-mm-yyy)</label>
                    <div class="form-group mb-3">
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tglLhr" id="tglLhr" class="form-control datetimepicker-input" data-target="#reservationdate" data-inputmask-inputformat="mm/dd/yyyy" data-mask />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                    <div class="input-group mb-3">
                      <select id="agama" name="agama" class="form-control select2bs4">
                        <option value="">Pilih Agama</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-check-square"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="input-group mb-3">
                      <select id="jenkel" name="jenkel" class="form-control select2bs4">
                        <option value="">Pilih Jenis Kelamin</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-venus-mars"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Hubungan Keluarga</label>
                    <div class="input-group mb-3">
                      <select id="hubkel" name="hubkel" class="form-control select2bs4">
                        <option value="">Pilih Hubungan Keluarga</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-cog"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Pendidikan Tertinggi</label>
                    <div class="input-group mb-3">
                      <select id="pendidikan" name="pendidikan" class="form-control select2bs4">
                        <option value="">Pilih Pendidikan Tertinggi</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-graduation-cap"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  
                <div class="form-group">
                <div class="form-group">
                    <label>Alamat</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-location-arrow"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                    <label>Provinsi</label>
                    <div class="input-group mb-3">
                      <select id="prov" name="prov" class="form-control select2bs4">
                        <option value="">Pilih Provinsi</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-map"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Kabupaten/Kota</label>
                    <div class="input-group mb-3">
                      <select id="kab" name="kab" class="form-control select2bs4">
                        <option value="">Pilih Kabupaten/Kota</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-map"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <div class="input-group mb-3">
                      <select id="kec" name="kec" class="form-control select2bs4">
                        <option value="">Pilih Kecamatan</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-map"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Desa/Kelurahan</label>
                    <div class="input-group mb-3">
                      <select id="desa" name="desa" class="form-control select2bs4">
                        <option value="">Pilih Desa/Kelurahan</option>
                      </select>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-map"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>RT</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="rt" name="rt" placeholder="Nomor RT">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-list-ol"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>RW</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="rw" name="rw" placeholder="Nomor RW">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-list-ol"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Treshold</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="level" name="level" placeholder="Treshold">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-list-ol"></span>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group">
                <div class="row">
                <div class="col-5">
                  &nbsp;
                </div>
                  <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-check"></i> Cek</button>
                  </div>
            
                  &nbsp;
                </div>
                </div>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hasil Pengecekan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="json"></div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
