<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- ChartJS -->
<script src="adminlte/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->

<?php if (!isset($_GET['menu'])) { ?>
  <?php 
    if(!isset($_GET['sumber'])){
        $sumber="regsosek-sp";
    }else{
      $sumber=$_GET['sumber'];
    }
    
  ?>
  <script>
    const url =
      "backend/rekap.php?sumber=<?php echo $sumber ?>&unik=" +
      Math.floor(Math.random() * 101);
    $.get(url, function(data, status) {
      if (status === "success") {
        const obj = JSON.parse(data);
        console.log(obj);
        createChart(obj.chart);
        $('#akses').html(obj.data.akses)
        $('#nik').html(obj.data.nik)
        $('#nama').html(obj.data.nama)
        $('#alamat').html(obj.data.alamat)
        $('#nikp').html(obj.data.nik_p + '%')
        $('#namap').html(obj.data.nama_p + '%')
        $('#alamatp').html(obj.data.alamat_p + '%')
      }
    });
    //createChart();
    function createChart(data) {
      var areaChartData = data
      console.log(areaChartData);

      var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }

      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
    }
  </script>
<?php } else if ($_GET['menu'] == 'list') { ?>
  <!-- DataTables  & Plugins -->
  <script src="adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="adminlte/plugins/jszip/jszip.min.js"></script>
  <script src="adminlte/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="adminlte/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "ajax": "backend/list.php?unik=" + Math.floor(Math.random() * 101),
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "ordering": true,
        "columns": [{
            "data": "nik"
          },{
            "data": "flag_nik"
          },
          {
            "data": "nama"
          },
          {
            "data": "flag_nama"
          },
          {
            "data": "jenkel"
          },
          {
            "data": "flag_jenkel"
          },
          /*
          {
            "data": "tempat_lahir"
          },
          {
            "data": "flag_tempat_lahir"
          },
          */
          {
            "data": "tanggal_lahir"
          },
          {
            "data": "flag_tanggal_lahir"
          },
          /*
          {
            "data": "agama"
          },
          {
            "data": "flag_agama"
          },
          {
            "data": "status_perkawinan"
          },
          {
            "data": "flag_status_perkawinan"
          },
          {
            "data": "pekerjaan"
          },
          {
            "data": "flag_pekerjaan"
          },
          {
            "data": "nama_ibu"
          },
          {
            "data": "flag_nama_ibu"
          },
          */
          {
            "data": "alamat"
          },
          {
            "data": "flag_alamat"
          },
          {
            "data": "nama_prov"
          },
          {
            "data": "flag_prov"
          },
          {
            "data": "nama_kab"
          },
          {
            "data": "flag_kab"
          },
          {
            "data": "nama_kec"
          },
          {
            "data": "flag_kec"
          },
          {
            "data": "nama_desa"
          },
          {
            "data": "flag_desa"
          },
          /*
          {
            "data": "rt"
          },
          {
            "data": "rw"
          },
          */
          {
            "data": "cek"
          },
          {
            "data": "status"
          }
        ],
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
  </script>
<?php } else if ($_GET['menu'] == 'testapi') { ?>
  <!-- jquery-validation -->
  <script src="adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!--Tempus-->
  <script src="adminlte/plugins/moment/moment.min.js"></script>
  <script src="adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Select2 -->
  <script src="adminlte/plugins/select2/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="adminlte/plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- date-picker -->
  <script src="adminlte/plugins/daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="adminlte/plugins/trial-viewer-master/src/json-viewer.js"></script>
  <script>
    $('#reservationdate').datetimepicker({
      format: 'DD-MM-YYYY',
    });
    $('[data-mask]').inputmask();
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    $.get("backend/listAgama.php", function(data, status) {
      if (status === "success" && data !== "[]") {
        const myOptions = JSON.parse(data);
        var mySelect = $('#agama');
        $.each(myOptions, function(key, val) {
          mySelect.append(
            $('<option></option>').val(val.id).html(val.nama)
          );
        });
        //console.log(myOptions)
      } else {
        Swal.fire("Maaf", "Data tidak ditemukan", "error");
      }
    });
    $.get("backend/listJenKel.php", function(data, status) {
      if (status === "success" && data !== "[]") {
        const myOptions = JSON.parse(data);
        var mySelect = $('#jenkel');
        $.each(myOptions, function(key, val) {
          mySelect.append(
            $('<option></option>').val(val.id).html(val.nama)
          );
        });
        //console.log(myOptions)
      } else {
        Swal.fire("Maaf", "Data tidak ditemukan", "error");
      }
    });
    $.get("backend/listPendidikan.php", function(data, status) {
      if (status === "success" && data !== "[]") {
        const myOptions = JSON.parse(data);
        var mySelect = $('#pendidikan');
        $.each(myOptions, function(key, val) {
          mySelect.append(
            $('<option></option>').val(val.id).html(val.nama)
          );
        });
        //console.log(myOptions)
      } else {
        Swal.fire("Maaf", "Data tidak ditemukan", "error");
      }
    });
    $.get("backend/listHubKel.php", function(data, status) {
      if (status === "success" && data !== "[]") {
        const myOptions = JSON.parse(data);
        var mySelect = $('#hubkel');
        $.each(myOptions, function(key, val) {
          mySelect.append(
            $('<option></option>').val(val.id).html(val.nama)
          );
        });
        //console.log(myOptions)
      } else {
        Swal.fire("Maaf", "Data tidak ditemukan", "error");
      }
    });
    $.get("backend/listWilayah.php", function(data, status) {
      if (status === "success" && data !== "[]") {
        const myOptions = JSON.parse(data);
        var mySelect = $('#prov');
        $.each(myOptions, function(key, val) {
          mySelect.append(
            $('<option></option>').val(val.kdprov).html(val.nama)
          );
        });
        //console.log(myOptions)
      } else {
        Swal.fire("Maaf", "Data tidak ditemukan", "error");
      }
    });
    $("#prov").change(function() {
      var prov = $("#prov").val();
      $("#kab").empty();
      $.get("backend/listWilayah.php?prov=" + prov, function(data, status) {
        if (status === "success" && data !== "[]") {
          const myOptions = JSON.parse(data);
          var mySelect = $('#kab');
          mySelect.append($('<option></option>').val('').html('Pilih Kabupaten/Kota'));
          $.each(myOptions, function(key, val) {
            mySelect.append(
              $('<option></option>').val(val.kdkab).html(val.nama)
            );
          });
          //console.log(myOptions)
        } else {
          Swal.fire("Maaf", "Data tidak ditemukan", "error");
        }
      });
    });
    $("#kab").change(function() {
      var prov = $("#prov").val();
      var kab = $("#kab").val();
      $("#kec").empty();
      $.get("backend/listWilayah.php?prov=" + prov + "&kab=" + kab, function(data, status) {
        if (status === "success" && data !== "[]") {
          const myOptions = JSON.parse(data);
          var mySelect = $('#kec');
          mySelect.append($('<option></option>').val('').html('Pilih Kecamatan'));
          $.each(myOptions, function(key, val) {
            mySelect.append(
              $('<option></option>').val(val.kdkec).html(val.nama)
            );
          });
          //console.log(myOptions)
        } else {
          Swal.fire("Maaf", "Data tidak ditemukan", "error");
        }
      });
    });
    $("#kec").change(function() {
      var prov = $("#prov").val();
      var kab = $("#kab").val();
      var kec = $("#kec").val();
      $("#desa").empty();
      $.get("backend/listWilayah.php?prov=" + prov + "&kab=" + kab + "&kec=" + kec, function(data, status) {
        if (status === "success" && data !== "[]") {
          const myOptions = JSON.parse(data);
          var mySelect = $('#desa');
          mySelect.append($('<option></option>').val('').html('Pilih Desa/Kelurahan'));
          $.each(myOptions, function(key, val) {
            mySelect.append(
              $('<option></option>').val(val.kddesa).html(val.nama)
            );
          });
          //console.log(myOptions)
        } else {
          Swal.fire("Maaf", "Data tidak ditemukan", "error");
        }
      });
    });
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      var formData = $('#form').serialize()
      $.ajax({
        type: "POST",
        url: "backend/ceknik.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function(result) {
        //alert(result);
        console.log(result)
        if (result === 'ok') {
          Swal.fire({
            title: 'Selamat',
            text: "Data keluarga sudah tersimpan",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
              document.getElementById("formIndividu").reset();
              window.location.href = "home.html"
            }
          })
        } else {
          var myNode = document.getElementById("json");
          while (myNode.lastElementChild) {
            myNode.removeChild(myNode.lastElementChild);
          }
          var jsonObj = {};
          var filePath = result;
          //loadJSON(filePath, function(response) {
              // Parse JSON string into object. You can assign you own json data to jsonObj directly if you don't need to read file.
              jsonObj =result;
              var jsonViewer = new JSONViewer();
              document.querySelector("#json").appendChild(jsonViewer.getContainer());
              jsonViewer.showJSON(jsonObj);
          //});
          /*
          Swal.fire({
            title : 'Hasil',
            html :  '<div id="json"></div>',
            icon : 'info '
          });
          */
        }
      });
    });
    

