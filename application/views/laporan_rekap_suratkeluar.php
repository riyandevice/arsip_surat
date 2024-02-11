<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        #table {
            font-family: 'Times New Roman', Times, serif, Helvetica, sans-serif;
            border-collapse: collapse;
            font-size: 10pt;
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
        <h4><u>REKAPITULASI SURAT KELUAR</u></h4>
        <?php echo $label ?>
    </div>

    <table id="table">
        <thead>
            <tr bgcolor="#FFA800" align="center">
                <th style="text-align:center" width="20px">No</th>
                <th style="text-align:center" width="20px">No. Agenda/Kode</th>
                <th style="text-align:center">Isi Ringkas</th>
                <th style="text-align:center">Tujuan</th>
                <th style="text-align:center" width="140px">Nomor Surat</th>
                <th style="text-align:center">Tgl Surat</th>
                <th style="text-align:center">Pembuat</th>
                <th style="text-align:center">Ket</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($transaksi as $trs) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $trs->no_agenda; ?> | <?php echo $trs->kode; ?></td>
                    <td><?php echo $trs->isi; ?></td>
                    <td><?php echo $trs->tujuan; ?></td>
                    <td><?php echo $trs->no_surat; ?></td>
                    <td><?php echo format_indo(date($trs->tgl_surat)); ?></td>
                    <?php
                    foreach ($pembuat_surat as $pbt_srt) : ?>
                        <td><?php echo $pbt_srt->nama; ?></td>
                    <?php endforeach; ?>
                    <td style="text-align:center">Terarsip</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>