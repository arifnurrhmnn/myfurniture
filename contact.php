    <?php require "header.php"; ?>
    <style>
        .banner .img {
            width: 100%;
            height: 250px;
            background-image: url('assets/img/4.jpg');
            padding: 0px;
            margin: 0px;
        }

        .img .box {
            height: 250px;
            background-color: rgb(41, 41, 41, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
            padding-top: 70px;
        }

        .box a {
            color: #0066FF;
        }

        .box a:hover {
            text-decoration: none;
            color: rgb(6, 87, 209);
        }

        /* content */
        .row {
            margin-left: 0;
            margin-right: 0;
            margin-bottom: 6px;
        }

        .row>[class^="col"] {
            padding-left: 3px;
            padding-right: 3px;
        }

        textarea {
            width: 100%;
        }

        #googleMap {
            width: 100%;
            height: 350px;
        }
    </style>

    <div class="banner mb-3">
        <div class="container-fluid img">
            <div class="container-fluid box">
                <h3>CONTACT US</h3>
                <p>Home > <a href="#">Contact Us</a></p>
            </div>
        </div>
    </div>

    <div class="container bg-white rounded pt-4 pb-4">
        <div class="row">
            <div class="col-md-8 col-sm-12 pr-4">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="validationDefault01"
                                    placeholder="Nama Depan" value="" required="required">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="validationDefault01"
                                    placeholder="Nama Belakang" value="" required="required">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="validationDefault02" placeholder="E-mail"
                                    value="" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="input-group">
                                <textarea class="form-control" id="validationTextarea"
                                    placeholder="Masukkan Pesan Yang Ingin Di Kirimkan" rows="9"
                                    required="required"></textarea>
                                <div class="invalid-feedback">
                                    Masukkan Pesan Yang Ingin Di Kirimkan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="button" class="btn btn-primary btn-md" value="Kirim Pesan" id="submit"
                            onclick="validate();" />
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-sm-12 text-left">
                <h5>Contact Info</h5>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem dignissimos modi
                    dolorem?</p>
                <i class="fa fa-tty"></i> 0823 3232 4442 <br>
                <i class="fa fa-envelope"></i> myfurniture@gmail.com <br>
                <i class="fa fa-hourglass"></i> Monday - Saturday (08.00 - 17.00) <br>
                <i class="fa fa-map-marker"></i> Jl.Suka Saya Km 23 <br>

            </div>
        </div>

        <div class="row mt-5">
            <h3 class="mb-2"><span class="text-primary"> COORDINATE </span>LOCATION
            </h3>
            <div id="googleMap"></div>
        </div>
    </div>

    <script>
        // Initialize and add the map
        function initMap() {

            var maps = {
                lat: -7.749923587395794,
                lng: 110.41867017745972
            };

            var map = new google.maps.Map(
                document.getElementById('googleMap'), {
                    zoom: 17,
                    center: maps
                });

            var marker = new google.maps.Marker({
                position: maps,
                map: map
            });
        };

        function validate() {
            var var1 = document.getElementById("validationDefault01").value;
            var var2 = document.getElementById("validationDefault02").value;
            if (var1 == "" && var2 == "") {
                swal({
                    title: "Gagal",
                    text: "Silahkan Mengisi Form Data Terlebih Dahulu!",
                    icon: "warning"
                })
                return false;
            }
            if (var1 != "" || var2 != "") {
                swal({
                    title: "Sukses",
                    text: 'Pesan Anda Berhasil Di Kirimkan!',
                    icon: "success"
                }).then(okay => {
                    if (okay) {
                        window.location.href = "contact.php";
                    }
                });

            }

        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuSgg6X0S1onsjheqw3PUWwTAZDgV4A8k&callback=initMap">
    </script>
    <?php require "footer.php"; ?>