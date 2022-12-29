<!DOCTYPE html>
<html>

<?php $this->load->view("_partials/head.php") ?>


<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <center>
        <h3>DATA DANA USULAN PENGABDIAN</h3>
    </center>

    <table id="tableapb" class="table table-bordered table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Pengusul</th>
                <th>Judul</th>
                <th>Dana APB</th>
                <th>Usulan APB</th>
                <th>Biaya Lain</th>
                <th>Sumber Biaya Lain</th>
                <th>Dana Disetujui</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($dana as $data) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->nidn_pengusul . ' - ' . $data->nama ?></td>
                    <td><?= $data->usulan_judul ?></td>
                    <td><?= $data->usulan_biaya ?></td>
                    <td><?= $data->usulan_biaya_apb ?></td>
                    <td><?= $data->usulan_biaya_lain ?></td>
                    <td><?= $data->sumber_biaya_lain ?></td>
                    <td><?= $data->setujui_biaya ?></td>
                </tr>
            <?php
            }
            ?>
    </table>
</body>

</html>