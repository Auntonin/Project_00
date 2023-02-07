<html lang="th">

<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="service/province.service.js" type="text/javascript"></script> -->
</head>

<body>

    <div class="container" style="margin-top: 25px;">
        <form action="" method="get">
            <div class="row">

                <div class="col-12">
                    <label class="control-label">จังหวัด</label>
                    <select class="form-control" placeholder="จังหวัด" name="province" id="province"></select>
                </div>
                <div class="col-12">
                    <label class="control-label">อำเภอ/เขต</label>
                    <select class="form-control" placeholder="อำเภอ/เขต" name="district" id="district">
                        <option value="">เลือก</option>
                    </select>

                </div>
                <div class="col-12">
                    <label class="control-label">ตำบล/แขวง</label>
                    <select class="form-control" placeholder="ตำบล/แขวง" name="subdistrict" id="subdistrict">
                        <option value="">เลือก</option>
                    </select>
                </div>
                <button type="submit">submit</button>

            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            // $('#district').hide();
            $('#province').empty().append('<option value="">เลือก</option>');
            // $('#province').empty();
            $.ajax({
                dataType: "json",
                type: 'POST',
                url: 'service/ajax.province.php',
                success: function (data) {
                    $.each(data, function (key, val) {
                        $('#province').append('<option value=' + val.code + '>' + val.name + '</option>');
                    });
                    $('#province').select2();
                    $('#district').select2();
                    $('#subdistrict').select2();
                }
            });

            /****** เลือกจังหวัด *******/
            $('#province').on('change', function () {
                // $('#district').show();
                if ($('#district').length > 0) {
                    callDistrict($(this).val(), null);
                }
            });

            /****** เลือกอำเภอ *******/
            $('#district').on('change', function () {
                if ($('#subdistrict').length > 0) {
                    callSubDistrict($(this).val(), null);
                }
            });
        });

        function callDistrict(proVinceId, selector) {
            $('#district').empty().append('<option value="">เลือก</option>');
            if ($('#subdistrict').length > 0) {
                $('#subdistrict').empty().append('<option value="">เลือก</option>');
            }

            $.ajax({
                dataType: "json",
                type: 'POST',
                url: 'service/ajax.district.php',
                data: {
                    'id': proVinceId
                },
                success: function (data) {
                    $.each(data, function (key, val) {
                        selected = (val.code == selector) ? 'selected' : '';
                        $('#district').append('<option value=' + val.code + ' ' + selected + '>' + val.name + '</option>');
                    });
                    $('#district').select2();
                }
            });
        }

        function callSubDistrict(disTrictId, selector) {
            $('#subdistrict').empty().append('<option value="">เลือก</option>');

            $.ajax({
                dataType: "json",
                type: 'POST',
                url: 'service/ajax.subdistrict.php',
                data: {
                    'id': disTrictId
                },
                success: function (data) {
                    $.each(data, function (key, val) {
                        selected = (val.code == selector) ? 'selected' : '';
                        $('#subdistrict').append('<option value=' + val.code + ' ' + selected + '>' + val.name + '</option>');
                    });
                    $('#subdistrict').select2();
                }
            });
        }
    </script>
</body>