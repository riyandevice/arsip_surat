<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #000000;
            padding: 8px;
        }

        #table2 td {
            border: 1px solid ffffff;
            padding: 8px;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
        }
    </style>

    <style>
        img {
            width: 100px;

            height: 100px;

        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h2><u>LEMBAR DISPOSISI</u></h2>
    </div>

    <?php
    $no = 1;
    $kodenya = 'testing.id';
    ?>
    <table id="table">
        <tr>
            <td>&emsp;&emsp;&emsp;&nbsp;&nbsp;No. Agenda : <?php echo $detail->no_agenda; ?></td>
            <td>Kode Bidang : <?php echo $detail->kode; ?></td>
        </tr>
    </table>


    <table id="table">
        <tr>
            <td>
                <table id="table2">
                    <tbody>
                        <tr>
                            <td>Tanggal Surat</td>
                            <td>:</td>
                            <td><?php echo format_indo(date($detail->tgl_surat)); ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Surat</td>
                            <td>:</td>
                            <td><?php echo $detail->no_surat; ?></td>
                        </tr>
                        <tr>
                            <td>Asal Surat</td>
                            <td>:</td>
                            <td><?php echo $detail->asal_surat; ?></td>
                        </tr>
                        <tr>
                            <td>Isi Ringkasan Surat</td>
                            <td>:</td>
                            <td><?php echo $detail->isi; ?></td>
                        </tr>
                        <tr>
                            <td>Diterima Tanggal</td>
                            <td>:</td>
                            <td><?php echo format_indo(date($detail->tgl_diterima)); ?></td>
                        </tr>
                        <tr>
                            <td>Penerima Surat</td>
                            <td>:</td>
                            <td><?php echo $detail->isi; ?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <table id="table">
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Tanggal Penyelesaian&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;.......................</td>
        </tr>
    </table>

    <table id="table">
        <tr>
            <td>ISI DISPOSISI :<br>
                ..........................................................................<br>
                ..........................................................................<br>
                ..........................................................................<br>
                ..........................................................................<br>
                ..........................................................................<br>
                ..........................................................................<br>
                <table id="table2">
                    <tbody>
                        <tr>
                            <td>Batas waktu</td>
                            <td>:</td>
                            <td>...............................</td>
                        </tr>
                        <tr>
                            <td>Sifat Disposisi</td>
                            <td>:</td>
                            <td>...............................</td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <table id="table2">
                    <tbody>
                        <tr>
                            <td>..........................................................................</td>
                        </tr>
                    </tbody>
                </table>
            </td>

            <td>
                Diteruskan Kepada :<br>
                1. Kepala Cabdin<br>
                2. Kasi. SMK<br>
                3. Kasi. SMA<br>
                4. Kasi. SLB<br>
                5. Kasubag TU
                <br><br><br></br><br></br>
                <img src="<?php echo base_url(); ?>/assets/QRcode/surat_masuk/<?php echo $detail->qr_code; ?>" alt="">
            </td>
        </tr>
    </table>

</body>

</html>