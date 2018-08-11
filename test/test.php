<!DOCTYPE HTML>
<html>
  <head>
    <title>Demo Nusagates</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
        <form id="gambar" action="test.php" method="get">
          <div class="form-group">
            <label for="input-gambar">Pilih Gambar</label>
            <input id="upload" type="file" class="form-control" name="gambar" accept="image/jpeg" multiple/>
          </div>
        </form>
      <div class="col-md-6">
        <div class="tampil-gambar"></div>
      </div>

<script type="text/javascript" src="../Javascript/Framework/jquery.js"></script>
<script>
  $(document).ready(function() {
      $("#upload").change(function () {
          var data = new FormData($("#gambar")[0]);
          console.log(data);
          console.log($("#gambar input[type=file]").get(0).files[0]['name']);
          if ($("#gambar input[type=file]").get(0).files.length!==0) {
              $.ajax({
                  url: "data.php",
                  method: "post",
                  cache: false,
                  contentType: false,
                  processData: false,
                  data: data,
                  success: function (msg) {
                      if (msg === "0") {
                          alert("Upload Gagal!");
                      } else {
                          setTimeout(function ()
                          {
                              $(".tampil-gambar").append("<img  class='img-responsive img-thumbnail img-circle' width='100px' src='gambar/" + msg + "'/> ");
                          }, 500);

                      }
                  },
              });
          }
          else{
            alert("Silahkan pilih gambar");
          }
      });
  });
</script>
</body>
</html>