function loadJSON(file, callback) {
    var xhr = new XMLHttpRequest();
    xhr.overrideMimeType('application/json');
    xhr.open('GET', file, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(xhr.responseText);
        }
    };
    xhr.send(null);
}
  </script>
<?php } else if($_GET['menu']=='cekapi'){?>
  <!--
  <script src="adminlte/plugins/terminal/jquery.terminal.min.js"></script>
  <script>
    $('#status2').terminal({
        hello: function(what) {
            this.echo('Hello, ' + what +
              '. Wellcome to this terminal.');
        }
    }, {
        greetings: 'My First Web Terminal'
    });
  </script>
  -->
  <script>
    /*
      for (var i=0;i<=100;i++) {
        (function(ind) {
            setTimeout(function(){
              console.log(ind);          
              document.getElementById("status").innerHTML +=
                "NIK "+(Math.random()+' ').substring(2,10)+(Math.random()+' ').substring(2,10)+" diproses<br>";
            }, 1000 + (1000 * ind));
        })(i);
      }
      */
     
      localStorage.setItem("cek","");
      myInterval = setInterval(callApi, 1000);
      function callApi(){
        $.get("backend/prosesApi.php", function(data, status) {
        if (status === "success" && data !== "[]") {
          const mydata = JSON.parse(data);
          //console.log(mydata);
          //console.log(data);
          document.getElementById("status").innerHTML +=
                  "NIK "+(mydata.NIK)+" diproses, status "+mydata.Status+"<br>";
                  localStorage.setItem("cek",mydata.Status)
                  if(localStorage.getItem("cek")==="Kuota Akses Hari Ini Telah Habis"){
                    //clearInterval(myInterval);     
                  }
        } else {
          Swal.fire("Maaf", "API Error", "error");
        }
      });
      }
      
      function stopProses(){
        clearInterval(myInterval);
      }
      
  </script>
<?php } ?>
</body>

</html>
